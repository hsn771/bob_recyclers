<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use App\Http\Requests\Company\AddNewRequest;
use App\Http\Requests\Company\UpdateRequest;
use Exception;

class CompanyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info = CompanyInfo::all();
        return view('backend.companyInfo.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info = CompanyInfo::all();
        return view('backend.companyInfo.create', compact('info'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
        try{
        $info=new CompanyInfo;
        $info->location=$request->location;
        $info->contact_no=$request->contact_no;
        $info->email_address=$request->email_address;
          if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' .
                    $request->image->extension();
                $request->image->move(public_path('uploads/companyInfo'), $imageName);
                $info->image = $imageName;
            }
        if( $info->save()){
             $this->notice->success('Successfully saved');
             return redirect()->route('info.index');
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
    public function show(CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $info = CompanyInfo::findOrFail(encryptor('decrypt', $id));
        return view('backend.companyInfo.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,  $id)
    {
       try {
        $info = CompanyInfo::findOrFail(encryptor('decrypt', $id));
        $info->location = $request->location;
        $info->contact_no = $request->contact_no;
        $info->email_address = $request->email_address;

        if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' .
                    $request->image->extension();
                $request->image->move(public_path('uploads/companyInfo'), $imageName);
                $info->image = $imageName;
            }

        if ($info->save()) {
            $this->notice->success('Successfully saved');
            return redirect()->route('info.index');
        } else {
            $this->notice->error('Please try again!');
            return redirect()->back()->withInput();
        }
    } catch (Exception $e) {
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
        $info= CompanyInfo::findOrFail(encryptor('decrypt', $id));
        if($info->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


