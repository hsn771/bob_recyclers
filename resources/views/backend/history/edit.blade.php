@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>History</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">History</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">History Page</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('history.update', encryptor('encrypt',$data->id)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                           <textarea name="history_text" cols="30" rows="8" id="history_text" class="form-control">{{ old('history_text', $data->history_text)}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Images (Can select multiple)</label>
                                @php
                                    $images = json_decode($data->image);
                                    if (!is_array($images)) {
                                        $images = $data->image ? [$data->image] : [];
                                    }
                                @endphp
                                <div class="mb-2">
                                    @foreach($images as $img)
                                        <div class="position-relative d-inline-block me-2 mb-2">
                                            <img src="{{ asset('uploads/history/' . $img) }}" width="100px" class="shadow-sm rounded">
                                            <a href="{{ route('history.deleteImage', [encryptor('encrypt', $data->id), $img]) }}" 
                                               class="btn btn-danger btn-sm position-absolute top-0 end-0 p-0" 
                                               style="width: 20px; height: 20px; line-height: 18px;" 
                                               onclick="return confirm('Are you sure you want to delete this image?')">
                                                &times;
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <input type="file" id="image" class="form-control" name="image[]" multiple>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
@push('scripts')
 <!-- Place the first <script> tag in your HTML's <head> -->
<script src="{{asset('assets/tinymc.js')}}"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>
@endpush

