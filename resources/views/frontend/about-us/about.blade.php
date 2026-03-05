<section class="container">
    <div class="row">
      <div class="col-md-12 col-lg-6 mb-3">
        <img
          class="img-fluid rounded-4 shadow"
          src="{{ asset('uploads/aboutUs/' . $about->image) }}"
          alt="Office Desk"
        />
      </div>
      <div class="col-md-12 col-lg-6 about-right brand-text-color ps-3">
        <h4 class="pt-3 pb-3">About Us</h4>
        <p>
        {!!$about->about_us_text!!}
        </p>
        <a href="{{route('about')}}" class="btn btn-green m-1 border rounded-pill px-4"
          >Read More</a
        >
      </div>
    </div>
  </section>
