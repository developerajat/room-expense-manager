<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Role;
use App\Models\Room;
use App\Models\RoomMember;
use App\Notifications\ForgetPasswordAdmin;
use App\Rules\EmailValidate;
use Hash;
use Socialite;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function registerform()
    {
        return view('admin.auth.register');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $rememberMe = $request->remember ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $rememberMe)) {
            if (!Auth::user()->active) {
                Auth::logout();
                return redirect(route('loginForm'))->withInput($request->only('email'))->withErrors(['email' => 'Your account is inactive.']);
            }
            if (!empty($request->next)) {
                return redirect($request->next);
            }
            if (Auth::user()->isSuperAdmin()){
                return redirect(route('dashboard'));
            }
            else if(Auth::user()->isUser()){
                return redirect(route('user.dashboard'));
            }
        }
        return redirect(route('loginForm'))->withInput($request->only('email', 'remember'))->with('error', 'Invalid credentials');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => ['required', 'email'],
            'phone_number'      => 'nullable',
            'room_number'       => 'required',
            'password'          => 'required|min:8|confirmed',
        ]);
        $room = Room::where(['number' => $request->room_number])->first();
        if(!$room){
            $room = Room::create(['number' => $request->room_number]);
        }
        
        $data = $request->except(['_token', 'profile_photo', 'password_confirmation', 'password']);
        $data['role_id'] = Role::USER;
        $data['email_verified_at'] = date('Y-m-d H:i:s');
        $data['active'] = 1;
        $data['room_id'] = $room->id;
        $data['password'] = Hash::make($request->password);
        
        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $this->fileUpload($request->profile_photo, 'users/images')['name'] ?? '';
        }
        
        $user = User::create($data);
        if ($user)
        {
            $roomMember = RoomMember::create(['room_id' => $room->id, 'user_id' => $user->id]);
            Auth::loginUsingId($user->id);
            notify()->success('Sign Up Successful!');
            return redirect()->route('user.dashboard');
        }

    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            session()->flush();
            notify()->success('Logged out successfully');
            return redirect(route('loginForm'));
        }

        notify()->success('Something went wrong');
        return back();
    }

    public function forgetForm()
    {
        return view('admin.auth.forgot');
    }

    public function forgetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:rfc,dns',
        ]);

        try {
           $user = User::where(['email' => $request->email])->first();

            if (!$user) {
                notify()->warning('No account associated with your email');
                return back();
            }

            $tokenData = DB::table('password_resets')->where('email', $request->email)->first();
            if (!$tokenData) {
                DB::table('password_resets')->insert([
                    'email' => strtolower($request->email),
                    'token' => Str::random(60),
                    'created_at' => Carbon::now(),
                ]);
                $tokenData = DB::table('password_resets')->where('email', $request->email)->first();
            }
            $url = url('forget-password/change/' . $tokenData->token . '/' . $user->id);
            $user->notify(new ForgetPasswordAdmin($url));
        } catch (\Exception $error) {
            notify()->warning('Something Went Wrong');
            return back();
        }

        notify()->success('A password resent link has been sent to your registered email address');
        return redirect(route('loginForm'));
    }

    public function forgetPasswordChange($token, $id)
    {
        $user = User::find($id);
        return view('admin.auth.reset_password', compact('user', 'token'));
    }

    public function forgetPasswordUpdate(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $tokenData = DB::table('password_resets')->where('token', $token)->first();
        if (!$tokenData) {
            notify()->warning('Your link has been expired , please send new link');
            return back();
        }

        $user = User::where('email', $tokenData->email)->first();
        if (\Hash::check($request->password, $user->password)) {
            notify()->error('New password can not be same as old password.');
            return back();
        }

        $user->update(['password' => \Hash::make($request->password)]);

        DB::table('password_resets')->where('email', $user->email)->delete();
        notify()->success('Password updated successfully');
        return redirect(route('loginForm'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.showProfile', compact('user'));
    }
    public function editProfile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email', new EmailValidate],
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'phone_number' => 'required|max:11|min:9',
            'profile_photo' => 'nullable|image',
        ]);

        $user = User::find(Auth::user()->id);

        $emailExists = User::where('id', '!=', $user->id)->where(['email' => $request->email, 'role_id' => $user->role_id])->first();
        if ($emailExists)
        {
            notify()->warning('This Email already exists');
            return back();
        }

        $data = $request->except(['_token', 'email']);

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $this->fileUpload($request->profile_photo, 'users/images')['name'] ?? null;
        }

        $user->update($data);

        notify()->success('Profile updated successfully');
        return back();
    }

    public function changePasswordForm()
    {
        return view('admin.change_password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:8',
            'new_password' => 'required|min:8|different:current_password|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        try {
            $user = Auth::user();

            if (\Hash::check($request->current_password, $user->password)) {
                $newPassword = \Hash::make($request->new_password);
                $user->update(['password' => $newPassword]);

                notify()->success('Password updated successfully');
                return back();
            }
            else{
                notify()->warning('You have entered wrong current password');
                return back();
            }
        } catch (\Exception $error) {
            notify()->warning('Somthing went Wrong');
            return back();
        }
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * handle facebook callback function
     */
    public function facebookCallback(Request $request)
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $user = User::where('email', $facebookUser->getEmail())->first();

            if (!$user) {
                $password = rand(100000, 999999);
                $nameArr  = explode(' ', $facebookUser->getName());
                $firstName = $nameArr[0];
                unset($nameArr[0]);
                $lastName  = (count($nameArr)) ? implode(' ', $nameArr) : '';

                $user = User::create([
                    'first_name'        => $firstName,
                    'last_name'         => $lastName,
                    'email'             => $facebookUser->getEmail(),
                    'provider'          => 'facebook',
                    'provider_id'       => $facebookUser->getId(),
                    'is_verified'       => 1,
                    'active'            => 1,
                    'password'          => Hash::make($password),
                    'role_id'           => Role::USER,
                    'room_id'           => 0,
                    'profile_photo'     => $facebookUser->getAvatar(),
                    'email_verified_at' => date('Y-m-d H:i:s'),
                    'gender'            => $facebookUser->getGender(),
                ]);

            }

            Auth::loginUsingId($user->id);

        } catch (\Exception $e) {
            notify()->warning('Something Went Wrong');
            return back();
        }
        notify()->success('Login successful');

        return redirect()->route('user.dashboard');
    }
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * handle google callback function
     */
    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $password = rand(100000, 999999);

                $user = User::create([
                    'first_name'        => $googleUser['given_name'],
                    'last_name'         => $googleUser['family_name'],
                    'email'             => $googleUser->getEmail(),
                    'provider'          => 'google',
                    'provider_id'       => $googleUser->getId(),
                    'is_verified'       => 1,
                    'active'            => 1,
                    'password'          => Hash::make($password),
                    'role_id'           => Role::USER,
                    'room_id'           => 0,
                    'profile_photo'     => $googleUser->getAvatar(),
                    'email_verified_at' => date('Y-m-d H:i:s'),
                ]);
            }

            Auth::loginUsingId($user->id);

        } catch (\Exception $e) {
            notify()->warning('Something Went Wrong');
            return back();
        }
        notify()->success('Login successful');

        return redirect()->route('user.dashboard');
    }
}
