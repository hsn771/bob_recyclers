<style>
  .footer-corporate {
    background: #224e3c;
    font-size: 14px;
  }

  .footer-logo-small {
    max-width: 140px;
  }

  .footer-contact {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 15px;
  }

  @media (min-width: 992px) {
    .footer-contact {
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: flex-end;
      align-items: center;
      gap: 25px;
    }
  }

  .contact-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    color: #d1d5db;
    text-align: left;
  }

  @media (min-width: 992px) {
    .contact-item {
      align-items: center;
      white-space: nowrap;
    }
  }

  .contact-item i {
    font-size: 14px;
    color: #9ca3af;
    min-width: 20px;
    margin-top: 4px;
  }

  @media (min-width: 992px) {
    .contact-item i {
      margin-top: 0;
    }
  }

  .footer-social {
    display: flex;
    gap: 12px;
    margin-top: 10px;
  }

  @media (min-width: 992px) {
    .footer-social {
      margin-top: 0;
      margin-left: 10px;
    }
  }

  .footer-social a {
    color: #d1d5db;
    margin-left: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border: 1px solid rgba(209, 213, 223, 0.3);
    border-radius: 50%;
    text-decoration: none;
  }

  .footer-social a:hover {
    color: #ffffff;
    border-color: #ffffff;
    background: rgba(255, 255, 255, 0.1);
  }

  .footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding: 15px 0;
    font-size: 13px;
    background-color: #132c22;
    text-align: center;
  }

  @media (min-width: 768px) {
    .footer-bottom {
      padding: 10px 0;
      background-color: #132c22;
      text-align: left;
    }
  }

  .footer-bottom a {
    color: #d1d5db;
    text-decoration: none;
  }

  .footer-bottom a:hover {
    color: #fff;
  }
</style>

<footer class="footer-corporate text-white">
  <div class="container py-4">
    <div class="row align-items-center">

      <!-- Logo -->
      <div class="col-lg-4 col-md-12 mb-3 mb-lg-0 text-center text-lg-start">
        @if($info->footer_logo)
          <img src="{{ asset('uploads/companyInfo/' . $info->footer_logo) }}" alt="Footer Logo" class="footer-logo-small">
        @else
          <img src="{{ asset('uploads/companyInfo/' . $info->image) }}" alt="Footer Logo" class="footer-logo-small">
        @endif
      </div>

      <!-- Contact Info -->
      <div class="col-lg-8 col-md-12">
        <div class="footer-contact">

          <div class="contact-item">
            <i class="fas fa-map-marker-alt"></i>
            <span>{{ $info->location }}</span>
          </div>

          <div class="contact-item">
            <i class="fas fa-envelope"></i>
            <span>{{ $info->email_address }}</span>
          </div>

          <div class="contact-item">
            <i class="fas fa-phone"></i>
            <span>{{ $info->contact_no }}</span>
          </div>

          <!-- Social -->
          <div class="footer-social">
            @if($info->facebook)
              <a href="{{ $info->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            @endif
            @if($info->twitter)
              <a href="{{ $info->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
            @endif
            @if($info->linkedin)
              <a href="{{ $info->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            @endif
            @if($info->youtube)
              <a href="{{ $info->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
            @endif
          </div>

        </div>
      </div>

    </div>
  </div>

  <div class="footer-bottom">
    <div class="container d-flex flex-wrap justify-content-md-between justify-content-center gap-2">
      <small>© MSRLBOB. All rights reserved.</small>
      <small>
        Designed & Developed by
        <a href="http://muktodharaltd.com/" target="_blank">
          Muktodhara Technology Limited
        </a>
      </small>
    </div>
  </div>
</footer>