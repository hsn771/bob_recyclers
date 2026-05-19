@extends('frontend.layout.app')
@section('title', 'About MSRL - Mahinur Ship Recycling Limited | Chittagong')
@section('description', 'Learn about Mahinur Ship Recycling Limited (MSRL) - A leading green ship recycling company in Sitakunda, Chittagong, Bangladesh. Established in 2016.')
@push('styles')
  <link rel="stylesheet" href="{{ asset('asset/css/about/about.css') }}">
  <style>
    @media (max-width: 767px) {
      .experience img {
        max-width: 50% !important;
        margin-left: auto !important;
        margin-right: auto !important;
        display: block !important;
      }

      .history-images img {
        max-width: 100% !important;
        width: 100% !important;
        display: block !important;
      }

      .top-exprience {
        position: relative !important;
        top: 0 !important;
        right: 0 !important;
        text-align: center !important;
        margin-top: 15px !important;
      }

      .top-exprience p {
        font-size: 35px !important;
        line-height: 1 !important;
      }
    }
  </style>
@endpush
@section('content')
  @include('frontend.layout.nav')
  <section class="about-page-top"
    style="@if($about->banner_image) background-image: url('{{ asset('uploads/aboutUs/' . $about->banner_image) }}'); background-position: center; @endif">
    <div class="overlay">
      <div class="container pt-5 d-flex align-items-end">
        <p><span>A</span>bout Us</p>
      </div>
    </div>
  </section>
  <section class="container my-5">
    <div class="row">
      <div class="col-12 mb-4">
        <video width="100%" height="auto" style="max-height: 600px; display: block; margin: 0 auto;" controls>
          <source src="{{ asset('media/MT RADE BEACHING.mp4') }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <div class="col-12 brand-text-color ps-3">
        <div style="text-align: justify; line-height: 1.8; color: #555;">
          {!!$about->about_us_text!!}
        </div>
      </div>
    </div>
  </section>
  <!-- About end -->
  <!-- Buyers Start -->
  <section class="container py-5 brand-text-color">
    <div class="row">
      <div class="col-md-12 col-lg-6 buyers mb-4">
        <h3>Our Sister Concern</h3>
        <p>
          {!!$text->sister_concern_text!!}
        </p>
      </div>
      <div class="col-md-12 col-lg-6 sister-logo-about text-center">
        @foreach ($sister as $sisterLogo)
          <img src="{{ asset('uploads/sisterLogo/' . $sisterLogo->image) }}" alt="Sister Concern Logo" max-width="50px"
            class="my-auto" />
        @endforeach
      </div>
    </div>
  </section>
  <!-- Buyers end -->
  <!-- Years Section start -->
  <section class="year brand-text-color">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6 experience">
          <img class="img-fluid" src="{{ asset('uploads/mission/' . $mission->image) }}" alt="Years" />
          <div class="top-exprience">
            <p>Years <br />experience</p>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 mission-visition text-start">
          <h5 style="font-weight: 700; color: #0d392e; margin-bottom: 20px;">Our Vision and Mission</h5>
          <div style="text-align: justify; line-height: 1.8; color: #555;">
            {!! $mission->mission_text !!}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Years Section end -->
  <!-- counter start -->
  @include('frontend.track-cards.card')
  <!-- counter end -->
  <!-- history start -->
  <section class="year brand-text-color my-4">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6 history-images d-flex align-items-center flex-column">
          @php
            $images = json_decode($history->image);
            if (!is_array($images)) {
              $images = $history->image ? [$history->image] : [];
            }
          @endphp
          @foreach($images as $img)
            <img class="img-fluid shadow rounded mb-4" src="{{ asset('uploads/history/' . $img) }}" alt="History" />
          @endforeach
        </div>
        <div class="col-sm-12 col-md-6 history text-start">
          <h5 style="font-weight: 700; color: #0d392e; margin-bottom: 20px;">Our History</h5>
          <div style="text-align: justify; line-height: 1.8; color: #555;">
            {!! $history->history_text !!}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- history end -->
  <!-- Buyers Start -->

  @include('frontend.our-buyers.buyer')


  <!-- Buyers end -->
  <!-- main text -->
  <section class="container">
    <div class="my-4">
      <div class="page-inner-body my-4">
        <p>{!! $text->about_text !!}</p>
      </div>
    </div>
  </section>

  @include('frontend.layout.footer')
@endsection('content')