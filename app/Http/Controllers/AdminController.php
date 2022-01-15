<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class AdminController extends Controller
{
    public function feedback()
    {
        $contacts = Contact::latest()->get();
        return view('admin.feedback', compact('contacts'));
    }
}
