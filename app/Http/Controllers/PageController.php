<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function show($slug) 
    {
        return view('page.show', ['page' => Page::where('slug', $slug)->firstOrFail()]);
    }
}
