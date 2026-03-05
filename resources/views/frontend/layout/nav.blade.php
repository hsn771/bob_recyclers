<header class="sticky-top">

  @push('styles')
    <style>
      .top-header-premium {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--brand-color) 100%);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding: 6px 0;
        min-height: 40px;
      }

      /* Main navbar green background with white text */
      .dektop-nav {
        background-color: var(--brand-color) !important;
      }

      .dektop-nav .nav-link {
        color: #fff !important;
      }

      .dektop-nav .nav-link:hover {
        color: #fff !important;
        border-bottom: 3px solid #ffc107;
        padding-bottom: 2px;
      }

      .dektop-nav .sub-nav li a {
        color: var(--brand-color) !important;
      }

      .top-header-brand {
        letter-spacing: 2px;
        color: #f1f8f6;
      }

      .text-accent {
        color: #ffc107;
        /* Warm yellow/gold accent */
      }

      .contact-link {
        color: rgba(255, 255, 255, 0.85) !important;
        transition: all 0.3s ease;
        text-decoration: none !important;
      }

      .contact-link:hover {
        color: #fff !important;
        transform: translateY(-1px);
      }

      .contact-link i {
        font-size: 0.9rem;
      }

      .pulse-indicator {
        width: 8px;
        height: 8px;
        background: #4ade80;
        border-radius: 50%;
        box-shadow: 0 0 0 rgba(74, 222, 128, 0.4);
        animation: pulse 2s infinite;
      }

      @keyframes pulse {
        0% {
          transform: scale(0.95);
          box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.7);
        }

        70% {
          transform: scale(1);
          box-shadow: 0 0 0 10px rgba(74, 222, 128, 0);
        }

        100% {
          transform: scale(0.95);
          box-shadow: 0 0 0 0 rgba(74, 222, 128, 0);
        }
      }

      .tracking-wider {
        letter-spacing: 0.1em;
      }

      .sister-concern-premium {
        height: 50px;
        background-color: var(--brand-color);
        box-shadow: inset 0 -5px 15px rgba(0, 0, 0, 0.05);
      }

      .project-tab {
        color: rgba(255, 255, 255, 0.9) !important;
        font-weight: 500;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: relative;
        padding: 4px 0;
        transition: all 0.3s ease;
      }

      .project-tab:hover {
        color: #fff !important;
      }

      .project-tab::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #ffc107;
        transition: width 0.3s ease;
      }

      .project-tab:hover::after {
        width: 100%;
      }

      .sister-logo-box {
        background: #fff;
        padding: 4px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 35px;
        transition: transform 0.3s ease;
      }

      .sister-logo-box:hover {
        transform: scale(1.1);
      }

      .sister-logo-box img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
      }

      .logo-container-premium {
        position: absolute;
        z-index: 200;
        background-color: #fff;
        top: 0;
        left: 0;
        /* spans both top-header (~40px) + navbar (~37px) = ~77px total */
        height: 77px;
        width: 130px;
        display: flex;
        align-items: center;
        justify-content: center;

        transition: all 0.3s ease;
        padding: 8px 12px;
      }

      .logo-container-premium img {
        width: 100%;
        height: 100%;
        object-fit: contain;
      }

      .logo-container-premium:hover {
        box-shadow: 6px 0 20px rgba(0, 0, 0, 0.18), 0 12px 28px rgba(0, 0, 0, 0.14);
      }

      /* Push both header and navbar content past the logo */
      .top-header-premium .container,
      .dektop-nav .container {
        padding-left: 145px !important;
      }

      /* Simple hide for small screens if too crowded */
      @media (max-width: 576px) {
        .top-header-contacts span {
          font-size: 10px;
        }
      }
    </style>
  @endpush

  <div class="top-header-premium text-white">
    <div class="container d-flex justify-content-center align-items-center">
      <div class="top-header-brand d-flex align-items-center">
        <div class="pulse-indicator me-2"></div>
        <span class="small fw-bold text-uppercase tracking-wider">Green Shipyard</span>
      </div>
    </div>
  </div>


  <nav class="navbar navbar-expand-sm navbar-white dektop-nav" style="background-color: var(--brand-color);">
    <div class="container p-0">
      @php
        $menus = App\Models\FrontMenu::where('parent_id', 0)->orderBy('rank')->get();
      @endphp
      @foreach($menus as $menu)
        <ul class="navbar-nav ms-0">

          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ $menu->url }}">{{ $menu->name }}"</a>
          </li>--}}
          <li class="nav-item">
            <a class="nav-link"
              href="{{ $menu->href == "#" ? 'javascript:void(0)' : url($menu->href) }}">{{ $menu->name }}</a>
            @if($menu->hasChildren())
              <ul class="sub-nav">
                @foreach($menu->children as $child)
                  <li><a href="{{ url($child->href) }}">{{ $child->name }}</a></li>
                @endforeach
              </ul>
            @endif
          </li>
      @endforeach
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{route('sister')}}">Sister Concern</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('yard')}}">Yard</a>
          <ul class="sub-nav">
            <li><a href="{{route('yard')}}">Modaration of Yard</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('overview')}}">Industry</a>
          <ul class="sub-nav">
            <li><a href="{{route('overview')}}">Ship Breaking Industry</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('track')}}">Our Project</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('management')}}">Our Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('gallery')}}">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
        </li> --}}
      </ul>
    </div>
  </nav>
  <!-- Sister concern -->
  {{-- <div class="sister-concern-premium d-none d-lg-block">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-7">
          <div class="d-flex ms-5 ps-5" id="project-head">
            <a href="{{route('trackRecord')}}" class="project-tab me-4">Upcoming Project</a>
            <a href="{{route('trackRecord')}}" class="project-tab me-4">Recent Project</a>
            <a href="{{route('trackRecord')}}" class="project-tab">Completed Project</a>
          </div>
        </div>
        <div class="col-lg-5 d-flex justify-content-end align-items-center">
          <div class="sister-logos-container d-flex align-items-center">
            <span class="text-white small fw-bold me-3 text-uppercase opacity-75"
              style="font-size: 0.7rem; letter-spacing: 1px;">Sister Concerns</span>
            <div class="d-flex gap-2">
              @foreach ($sister as $sisterLogo)
              <div class="sister-logo-box">
                <img src="{{ asset('uploads/sisterLogo/' . $sisterLogo->image) }}" alt="Sister Concern Logo" />
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  <!-- Logo -->
  <div class="logo-container-premium d-none d-lg-block">
    <a href="{{route('home')}}">
      <img src="{{ asset('uploads/companyInfo/' . $info->image) }}" alt="Logo" width="100px" class="img-fluid" />
    </a>
  </div>
</header>

<section class="brand-bg mobile-nav shadow sticky-top">
  <div class="container py-1">
    <div class="row">
      <div class="col">
        <a href="{{route('home')}}"><img {{-- src="{{asset('asset/images/Mask group.png')}}" --}}
            src="{{ asset('uploads/companyInfo/' . $info->image) }}" alt="Logo" width="100px" class="img-fluid" /></a>
      </div>
      <div class="col">
        <div class="d-flex justify-content-end">
          <i class="bi bi-list cursor-point" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile Offcanvas Navigation -->
  <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header d-flex justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <ul class="navbar-nav ms-2 mt-2 text-center mobile-nav-view">
      @foreach($menus as $menu)
        <li class="nav-item">
          <a class="nav-link"
            href="{{ $menu->href == "#" ? 'javascript:void(0)' : url($menu->href) }}">{{ $menu->name }}</a>
          @if($menu->hasChildren())
            <ul class="sub-nav">
              @foreach($menu->children as $child)
                <li><a href="{{ url($child->href) }}">{{ $child->name }}</a></li>
              @endforeach
            </ul>
          @endif
        </li>
      @endforeach
      <li class="nav-item">
        <a class="nav-link border m-3 bg-light" href="{{route('gallery')}}">Our All Project</a>
      </li>
    </ul>
  </div>
  <!-- mobile offnav  -->
  {{-- <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header d-flex justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <ul class="navbar-nav ms-2 mt-2 text-center mobile-nav-view">
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link cursor-point">Who we are</a>
        <ul class="sub-nav">
          <li><a href="{{route('about')}}">About Us</a></li>
          <li><a href="{{route('chairman')}}">Chairman Message</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('sister')}}">Sister Concern</a>
      </li>
      <li class="nav-item">
        <a class="nav-link cursor-point">Yard</a>
        <ul class="sub-nav">
          <li><a href="{{route('yard')}}">Modaration of Yard</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link cursor-point">Industry</a>
        <ul class="sub-nav">
          <li><a href="{{route('overview')}}">Ship Breaking Industry</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('trackRecord')}}">Our Project</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('management')}}">Our Team</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('gallery')}}">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link border m-3 bg-light" href="{{route('gallery')}}">Our All Project</a>
      </li>
    </ul>
  </div> --}}
</section>