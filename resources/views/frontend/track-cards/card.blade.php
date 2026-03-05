<section class="brand-bg" id="slider-zindex">
    <!-- backgroud image -->
    <div class="middle-bg">
      <!-- counter start -->
      <div class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-sm-7">
              <h2 class="counter-title brand-text-color">
                Track Record of Scrap Ship Import
              </h2>
              <p class="counter-text brand-text-color mt-2">
                {{$card->short_description}}
              </p>
              <a href="{{route('trackRecord')}}" class="project-btn cursor-point">Project</a>
            </div>
            <div class="col-sm-5" id="counter-mobile">
              <div class="row">
                <div class="col-sm-6">
                  <div class="bg-white shadow text-center p-4 rounded-4 mb-3">
                    <h3 class="brand-text-color">{{$card->number_1}}</h3>
                    <p class="brand-text-color">{{$card->title_1}}</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="bg-white shadow text-center p-4 rounded-4 mb-3">
                    <h3>{{$card->number_2}}</h3>
                    <p>{{$card->title_2}}</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="bg-white shadow text-center p-4 rounded-4 mb-3">
                    <h3>{{$card->number_3}}</h3>
                    <p>{{$card->title_3}}</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="bg-white shadow text-center p-4 rounded-4 mb-3">
                    <h3>{{$card->number_4}}</h3>
                    <p>{{$card->title_4}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- counter end -->
    </section>



