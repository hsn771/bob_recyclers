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
    
        <h1 class="slider-two-heading text-uppercase d-none d-md-block">
          Mahinur Ship Recycling Limited - Green Shipyard Bangladesh
        </h1>
        
        <h2 class="slider-two-heading text-uppercase d-none d-md-block">
          Bay of Bengal Recyclers
        </h2>

        <h4 class="text-uppercase d-block d-md-none">
          MSRL - Green Ship Recycling
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



        {{-- SEO CONTENT SECTION --}}
<section class="container py-5">
  <div class="row">
    <div class="col-12">
      <h2 class="brand-text-color mb-4">About Mahinur Ship Recycling Limited</h2>
      <p>Mahinur Ship Recycling Limited (MSRL) is one of the leading green ship recycling companies in Bangladesh, located at Middle Sonaichoori, Shitalpur, Sitakunda, Chittagong. Established in 2016, MSRL has successfully recycled over 120 scrap vessels, making it one of the most experienced ship recycling yards in the country.</p>

      <h2 class="brand-text-color mt-4 mb-3">Green and Sustainable Ship Recycling</h2>
      <p>At MSRL, we are committed to environmentally responsible ship recycling practices. Our operations strictly follow the Bangladesh Ship Recycling Act 2018 and the Hong Kong International Convention 2009 for Safe and Environmentally Sound Recycling of Ships. We prioritize the safety of our workers and the protection of the environment in every step of our recycling process.</p>

      <h2 class="brand-text-color mt-4 mb-3">Our Ship Recycling Capacity</h2>
      <p>MSRL has an existing cutting capacity of approximately 10 scrap vessels per year, with an average capacity of 10,000 metric tons per ship. After modernization, our capacity will increase to 15,000 metric tons per ship. Together with our sister concern BOB Recyclers, we handle a combined capacity of 20 scrap vessels annually.</p>

      <h2 class="brand-text-color mt-4 mb-3">Why Choose MSRL?</h2>
      <p>With over 8 years of experience in the ship recycling industry, MSRL offers reliable and efficient services to its clients. Our strategic location in Sitakunda, Chittagong provides easy access for beaching of ships and smooth delivery of recycled materials to domestic re-rolling mills. We supply high-quality MS plates and scrap steel to major buyers including BSRM, RSRM, KSRM, AKS, and BS Steel.</p>

      <h2 class="brand-text-color mt-4 mb-3">Ship Recycling in Bangladesh</h2>
      <p>Bangladesh is one of the world's leading ship recycling nations. The ship recycling yards in Bangladesh are located along an 18 km stretch from Fouzdharhat in the south to Sonaichori in the north, in Sitakunda Upazila of Chittagong district. MSRL is proud to be part of this industry, contributing to the sustainable recycling of end-of-life vessels while supporting Bangladesh's growing steel industry.</p>
    </div>
  </div>
</section>

  @include('frontend.layout.footer')
  
            

@endsection


@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endpush