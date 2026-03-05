<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Career::all(); 
        return view('backend.career.index', compact('data'));
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
            'cover_letter' => 'required|string',
            'file' => 'required|mimes:pdf|max:5120',
            // Add validation rules for other fields
        ]);

        // Store the submitted data in the database
        $data = new Career();
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->cover_letter = $request->cover_letter;
        $data->circular_id = $request->circular_id; 
          if ($request->hasFile('file')) {
            $fileName = rand(111, 999) . time() . '.' .
                $request->file->extension();
            $request->file->move(public_path('uploads/career'), $fileName);
            $data->file = $fileName;
        }
        $data->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data= Career::findOrFail(encryptor('decrypt', $id));
        if($data->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }

}


