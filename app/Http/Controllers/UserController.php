<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Helpers\FileName;
use App\Models\Profile;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSettings()
    {
        return view('user.setting');       
    }

    public function postSettings(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'string|max:255|nullable',
            'lastname' => 'string|max:255|nullable',
            'birthdate' => 'date|nullable',
            'avatar' => 'image|nullable',
        ]);

        Auth::user()->profile()->update($request->only([
            'firstname', 
            'lastname', 
            'birthdate'
        ]));

        if ($request->hasFile('avatar')) {

            // We remove the file
            if (!empty(Auth::user()->profile->avatar)) {
                Storage::delete('public/'.Auth::user()->profile->avatar);
            }
            
            $filename = FileName::avatars();

            Image::make($request->file('avatar'))->fit(64)->encode('jpg', 75)->save(config('custom.avatars_folder').$filename);

            Auth::user()->profile()->update(['avatar' => 'avatars/'.$filename]);
        }

        return redirect(action('UserController@getSettings'));
    }

    public function getUpdateEmail()
    {
        return view('user.update_email');
    }

    public function postUpdateEmail(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|current_password',
            'email' => 'required|email|max:255|unique:users',
        ]);

        Auth::user()->update(['email' => $request->input('email')]);

        // TODO : Send mail

        return redirect(action('UserController@getUpdateEmail'));
    }

    public function getUpdatePassword()
    {
        return view('user.update_password');
    }

    public function postUpdatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|current_password',
            'password' => 'required|min:6|confirmed',
        ]);

        Auth::user()->update(['password' => bcrypt($request->input('password'))]);

        // TODO : Send mail

        return redirect(action('UserController@getUpdatePassword'));
    }

    public function destroyProfilePicture()
    {   
        // We destroy the picture in the app folder
        Storage::delete('public/'.Auth::user()->profile->avatar);

        Auth::user()->profile->update(['avatar' => null]);

        return redirect(action('UserController@getSettings'));
    }

    public function MyItems()
    {
        
    }
}
