<?php

namespace App\Http\Controllers;

use App\Models\BuyerLogo;
use Illuminate\Http\Request;
use App\Http\Requests\BuyerLogo\AddNewRequest;
use App\Http\Requests\BuyerLogo\UpdateRequest;
use Exception;
use Toastr;

class BuyerLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BuyerLogo::all();
        return view('backend.buyer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = BuyerLogo::all();
        return view('backend.buyer.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
        try{
        $data=new BuyerLogo;
        $data->buyer_name=$request->buyer_name;
         if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' .
                    $request->image->extension();
                $request->image->move(public_path('uploads/buyerLogo'), $imageName);
                $data->image = $imageName;
            }
        if( $data->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('buyer-logo.index');
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
    public function show(BuyerLogo $buyerLogo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data = BuyerLogo::findOrFail(encryptor('decrypt', $id));
        return view('backend.buyer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,  $id)
    {
        try{
          $data = BuyerLogo::findOrFail(encryptor('decrypt', $id));
          $data->buyer_name = $request->buyer_name;
         if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' .
                    $request->image->extension();
                $request->image->move(public_path('uploads/buyerLogo'), $imageName);
                $data->image = $imageName;
            }
        if( $data->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('buyer-logo.index');

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
        $data= BuyerLogo::findOrFail(encryptor('decrypt', $id));
        if($data->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


