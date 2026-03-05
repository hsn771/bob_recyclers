@extends('frontend.layout.app')
@section('content')
@include('frontend.layout.nav')
 <section class="galary-page-top">
    <div class="overlay">
        <div class="container pt-5 d-flex align-items-end">
            <p><span>G</span>allery</p>
        </div>
    </div>
</section>
<!-- page top View end -->
<!-- Galary start -->
<section class="container py-5 brand-text-color" id="galary">
    <div class="row mb-4">
        <div class="col-sm-6 galary-text">
            <a class="brand-text-color" href="">
                <h6 class="brand-text-color">[{{ $ships->count() }} Results]</h6>
            </a>
        </div>
        {{-- <div id="project-galary-btn" class="col-sm-6 image-catary d-flex align-items-center justify-content-end">
            <a href="{{ route('frontend.gallery.filter', ['category' => 'all']) }}">All</a>
            <a href="{{ route('frontend.gallery.filter', ['category' => 'corporate']) }}">Corporate</a>
            <a href="{{ route('frontend.gallery.filter', ['category' => 'project']) }}">Project</a>
        </div> --}}
    </div>
    <!-- galary image -->
    <div class="row galary-img">
        @foreach($ships as $ship)
        <div class="col-sm-12 col-md-6 col-lg-3 cursor-point">
            <img class="img-fluid rounded" src="{{ asset('uploads/ship/'.$ship->image) }}" alt="{{ $ship->name }}" onclick="openModal('{{ asset('uploads/ship/'.$ship->image) }}')" />
            <p>{{ $ship->name }}</p>
        </div>
        @endforeach
    </div>
    <!-- view Modal -->
    <div id="modal" class="modal" onclick="closeModal()">
        <img id="modalImage" class="modal-content" alt="Modal Image" />
    </div>
</section>
<!-- Galary end -->
<!-- pagination start -->
<section class="my-4 d-flex justify-content-center">
    <nav aria-label="Page navigation example " class="pagination-custom">
        {{$ships->links()}}
    </nav>
</section>

@include('frontend.layout.footer')
@endsection('content')
