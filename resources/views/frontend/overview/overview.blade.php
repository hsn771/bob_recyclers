@extends('frontend.layout.app')
@section('title', 'Ship Breaking Industry Overview | MSRL Chittagong Bangladesh')
@section('description', 'Learn about the ship breaking and recycling industry in Bangladesh. MSRL operates in Sitakunda, Chittagong following Bangladesh Ship Recycling Act 2018 and Hong Kong Convention.')
@section('content')
@include('frontend.layout.nav')
  <section class="management-page-top" style="@if($over->image) background-image: url('{{ asset('uploads/overview/' . $over->image) }}'); background-position: center; @endif">
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
 