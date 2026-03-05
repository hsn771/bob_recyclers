@extends('frontend.layout.app')
@section('content')
@include('frontend.layout.nav')
<section class="conact-page-top">
      <div class="overlay">
        <div class="container pt-5 d-flex align-items-end">
          <p><span>A</span>pply Job</p>
        </div>
      </div>
    </section>
    <!-- page top View end -->
    <!-- Contact Page Body start -->
    <section class="container my-4 brand-text-color">
      <div class="row">
        <div class="col-sm-12 col-md-6 pt-4">
          <h4>{{ $circular->position}}</h4>
           <p>{!! $circular->circular !!}</p>
        </div>
        <div class="col-sm-12 col-md-6 contact-form p-4">
          <p>Personal Information</p>
          <div>
            <form method="POST" action="{{route('career.store')}}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="circular_id" value="{{ $circular->id }}">
               <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Position</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputEmail1"
                  name="position"
                  value={{ $circular->position}}
                  readonly
                  />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Full Name</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputEmail1"
                  name="full_name"
                  value="{{ old('full_name')}}"
                  aria-describedby="emailHelp"
                />
                 @if($errors->has('full_name'))
                      <span class="text-danger"> {{ $errors->first('full_name') }}</span>
                  @endif
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
                  value="{{ old('email')}}"
                />
                 @if($errors->has('email'))
                      <span class="text-danger"> {{ $errors->first('email') }}</span>
                  @endif
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Contact Number</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputPassword1"
                  name="phone"
                  value="{{ old('phone')}}"
                />
                 @if($errors->has('phone'))
                      <span class="text-danger"> {{ $errors->first('phone') }}</span>
                  @endif
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"
                  >Cover Letter</label
                >
                <textarea
                  class="form-control"
                  id="exampleFormControlTextarea1"
                  rows="3"
                  name="cover_letter"
                >{{old('cover_letter')}}</textarea>
                 @if($errors->has('cover_letter'))
                      <span class="text-danger"> {{ $errors->first('cover_letter') }}</span>
                  @endif
              </div>
              <div class="form-group mb-3">
                  <label for="file">Upload CV (PDF)</label>
                  <input type="file" id="file" class="form-control" name="file" accept=".pdf" required>
                  @if($errors->has('file'))
                      <span class="text-danger"> {{ $errors->first('file') }}</span>
                  @endif
              </div>
               <button type="submit" class="btn btn-green m-1 border rounded-pill px-4">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>
@include('frontend.layout.footer')
@endsection('content')