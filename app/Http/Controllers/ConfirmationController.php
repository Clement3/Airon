<?php

namespace App\Http\Controllers;

use App\Models\Confirmation;
use App\Models\User;
use App\Mail\ConfirmationSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ConfirmationController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth', ['only' => 'create']);
    }
    
    public function show()
    {
        return view('confirmation/confirmed');
    }

    public function create()
    {
        $user = Auth::user();

        if (!$user->confirmed) {

            $confirmation = new Confirmation(['key' => str_random(100)]);

            if (!empty($user->confirmation)) {
                $user->confirmation->delete();
            }

            $user->confirmation()->save($confirmation);
            
            Mail::to($user)->queue(new ConfirmationSend($user));

            return view('confirmation/create');
        }

        return redirect('/');
    }

    public function confirm($name, $key) 
    {
        $user = User::where('name', $name)->firstOrFail();
        $confirmation = Confirmation::where('key', $key)->firstOrFail();

        if ($user->confirmation->key == $confirmation->key) {

            // We confirm the user
            $user->confirmed = 1;
            $user->save();

            // We destroy the key
            $confirmation->delete();

            return redirect(action('ConfirmationController@show'));
        }

        return redirect('/');
    }
}
