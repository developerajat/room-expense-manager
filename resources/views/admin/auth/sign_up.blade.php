@extends('layouts.admin_auth')
@section('content')
    <div class="main-content login">
        <!-- Header -->
        <div class="header">
            <div class="container">
                <div class="header-body text-center mb-1">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Complete Your Profile!</h1>
                            <!-- <p class="text-lead text-white">
                                <img src="{{ asset('assets/img/brand/new-logo.png') }}" class="navbar-brand-img" alt="...">
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
        <!-- Page content -->
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <div class="card bg-secondary border-0 mb-0">

                        <div class="card-body px-lg-5 py-lg-3">
                            <div class="text-center text-muted mb-4">
                                <small>SignUp With Your Details</small>
                            </div>
                            <form action="{{ route('user.register') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Profile Photo</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                        name="profile_photo" accept="image/*">
                                        @error('profile_photo')
                                                <span class="validation-error text-danger">{{ $message }}</span>
                                            @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="required">First Name</label>
                                        <input required type="text" class="form-control" placeholder="First Name"
                                            name="first_name" value="{{ old('first_name', $invite->first_name ?? '') }}">
                                            @error('first_name')
                                                <span class="validation-error text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Last Name</label>
                                        <input required type="text" class="form-control" placeholder="Last Name"
                                            name="last_name" value="{{ old('last_name', $invite->last_name ?? '') }}">
                                            @error('last_name')
                                                <span class="validation-error text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="required">Email</label>
                                        <input type="email" class="form-control" placeholder="email" name="email"
                                            value="{{ old('email', $invite->email ?? '') }}" readonly>
                                            @error('email')
                                                <span class="validation-error text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Phone Number</label>
                                        <input required type="number" class="form-control" placeholder="Phone Number"
                                            name="phone_number" value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                                <span class="validation-error text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="required">Password</label>
                                        <input required type="password" class="form-control" placeholder="Password"
                                            name="password" value="{{ old('password') }}">
                                            @error('password')
                                                <span class="validation-error text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Confirm Password</label>
                                        <input required type="password" class="form-control" placeholder="Confirm Password"
                                            name="password_confirmation" value="{{ old('password_confirmation') }}">
                                            @error('password_confirmation')
                                                <span class="validation-error text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder="Address" name="address"
                                            value="{{ old('address', $invite->address ?? '') }}">
                                            @error('address')
                                                <span class="validation-error text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Rather Not Say</option>
                                        </select>
                                        @error('gender')
                                            <span class="validation-error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="invite_id" value="{{ $invite->id ?? '' }}">
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary w-30">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
