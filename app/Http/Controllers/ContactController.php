<?php

namespace App\Http\Controllers;


use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('layout.contacts');
    }

    public function store()
    {
        $this->validate(request(), [
            'email' => 'required | email',
            'mail' => 'required',
        ]);

        Contact::create([
            'email' => request('email'),
            'mail' => request('mail'),
        ]);

        return redirect('/');
    }
}
