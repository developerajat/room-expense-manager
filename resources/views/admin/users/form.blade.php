@extends('layouts.admin')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        @php $name = isset($user) ? 'Update ' : 'Invite'; @endphp
                        <h6 class="h2 text-white d-inline-block mb-0">{{ $name }} User</h6>
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
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    {{-- <h3 class="mb-0">Edit profile </h3> --}}
                                    <div class="col-12 text-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">
                                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                                        </a>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger m-2">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            @php $action = isset($user) ? route('users.update', [$user->id]) : route('users.store'); @endphp
                            <form class="form" method="post" action="{{ $action }}" enctype="multipart/form-data">
                                @if (isset($user)) @method('PUT') @endif
                                @csrf
                                <!-- <h6 class="heading-small text-muted mb-4">User information</h6> -->
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label required" for="input-first-name">First
                                                    Name</label>
                                                <input type="text" id="input-first-name" name="first_name"
                                                    class="form-control" placeholder="First Name"
                                                    value="{{ old('first_name', $user->first_name ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label required" for="input-last-name">Last
                                                    Name</label>
                                                <input type="text" id="input-last-name" class="form-control"
                                                    name="last_name" placeholder="Last Name"
                                                    value="{{ old('last_name', $user->last_name ?? '') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label required" for="input-email">Email</label>
                                                <input type="email" id="input-email" class="form-control" name="email"
                                                    placeholder="Email" value="{{ old('email', $user->email ?? '') }}">
                                            </div>
                                        </div>
                                        {{--<div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label required">Manager</label>
                                                @if (count($users))
                                                    <select required class="form-control" aria-label="Sales Manager"
                                                        name="sales_manager_id">
                                                        <option value="" hidden selected>Select Manager</option>
                                                        @foreach ($users as $agent)
                                                            <option
                                                                {{ ($user->sales_manager_id ?? old('sales_manager_id')) == $agent->id ? 'selected' : '' }}
                                                                value="{{ $agent->id }}">{{ $agent->name ?? '' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif

                                            </div>
                                        </div>--}}
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                </div>
                                <button  type="submit" class="btn btn-primary my-4"> {{$name}} </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
