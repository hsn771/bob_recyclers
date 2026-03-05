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

<section class="about-support d-sm-none">
    <span class="shape"></span>
    <span class="shape2"></span>
    <span class="shape3"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <h3 class="mb-2 common-title-of-page">{{$page_data?->page_title}}</h3>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('home')}}" class="breadcrumb-item router-link-active">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">{{$page_data?->page_title}}</a>
                        </li>
                        <li class="breadcrumb-item">data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid px-lg-5 py-4">
    <div class="row">
        <div class="col-lg-3 mobileview">
            <div class="sidebar-menu vue-affix affix-top ">
                <div class="leftside-menu">
                    <div class="card  pb-4 me-4 rounded-10 shadow border-0">
                        <span class="shape"></span>
                        <span class="shape2"></span>
                        <div class="card-header bg-white">
                            <h5>{{$page_data?->page_title}} </h5>
                        </div>
                        <ul class="sideber-nav flex-culumn fontend-sidebar-nav p-0">
                        @php 
                            $curl=request()->path();
                            $rows=DB::select("select parent_id from front_menus where href='$curl' limit 1");
                            if($rows && $rows[0]->parent_id !=0 ):
                                $findsub=DB::select("SELECT * from front_menus where parent_id = ".$rows[0]->parent_id." and status =1 order by rank");
                        @endphp
                            @forelse($findsub as $r)
                                @if($r->href)
                                    <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="{{url($r->href)}}">{{$r->name}}</a></li>
                                @else
                                    <li class="nav-item"><i class="bi bi-chevron-double-right"></i><a class="nav-link" href="#">{{$r->name}}</a></li>
                                @endif
                            @empty
                            @endforelse
                        @php endif; @endphp
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 px-2 custom-page-img d-none d-sm-block">
            <div class="about-title" id="grad">
                <h6 class="text-uppercase p-1">{{$page_data?->page_title}}</h6>
            </div>
            <p class="text-justify">
                {!!$page_data?->details!!}
            </p>
        </div>
        <div class="col-lg-9 px-2 custom-page-img d-sm-none">
            <div class="about-title text-center" id="grad">
                <h6 class="text-uppercase p-1">{{$page_data?->page_title}}</h6>
            </div>
            <p class="text-justify">
                {!!$page_data?->details!!}
            </p>
        </div>
    </div>
</div>
@include('frontend.layout.footer')
@endsection