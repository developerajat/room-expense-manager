@extends('layouts.admin')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">User Information</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ $user->name }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="col-auto">
                                            <img alt="Image placeholder" src="{{ $user->profile_photo_url }}" class="avatar rounded-circle">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="form-control-label col-md-3" for="input-name">Name:</label>
                                            <div class="col-md-9">
                                                {{ $user->name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="form-control-label col-md-3" for="input-email">Email Address:</label>
                                            <div class="col-md-9"> {{ $user->email }} </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="form-control-label col-md-3" for="input-last-name">Phone Number:</label>
                                            <div class="col-md-9">
                                                {{ $user->country_code }} {{ $user->phone_number }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="form-control-label col-md-3">Address:</label>
                                            <div class="col-md-9">
                                                {{ $user->address ?? '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="form-control-label col-md-3">Gender:</label>
                                            <div class="col-md-9">
                                                {{ $user->gender == 1 ? 'Male':'Female' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
