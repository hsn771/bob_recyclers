@extends('frontend.layout.app')
@section('title', 'Sister Concern - Mahinur Ship Recycling Limited | MSRL')
@section('description', 'Mahinur Ship Recycling Limited (MSRL) is the sister concern of BOB Recyclers. Both specialize in green ship recycling in Sitakunda, Chittagong, Bangladesh.')
@push('styles')
  <link rel="stylesheet" href="{{ asset('asset/css/about/about.css') }}">
@endpush
@section('content')
  @include('frontend.layout.nav')

  <section class="about-page-top"
    style="@if($sis && $sis->banner_image) background-image: url('{{ asset('uploads/sisterConcern/' . $sis->banner_image) }}'); background-position: center; @endif">
    <div class="overlay">
      <div class="container pt-5 d-flex align-items-end">
        <p><span>S</span>ister Concern</p>
      </div>
    </div>
  </section>

  <section class="container my-5 brand-text-color">
    <h3 class="mb-4" style="font-weight: 700; color: #0d392e;">About MSRL</h3>
    @if($sis && $sis->about_us)
      <div style="text-align: justify; line-height: 1.8; color: #555;">
        {!! $sis->about_us !!}
      </div>
    @endif
  </section>

  @if($sis && ($sis->image_1 || $sis->image_2))
    <section class="container mb-5">
      <div class="row g-4">
        @if($sis->image_1)
          <div class="col-md-6">
            <img class="img-fluid rounded-4 shadow w-100" src="{{ asset('uploads/sisterConcern/' . $sis->image_1) }}" alt="MSRL">
          </div>
        @endif
        @if($sis->image_2)
          <div class="col-md-6">
            <img class="img-fluid rounded-4 shadow w-100" src="{{ asset('uploads/sisterConcern/' . $sis->image_2) }}" alt="MSRL">
          </div>
        @endif
      </div>
    </section>
  @endif

  @include('frontend.layout.footer')
@endsection
