<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;
use App\Http\Requests\TextRequest;
use Exception;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data= Text::all();
       return view('backend.text.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
       return view('backend.text.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TextRequest $request)
    {
        try{
        $data=new Text;
        $data->about_text=$request->about_text;
        $data->sister_text=$request->sister_text;
        $data->sister_concern_text=$request->sister_concern_text;
        if( $data->save()){
             $this->notice->success('Successfully Saved');
             return redirect()->route('text.index');
       
        }else{
            $this->notice->error('Please try again!');
            return redirect()->back()->withInput();
           
        }
        }catch(Exception $e){
            dd($e);
             $this->notice->error('Please try again');
            return redirect()->back()->withInput(); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Text $text)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data = Text::findOrFail(encryptor('decrypt', $id));
        return view('backend.text.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TextRequest $request, $id)
    {
        try{
        $data=Text::findOrFail(encryptor('decrypt', $id));
        $data->about_text=$request->about_text;
        $data->sister_text=$request->sister_text;
        $data->sister_concern_text=$request->sister_concern_text;
        if( $data->save()){
             $this->notice->success('Successfully Updated');
             return redirect()->route('text.index');
       
        }else{
            $this->notice->error('Please try again!');
            return redirect()->back()->withInput();
           
        }
        }catch(Exception $e){
            dd($e);
             $this->notice->error('Please try again');
            return redirect()->back()->withInput(); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data= Text::findOrFail(encryptor('decrypt', $id));
        if($data->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


