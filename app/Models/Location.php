<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'fullname', 'address', 'address_more', 'country', 'state', 'zipcode', 'city', 'phone'];

    protected $casts = [
        'main' => 'boolean',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }    

    public function setMain($user)
    {
        $this->removeMain($user);

        $this->main = 1;
        $this->save();        
    }

    public function removeMain($user)
    {
        $this->where('user_id', $user->id)->where('main', 1)->update(['main' => 0]);
    }
}
