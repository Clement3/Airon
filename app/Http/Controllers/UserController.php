<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            'firstname' => 'string',
            'lastname' => 'string',
        ]);        
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

    public function sendConfirm()
    {
        
    }
}
