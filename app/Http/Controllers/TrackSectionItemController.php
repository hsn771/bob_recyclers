<?php

namespace App\Http\Controllers;

use App\Models\TrackSection;
use App\Models\TrackSectionItem;
use App\Http\Requests\TrackSectionItemRequest;
use Exception;
use Illuminate\Http\Request;

class TrackSectionItemController extends Controller
{
    private const UPLOAD_DIR = 'uploads/trackSection';

    public function create(Request $request)
    {
        $sections = TrackSection::orderBy('position')->get();
        $sectionId = $request->query('section');

        return view('backend.track-section-item.create', compact('sections', 'sectionId'));
    }

    public function store(TrackSectionItemRequest $request)
    {
        try {
            $item = new TrackSectionItem;
            $item->track_section_id = $request->track_section_id;
            $item->title = $request->title;
            $item->short_description = $request->short_description;
            $item->sort_order = $request->sort_order ?? 0;
            $this->savePhoto($request, $item);

            if ($item->save()) {
                $this->notice->success('Item saved successfully');
                return redirect()->route('track-section.index');
            }

            $this->notice->error('Please try again!');
            return redirect()->back()->withInput();
        } catch (Exception $e) {
            $this->notice->error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $item = TrackSectionItem::findOrFail(encryptor('decrypt', $id));
        $sections = TrackSection::orderBy('position')->get();

        return view('backend.track-section-item.edit', compact('item', 'sections'));
    }

    public function update(TrackSectionItemRequest $request, $id)
    {
        try {
            $item = TrackSectionItem::findOrFail(encryptor('decrypt', $id));
            $item->track_section_id = $request->track_section_id;
            $item->title = $request->title;
            $item->short_description = $request->short_description;
            $item->sort_order = $request->sort_order ?? 0;
            $this->savePhoto($request, $item);

            if ($item->save()) {
                $this->notice->success('Item updated successfully');
                return redirect()->route('track-section.index');
            }

            $this->notice->error('Please try again!');
            return redirect()->back()->withInput();
        } catch (Exception $e) {
            $this->notice->error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $item = TrackSectionItem::findOrFail(encryptor('decrypt', $id));
        if ($item->delete()) {
            $this->notice->warning('Deleted permanently');
            return redirect()->route('track-section.index');
        }

        return redirect()->back();
    }

    private function savePhoto(Request $request, TrackSectionItem $item): void
    {
        if (! $request->hasFile('photo')) {
            return;
        }

        $uploadPath = public_path(self::UPLOAD_DIR);
        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $imageName = rand(111, 999) . time() . '.' . $request->file('photo')->extension();
        $request->file('photo')->move($uploadPath, $imageName);
        $item->photo = $imageName;
    }
}
