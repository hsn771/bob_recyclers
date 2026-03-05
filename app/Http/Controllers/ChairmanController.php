<?php

namespace App\Http\Controllers;

use App\Models\Chairman;
use Illuminate\Http\Request;
use App\Http\Requests\Chairman\AddNewRequest;
use App\Http\Requests\Chairman\UpdateRequest;
use Exception;

class ChairmanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Chairman::all();
        return view('backend.chairman.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Chairman::all();
        return view('backend.chairman.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
        try{
            $data=new Chairman;
            $data->chairman_text=$request->chairman_text;
            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' .
                    $request->image->extension();
                $request->image->move(public_path('uploads/chairman'), $imageName);
                $data->image = $imageName;
            }
            if( $data->save()){
                 $this->notice->success('Successfully Saved');
                 return redirect()->route('chairman.index');

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
    public function show(Chairman $chairman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data = Chairman::findOrFail(encryptor('decrypt', $id));
        return view('backend.chairman.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,  $id)
    {
        try{
            $data=Chairman::findOrFail(encryptor('decrypt', $id));
            $data->chairman_text=$request->chairman_text;
            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' .
                    $request->image->extension();
                $request->image->move(public_path('uploads/chairman'), $imageName);
                $data->image = $imageName;
            }
            if( $data->save()){
                 $this->notice->success('Successfully Updated');
                 return redirect()->route('chairman.index');

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
        $data= Chairman::findOrFail(encryptor('decrypt', $id));
        if($data->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


