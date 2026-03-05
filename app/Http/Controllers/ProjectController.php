<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\Project\AddNewRequest;
use App\Http\Requests\Project\UpdateRequest;
use Exception;
use File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all();
        return view('backend.project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = Project::all();
        return view('backend.project.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
        try {
        $project = new Project;
        $project->name = $request->name;
        $project->category = $request->category;

        // Handle file upload
        if ($request->hasFile('file')) {
            $fileName = rand(111, 999) . time() . '.' .
                $request->file->extension();
            $request->file->move(public_path('uploads/project'), $fileName);
            $project->file = $fileName;
        }

        if ($project->save()) {
            $this->notice->success('Successfully saved');
            return redirect()->route('project.index');
        } else {
            $this->notice->error('Please try again!');
            return redirect()->back()->withInput();
        }
    } catch (Exception $e) {
        $this->notice->error('Please try again');
        return redirect()->back()->withInput();
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $project = Project::findOrFail(encryptor('decrypt', $id));
        return view('backend.project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,  $id)
    {
        try {
        $project = Project::findOrFail(encryptor('decrypt', $id));
        $project->name = $request->name;
        $project->category = $request->category;

        // Handle file upload
        if ($request->hasFile('file')) {
            $fileName = rand(111, 999) . time() . '.' .
                $request->file->extension();
            $request->file->move(public_path('uploads/project'), $fileName);
            $project->file = $fileName;
        }

        if ($project->save()) {
            $this->notice->success('Successfully saved');
            return redirect()->route('project.index');
        } else {
            $this->notice->error('Please try again!');
            return redirect()->back()->withInput();
        }
    } catch (Exception $e) {
        $this->notice->error('Please try again');
        return redirect()->back()->withInput();
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $project= Project::findOrFail(encryptor('decrypt', $id));
        if($project->delete()){
              $this->notice->warning('Deleted Permanently!');
              return redirect()->back();
        }
    }
}


