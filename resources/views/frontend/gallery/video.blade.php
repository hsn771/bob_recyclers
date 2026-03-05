@extends('frontend.layout.app')
@section('content')
@include('frontend.layout.nav')
<section class="galary-page-top">
    <div class="overlay">
        <div class="container pt-5 d-flex align-items-end">
            <p><span>V</span>ideo</p>
        </div>
    </div>
</section>
<section class="container py-5 brand-text-color" id="galary">
    <div class="row galary-img">
        @foreach($videos as $video)
        <div class="col-md-6 col-lg-4 cursor-point">
            <div class="videoWrapper">
                <iframe width="100%" height="auto" src="https://www.youtube.com/embed/{{ $video->video_id }}" frameborder="0" allowfullscreen></iframe>
            </div>
            <p>{{ $video->name }}</p>
        </div>
        @endforeach
    </div>
</section>
@include('frontend.layout.footer')
@endsection

@push('styles')
<style>
    .videoWrapper {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 */
        height: 0;
    }
    .videoWrapper iframe {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }
</style>
@endpush
