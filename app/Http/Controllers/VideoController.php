<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use  App\Http\Requests\VideoRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $video = Video::all();
        return view('backend.video.index', compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  $video = Video::all();
         return view('backend.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $request)
    {
       try{
        $video=new Video;
        $video->name=$request->name;
        $video->video_id = $request->video_id;
        if( $video->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('video.index');
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
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
       $video = Video::findOrFail(encryptor('decrypt', $id));
       return view('backend.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoRequest $request,  $id)
    {
       try{
        $video=Video::findOrFail(encryptor('decrypt', $id));
        $video->name=$request->name;
        $video->video_id = $request->video_id;
        if( $video->save()){
             $this->notice->success('Successfully Updated');
             return redirect()->route('video.index');
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
       $video= Video::findOrFail(encryptor('decrypt', $id));
        if($video->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


