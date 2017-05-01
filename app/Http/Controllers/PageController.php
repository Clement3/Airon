<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Helpers\UniqueIdentifier;

class PageController extends Controller
{
    public function show($slug) 
    {
        return view('page.show', ['page' => Page::where('slug', $slug)->firstOrFail()]);
    }

    public function getContact()
    {
        return view('page.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|string|max:190',
            'email' => 'required|email|max:190',
            'reason' => 'required|max:190',
            'message' => 'required|string',
        ]);    

        $contact = array_merge($request->all(), [ 
            'id' => UniqueIdentifier::generate('contacts'),
            'ip' => $request->ip()
        ]);

        Contact::create($contact);

        return redirect(action('PageController@getContact'));
    }
}
