@extends('frontend.layout.app')

@section('content')

  @include('frontend.layout.nav')

  <style>
    .video-slider {
      position: relative;
      width: 100%;
      height: 700px;
      overflow: hidden;
    }

    .video-slider video {
      position: absolute;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      transform: translate(-50%, -50%);
      object-fit: cover;
    }

    .video-overlay {
      position: absolute;
      bottom: 90px;
      width: 100%;
      text-align: center;
      color: #fff;
      z-index: 10;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      /* Added for readability since overlay is gone */
    }

    @media (max-width: 767px) {
      .video-slider {
        height: auto;
      }

      .video-slider video {
        position: relative;
        top: 0;
        left: 0;
        transform: none;
        width: 100%;
        height: auto;
        display: block;
      }

      .video-overlay {
        bottom: 20px;
      }

      .video-overlay h4 {
        font-size: 1.1rem;
        padding: 0 10px;
      }
    }
  </style>


  <!-- HERO VIDEO SECTION -->
  <section class="container-fluid px-0">

    <div class="video-slider">

      <video autoplay muted loop playsinline>
        <source src="{{ asset('uploads/carousel/vd.mp4') }}" type="video/mp4">
      </video>

      <div class="video-overlay">

        <h2 class="slider-two-heading text-uppercase d-none d-md-block">
          Bay of Bengal Recyclers
        </h2>

        <h4 class="text-uppercase d-block d-md-none">
          Bay of Bengal Recyclers
        </h4>

      </div>

    </div>

  </section>


  {{-- ABOUT SECTION --}}
  @include('frontend.about-us.about')


  <!-- GALLERY -->
  <section class="container py-5 brand-text-color" id="galary">

    <div class="row mb-4">
      <div class="col-sm-6 galary-text">
        <a class="brand-text-color" href="{{route('gallery')}}">
          <h4>Image Gallery</h4>
        </a>
      </div>
    </div>

    <div class="row galary-img">

      @foreach($ship as $shipItem)

        <div class="col-sm-12 col-md-6 col-lg-3 cursor-point">

          <img class="img-fluid rounded" src="{{ asset('uploads/ship/' . $shipItem->image) }}" alt="Ship"
            onclick="openModal('{{ asset('uploads/ship/' . $shipItem->image) }}')" />

          <p>{{ $shipItem->name }}</p>

        </div>

      @endforeach

    </div>


    <!-- MODAL -->
    <div id="modal" class="modal" onclick="closeModal()">
      <div class="modal-controls">
        <button onclick="zoomIn(event)" title="Zoom In"><i class="fas fa-search-plus"></i></button>
        <button onclick="zoomOut(event)" title="Zoom Out"><i class="fas fa-search-minus"></i></button>
        <button onclick="resetZoom(event)" title="Reset Zoom"><i class="fas fa-sync-alt"></i></button>
        <button onclick="closeModal(event)" class="close-btn" title="Close"><i class="fas fa-times"></i></button>
      </div>
      <div class="modal-content-wrapper" onclick="event.stopPropagation()">
        <img id="modalImage" alt="Modal Image" ondragstart="return false;" />
      </div>
    </div>

  </section>


  @include('frontend.layout.footer')

@endsection


@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endpush