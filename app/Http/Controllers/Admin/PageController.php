<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() 
    {
        return view('page.admin.index', ['pages' => Page::all()]);
    }

    public function create() 
    {
        return view('page.admin.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'menu_id' => 'numeric|nullable'
        ]);

        Page::create([
            'title' => $request->input('title'),
            'slug' => str_slug($request->input('title'), '-'),
            'content' => $request->input('content'),
            'menu_id' => $request->input('menu_id')
        ]);

        return redirect(action('Admin\PageController@index'))->with('success', 'La page à bien été créer');       
    }

    public function edit($id) 
    {
        return view('page.admin.edit', ['page' => Page::findOrFail($id)]);
    }

    public function update(Request $request, $id) 
    {
        $page = Page::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'menu_id' => 'numeric|nullable'
        ]);

        $page->title = $request->input('title');
        $page->slug = str_slug($request->input('title'), '-');
        $page->content = $request->input('content');
        $page->menu_id = $request->input('menu_id');
        $page->save();
    
        return redirect(action('Admin\PageController@index'))->with('success', 'La page à bien été editer');     
    }

    public function destroy($id) 
    {
        $page = Page::findOrFail($id);

        $page->delete();

        return redirect(action('Admin\PageController@index'))->with('success', 'Page supprimer');
    }    
}
