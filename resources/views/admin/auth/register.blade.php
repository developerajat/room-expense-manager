@extends('layouts.admin_auth')
@section('content')
<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-4 py-lg-4 pt-lg-3">
      <div class="container">
        <div class="header-body text-center mb-8">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Create an account</h1>
              <!-- <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p> -->
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3"><small>Sign up with</small></div>
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
            <div class="card-body px-lg-5 py-lg-2 mt-0">
              <div class="text-center text-muted mb-4  mt-0">
                <small>Or sign up with credentials</small>
              </div>
              <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group user_profile">
                    <div class="user_profile_img">
                        <figure>
                            <img class="profile-image" src="{{ asset('assets/img/user.png') }}" alt="user">
                        </figure>
                    </div>
                    <div class="profile_camera">
                        <img src="{{ asset('assets/img/edit.png') }}">
                        <input class="upload_file" id="file-input" type="file" name="profile_photo" accept="image/*">
                    </div>
                    @error('profile_photo')
                        <span class="validation invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="name-box">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input required type="text" class="form-control" placeholder="First Name"
                      name="first_name" value="{{ old('first_name') }}">
                      <input required type="text" class="form-control" placeholder="Last Name"
                      name="last_name" value="{{ old('last_name') }}">
                    </div>
                    @error('first_name')
                        <span class="validation-error text-danger">{{ $message }}</span>
                    @enderror
                    @error('last_name')
                        <span class="validation-error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Email" name="email"
                    value="{{ old('email') }}" required>
                    @error('email')
                        <span class="validation-error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="mob-box">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                      </div>
                      <input class="form-control country_code" name="country_code" placeholder="+91" type="number" value="91">
                      <input required type="text" class="form-control phone_number" placeholder="Phone Number"
                      name="phone_number" value="{{ old('phone_number') }}" maxlength="10">
                    </div>
                    @error('phone_number')
                        <span class="validation-error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                    </div>
                    <input class="form-control room_number" maxlength="3" placeholder="Room no" type="text" name="room_number" value="{{ old('room_number') }}" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" required type="password" class="form-control" placeholder="Password"
                    name="password" value="{{ old('password') }}">
                    @error('password')
                        <span class="validation-error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input required type="password" class="form-control" placeholder="Confirm Password"
                    name="password_confirmation" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                        <span class="validation-error text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700" id="strength"></span></small></div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center mb-3">
                  <button type="submit" class="btn btn-primary mt-2">Create account</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-12 text-center">
            <small class="h4">Already have an account? <a href="{{route('loginForm')}}" class="text-light"> Login</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('extra_scripts')
<script>
  $(document).ready(function() {
    $("#password").on("keypress keyup keydown", function() {
        var pass = $(this).val();
        $("#strength").text(checkPassStrength(pass));

    });
    $('body').on('change', '.upload_file', function(event) {
        $('.profile-image').attr('src', URL.createObjectURL(event.target.files[0]));
    });
    $(".phone_number").on('input', function(value) {
        this.value = this.value.replace(/\D/g,'');
    });
    $(".room_number").on('input', function(value) {
        this.value = this.value.replace(/\D/g,'');
    });
  });

  $(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");

    var input = $($(this).attr("toggle"));

    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
  });

</script>
@endsection