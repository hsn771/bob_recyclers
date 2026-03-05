@extends('backend.layout.appAuth')
@section('title','Sign Up')
@section('content')
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            {{-- <div class="auth-logo">
                <a href="index.html"><img src="{{asset('assets/images/logo/logo.svg')}}" alt="Logo"></a>
            </div> --}}
            <h1 class="auth-title">Sign Up</h1>
            {{-- <p class="auth-subtitle mb-5">Input your data to register to our website.</p> --}}
            @if(Session::has('response'))
                {!!Session::get('response')['message']!!}
            @endif
            <form action="{{route('register.store')}}" method="post">
                @csrf

                 <div class="form-group position-relative has-icon-left mb-4">
                    <input name="FullName" value="{{old('FullName')}}" type="text" class="form-control form-control-xl" placeholder="FullName">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                     @if($errors->has('FullName'))
                        <small class="d-block text-danger">
                            {{$errors->first('FullName')}}
                        </small>
                    @endif
                </div>
                 <div class="form-group position-relative has-icon-left mb-4">
                    <input name="PhoneNumber" value="{{old('PhoneNumber')}}" type="text" class="form-control form-control-xl" placeholder="Phone Number">
                    <div class="form-control-icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                     @if($errors->has('PhoneNumber'))
                        <small class="d-block text-danger">
                            {{$errors->first('PhoneNumber')}}
                        </small>
                    @endif
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input name="EmailAddress" value="{{old('EmailAddress')}}" type="text" class="form-control form-control-xl" placeholder="Email">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
               
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                     @if($errors->has('password'))
                        <small class="d-block text-danger">
                            {{$errors->first('password')}}
                        </small>
                    @endif
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="password_confirmation" class="form-control form-control-xl" placeholder="Confirm Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                     @if($errors->has('password_confirmation'))
                        <small class="d-block text-danger">
                            {{$errors->first('password_confirmation')}}
                        </small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-1">Sign Up</button>
            </form>
            <div class="text-center mt-2 text-lg fs-4">
                <p class='text-gray-600'>Already have an account? <a href="{{route('login')}}" class="font-bold">Log
                        in</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

 @endsection('content')  
