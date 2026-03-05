@extends('backend.layout.appAuth')
@section('title','Sign In')
@section('content')
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            {{-- <div class="auth-logo">
                <a href="#"><img src="{{asset('assets/images/logo/logo.svg')}}" alt="Logo"></a>
            </div> --}}
            <h1 class="auth-title">Log in.</h1>
            {{-- <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p> --}}
            @if(Session::has('response'))
                {!!Session::get('response')['message']!!}
            @endif
            <form action="{{route('login.check')}}" method="post">
                  @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input name="username" value="{{old('username')}}" type="text" class="form-control form-control-xl" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @if($errors->has('username'))
                        <small class="d-block text-danger">
                            {{$errors->first('username')}}
                        </small>
                    @endif
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
                {{-- <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div> --}}
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Log in</button>
            </form>
            <div class="text-center mt-2 text-lg fs-4">
                <p class="text-gray-600">Don't have an account? <a href="{{route('register')}}" class="font-bold">Sign
                        up</a>.</p>
                {{-- <p><a class="font-bold" href="#">Forgot password?</a>.</p> --}}
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

@endsection('content')    