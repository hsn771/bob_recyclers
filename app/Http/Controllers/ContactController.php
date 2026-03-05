<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all(); // Retrieve all contacts
        return view('backend.contacts.index', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|max:50',
            'phone' => 'required|string|max:50',
            'message' => 'required|string',
            // Add validation rules for other fields
        ]);

        // Store the submitted data in the database
        $contact = new Contact();
        $contact->full_name = $request->full_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        
        $contact->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Contact form submitted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data= Contact::findOrFail(encryptor('decrypt', $id));
        if($data->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


