<?php

namespace App\Users\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use Lab404\Impersonate\Models\Impersonate;

class User extends Authenticatable
{
    use Notifiable,
        HasRoles,
        UserHasTeams,
        HasApiTokens,
        SoftDeletes,
        Impersonate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'google_id', 'facebook_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setPasswordAttribute( $password )
    {
        $this->attributes['password'] = bcrypt( $password );
    }

    public function canImpersonate()
    {
        return $this->hasRole('admin') == 1;
    }
}
