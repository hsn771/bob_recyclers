<?php

namespace App\Http\Controllers;

use App\Models\TrackRecord;
use Illuminate\Http\Request;
use App\Http\Requests\CardRequest;
use Exception;
use Toastr;

class TrackRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TrackRecord::all();
        return view('backend.cards.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = TrackRecord::all();
        return view('backend.cards.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CardRequest $request)
    {
        try{
        $data=new TrackRecord;
        $data->title_1 = $request->title_1;
        $data->title_2 = $request->title_2;
        $data->title_3 = $request->title_3;
        $data->title_4 = $request->title_4;
        $data->number_1 = $request->number_1;
        $data->number_2 = $request->number_2;
        $data->number_3 = $request->number_3;
        $data->number_4 = $request->number_4;
        $data->short_description = $request->short_description;
        if( $data->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('track-record.index');
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
    public function show( $id)
    {
        // $data = TrackRecord::findOrFail($id);
        // return view('backend.cards.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
   {
    $data = TrackRecord::findOrFail(encryptor('decrypt', $id));
    return view('backend.cards.edit', compact('data'));
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(CardRequest $request,  $id)
    {
        try{
        $data = TrackRecord::findOrFail(encryptor('decrypt', $id));
        $data->title_1=$request->title_1;
        $data->title_2=$request->title_2;
        $data->title_3=$request->title_3;
        $data->title_4=$request->title_4;
        $data->number_1=$request->number_1;
        $data->number_2=$request->number_2;
        $data->number_3=$request->number_3;
        $data->number_4=$request->number_4;
        $data->short_description = $request->short_description;
        if( $data->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('track-record.index');
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
        $data= TrackRecord::findOrFail(encryptor('decrypt', $id));
        if($data->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


