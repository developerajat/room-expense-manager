<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    // use HasProfilePhoto;
    // use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'role_id',
        'otp',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'name',
    ];

    public function scopeAdmin($query)
    {
        return $query->where('role_id', Role::SUPERADMIN);
    }

    public function scopeUser($query)
    {
        return $query->where('role_id', Role::USER);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /**
     * Check user role is Admin
     *
     * @return boolean
     */

    public function isSuperAdmin()
    {
        return $this->role_id == Role::SUPERADMIN;
    }

    /**
     * Check user role is Sales Rep
     *
     * @return boolean
     */
    public function isUser()
    {
        return $this->role_id == Role::USER;
    }

    /**
     * Get the role associated with the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function invite()
    {
        return $this->hasOne(Invitation::class, 'email', 'email');
    }

    public function getProfilePhotoUrlAttribute()
    {
        if (preg_match('(https://|http://)', $this->profile_photo) === 1) {
            return $this->profile_photo;
        }
        return !empty($this->profile_photo) ? asset("storage/users/images/$this->profile_photo") : asset('assets/img/avatar.png');
    }

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

}
