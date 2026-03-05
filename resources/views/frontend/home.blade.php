@extends('frontend.layout.app')
@section('content')
  @include('frontend.layout.nav')
  <section class="container-fluid px-0 mx-0 mt-0">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner h-100">
        {{-- @if($carousel->isEmpty()) --}}
        <video width="100%" height="auto" style="max-height:600px" controls autoplay muted>
          <source src="{{ asset('uploads/carousel/vd.mp4') }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <!--<div class="carousel-item active h-100">-->
        <!--<img src="{{ asset('asset/images/carousel-image.png') }}" class="d-block h-100" alt="Carousel Image" />-->
        <!--    <div class="carousel-caption">-->
        <!--        <div class="text-start">-->
        <!--            <p class="slider-one-heading mb-0">Welcome To</p>-->
        <!--            <h2 class="slider-two-heading text-uppercase">Mahinur Ship Recycling Ltd.</h2>-->
        <!--            <p class="py-3 slider-text">-->
        <!--                Mahinur Ship Recycling Limited (here in after referred as “MSRL” or the company) was incorporated on 02.10.2016 vide Registration No. CH-11851/2016 asa Private Limited Company under the Companies Act (Act XVIII) of 1994. The company is also engaged in importing and dismantling of scrap vessel.-->
        <!--            </p>-->
        <!--        </div>-->
        <!--        <div class="d-flex justify-content-between me-auto">-->
        <!--            <a href="{{route('about')}}" class="btn btn-white m-1 border rounded-pill px-4">About Us</a>-->
        <!--            <a href="{{route('trackRecord')}}" class="btn btn-green m-1 border rounded-pill px-4">Project</a>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        {{-- @else
        @foreach($carousel as $key => $item)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }} h-100">
          <img src="{{ asset('uploads/carousel/' . $item->image) }}" class="d-block h-100" alt="Carousel Image" />
          <div class="carousel-caption">
            <div class="text-start">
              <p class="slider-one-heading mb-0">Welcome To</p>
              <h2 class="slider-two-heading text-uppercase">Mahinur Ship Recycling Ltd.</h2>
              @if($item->slogan && $item->short_description)
              <h5 class="animate__animated animate__bounceInRight">{{$item->slogan}}</h5>
              <p class="py-3 slider-text">{{$item->short_description}}</p>
              @else
              <p class="slider-text animate__animated animate__bounceInRight">{{$item->slogan ?:
                $item->short_description}}</p>
              @endif
            </div>
            <div class="d-flex justify-content-between me-auto">
              <a href="{{route('about')}}" class="btn btn-white m-1 border rounded-pill px-4">About Us</a>
              <a href="{{route('trackRecord')}}" class="btn btn-green m-1 border rounded-pill px-4">Project</a>
            </div>
          </div>
        </div>
        @endforeach

        @endif --}}
      </div>

      <!--<ol class="carousel-indicators">-->
      <!--    @foreach($carousel as $key => $item)-->
      <!--    <li data-bs-target="#myCarousel" data-bs-slide-to="{{ $key }}" {{ $key == 0 ? 'class=active' : '' }}></li>-->
      <!--    @endforeach-->
      <!--</ol>-->
      <h2 class="slider-two-heading text-uppercase d-none d-md-block"
        style="text-align: center;position: absolute;bottom: 97px;width: 100%;color: #fff;">BOB Recyclers & Mahinur Ship
        Recycling Ltd.</h2>
      <h4 class=" text-uppercase d-block d-md-none"
        style="text-align: center;position: absolute;bottom: 97px;width: 100%;color: #fff;">BOB Recyclers & Mahinur Ship
        Recycling Ltd.</h4>
    </div>
  </section>

  <!-- slider end -->
  {{-- @include('frontend.track-cards.card') --}}

  @include('frontend.about-us.about')
  <!-- chairman start -->
  {{-- <section class="brand-bg">
    <div class="chairman">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-6 chairman-image">
            @if($chairman && $chairman->image)
            <img src="{{ asset('uploads/chairman/' . $chairman->image) }}" alt="Chairman" class="img-fluid" />
            @endif


            <div class="designation text-white p-2 mt-5 w-75">
              <h5 class="pb-2">Mr. S M Nurun Nabi</h5>
              <p>Chairman</p>
            </div>
          </div>
          <div class="col-md-12 col-lg-6 d-flex align-items-center mt-3 pb-4">
            <div>
              <h2 class="chairman-title">Chairman Message</h2>
              <p class="chairman-text mb-4">
                @if($chairman && $chairman->chairman_text)

                {!! \Illuminate\Support\Str::limit($chairman->chairman_text, 366, '...') !!}

                @endif
              </p>
              <a href="{{route('chairman')}}" class="unknown-btn"> &lt; Read More &gt; </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </section> --}}



  <!-- counter and Chairman end -->
  <!-- Buyers Start -->
  {{-- @include('frontend.our-buyers.buyer') --}}
  <!-- Buyers end -->
  <!-- About start -->
  {{-- @include('frontend.about-us.about') --}}
  <!-- About end -->
  <!-- Galary start -->
  <section class="container py-5 brand-text-color" id="galary">
    <div class="row mb-4">
      <div class="col-sm-6 galary-text">
        <a class="brand-text-color" href="{{route('gallery')}}">
          <h4>Image Gallery</h4>
        </a>
      </div>
      {{-- <div id="project-galary-btn" class="col-sm-6 image-catary d-flex align-items-center justify-content-end">
        <a href="#">All</a>
        <a href="#">Corporate</a>
        <a href="#">Project</a>
      </div> --}}
    </div>
    <!-- galary image -->
    <div class="row galary-img">
      @foreach($ship as $shipItem)
        <div class="col-sm-12 col-md-6 col-lg-3 cursor-point">
          <img class="img-fluid rounded" src="{{ asset('uploads/ship/' . $shipItem->image) }}" alt="Ship"
            onclick="openModal('{{ asset('uploads/ship/' . $shipItem->image) }}')" />
          <p>{{ $shipItem->name }}</p>
        </div>
      @endforeach
    </div>
    <!-- view Modal -->
    <div id="modal" class="modal" onclick="closeModal()">
      <img id="modalImage" class="modal-content" alt="Modal Image" />
    </div>
  </section>


  @include('frontend.layout.footer')
@endsection('content')
@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endpush