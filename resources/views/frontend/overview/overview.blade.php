@extends('frontend.layout.app')
@section('content')
@include('frontend.layout.nav')
  <section class="management-page-top">
        <div class="overlay">
          <div class="container pt-5 d-flex align-items-end">
            <p><span>I</span>ndustry Overview</p>
          </div>
        </div>
  </section>
    
  <main class="brand-text-color brand-text-color">
    <div class="container">
        <div class="page-inner-body my-4">
            <p>{!! $over->overview_text !!}</p>
        </div>
    </div>
  </main>
@include('frontend.layout.footer')
@endsection('content')
 