<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\UniqueIdentifier;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('location.index', ['locations' => Auth::user()->locations->sortByDesc('main')]);
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

        $data = array_merge($request->all(), [
            'id' => UniqueIdentifier::generate('locations'), 
            'Country' => 'France'
        ]);

        $location = Auth::user()->locations()->create($data);

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

            $location->update($request->only([
                'name', 
                'fullname',
                'address',
                'address_more',
                'state',
                'zipcode',
                'phone'
            ]));

            $location->removeMain($user);
            
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

        return redirect(action('LocationController@index'));
    }
}
