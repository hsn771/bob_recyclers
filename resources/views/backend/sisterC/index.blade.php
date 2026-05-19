@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Sister Concern</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sister Concern</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                @if ($data->isEmpty())
                    <a href="{{ route('sisterC.create') }}" class="btn btn-primary mb-3">Add New</a>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>About MSRL</th>
                            <th>Banner</th>
                            <th>Photo 1</th>
                            <th>Photo 2</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($m->about_us), 80) }}</td>
                            <td>
                                @if ($m->banner_image)
                                    <img width="80" src="{{ asset('uploads/sisterConcern/' . $m->banner_image) }}" alt="Banner" class="rounded shadow-sm">
                                @endif
                            </td>
                            <td>
                                @if ($m->image_1)
                                    <img width="80" src="{{ asset('uploads/sisterConcern/' . $m->image_1) }}" alt="Photo 1" class="rounded shadow-sm">
                                @endif
                            </td>
                            <td>
                                @if ($m->image_2)
                                    <img width="80" src="{{ asset('uploads/sisterConcern/' . $m->image_2) }}" alt="Photo 2" class="rounded shadow-sm">
                                @endif
                            </td>
                            <td class="white-space-nowrap">
                                <a href="{{ route('sisterC.edit', encryptor('encrypt', $m->id)) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No Data Found</td>
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
