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
                    <h4 class="card-title">Track Records</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('track-record.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_1">Title 1</label>
                                    <input type="text" id="title_1" class="form-control" name="title_1" value="{{ old('title_1')}}">
                                    @if($errors->has('title_1'))
                                        <span class="text-danger"> {{ $errors->first('title_1') }}</span>
                                     @endif
                                </div>
                                <div class="form-group">
                                    <label for="title_2">Title 2</label>
                                    <input type="text" id="title_2" class="form-control" name="title_2" value="{{ old('title_2')}}">
                                    @if($errors->has('title_2'))
                                        <span class="text-danger"> {{ $errors->first('title_2') }}</span>
                                     @endif
                                </div>
                                <div class="form-group">
                                    <label for="title_3">Title 3</label>
                                    <input type="text" id="title_3" class="form-control" name="title_3" value="{{ old('title_3')}}">
                                    @if($errors->has('title_3'))
                                        <span class="text-danger"> {{ $errors->first('title_3') }}</span>
                                     @endif
                                </div>
                                <div class="form-group">
                                    <label for="title_4">Title 4</label>
                                    <input type="text" id="title_4" class="form-control" name="title_4" value="{{ old('title_4')}}">
                                    @if($errors->has('title_4'))
                                        <span class="text-danger"> {{ $errors->first('title_4') }}</span>
                                     @endif
                                </div>
                                <div class="form-group">
                                    <label for="short_description">Description <i class="text-danger">*</i></label>
                                     <textarea name="short_description" cols="30" rows="8" id="short_description" class="form-control">{{ old('short_description')}}</textarea>
                                     @if($errors->has('short_description'))
                                        <span class="text-danger"> {{ $errors->first('short_description') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="number_1">Number 1</label>
                                    <input type="text" id="number_1" class="form-control" name="number_1" value="{{ old('number_1')}}">
                                    @if($errors->has('number_1'))
                                        <span class="text-danger"> {{ $errors->first('number_1') }}</span>
                                     @endif
                                 </div>
                                 <div class="form-group">
                                    <label for="number_2">Number 2</label>
                                    <input type="text" id="number_2" class="form-control" name="number_2" value="{{ old('number_2')}}">
                                    @if($errors->has('number_2'))
                                        <span class="text-danger"> {{ $errors->first('number_2') }}</span>
                                     @endif
                                 </div>
                                 <div class="form-group">
                                    <label for="number_3">Number 3</label>
                                    <input type="text" id="number_3" class="form-control" name="number_3" value="{{ old('number_3')}}">
                                    @if($errors->has('number_3'))
                                        <span class="text-danger"> {{ $errors->first('number_3') }}</span>
                                     @endif
                                 </div>
                                 <div class="form-group">
                                    <label for="number_4">Number 4</label>
                                    <input type="text" id="number_4" class="form-control" name="number_4" value="{{ old('number_4')}}">
                                    @if($errors->has('number_4'))
                                        <span class="text-danger"> {{ $errors->first('number_4') }}</span>
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
