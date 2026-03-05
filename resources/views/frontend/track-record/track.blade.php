@extends('frontend.layout.app')
@section('content')
@include('frontend.layout.nav')
 <section class="track-page-top">
      <div class="overlay">
        <div class="container pt-5 d-flex align-items-end">
          <p><span>T</span>rack Record of Scrap Ship Import</p>
        </div>
      </div>
    </section>
    <!-- page top View end -->
@include('frontend.track-cards.card')

<section class="my-5 body track-title">
    <div class="container">
      @foreach($projects as $project)
      <div class="d-flex mb-4">
        <p class="mt-3">{{ $project->name }}</p>
        @if($project->file)
        <a target="_blank" href="{{ asset('uploads/project/'. $project->file) }}">
          <button class="mx-5 shadow" id="down-btn">
            <i class="bi bi-cloud-arrow-down-fill"></i>
          </button>
        </a>
        @else
        <p class="mt-3">No file uploaded</p>
        @endif
      </div>
      @endforeach

      <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $projects->links() }}
        </div>
        
    </div>
</section>

@include('frontend.layout.footer')
@endsection('content')


