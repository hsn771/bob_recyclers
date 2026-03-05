@extends('frontend.layout.app')
@section('content')
@include('frontend.layout.nav')
<section class="conact-page-top">
    <div class="overlay">
        <div class="container pt-5 d-flex align-items-end">
            <p><span>C</span>areer</p>
        </div>
    </div>
</section>
<!-- page top View end -->
<!-- Contact Page Body start -->
<section class="container my-4 brand-text-color">
    <div class="row">
        <div class="col-12 text-center">
            <h3>Current Opening</h3>
            <p>If you think you might fit one of the job descriptions below, go ahead and apply, we’d love to get to know you! You can also send an email to info@msrlbob.com</p>
        </div>
    </div>
    <div class="row">
        @if(count($circular) > 0)
        @foreach($circular as $d)
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$d->position}}</h5>
                    <p class="card-text">We are hiring. Be a part of our dynamic team.</p>
                    <a href="{{route('jobApply', ['id' =>encryptor('encrypt',$d->id)])}}" class="btn btn-green">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-12 text-center">
            <p>No recent openings</p>
        </div>
        @endif
    </div>
</section>
@include('frontend.layout.footer')
@endsection('content')
