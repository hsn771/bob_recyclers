@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Certifications Page Settings</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('certification.index') }}">Certifications</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Page Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('certification.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="banner_image">Page Banner Image</label>
                                    @if($settings->banner_image)
                                        <p class="mb-2">
                                            <img src="{{ asset('uploads/certifications/' . $settings->banner_image) }}" alt="Banner" style="max-height: 120px; border-radius: 8px;">
                                        </p>
                                    @endif
                                    <input type="file" id="banner_image" class="form-control" name="banner_image" accept="image/*">
                                    <small class="text-muted">Used in the top banner section on the frontend page</small>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="intro_text">Intro Text</label>
                                    <textarea id="intro_text" class="form-control" name="intro_text" rows="5">{{ old('intro_text', $settings->intro_text) }}</textarea>
                                    <small class="text-muted">Shown below the banner on the certifications page</small>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('certification.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
