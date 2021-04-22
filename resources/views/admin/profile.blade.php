@extends('layouts.admin')
@section('content')

    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Profile </h3>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('profileUpdate') }}" method="POST">
                    @csrf
                    <!-- <h6 class="heading-small text-muted mb-4">User information</h6> -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="pr_man">
                                    <figure>
                                        <img class="image-profile" src="{{ Auth::user()->profile_photo_url }}"
                                            width="150px;" />
                                    </figure>
                                </div>
                                {{-- <div class="profile_camera">
                                    <figure> <img src="{{ asset('assets/img/editpencil.svg') }}" /> </figure>
                                </div> --}}
                                <div class="form-group">

                                    <label class="form-control-label" for="input-profile">Profile Picture</label>
                                    <input type="file" id="input-profile" class="form-control upload_file" accept="image/*"
                                        placeholder="profile_Photo" name="profile_photo">
                                        @error('profile_photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email Address</label>
                                    <input readonly type="email" id="input-email"
                                        class="form-control" name="email" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">First Name</label>
                                    <input type="text" id="input-first-name" name="first_name" class="form-control"
                                        placeholder="First Name" value="{{ old('first_name', $user->first_name) }}">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Last Name</label>
                                    <input type="text" id="input-last-name" class="form-control" name="last_name"
                                        placeholder="Last Name" value="{{ old('last_name', $user->last_name ?? '') }}">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-phone-number">Phone Number</label>
                                    <input type="number" id="input-phone-number" class="form-control" name="phone_number"
                                        placeholder="Phone Number" value="{{ old('phone_number', $user->phone_number ?? '') }}">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- @if($errors->any())
                        {!! implode('', $errors->all('<div><span class="validation invalid-feedback" role="alert"><strong>:message</strong></span></div>')) !!}
                    @endif -->
                    <button type="submit" class="btn btn-primary my-4"> Update </button>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->
@endsection
@section('extra_scripts')
    <script>
        $(document).ready(function() {
            $('.pr_man').hide();
            $('body').on('change', '.upload_file', function(event) {
                $('.image-profile').attr('src', URL.createObjectURL(event.target.files[0]));
                $('.pr_man').show();
                $('.upload_file').hide();
            });
        });

    </script>
@endsection
