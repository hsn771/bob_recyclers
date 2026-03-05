<?php

namespace App\Http\Controllers;

use App\Models\Sister;
use Illuminate\Http\Request;
use App\Http\Requests\SisterCRequest;
use Exception;

class SisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Sister::all();
        return view('backend.sisterC.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.sisterC.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SisterCRequest $request)
    {
        try{
        $data=new Sister;
        $data->about_us=$request->about_us;
        $data->history=$request->history;
        $data->mission=$request->mission;
        $data->sister_text=$request->sister_text;
        if( $data->save()){
             $this->notice->success('Successfully Updated');
             return redirect()->route('sisterC.index');
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
    public function show(Sister $sister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data = Sister::findOrFail(encryptor('decrypt', $id));
        return view('backend.sisterC.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SisterCRequest $request,  $id)
    {
       try{
        $data=Sister::findOrFail(encryptor('decrypt', $id));
        $data->about_us=$request->about_us;
        $data->history=$request->history;
        $data->mission=$request->mission;
        $data->sister_text=$request->sister_text;
        if( $data->save()){
             $this->notice->success('Successfully Updated');
             return redirect()->route('sisterC.index');
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
        $data= Sister::findOrFail(encryptor('decrypt', $id));
        if($data->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


