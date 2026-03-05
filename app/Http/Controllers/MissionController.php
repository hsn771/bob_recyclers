<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use App\Http\Requests\Mission\AddNewRequest;
use App\Http\Requests\Mission\UpdateRequest;
use Exception;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mission::all();
        return view('backend.mission.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Mission::all();
        return view('backend.mission.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
        try{
            $data=new Mission;
            $data->mission_text=$request->mission_text;
            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' .
                    $request->image->extension();
                $request->image->move(public_path('uploads/mission'), $imageName);
                $data->image = $imageName;
            }
            if( $data->save()){
                 $this->notice->success('Successfully Saved');
                 return redirect()->route('mission.index');

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
    public function show(Mission $mission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data = Mission::findOrFail(encryptor('decrypt', $id));
        return view('backend.mission.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Mission $id)
    {
        try{
            $data=Mission::findOrFail(encryptor('decrypt', $id));
            $data->mission_text=$request->mission_text;
            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' .
                    $request->image->extension();
                $request->image->move(public_path('uploads/mission'), $imageName);
                $data->image = $imageName;
            }
            if( $data->save()){
                 $this->notice->success('Successfully Updated');
                 return redirect()->route('mission.index');

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
        $data= Mission::findOrFail(encryptor('decrypt', $id));
        if($data->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


