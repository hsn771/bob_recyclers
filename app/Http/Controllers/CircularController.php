<?php

namespace App\Http\Controllers;

use App\Models\Circular;
use Illuminate\Http\Request;
use App\Http\Requests\CircularRequest;

class CircularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $circular = Circular::all(); 
        return view('backend.circular.index', compact('circular'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data = Circular::all();
        return view('backend.circular.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CircularRequest $request)
    {
        try{
        $circular=new Circular;
        $circular->position=$request->position;
        $circular->circular=$request->circular;
        if( $circular->save()){
             $this->notice->success('Successfully Updated');
             return redirect()->route('circular.index');
       
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
    public function show(Circular $circular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $circular = Circular::findOrFail(encryptor('decrypt', $id));
        return view('backend.circular.edit', compact('circular'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CircularRequest $request,  $id)
    {
        try{
        $circular=Circular::findOrFail(encryptor('decrypt', $id));;
        $circular->circular=$request->circular;
        $circular->position=$request->position;
        if( $circular->save()){
             $this->notice->success('Successfully Updated');
             return redirect()->route('circular.index');
       
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
        $circular= Circular::findOrFail(encryptor('decrypt', $id));
        if($circular->delete()){
            $this->notice->warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}


