<section class="container py-5 brand-text-color bg-white">
    <div class="row">
      <div class="col-md-12 col-lg-6 buyers mb-4">
        <h3>Our Prospective Buyers</h3>
        <p>
          MSRL has an existing and reliable customer base. The list of the
          major buyers.
        </p>
      </div>
      <div class="col-md-12 col-lg-6 buyers-logo text-center">
        @foreach ($buyerLogos as $buyerLogo)
        <img class="img-fluid" src="{{ asset('uploads/buyerLogo/' . $buyerLogo->image) }}" alt="{{ $buyerLogo->buyer_name }}" />
        @endforeach
      </div>
    </div>
  </section>
