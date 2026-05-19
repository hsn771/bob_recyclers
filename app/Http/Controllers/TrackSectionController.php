<?php

namespace App\Http\Controllers;

use App\Models\TrackSection;
use App\Http\Requests\TrackSectionRequest;
use Exception;

class TrackSectionController extends Controller
{
    public function index()
    {
        TrackSection::firstOrCreate(['position' => 1], ['title' => 'Upcoming Project']);
        TrackSection::firstOrCreate(['position' => 2], ['title' => 'Recent Project']);

        $sections = TrackSection::with('items')->orderBy('position')->get();

        return view('backend.track-section.index', compact('sections'));
    }

    public function update(TrackSectionRequest $request, $id)
    {
        try {
            $section = TrackSection::findOrFail(encryptor('decrypt', $id));
            $section->title = $request->title;

            if ($section->save()) {
                $this->notice->success('Section title updated');
                return redirect()->route('track-section.index');
            }

            $this->notice->error('Please try again!');
            return redirect()->back()->withInput();
        } catch (Exception $e) {
            $this->notice->error('Please try again');
            return redirect()->back()->withInput();
        }
    }
}
