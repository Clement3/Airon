<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('category.admin.index');
    }   

    public function create()
    {
        return view('category.admin.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'parent_id' => 'integer|exists:categories,id',
            'name' => 'string',
        ]);

        Category::create([
            'parent_id' => $request->input('parent_id'),
            'name' => $request->input('name'),
            'slug' => str_slug($request->input('name'), '-'),
        ]);

        return redirect(action('Admin\CategoryController@index'))->with('success', 'La catégorie à bien été créer');
    }    
}
