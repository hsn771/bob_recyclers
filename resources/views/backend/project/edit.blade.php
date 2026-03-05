@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Project</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Project</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Project</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('project.update', encryptor('encrypt', $project->id)) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="1" {{ $project->category == 1 ? 'selected' : '' }}>Ongoing</option>
                                    <option value="2" {{ $project->category == 2 ? 'selected' : '' }}>Completed</option>
                                    <option value="3" {{ $project->category == 3 ? 'selected' : '' }}>Pending</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file">File (PDF)</label>
                                <input type="file" id="file" class="form-control" name="file">
                                <small class="text-muted">Leave it blank if you don't want to change the file.</small>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
