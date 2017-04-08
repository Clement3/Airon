<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $casts = [
        'admin' => 'boolean',
        'confirmed' => 'boolean',
        'verified' => 'boolean',
        'banned' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function locations()
    {
        return $this->hasMany('App\Models\Location');
    }  

    public function isAdmin()
    {
        return $this->admin;
    }

    public function nameForAvatar()
    {
        return $this->name[0];
    }
          
}
