@extends('frontend.layout.app')
@section('content')
@include('frontend.layout.nav')
  <section class="container my-5">
        <div class="row">
          <div class="col-md-12 col-lg-6 mb-3">
            <img
              class="img-fluid rounded-4 shadow"
              src="{{asset('asset/images/office.jpg')}}"
              alt="Office Desk"
            />
          </div>
          <div class="col-md-12 col-lg-6 about-right brand-text-color ps-3">
            <h4 class="pt-3 pb-3">About Us</h4>
            <p>
              {!! $sis->about_us !!}
            </p>
            <a href="{{route('sister')}}" class="btn btn-green m-1 border rounded-pill px-4"
              >Read More</a
            >
          </div>
        </div>
  </section>
    <!-- About end -->
    <!-- Buyers Start -->
{{--<section class="container py-5 brand-text-color">
  <div class="row">
    <div class="col-md-12 col-lg-6 buyers mb-4">
      <h3>Our Sister Concern</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
        non iaculis est, ac feugiat dui. Nunc sodales rutrum felis ac
        feugiat. Nullam sed commodo arcu. Quisque vel arcu leo.
      </p>
    </div>
    <div class="col-md-12 col-lg-6 sister-logo-about text-center">
      <img class="img-fluid" src="{{asset('asset/images/logo.png')}}" alt="Sister Logo" />
    </div>
  </div>
</section>--}}
    <!-- Buyers end -->
    <!-- Years Section start -->
    <section class="year brand-text-color">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6 experience">
            <img class="img-fluid" src="{{asset('asset/images/17.png')}}" alt="Years" />
            <div class="top-exprience">
              <p>Years <br />experience</p>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 mission-visition text-end">
            <h5>Our Vision and Mission</h5>
            <p>
              {!! $sis->mission !!}
            </p>
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
          <div class="col-sm-12 col-md-6 experience d-flex align-items-center">
            <img
              class="img-fluid shadow rounded"
              src="{{asset('asset/images/history.png')}}"
              alt=""
            />
          </div>
          <div class="col-sm-12 col-md-6 history text-end">
            <h5 class="my-3">Our History</h5>
            <p>
             {!! $sis->history !!} 
            </p>
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