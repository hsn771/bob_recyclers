@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Sister Concern</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sister Concern</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                {{--<div class="card-header">
                    <h4 class="card-title">Moderation Page</h4>
                </div>--}}
                <div class="card-body">
                    <form action="{{ route('sisterC.update', encryptor('encrypt',$data->id)) }}" method="POST">
                        @csrf
                        @method('PUT')
                          <div class="row">
                            <div class="col-12 mb-4">
                            <label for="about_us">About Us</label>
                            <textarea name="about_us" cols="30" rows="8" id="about_us" class="form-control">{{old('about_us',$data->about_us)}}</textarea>
                        </div>
                         <div class="col-12 mb-4">
                            <label for="history">History</label>
                            <textarea name="history" cols="30" rows="8" id="history" class="form-control">{{old('history',$data->history)}}</textarea>
                         </div>
                         <div class="col-12 mb-4">
                            <label for="mission">Mission</label>
                            <textarea name="mission" id="mission" cols="30" rows="8">{{old('mission',$data->mission)}}</textarea>
                         </div>
                         <div class="col-12">
                            <label for="sister_text">Sister Text</label>
                            <textarea name="sister_text" id="sister_text" cols="30" rows="8">{{old('sister_text',$data->sister_text)}}</textarea>
                         </div>
                        <div class="col-md-6 mt-2 ms-2">
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
