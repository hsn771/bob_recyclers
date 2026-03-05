<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Http\Requests\Carousel\AddNewRequest;
use App\Http\Requests\Carousel\UpdateRequest;
use Exception;
use Toastr;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousel = Carousel::all();
        return view('backend.carousel.index', compact('carousel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $carousel = Carousel::all();
         return view('backend.carousel.create', compact('carousel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
        try{
        $carousel=new Carousel;
        // $carousel->about_link = $request->about_link;
        // $carousel->project_link = $request->project_link;
        $carousel->short_description = $request->short_description;
        $carousel->slogan = $request->slogan;

         if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' .
                    $request->image->extension();
                $request->image->move(public_path('uploads/carousel'), $imageName);
                $carousel->image = $imageName;
            }
        if( $carousel->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('carousel.index');

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
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $carousel = Carousel::findOrFail(encryptor('decrypt', $id));
        return view('backend.carousel.edit',compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,  $id)
    {
        try{
            $carousel= Carousel::findOrFail(encryptor('decrypt', $id));
            // $carousel->about_link = $request->about_link;
            // $carousel->project_link = $request->project_link;
            $carousel->short_description = $request->short_description;
            $carousel->slogan = $request->slogan;
            
            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' .
                    $request->image->extension();
                $request->image->move(public_path('uploads/carousel'), $imageName);
                $carousel->image = $imageName;
            }
        if( $carousel->save()){
            $this->notice->success('Successfully Updated');
            return redirect()->route('carousel.index');

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
        $carousel= Carousel::findOrFail(encryptor('decrypt', $id));
        if($carousel->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


