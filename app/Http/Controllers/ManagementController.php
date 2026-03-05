<?php

namespace App\Http\Controllers;

use App\Models\Management;
use App\Models\TopManagement;
use App\Models\MidManagement;
use App\Models\YardManagement;
use App\Http\Requests\ManagementRequest;
use Illuminate\Http\Request;
use Exception;
use Toastr;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Management::all();
        // $topM = TopManagement::all();
        // $midM = MidManagement::all();
        // $yardM = YardManagement::all();
        return view('backend.management.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topM = TopManagement::all();
        $midM = MidManagement::all();
        $yardM = YardManagement::all();
        return view('backend.management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ManagementRequest $request)
    {
       try{
        $data=new Management;
        $data->top_management_title=$request->top_management_title;
        $data->mid_management_title=$request->mid_management_title;
        $data->yard_management_title=$request->yard_management_title;
        $data->top_description=$request->top_description;
        $data->mid_description=$request->mid_description;
        $data->yard_description=$request->yard_description;
         
        if( $data->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('team.index');
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
    public function show(Management $management)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data= Management::findOrFail(encryptor('decrypt', $id));
        return view('backend.management.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManagementRequest $request,  $id)
    {
        try{
        $data=Management::findOrFail(encryptor('decrypt', $id));
        $data->top_management_title=$request->top_management_title;
        $data->mid_management_title=$request->mid_management_title;
        $data->yard_management_title=$request->yard_management_title;
        $data->top_description=$request->top_description;
        $data->mid_description=$request->mid_description;
        $data->yard_description=$request->yard_description;
         
        if( $data->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('team.index');
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
        $data= Management::findOrFail(encryptor('decrypt', $id));
        if($data->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


