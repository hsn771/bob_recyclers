@extends('frontend.layout.app')

@section('content')

    @include('frontend.layout.nav')

    <style>
        /* .management-page-top {
                                    background: url('/frontend/images/banner.jpg') center/cover no-repeat;
                                    height: 250px;
                                    position: relative;
                                } */

        .management-page-top .overlay {
            background: rgba(0, 0, 0, 0.5);
            height: 100%;
        }

        .management-page-top p {
            color: #fff;
            font-size: 40px;
            font-weight: 600;
        }

        .management-page-top span {
            color: #c59d5f;
        }

        /* chairman */

        .chairman {
            padding: 80px 0;
        }

        .chairman-image img {
            border-radius: 10px;
        }

        .designation {
            background: #1a1a1a;
            border-radius: 6px;
            padding: 20px 25px !important;
        }

        .designation h5 {
            font-size: 22px;
            font-weight: 700;
            color: #c59d5f;
            margin-bottom: 5px;
            text-decoration: underline;
            text-underline-offset: 8px;
        }

        .designation p {
            margin: 0;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .management-page-top p {
                font-size: 28px;
            }

            .chairman-image-col {
                position: relative;
                margin-bottom: 40px;
            }

            .designation {
                width: 90% !important;
                position: absolute;
                bottom: -20px;
                left: 5%;
                border-left: 4px solid #c59d5f;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            }
        }

        .chairman-title {
            font-size: 32px;
            font-weight: 700;
        }

        .chairman-text {
            color: #666;
        }

        /* section title */

        .page-inner-title p {
            font-size: 30px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 10px;
        }

        .page-inner-title p::after {
            content: "";
            width: 70px;
            height: 3px;
            background: #c59d5f;
            display: block;
            margin: 10px auto;
        }

        .page-inner-body {
            text-align: center;
            color: #555;
        }

        /* team card */

        .team-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: 0.4s;
        }

        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .team-img {
            height: 340px;
            overflow: hidden;
        }

        .team-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.4s;
        }

        .team-card:hover img {
            transform: scale(1.08);
        }

        .team-info {
            padding: 20px;
            text-align: center;
        }

        .team-info h5 {
            font-size: 20px;
            font-weight: 600;
        }

        .team-info p {
            font-size: 14px;
            color: #777;
        }
    </style>


    <section class="management-page-top">
        <div class="overlay">
            <div class="container pt-5 d-flex align-items-end">
                <p><span>M</span>anagement Overview</p>
            </div>
        </div>
    </section>


    <!-- chairman -->

    <section class="chairman brand-bg">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 chairman-image-col">

                    @if($chairman && $chairman->image)

                        <img src="{{ asset('uploads/chairman/' . $chairman->image) }}" class="img-fluid">

                    @endif

                    <div class="designation text-white p-3 mt-4" style="width:55%;">
                        <h5>Mr. S M Nurun Nabi</h5>
                        <p>Chairman</p>
                    </div>

                </div>

                <div class="col-lg-6 d-flex align-items-center">

                    <div>

                        <h2 class="chairman-title">Chairman Message</h2>

                        <p class="chairman-text mb-4">

                            @if($chairman && $chairman->chairman_text)

                                {!! \Illuminate\Support\Str::limit($chairman->chairman_text, 366, '...') !!}

                            @endif

                        </p>

                        <a href="{{route('chairman')}}" class="btn btn-dark">Read More</a>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <main class="brand-text-color">

        <div class="container">


            <!-- Top Management -->

            <div class="page-inner-title my-4">

                <p>{{$management->top_management_title}}</p>

            </div>

            <div class="page-inner-body my-4">

                <p>{{$management->top_description}}</p>

            </div>


            <div class="row g-4 my-4">

                @foreach($topM as $manager)

                    <div class="col-md-6 col-lg-4">

                        <div class="team-card">

                            <div class="team-img">

                                <img src="{{ asset('uploads/topManagement/' . $manager->image) }}">

                            </div>

                            <div class="team-info">

                                <h5>{{ $manager->name }}</h5>

                                <p>{{ $manager->designation }}</p>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>



            <!-- Mid Management -->

            <div class="page-inner-title my-4">

                <p>{{$management->mid_management_title}}</p>

            </div>

            <div class="page-inner-body my-4">

                <p>{{$management->mid_description}}</p>

            </div>


            <div class="row g-4 my-4">

                @foreach($midM as $manager)

                    <div class="col-md-6 col-lg-4">

                        <div class="team-card">

                            <div class="team-img">

                                <img src="{{ asset('uploads/midManagement/' . $manager->image) }}">

                            </div>

                            <div class="team-info">

                                <h5>{{ $manager->name }}</h5>

                                <p>{{ $manager->designation }}</p>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>



            <!-- Yard Management -->

            <div class="page-inner-body my-4 text-center">

                <p>{{$management->yard_description}}</p>

            </div>


            <div class="row g-4 my-4">

                @foreach($yardM as $manager)

                    <div class="col-md-6 col-lg-4">

                        <div class="team-card">

                            <div class="team-img">

                                <img src="{{ asset('uploads/yardManagement/' . $manager->image) }}">

                            </div>

                            <div class="team-info">

                                <h5>{{ $manager->name }}</h5>

                                <p>{{ $manager->designation }}</p>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            <div class="page-inner-body my-4 text-center">

                <p>

                    The company has employed sufficient employees to ensure the smooth operation of the business. Currently
                    the company has 450 employees and workers in the office and yard.

                </p>

            </div>


        </div>

    </main>


    @include('frontend.layout.footer')

@endsection