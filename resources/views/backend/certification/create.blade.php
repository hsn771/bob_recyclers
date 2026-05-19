@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Add Certificate</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('certification.index') }}">Certifications</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('certification.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="title">Certificate Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" required>
                                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Short Description</label>
                                    <textarea id="description" class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="rank">Display Order</label>
                                    <input type="number" id="rank" class="form-control" name="rank" value="{{ old('rank', 0) }}" min="0">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pdf">Certificate PDF <span class="text-danger">*</span></label>
                                    <input type="file" id="pdf" class="form-control @error('pdf') is-invalid @enderror"
                                        name="pdf" accept=".pdf" required>
                                    <small class="text-muted">PDF only, max 10MB</small>
                                    @error('pdf')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('certification.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Upload Certificate</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
