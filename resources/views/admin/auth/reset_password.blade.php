@extends('layouts.admin_auth')
@section('content')
<div class="main-content login">
    <!-- Header -->
    <div class="header">
      <div class="container">
        <div class="header-body text-center mb-1">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5 mt-5">
              <p class="text-lead text-white"> &nbsp;
                  <img src="{{ asset('assets/img/brand/new-logo.png') }}" class="navbar-brand-img" alt="...">
              </p>
              <h1 class="text-white">Reset Password!</h1>
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

            <div class="card-body px-lg-5 py-lg-3">
              <div class="text-center text-muted mb-4">
                <!-- <small>Sign in with credentials</small> -->
              </div>
              <form role="form" method="post" action="{{route('password.reset', $token)}}">
              @csrf
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="New Password" type="password" id="password" name="password" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" required>
                  </div>
                  @error('password')
                      <span class="validation invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  @error('password_confirmation')
                      <span class="validation invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700" id="strength"></span></small></div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Submit</button>
                </div>
              </form>
            </div>
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
  });

</script>
@endsection