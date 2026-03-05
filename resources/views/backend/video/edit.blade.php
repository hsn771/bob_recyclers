@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Video</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Video</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Video Info</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('video.update', encryptor('encrypt',$video->id)) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Title/Name <i class="text-danger">*</i></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $video->name) }}" placeholder="Enter Name" required>
                                    @if($errors->has('name'))
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="video_id">Video ID(YouTube)<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control" id="video_id" name="video_id" value="{{ old('video_id', $video->video_id)}}" placeholder="Enter Video ID" required>
                                     @if($errors->has('video_id'))
                                        <span class="text-danger"> {{ $errors->first('video_id') }}</span>
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
