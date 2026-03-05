<?php

namespace App\Http\Controllers;

use App\Models\Management;
use App\Models\TopManagement;
use App\Models\MidManagement;
use App\Models\YardManagement;
use App\Http\Requests\TopManagement\AddNewRequest;
use App\Http\Requests\TopManagement\UpdateRequest;
use Illuminate\Http\Request;
use Exception;
use Toastr;

class TopManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TopManagement::all();
        // $topM = TopManagement::all();
        // $midM = MidManagement::all();
        // $yardM = YardManagement::all();
        return view('backend.top-management.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topM = TopManagement::all();
        $midM = MidManagement::all();
        $yardM = YardManagement::all();
        return view('backend.top-management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
       try{
        $data=new TopManagement;
        $data->name=$request->name;
        $data->designation=$request->designation;
         if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' .
                    $request->image->extension();
                $request->image->move(public_path('uploads/topManagement'), $imageName);
                $data->image = $imageName;
            }

        if( $data->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('top.index');
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
        $data= TopManagement::findOrFail(encryptor('decrypt', $id));
        return view('backend.top-management.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,  $id)
    {
        try{
        $data=TopManagement::findOrFail(encryptor('decrypt', $id));
        $data->name=$request->name;
        $data->designation=$request->designation;
         if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' .
                    $request->image->extension();
                $request->image->move(public_path('uploads/topManagement'), $imageName);
                $data->image = $imageName;
            }

        if( $data->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('top.index');
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
        $data= TopManagement::findOrFail(encryptor('decrypt', $id));
        if($data->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


