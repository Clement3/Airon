<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() 
    {
        return view('user.admin.index', ['users' => User::all()]);
    }

    public function show($id)
    {
        return view('user.admin.show', ['user' => User::findOrFail($id)]);
    }

    public function edit($id) 
    {
        return view('user.admin.edit', ['user' => User::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:20',
            'email' => 'required|email',
        ]);

        $user->name =  $request->input('name');
        $user->email =  $request->input('email');

        $user->save();

        return redirect(action('Admin\UserController@index'))->with('success', 'L\'utilisateur à bien été modifier');    
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect(action('Admin\UserController@index'))->with('success', 'L\'utilisateur à bien été supprimer');   
    }    
}
