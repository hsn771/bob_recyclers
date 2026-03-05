@extends('frontend.layout.app')
@section('content')
@include('frontend.layout.nav')

<section class="conact-page-top">
      <div class="overlay">
        <div class="container pt-5 d-flex align-items-end">
          <p><span>C</span>ontact Us</p>
        </div>
      </div>
    </section>
    <!-- page top View end -->
    <!-- Contact Page Body start -->
    <section class="container my-4 brand-text-color">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="p-3 shadow mb-4 rounded">
            <div class="addressnicon contact-body my-4">
              <p>Connect with us</p>
              <div class="mb-4">
                <i class="fas fa-map-marker-alt pe-2"></i>
                <span >{{ $info->location }}</span>
              </div>
              <div class="mb-4">
                <i class="fas fa-envelope pe-2"></i>
                <span>{{ $info->email_address }}</span>
              </div>
              <div class="mb-4">
                <i class="fas fa-phone pe-2"></i> <span>{{ $info->contact_no }}</span>
              </div>
            </div>
          </div>

          <div class="ratio ratio-16x9">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.6246378425403!2d91.7139816!3d22.480735699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd18bb5306103%3A0x7be2b41d84ad8a05!2sMahinur%20Ship%20Recycling%20Limited!5e0!3m2!1sbn!2sbd!4v1711181041566!5m2!1sbn!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 contact-form p-4">
          <p>Message Us</p>
          <div>
            <form method="POST" action="{{route('contact.store')}}">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Full Name</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputEmail1"
                  name="full_name"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Email</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputPassword1"
                  name="email"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Mobile Number</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputPassword1"
                  name="phone"
                />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"
                  >Your Message</label
                >
                <textarea
                  class="form-control"
                  id="exampleFormControlTextarea1"
                  rows="3"
                  name="message"
                ></textarea>
              </div>
               <button type="submit" class="btn btn-green m-1 border rounded-pill px-4">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>

@include('frontend.layout.footer')
@endsection('content')