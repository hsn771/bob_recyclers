@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Career</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Career</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Job Circular</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('circular.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                              <textarea name="circular" cols="30" rows="8" id="circular" class="form-control">{{ old('circular')}}</textarea>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <input type="text" id="position" class="form-control" name="position" value="{{ old('position')}}" placeholder="Enter Job Title">
                                    @if($errors->has('position'))
                                        <span class="text-danger"> {{ $errors->first('position') }}</span>
                                     @endif
                                </div>
                                 <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
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
