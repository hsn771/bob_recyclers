<?php

namespace App\Http\Controllers;

use App\Models\Moderation;
use Illuminate\Http\Request;
use App\Http\Requests\ModerationRequest;
use Exception;
use Toastr;

class ModerationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $moderation = Moderation::all();
        return view('backend.moderation.create', compact('moderation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModerationRequest $request)
    {
        try{
        $moderation=new Moderation;
        $moderation->moderation_text=$request->moderation_text;
        if( $moderation->save()){
             $this->notice->success('Successfully Updated');
             return redirect()->route('moderation.index');
       
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
     * Display a listing of the resource.
     */
    public function index()
    {
        $moderation = Moderation::all();
        return view('backend.moderation.index', compact('moderation'));
    }

   public function edit($id)
    {
        $moderation = Moderation::findOrFail(encryptor('decrypt', $id));
        return view('backend.moderation.edit', compact('moderation'));
    }


    public function update(ModerationRequest $request, $id)
    {
         try{
         $moderation = Moderation::findOrFail(encryptor('decrypt', $id));
         $moderation->moderation_text=$request->moderation_text;
         $moderation->save();
            $this->notice->success('Successfully saved');
            return redirect()->route('moderation.index');
           
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
        $moderation= Moderation::findOrFail(encryptor('decrypt', $id));
        if($moderation->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }

}


