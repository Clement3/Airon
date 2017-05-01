<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    public $timestamps = false;

    protected $fillable = ['firstname', 'lastname', 'birthday', 'avatar'];

    protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }    

    public function avatarFile()
    {
        // Function for VueJS - Return the avatar url if the avatar isn't null
        if ($this->avatar != null) {
            return Storage::url($this->avatar);
        }
    }

    public function canDestroyAvatar()
    {   
        // Function for VueJS - Return the url for the destroy button if the avatar isn't null
        if ($this->avatar != null) {
            return action('UserController@destroyProfilePicture');
        }
    }
}
