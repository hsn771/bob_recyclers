@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Sister Concern Page</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sister Concern</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Mahinur Ship Recycling Limited (MSRL)</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('sisterC.update', encryptor('encrypt', $data->id)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12 mb-4">
                            <label for="about_us">About MSRL</label>
                            <textarea name="about_us" cols="30" rows="8" id="about_us" class="form-control">{{ old('about_us', $data->about_us) }}</textarea>
                            @if ($errors->has('about_us'))
                                <span class="text-danger">{{ $errors->first('about_us') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="banner_image">Banner Image (hero)</label>
                                <input type="file" id="banner_image" class="form-control" name="banner_image" accept="image/*">
                                @if ($data->banner_image)
                                    <img src="{{ asset('uploads/sisterConcern/' . $data->banner_image) }}" alt="Banner" width="120" class="mt-2 rounded shadow-sm">
                                @endif
                                @if ($errors->has('banner_image'))
                                    <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="image_1">Photo 1</label>
                                <input type="file" id="image_1" class="form-control" name="image_1" accept="image/*">
                                @if ($data->image_1)
                                    <img src="{{ asset('uploads/sisterConcern/' . $data->image_1) }}" alt="Photo 1" width="120" class="mt-2 rounded shadow-sm">
                                @endif
                                @if ($errors->has('image_1'))
                                    <span class="text-danger">{{ $errors->first('image_1') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="image_2">Photo 2</label>
                                <input type="file" id="image_2" class="form-control" name="image_2" accept="image/*">
                                @if ($data->image_2)
                                    <img src="{{ asset('uploads/sisterConcern/' . $data->image_2) }}" alt="Photo 2" width="120" class="mt-2 rounded shadow-sm">
                                @endif
                                @if ($errors->has('image_2'))
                                    <span class="text-danger">{{ $errors->first('image_2') }}</span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('assets/tinymc.js') }}"></script>
<script>
  tinymce.init({
    selector: '#about_us',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist | removeformat',
  });
</script>
@endpush
