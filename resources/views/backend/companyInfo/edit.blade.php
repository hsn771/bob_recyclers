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
                        <form action="{{ route('info.update', encryptor('encrypt', $info->id)) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" id="location" class="form-control" name="location"
                                            value="{{ old('location', $info->location)}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email_address">Email Address</label>
                                        <input type="email" id="email_address" class="form-control" name="email_address"
                                            value="{{ old('email_address', $info->email_address)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_no">Contact Number</label>
                                        <input type="text" id="contact_no" class="form-control" name="contact_no"
                                            value="{{ old('contact_no', $info->contact_no)}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Main Logo</label>
                                        <input type="file" id="image" class="form-control" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_logo">Footer Logo</label>
                                        <input type="file" id="footer_logo" class="form-control" name="footer_logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebook">Facebook Link</label>
                                        <input type="text" id="facebook" class="form-control" name="facebook"
                                            value="{{ old('facebook', $info->facebook)}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter Link</label>
                                        <input type="text" id="twitter" class="form-control" name="twitter"
                                            value="{{ old('twitter', $info->twitter)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="linkedin">LinkedIn Link</label>
                                        <input type="text" id="linkedin" class="form-control" name="linkedin"
                                            value="{{ old('linkedin', $info->linkedin)}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube">YouTube Link</label>
                                        <input type="text" id="youtube" class="form-control" name="youtube"
                                            value="{{ old('youtube', $info->youtube)}}">
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