<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Requests\History\AddNewRequest;
use App\Http\Requests\History\UpdateRequest;
use Exception;
use Toastr;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = History::all();
        return view('backend.history.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = History::all();
        return view('backend.history.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
        try{
        $data=new History;
        $data->history_text=$request->history_text;
        if ($request->hasFile('image')) {
                $image_names = [];
                foreach($request->file('image') as $img){
                    $imageName = rand(111, 999) . time() . '.' . $img->extension();
                    $img->move(public_path('uploads/history'), $imageName);
                    $image_names[] = $imageName;
                }
                $data->image = json_encode($image_names);
            }
        if( $data->save()){
             $this->notice->success('Successfully Saved');
             return redirect()->route('history.index');

        }else{
            $this->notice->error('Please try again!');
            return redirect()->back()->withInput();

        }
        }catch(Exception $e){
            $this->notice->error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data = History::findOrFail(encryptor('decrypt', $id));
        return view('backend.history.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,  $id)
    {
        try{
        $data= History::findOrFail(encryptor('decrypt',$id));
        $data->history_text=$request->history_text;
        if ($request->hasFile('image')) {
                $image_names = json_decode($data->image, true) ?: [];
                if (!is_array($image_names)) {
                    $image_names = $data->image ? [$data->image] : [];
                }

                foreach($request->file('image') as $img){
                    $imageName = rand(111, 999) . time() . '.' . $img->extension();
                    $img->move(public_path('uploads/history'), $imageName);
                    $image_names[] = $imageName;
                }
                $data->image = json_encode($image_names);
            }
        if( $data->save()){
             $this->notice->success('Successfully Updated');
             return redirect()->route('history.index');
        }else{
            $this->notice->error('Please try again!');
            return redirect()->back()->withInput();
        }
        }catch(Exception $e){
             $this->notice->error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    public function deleteImage($id, $img)
    {
        try {
            $data = History::findOrFail(encryptor('decrypt', $id));
            $images = json_decode($data->image, true) ?: [];
            if (!is_array($images)) {
                $images = $data->image ? [$data->image] : [];
            }

            if (($key = array_search($img, $images)) !== false) {
                unset($images[$key]);
                $filePath = public_path('uploads/history/' . $img);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $data->image = json_encode(array_values($images));
            $data->save();

            $this->notice->success('Image Deleted Successfully');
            return redirect()->back();
        } catch (Exception $e) {
            $this->notice->error('Please try again');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data= History::findOrFail(encryptor('decrypt', $id));
        if($data->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


