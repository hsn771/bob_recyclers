@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Certifications</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Certifications</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card mb-3">
            <div class="card-body d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <div>
                    <a href="{{ route('certification.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Add Certificate PDF
                    </a>
                </div>
                <div>
                    <a href="{{ route('certification.settings') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-gear me-1"></i> Page Banner & Intro
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>PDF</th>
                            <th>Rank</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <a href="{{ asset('uploads/certifications/' . $item->pdf) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-file-earmark-pdf"></i> View
                                </a>
                            </td>
                            <td>{{ $item->rank }}</td>
                            <td>
                                @if($item->status == 1)
                                    <a href="{{ route('certification.toggle', $item->id) }}"
                                        onclick="return confirm('Deactivate this certificate?')"
                                        class="badge bg-success text-white">Active</a>
                                @else
                                    <a href="{{ route('certification.toggle', $item->id) }}"
                                        onclick="return confirm('Activate this certificate?')"
                                        class="badge bg-danger text-white">Inactive</a>
                                @endif
                            </td>
                            <td class="white-space-nowrap">
                                <a href="{{ route('certification.edit', encryptor('encrypt', $item->id)) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('certification.destroy', encryptor('encrypt', $item->id)) }}" method="post" class="d-inline"
                                    onsubmit="return confirm('Delete this certificate permanently?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No certificates uploaded yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endpush
