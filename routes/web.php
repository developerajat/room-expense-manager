<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect(route('dashboard'));
    }
    return redirect(route('loginForm'));
})->name('home');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::namespace('App\Http\Controllers')->group(function() {

    Route::get('user/signup/{id}', 'UsersController@linkRegister');
    Route::post('user/register','UsersController@registerUser')->name('user.register');

    // Route::group(['middleware' => 'guest'], function() {
        Route::get('login', 'AuthController@loginform')->name('loginForm');
        Route::get('register', 'AuthController@registerForm')->name('registerForm');
        Route::get('forget-password','AuthController@forgetForm')->name('forgetForm');
        Route::post('forget-password','AuthController@forgetPassword')->name('forgetPassword');
        Route::get('forget-password/change/{token}/{id}', 'AuthController@forgetPasswordchange');
        Route::post('password/reset/{token}','AuthController@forgetPasswordUpdate')->name('password.reset');
    // });

    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register-post', 'AuthController@register')->name('register');

    Route::get('auth/facebook', 'AuthController@facebookRedirect')->name('auth.facebook');
    Route::get('facebook/callback', 'AuthController@facebookCallback');

    Route::get('auth/google', 'AuthController@googleRedirect')->name('auth.google');
    Route::get('google/callback', 'AuthController@googleCallback');
});

Route::namespace('App\Http\Controllers')->group(function() {
    Route::group(['middleware' => 'auth'], function() {
        Route::get('logout', 'AuthController@logout')->name('logout');

        Route::group(['middleware' => 'admin'], function() {
            Route::get('dashboard','DashboardController@dashboard')->name('dashboard');
            Route::resource('users', 'UsersController');
            Route::get('user/change-status/', 'UsersController@changeStatus')->name('users.ChangeStatus');

            Route::resource('settings', 'SettingController');
            Route::get('settings/change-status/', 'SettingController@changeStatus')->name('setting.ChangeStatus');
        });

        Route::group(['middleware' => 'user', 'prefix' => 'user', 'as' => 'user.'], function() {
            Route::get('dashboard','DashboardController@userDashboard')->name('dashboard');
        });

        Route::get('expenses','ExpenseController@index')->name('expenses.index');
        Route::get('expenses/create','ExpenseController@create')->name('expenses.create');
        Route::get('expenses/store','ExpenseController@store')->name('expenses.store');
        Route::get('expenses/show/{id}','ExpenseController@show')->name('expenses.show');
        Route::get('expenses/edit/{id}','ExpenseController@edit')->name('expenses.edit');
        Route::put('expenses/update/{id}','ExpenseController@update')->name('expenses.update');
        
        Route::get('profile', 'AuthController@profile')->name('adminProfile');
        Route::get('edit/profile', 'AuthController@editProfile')->name('editProfile');
        Route::post('profileUpdate', 'AuthController@profileUpdate')->name('profileUpdate');
        Route::get('change-password', 'AuthController@changePasswordForm')->name('changePasswordForm');
        Route::post('changePassword', 'AuthController@changePassword')->name('changePassword');

    });
});
