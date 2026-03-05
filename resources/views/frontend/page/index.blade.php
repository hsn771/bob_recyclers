@extends('frontend.layout.app')
@section('content')
@include('frontend.layout.nav')
<style>
    /* Hide CKEditor specific elements */
    .ck.ck-widget__type-around__button.ck-widget__type-around__button_before,
    .ck.ck-widget__type-around__button.ck-widget__type-around__button_after {
        display: none;
    }
    /* Additional styles to remove unwanted space */
    .ck.ck-content > div {
        margin-bottom: 0;
    }
    .ck.ck-reset_all.ck-widget__resizer{
        width: 0 !important;
        height: 0 !important;
    }

    .ck.ck-reset, .ck.ck-reset_all, .ck.ck-reset_all * {
    display: none;
    }
    .ck .ck-icon, .ck-reset_all-excluded, .ck-icon_inherit-color *{
    display: none;
    }
    .custom-page-img img{
        vertical-align: middle !important;
        width: 100% !important;
        height: auto !important;
    }
</style>

<section class="galary-page-top">
    <div class="overlay">
        <div class="container pt-5 d-flex align-items-end">
            <p><span>{{ substr($page_data->page_title, 0, 1) }}</span>{{ substr($page_data->page_title, 1) }}</p>
        </div>
    </div>
</section>

<section class="container my-4 brand-text-color">
    <div class="row">
        <div class="col-12 text-center">
            <h3>{{$page_data->page_title}}</h3>
            <p>{!!$page_data->details!!}</p>
        </div>
    </div>
</section>
@include('frontend.layout.footer')
@endsection