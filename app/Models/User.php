<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    
    public $incrementing = false;

    protected $casts = [
        'admin' => 'boolean',
        'confirmed' => 'boolean',
        'verified' => 'boolean',
        'banned' => 'boolean',
    ];

    protected $fillable = [
        'id', 'name', 'email', 'password',
    ];

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

    public function confirmation()
    {
        return $this->hasOne('App\Models\Confirmation');
    }

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }  

    public function favorites()
    {
        return $this->belongsToMany('App\Models\Item', 'favorites', 'user_id', 'item_id')->withTimeStamps();
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
