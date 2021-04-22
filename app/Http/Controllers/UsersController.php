<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Invitation;
use Mail;
use App\Mail\UserInvite;
use App\Rules\EmailValidate;
use Auth, Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::user()->where(function($query) use($request) {
            if ($request->keyword) {
                $query->where('first_name', 'LIKE', "%$request->keyword%")
                    ->orWhere('last_name', 'LIKE', "%$request->keyword%")
                    ->orWhere('email', 'LIKE', "%$request->keyword%")
                    ->orWhere('phone_number', 'LIKE', "%$request->keyword%");
            }
        })->latest()->paginate(10)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::active()->get();
        return view('admin.users.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|alpha',
            'last_name'     => 'required|alpha',
            'email'         => ['required', 'email', new EmailValidate],
            'user_id'       => 'required',
        ]);

        $data = $request->except('_token');
        $data['role_id'] = Role::USER;
        
        $invite = Invitation::where('email', $request->email)->first();
        if (!$invite){
            $invite = Invitation::create($data);
        }

        $data['link'] = url('user/signup/' . base64_encode($invite->id));
        
        Mail::send('admin.email_templates.invite', $data, function ($message) use ($invite) {
            $message->to($invite->email, $invite->first_name)
                ->subject('Expense Manager - Invitation');
        });
        
        if($invite)
        {
            notify()->success('Invitation sent successfully');
            return redirect()->route('users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(base64_decode($id));
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::find(base64_decode($id));
        $data['users'] = User::active()->get();
        return view('admin.users.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'    => 'required|alpha',
            'last_name'    => 'required|alpha',
            'email'    => ['required', 'email', new EmailValidate],
        ]);
        
        $user = User::find($id);
        $emailExists = User::where('id', '!=', $id)->where('email', $request->email)->user()->first();
        if ($emailExists)
        {
            notify()->warning('This Email already exists');
            return back();
        }

        $data = $request->except(['_method', '_token', 'user_id']);
        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $this->fileUpload($request->profile_photo, 'users/images')['name'] ?? null;
        }
        $user->update($data);

        notify()->success('User successfully updated');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(base64_decode($id));
        $user->delete();
        notify()->success('User successfully deleted');
        return back();
    }

    public function linkRegister($id)
    {
        $invite = Invitation::find(base64_decode($id)); 
        if ($invite)
        {
            $user = User::user()->where('email', $invite->email)->first();
            if ($user)
            {
                if (Auth::check())
                {
                    Auth::logout();
                }
                notify()->warning('User is already registered. Please login!');
                return redirect()->route('loginForm');
            }
        }
        return view('admin.auth.sign_up', compact('invite'));
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => ['required', 'email', new EmailValidate],
            'phone_number'      => 'required',
            'invite_id'         => 'required',
            'password'          => 'required|min:8|confirmed',
        ]);

        $data = $request->except(['_token', 'profile_photo', 'user_id', 'password_confirmation', 'password']);
        $data['role_id'] = Role::USER;
        $data['email_verified_at'] = date('Y-m-d H:i:s');
        $data['active'] = 1;
        $data['password'] = Hash::make($request->password);
        $invite = Invitation::find($request->invite_id);
        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $this->fileUpload($request->profile_photo, 'users/images')['name'] ?? '';
        }

        $user = User::create($data);
        if ($user)
        {
            Auth::loginUsingId($user->id);
            notify()->success('Sign Up Successfull!');
            return redirect()->route('userDashboard');
        }

    }

    public function ChangeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->update(['active' => $request->status]);

        // $title = "Account Status";
        // if ($request->status == 1)
        // {
        //     $content = "Account activated by admin.";
        // }
        // else
        // {
        //     $content = "Account Deactivated by admin.";
        // }
        
        // $user->storeNotification($title, $content, 'account');
        // PushNotificationHelper::sendPushNotification($user, $title, $content);

        return $user->active;
    }
}
