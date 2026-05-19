<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\CertificationSetting;
use App\Http\Requests\Certification\AddNewRequest;
use App\Http\Requests\Certification\UpdateRequest;
use App\Http\Requests\Certification\SettingsRequest;
use Exception;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        $data = Certification::orderBy('rank')->orderBy('id')->get();
        $settings = CertificationSetting::first();
        return view('backend.certification.index', compact('data', 'settings'));
    }

    public function create()
    {
        return view('backend.certification.create');
    }

    public function store(AddNewRequest $request)
    {
        try {
            $data = new Certification;
            $data->title = $request->title;
            $data->description = $request->description;
            $data->rank = $request->rank ?? 0;
            $data->status = 1;

            if ($request->hasFile('pdf')) {
                $pdfName = time() . '_' . uniqid() . '.pdf';
                $request->pdf->move(public_path('uploads/certifications'), $pdfName);
                $data->pdf = $pdfName;
            }

            $data->save();
            $this->notice->success('Certificate uploaded successfully');
            return redirect()->route('certification.index');
        } catch (Exception $e) {
            $this->notice->error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $data = Certification::findOrFail(encryptor('decrypt', $id));
        return view('backend.certification.edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $data = Certification::findOrFail(encryptor('decrypt', $id));
            $data->title = $request->title;
            $data->description = $request->description;
            $data->rank = $request->rank ?? $data->rank;

            if ($request->hasFile('pdf')) {
                $oldPdf = public_path('uploads/certifications/' . $data->pdf);
                if ($data->pdf && file_exists($oldPdf)) {
                    @unlink($oldPdf);
                }
                $pdfName = time() . '_' . uniqid() . '.pdf';
                $request->pdf->move(public_path('uploads/certifications'), $pdfName);
                $data->pdf = $pdfName;
            }

            $data->save();
            $this->notice->success('Certificate updated successfully');
            return redirect()->route('certification.index');
        } catch (Exception $e) {
            $this->notice->error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $data = Certification::findOrFail(encryptor('decrypt', $id));
        $pdfPath = public_path('uploads/certifications/' . $data->pdf);
        if ($data->pdf && file_exists($pdfPath)) {
            @unlink($pdfPath);
        }
        $data->delete();
        $this->notice->warning('Certificate deleted');
        return redirect()->back();
    }

    public function toggleStatus($id)
    {
        $data = Certification::findOrFail($id);
        $data->status = $data->status == 1 ? 0 : 1;
        $data->save();
        $msg = $data->status == 1 ? 'Certificate activated' : 'Certificate deactivated';
        $this->notice->success($msg);
        return back();
    }

    public function settings()
    {
        $settings = CertificationSetting::firstOrCreate([]);
        return view('backend.certification.settings', compact('settings'));
    }

    public function updateSettings(SettingsRequest $request)
    {
        try {
            $settings = CertificationSetting::firstOrCreate([]);

            if ($request->hasFile('banner_image')) {
                $oldBanner = public_path('uploads/certifications/' . $settings->banner_image);
                if ($settings->banner_image && file_exists($oldBanner)) {
                    @unlink($oldBanner);
                }
                $imageName = time() . '_' . uniqid() . '.' . $request->banner_image->extension();
                $request->banner_image->move(public_path('uploads/certifications'), $imageName);
                $settings->banner_image = $imageName;
            }

            $settings->intro_text = $request->intro_text;
            $settings->save();

            $this->notice->success('Page settings updated successfully');
            return redirect()->route('certification.index');
        } catch (Exception $e) {
            $this->notice->error('Please try again');
            return redirect()->back()->withInput();
        }
    }
}
