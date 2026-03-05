@extends('frontend.layout.app')
@section('content')
@include('frontend.layout.nav')

<section class="chairman-page-top">
    <div class="overlay">
        <div class="container pt-5 d-flex align-items-end">
            <p><span>C</span>hairman Message</p>
        </div>
    </div>
</section>

<!-- main body -->
<main class="brand-text-color">
    <div class="container">
        <div class="row my-4">
            <div class="col-sm-12 col-md-6 chairman-image">
                @if($chairman && $chairman->image)
                <img src="{{ asset('uploads/chairman/' . $chairman->image) }}" alt="Chairman" class="img-fluid" />
                @endif
            </div>
            <div class="col-sm-12 col-md-6">
                <!-- Name and Degignation -->
                <div class="chairman-name my-5 pt-5">
                    <h5 class="pb-2">Mr. S M Nurun Nabi</h5>
                    <p>Chairman</p>
                </div>
                <!-- message body -->
                <div class="message">
                    @if($chairman && $chairman->chairman_text)
                    <p>{!! $chairman->chairman_text !!}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>

@include('frontend.layout.footer')
@endsection('content')
