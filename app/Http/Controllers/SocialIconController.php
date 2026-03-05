<?php

namespace App\Http\Controllers;

use App\Models\SocialIcon;
use Illuminate\Http\Request;
use App\Http\Requests\SocialIconRequest;
use Exception;
use Toastr;

class SocialIconController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SocialIcon::all();
        return view('backend.settings.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = SocialIcon::all();
        return view('backend.settings.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialIconRequest $request)
    {
        try{
        $data=new SocialIcon;
        $data->social_site=$request->social_site;
        $data->social_address=$request->social_address;
         
        if( $data->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('buyer.index');
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
    public function show(SocialIcon $socialIcon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data= SocialIcon::findOrFail(encryptor('decrypt', $id));
        return view('backend.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialIcon $id)
    {
        try{
        $data= SocialIcon::findOrFail(encryptor('decrypt', $id));
        $data->social_site=$request->social_site;
        $data->social_address=$request->social_address;
        
        if( $data->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('buyer.index');
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
        $data= SocialIcon::findOrFail(encryptor('decrypt', $id));
        if($data->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


