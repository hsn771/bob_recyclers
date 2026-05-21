@extends('backend.layout.app')
@section('pageTitle', 'Blog Page Settings')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Blog Page Settings</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blogs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Page Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.blog.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <label for="page_title">Page Title</label>
                                <input type="text" id="page_title" name="page_title" class="form-control"
                                    value="{{ old('page_title', $settings->page_title ?? 'Blog') }}" required>
                                <small class="text-muted">First letter appears large in gold on the banner (e.g. "Blog" shows as <strong>B</strong>log).</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="banner_image">Page Banner Image</label>
                                @if($settings->banner_image)
                                    <p class="mb-2">
                                        <img src="{{ asset('uploads/blog-page/' . $settings->banner_image) }}" alt="Banner"
                                            style="max-height: 140px; border-radius: 8px;">
                                    </p>
                                @endif
                                <input type="file" id="banner_image" class="form-control" name="banner_image" accept="image/*">
                                <small class="text-muted">Used at the top of the frontend Blog page. Recommended wide image (e.g. 1920×400px).</small>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </form>
            </div>
        </div>
    </section>
@endsection
