@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Home</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sister Concern Logo</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('sister-logo.update', encryptor('encrypt',$data->id)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" id="company_name" class="form-control" name="company_name"  value="{{ old('company_name', $data->company_name)}}">
                                    @if($errors->has('company_name'))
                                        <span class="text-danger"> {{ $errors->first('company_name') }}</span>
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
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
