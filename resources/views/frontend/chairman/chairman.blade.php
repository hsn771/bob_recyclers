@extends('frontend.layout.app')
@section('title', 'MD Message - Mr. S M Nurun Nabi | MSRL Chittagong')
@section('description', 'Message from the Chairman of Mahinur Ship Recycling Limited (MSRL), Mr. S M Nurun Nabi. Leading green ship recycling in Sitakunda, Chittagong, Bangladesh since 2016.')

@push('styles')
    <style>
        /* Desktop Font Sizes */
        .chairman-page-top p {
            font-size: 54px !important;
            margin-bottom: 0 !important;
        }

        .chairman-page-top p span {
            font-size: 100px !important;
        }

        @media screen and (max-width: 768px) {
            .chairman-page-top p {
                font-size: 32px !important;
                line-height: 1.2 !important;
            }

            .chairman-page-top p span {
                font-size: 60px !important;
            }

            .chairman-page-top,
            .chairman-page-top .overlay {
                min-height: 200px !important;
                height: auto !important;
            }
        }

        /* Read More Styles */
        .message-content {
            overflow: hidden !important;
            max-height: 250px !important;
            position: relative;
            transition: max-height 0.4s ease;
            text-align: justify;
        }

        .full-message-body {
            text-align: justify;
        }

        .message-content.expanded {
            max-height: 5000px !important;
        }

        .message-content:not(.expanded)::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background: linear-gradient(transparent, #fff);
            pointer-events: none;
            z-index: 10;
        }

        .read-more-btn {
            background-color: #0d392e !important;
            color: #fff !important;
            padding: 8px 25px !important;
            border-radius: 25px !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            display: inline-block !important;
            border: none !important;
            cursor: pointer !important;
            transition: all 0.3s !important;
            position: relative !important;
            z-index: 20 !important;
        }

        .read-more-btn:hover {
            background-color: #1a5a4a !important;
            transform: translateY(-2px);
        }
    </style>
@endpush

@section('content')
    @include('frontend.layout.nav')

    <section class="chairman-page-top">
        <div class="overlay">
            <div class="container h-100 d-flex align-items-center">
                <p><span>M</span>anaging Director Message</p>
            </div>
        </div>
    </section>

    <!-- main body -->
    <main class="brand-text-color">
        <div class="container">
            <div class="row my-4">
                <div class="col-sm-12 col-md-3 chairman-image">
                    @if($chairman && $chairman->image)
                        <img src="{{ asset('uploads/chairman/' . $chairman->image) }}" alt="Chairman" class="img-fluid" />
                    @endif
                </div>
                <div class="col-sm-12 col-md-9">
                    <!-- Name and Degignation -->
                    <div class="chairman-name mb-4">
                        <h5 class="pb-2 pt-5">Mr. S M Nurun Nabi</h5>
                        <p>Managing Director</p>
                        <p>BOB (Bay of Bengal Recyclers)</p>
                    </div>

                    <!-- Collapsed Message (Shows next to photo) -->
                    <div id="collapsedView">
                        <div class="message-content">
                            {!! $chairman->chairman_text !!}
                        </div>
                        <div class="text-start mt-3">
                            <button type="button" class="read-more-btn" id="readMoreBtn">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expanded Message (Shows below the whole row) -->
            <div id="expandedView" style="display: none;" class="mt-4">
                <div class="full-message-body">
                    {!! $chairman->chairman_text !!}
                </div>
                <div class="text-center mt-4 mb-3">
                    <button type="button" class="read-more-btn" id="readLessBtn">Read Less</button>
                </div>
            </div>
        </div>
    </main>

    @include('frontend.layout.footer')

    <script>
        window.addEventListener('load', function () {
            const readMoreBtn = document.getElementById('readMoreBtn');
            const readLessBtn = document.getElementById('readLessBtn');
            const collapsedView = document.getElementById('collapsedView');
            const expandedView = document.getElementById('expandedView');

            if (readMoreBtn && readLessBtn && collapsedView && expandedView) {
                readMoreBtn.addEventListener('click', function () {
                    collapsedView.style.display = 'none';
                    expandedView.style.display = 'block';
                    // Optional: scroll to the start of message
                });

                readLessBtn.addEventListener('click', function () {
                    expandedView.style.display = 'none';
                    collapsedView.style.display = 'block';
                    const chairmanName = document.querySelector('.chairman-name');
                    if (chairmanName) {
                        chairmanName.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            }
        });
    </script>
@endsection('content')