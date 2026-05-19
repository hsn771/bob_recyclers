@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Certificate</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('certification.index') }}">Certifications</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('certification.update', encryptor('encrypt', $data->id)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="title">Certificate Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" class="form-control" name="title" value="{{ old('title', $data->title) }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Short Description</label>
                                    <textarea id="description" class="form-control" name="description" rows="3">{{ old('description', $data->description) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="rank">Display Order</label>
                                    <input type="number" id="rank" class="form-control" name="rank" value="{{ old('rank', $data->rank) }}" min="0">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Current PDF</label>
                                    <p>
                                        <a href="{{ asset('uploads/certifications/' . $data->pdf) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-file-earmark-pdf"></i> View current file
                                        </a>
                                    </p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pdf">Replace PDF (optional)</label>
                                    <input type="file" id="pdf" class="form-control" name="pdf" accept=".pdf">
                                    <small class="text-muted">Leave empty to keep current file. PDF only, max 10MB</small>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('certification.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Certificate</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
