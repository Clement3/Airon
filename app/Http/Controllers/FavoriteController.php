<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\UniqueIdentifier;

class FavoriteController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Item $item)
    {
        Auth::user()->favorites()->attach($item->id, ['id' => UniqueIdentifier::generate('favorites')]);

        return back();
    }

    public function destroy(Item $item) 
    {
        Auth::user()->favorites()->detach($item->id);

        return back();        
    }   
}
