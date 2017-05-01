<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show($id)
    {
        return view('item/show', ['item' => Item::find($id)->firstOrFail()]);            
    }

    public function create()
    {
        return view('item/create');
    }
}
