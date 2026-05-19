@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Track Record Sections</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Track Sections</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            @foreach ($sections as $section)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Section {{ $section->position }}</h5>
                        <a href="{{ route('track-section-item.create', ['section' => $section->id]) }}" class="btn btn-sm btn-primary">Add Item</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('track-section.update', encryptor('encrypt', $section->id)) }}" method="POST" class="mb-4">
                            @csrf
                            @method('PUT')
                            <label for="title_{{ $section->id }}">Section Title</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="title_{{ $section->id }}" name="title" value="{{ old('title', $section->title) }}" required>
                                <button type="submit" class="btn btn-outline-primary">Save</button>
                            </div>
                        </form>

                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($section->items as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @if ($item->photo)
                                            <img src="{{ asset('uploads/trackSection/' . $item->photo) }}" width="50" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('track-section-item.edit', encryptor('encrypt', $item->id)) }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('track-section-item.destroy', encryptor('encrypt', $item->id)) }}" method="post" class="d-inline" onsubmit="return confirm('Delete this item?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger p-0"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">No items yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
