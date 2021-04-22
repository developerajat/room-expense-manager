@extends('layouts.admin_auth')
@section('content')
<div class="main-content login">
    <!-- Header -->
    <div class="header">
      <div class="container">
        <div class="header-body text-center mb-1">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <!-- <h1 class="text-white">Welcome to Mohiwalz!</h1> -->
              <!-- <h2 class="text-white">Expense Manager</h2> -->
              <p class="text-lead text-white">
                  <img src="{{ asset('assets/img/logo1.png') }}" class="navbar-brand-img" alt="...">
              </p>
            </div>
          </div>
        </div>
      </div>
   
    </div>
    <!-- Page content -->
    <div class="container  pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
          <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
              <div class="btn-wrapper text-center mb-0">
                <a href="{{ route('auth.facebook') }}" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{asset('assets/img/facebook.svg')}}"></span>
                  <span class="btn-inner--text">Facebook</span>
                </a>
                <a href="{{ route('auth.google') }}" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{asset('assets/img/google.svg')}}"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-3">
              <div class="text-center text-muted mb-4">
                <small>Or sign in with your credentials</small>
              </div>
              <form role="form" method="post" action="{{route('login')}}">
              @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email" type="email" value="{{old('email')}}" required>
                  </div>
                    @error('email')
                        <span class="validation invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                    </div>
                    @error('password')
                        <span class="validation invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Keep me signed in</span>
                  </label>
                </div>
                @if(Session::has('error'))
                    <span class="validation invalid-feedback" role="alert">
                            <strong>{{ Session::get("error") }}</strong>
                    </span>
                @endif
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Sign In</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
          <div class="col-6">
              <a href="{{route('registerForm')}}" class="text-light"><small>Create new account</small></a>
            </div>
            <div class="col-6 text-right">
                <a href="{{route('forgetForm')}}" class="text-light"><small>Forgot Password?</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
