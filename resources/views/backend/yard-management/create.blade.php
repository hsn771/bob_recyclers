@extends('backend.layout.app')
@section('content')         
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Management</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Management</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('yard.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" value="{{ old('name')}}" placeholder="Enter Name" required>
                                    @if($errors->has('name'))
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                 <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" class="form-control" name="image">
                                    @if($errors->has('image'))
                                        <span class="text-danger"> {{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" id="designation" class="form-control" name="designation" value="{{ old('designation')}}" placeholder="Enter Designation" required>
                                    @if($errors->has('designation'))
                                        <span class="text-danger"> {{ $errors->first('designation') }}</span>
                                    @endif
                                </div>
                               
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>  
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

