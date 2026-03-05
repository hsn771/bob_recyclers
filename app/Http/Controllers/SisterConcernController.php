<?php

namespace App\Http\Controllers;

use App\Models\SisterConcern;
use Illuminate\Http\Request;
use App\Http\Requests\SisterRequest;
use Exception;
use Toastr;

class SisterConcernController extends Controller
{
    public function create()
    {
        $sister = SisterConcern::all();
        return view('backend.sister.create', compact('sister'));
    }

    
    public function store(SisterRequest $request)
    {
        try{
        $sister=new SisterConcern;
        $sister->sister_text=$request->sister_text;
        if( $sister->save()){
             $this->notice->success('Successfully Updated');
             return redirect()->route('sister-concern.index');
       
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
        $sister = SisterConcern::all();
        return view('backend.sister.index', compact('sister'));
    }

   public function edit($id)
    {
        // Fetch the specific sister record based on the $id
        $sister = SisterConcern::find($id);

        // Check if the sister record exists
        if (!$sister) {
            // Handle the case where the record doesn't exist, maybe redirect back with a message
            $this->notice->error('Please try again!');
            return redirect()->back()->withInput();
        }

        // Pass the single sister record to the view
        return view('backend.sister.edit', compact('sister'));
    }


    public function update(SisterRequest $request, $id)
    {
     try{
         $sister= SisterConcern::findOrFail(encryptor('decrypt',$id));
         $sister->sister_text=$request->sister_text;

         $sister->save();
            $this->notice->success('Successfully saved');
            return redirect()->route('sister-concern.index');
           
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
        $sister= SisterConcern::findOrFail(encryptor('decrypt', $id));
        if($sister->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }

    // public function sister()
    // {
    //     // Fetch sister texts from the database
    //     $sister = SisterConcern::all();
        
    //     // Pass sister data to the view
    //     return view('frontend.sister-concern.sister', compact('sister'));
    // }
}


