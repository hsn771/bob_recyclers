@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ship</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ship</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ship Info</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('ship-info.update', encryptor('encrypt',$ship->id)) }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Ship Name <i class="text-danger">*</i></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $ship->name) }}" placeholder="Enter Name" required>
                                    @if($errors->has('name'))
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                              

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" class="form-control" name="image">
                                     @if ($ship->image)
                                        <p class="mt-2">Current Image: {{ $ship->image }}</p>
                                        <input type="hidden" name="old_image" value="{{ $ship->image }}">
                                    @endif
                                </div>
                                   @if($errors->has('image'))
                                        <span class="text-danger"> {{ $errors->first('image') }}</span>
                                    @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">category</label>
                                    <select class="form-control" id="category" name="category">
                                        <option>Select One</option>
                                        <option value="1" {{ old('category', $ship->category) == '1' ? 'selected' : '' }}>Corporate</option>
                                        <option value="2" {{ old('category', $ship->category) == '2' ? 'selected' : '' }}>Project</option>
                                    </select>
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
