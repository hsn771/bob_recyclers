<?php

namespace App\Http\Controllers;

use App\Models\Sister;
use App\Http\Requests\SisterCRequest;
use Exception;
use Illuminate\Http\Request;

class SisterController extends Controller
{
    private const UPLOAD_DIR = 'uploads/sisterConcern';

    public function index()
    {
        $data = Sister::all();
        return view('backend.sisterC.index', compact('data'));
    }

    public function create()
    {
        return view('backend.sisterC.create');
    }

    public function store(SisterCRequest $request)
    {
        try {
            $data = new Sister;
            $data->about_us = $request->about_us;
            $data->history = '';
            $data->mission = '';
            $data->sister_text = '';
            $this->saveImages($request, $data);

            if ($data->save()) {
                $this->notice->success('Successfully saved');
                return redirect()->route('sisterC.index');
            }

            $this->notice->error('Please try again!');
            return redirect()->back()->withInput();
        } catch (Exception $e) {
            $this->notice->error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    public function show(Sister $sister)
    {
        //
    }

    public function edit($id)
    {
        $data = Sister::findOrFail(encryptor('decrypt', $id));
        return view('backend.sisterC.edit', compact('data'));
    }

    public function update(SisterCRequest $request, $id)
    {
        try {
            $data = Sister::findOrFail(encryptor('decrypt', $id));
            $data->about_us = $request->about_us;
            $this->saveImages($request, $data);

            if ($data->save()) {
                $this->notice->success('Successfully Updated');
                return redirect()->route('sisterC.index');
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
        $data = Sister::findOrFail(encryptor('decrypt', $id));
        if ($data->delete()) {
            $this->notice->warning('Deleted Permanently!');
            return redirect()->back();
        }
    }

    private function saveImages(Request $request, Sister $data): void
    {
        $uploadPath = public_path(self::UPLOAD_DIR);
        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        foreach (['banner_image', 'image_1', 'image_2'] as $field) {
            if ($request->hasFile($field)) {
                $imageName = rand(111, 999) . time() . '_' . $field . '.' . $request->file($field)->extension();
                $request->file($field)->move($uploadPath, $imageName);
                $data->{$field} = $imageName;
            }
        }
    }
}
