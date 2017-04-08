<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Location;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('location.index', ['locations' => Auth::user()->locations->all()]);
    }

    public function create()
    {
        return view('location.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'fullname' => 'required|max:255|string',
            'address' => 'required|max:255|string',
            'address_more' => 'max:255|string|nullable',
            'state' => 'max:255|string|nullable',
            'zipcode' => 'required|max:255|string',
            'phone' => 'required|numeric',
        ]);

        $location = Auth::user()->locations()->create($request->all());

        // If the 'main' checkbox is checked we set main on this location
        if ($request->has('main')) {
            $location->setMain(Auth::user());
        }

        return redirect(action('LocationController@index'))->with('success', 'L\'adresse à bien été créer.');             
    }

    public function edit($id)
    {
        return view('location.edit', ['location' => Location::findOrFail($id)]);    
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);
        $user = Auth::user();

        if ($user->id == $location->user_id) {

            $this->validate($request, [
                'name' => 'required|max:255|string',
                'fullname' => 'required|max:255|string',
                'address' => 'required|max:255|string',
                'address_more' => 'max:255|string|nullable',
                'state' => 'max:255|string|nullable',
                'zipcode' => 'required|max:255|string',
                'phone' => 'required|numeric',
            ]);

            $location->name = $request->input('name');
            $location->fullname = $request->input('fullname');
            $location->address = $request->input('street');
            $location->address_more = $request->input('street_more');
            $location->state = $request->input('state');
            $location->zipcode = $request->input('zipcode');
            $location->phone = $request->input('phone');

            $location->save();

            // If the 'main' checkbox is checked we set main on this location
            if ($request->has('main')) {
                $location->setMain($user);
            }

            return redirect(action('LocationController@index'));         
        }         
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $user = Auth::user();

        if ($user->id == $location->user_id) {

            $location->delete();

            return redirect(action('LocationController@index'));
        }
    }

    public function setMain($id)
    {
        $location = Location::findOrFail($id);
        $user = Auth::user();

        if ($user->id == $location->user_id) {
            if (!$location->main) {

                $location->setMain($user);

                return redirect(action('LocationController@index'));
            } 
        }
    }
}
