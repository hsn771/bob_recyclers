<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="MSRL is a leading green ship recycling company in Chittagong, Bangladesh. Safe and eco-friendly scrap vessel dismantling since 2016.">
    <meta name="keywords" content="ship recycling Bangladesh, scrap vessel Chittagong, green shipyard, MSRL, ship breaking Sitakunda">
    <title>MSRL - Green Ship Recycling | Chittagong, Bangladesh</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @stack('styles')
</head>

<body>

    @yield('content')

    <!-- Go To Top Button -->
    <div id="goToTop" class="go-to-top">
        <i class="fas fa-arrow-up-long"></i>
        <span>Go To Top</span>
    </div>

    <style>
        .go-to-top {
            position: fixed;
            bottom: 60px;
            right: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            z-index: 9999;
            color: #0d1612ff;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.4s ease;
            opacity: 0;
            visibility: hidden;
            user-select: none;
        }

        .go-to-top.show {
            opacity: 1;
            visibility: visible;
            bottom: 80px;
        }

        .go-to-top i {
            font-size: 24px;
            transition: transform 0.3s ease;
            transform: scaleX(0.6);
            /* slim look */
        }

        .go-to-top span {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
        }

        .go-to-top:hover {
            color: #3fc49c;
        }

        .go-to-top:hover i {
            transform: scaleY(2.4) translateY(-5px);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const goToTop = document.getElementById('goToTop');

            window.addEventListener('scroll', function () {
                if (window.scrollY > 300) {
                    goToTop.classList.add('show');
                } else {
                    goToTop.classList.remove('show');
                }
            });

            goToTop.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>

    <script src="{{asset('asset/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    @stack('scripts')
</body>

</html>