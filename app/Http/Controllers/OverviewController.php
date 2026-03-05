<?php

namespace App\Http\Controllers;

use App\Models\Overview;
use Illuminate\Http\Request;
use App\Http\Requests\OverviewRequest;
use Exception;
use Toastr;

class OverviewController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $overview = Overview::all();
        return view('backend.overview.create', compact('overview'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OverviewRequest $request)
    {
        try{
        $overview=new Overview;
        $overview->overview_text=$request->overview_text;
        if( $overview->save()){
             $this->notice->success('Successfully Updated');
             return redirect()->route('industry.index');
       
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
        $overview = Overview::all();
        return view('backend.overview.index', compact('overview'));
    }

   public function edit($id)
    {
        $overview = Overview::findOrFail(encryptor('decrypt', $id));
        return view('backend.overview.edit', compact('overview'));
    }


    public function update(OverviewRequest $request, $id)
    {
         try{
         $overview = Overview::findOrFail(encryptor('decrypt', $id));
         $overview->overview_text=$request->overview_text;
         $overview->save();
            $this->notice->success('Successfully saved');
            return redirect()->route('industry.index');
           
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
        $overview= Overview::findOrFail(encryptor('decrypt', $id));
        if($overview->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }

}


