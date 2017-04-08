<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($name) 
    {
        return view('profile.show', ['user' => User::where('name', $name)->firstOrFail()]);
    }
}
