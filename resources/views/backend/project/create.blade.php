@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Project</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Project</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Project Info</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}" placeholder="Enter Name" required>
                                    @if($errors->has('name'))
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="file">File (PDF)</label>
                                    <input type="file" id="file" class="form-control" name="file" accept=".pdf" required>
                                    @if($errors->has('file'))
                                        <span class="text-danger"> {{ $errors->first('file') }}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category" required>
                                        <option>Select One</option>
                                        <option value="1">Ongoing</option>
                                        <option value="2">Completed</option>
                                        <option value="3">Pending</option>
                                    </select>
                                    @if($errors->has('category'))
                                        <span class="text-danger"> {{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
