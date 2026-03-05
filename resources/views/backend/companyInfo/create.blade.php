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
                    <h4 class="card-title">Company Info</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('info.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" id="location" class="form-control" name="location">
                                    @if($errors->has('location'))
                                        <span class="text-danger"> {{ $errors->first('location') }}</span>
                                     @endif
                                </div>
                                <div class="form-group">
                                    <label for="email_address">Email Address</label>
                                    <input type="email" id="email_address" class="form-control" name="email_address">
                                    @if($errors->has('email_address'))
                                        <span class="text-danger"> {{ $errors->first('email_address') }}</span>
                                     @endif
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_no">Contact Number</label>
                                        <input type="text" id="contact_no" class="form-control" name="contact_no">
                                        @if($errors->has('contact_no'))
                                        <span class="text-danger"> {{ $errors->first('contact_no') }}</span>
                                     @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Main Logo</label>
                                        <input type="file" id="image" class="form-control" name="image" >
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
