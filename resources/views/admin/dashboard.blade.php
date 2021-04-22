@extends('layouts.admin')
@section('content')

<div class="container-fluid">
<div class="page-title">
 <h2>Dashboard</h2>
</div>
</div>
<div class="container-fluid">
<div class="welcome-screen">
   <div class="welcome-screen__text">
     <h1>Welcome To Expense Manager</h1>
     <p>You are changing someone’s vision into reality!</p>
   </div>
   <div class="welcome-img">
   <figure> <img src="{{ asset('assets/img/brand/27380815.svg') }}" ></figure>
   </div>
</div>
</div>
    <div class="header pb-6 pt-5">
        <div class="container-fluid">
            <div class="header-body">
               
                <div class="row mb-4">
                    <div class="col-md-12 mt-2">
                        <form action="{{ route('dashboard') }}" method="get">
                            <div class="row no-gutters">
                                <!-- <div class="col-lg-3">
                                    <h3 class="h2 text-white">Dashboard</h3>
                                </div> -->
                                <div class="dashr-sec no-gutters">
                                <div class="col-lg-2">
                                  <label class="input-label">From</label>
                                    <input class="form-control" type="date" id="fromDate" name="from" 
                                        value="{{ request()->get('from') }}">
                                </div>
                                <div class="col-lg-2 mx-2">
                                <label class="input-label">To</label>
                                    <input class="form-control" type="date" id="toDate" name="to" 
                                        value="{{ request()->get('to') }}">
                                </div>
                                <div class="dashr-btn">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <a class="btn btn-clear" href="{{route('dashboard')}}">Clear</a>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               
                <!-- Card stats -->
                <div class="row dash-usrbx">
                    <div class="col-xl-6 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <a href="{{ route('users.index') }}">
                                <div class="card-body dashboard-card">

                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total Users</h5>
                                            <span class="h2 font-weight-bold mb-0 total-span">{{ $totalUsers ?? 0 }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="fa fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        {{-- <span class="text-success mr-2"><i
                                                class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span> --}}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <a href="{{ route('invoices.index') }}">
                                <div class="card-body dashboard-card">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total Invoices</h5>
                                            <span class="h2 font-weight-bold mb-0 total-usr-span">{{ $totalInvoices ?? 0}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow ">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        {{-- <span class="text-success mr-2"><i
                                                class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span> --}}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--5">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header bg-transparent d-flex align-items-start">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="h3 text-white mb-3 users-title">Users</h5>
                            </div>
                        </div>
                        <form action="{{ route('dashboard') }}" method="get" style="flex:1;">
                            <div class="row">
                                <div class="dashr-sec no-gutters">
                                    <div class="col-lg-2">
                                        <label class="input-label">Select User</label>
                                        
                                    </div>
                                    <div class="col-lg-2.5 mx-2">
                                    <label class="input-label">From</label>
                                        <input class="form-control" type="date" id="fromD" name="fromD"
                                            value="{{ request()->get('fromD') }}">
                                    </div>
                                    <div class="col-lg-2.5 mr-2">
                                    <label class="input-label">To</label>
                                        <input class="form-control" type="date" id="toD" name="toD"
                                            value="{{ request()->get('toD') }}">
                                    </div>
                                    <div class="dashr-btn">
                                        <button class="btn btn-success" type="submit">Submit</button>
                                        <a class="btn btn-clear" href="{{route('dashboard')}}">Clear</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row user-details">
                            <div class="col-xl-4 col-md-6 ">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <a href="{{ route('invoices.index') }}">
                                        <div class="card-body" style="border-radius: 10px; background: #735fdc26;">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Invoices</h5>
                                                    <span class="h2 font-weight-bold mb-0 total-call">{{ $totalInvoices ?? 0}}</span>
                                                </div>
                                                <div class="col-auto">
                                                    <div
                                                        class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                        <i class="fas fa-file-invoice-dollar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-sm">
                                                {{-- <span class="text-success mr-2"><i
                                                        class="fa fa-arrow-up"></i> 3.48%</span>
                                                <span class="text-nowrap">Since last month</span> --}}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6  ">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <a href="{{ route('invoices.index') }}">
                                        <div class="card-body" style="border-radius: 10px; background: #2dce8926;">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Paid Invoices 
                                                    </h5>
                                                    <span class="h2 font-weight-bold mb-0 good-call">{{ $paid ?? 0}}</span>
                                                </div>
                                                <div class="col-auto">
                                                    <div
                                                        class="icon icon-shape bg-green text-white rounded-circle shadow">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-sm">
                                                {{-- <span class="text-success mr-2"><i
                                                        class="fa fa-arrow-up"></i> 3.48%</span>
                                                <span class="text-nowrap">Since last month</span> --}}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-stats">
                                    <!-- Card body -->
                                    <a href="{{ route('invoices.index') }}">

                                        <div class="card-body" style="border-radius: 10px; background: #fb634024;">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">Unpaid Invoices</h5>
                                                    <span class="h2 font-weight-bold mb-0 mode-call">{{ $unpaid ?? 0}}</span>
                                                </div>
                                                <div class="col-auto">
                                                    <div
                                                        class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-sm">
                                                {{-- <span class="text-success mr-2"><i
                                                        class="fa fa-arrow-up"></i> 3.48%</span>
                                                <span class="text-nowrap">Since last month</span> --}}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@section('extra_scripts')
    <script>
        var start = document.getElementById('fromDate');
        var end = document.getElementById('toDate');

        start.addEventListener('change', function() {
            if (start.value)
                end.min = start.value;
        }, false);

        end.addEventListener('change', function() {
            if (end.value)
                start.max = end.value;
        }, false);
    </script>
     <script>
        var startDate = document.getElementById('fromD');
        var endDate = document.getElementById('toD');

        startDate.addEventListener('change', function() {
            if (startDate.value)
            endDate.min = startDate.value;
        }, false);

        endDate.addEventListener('change', function() {
            if (endDate.value)
            startDate.max = endDate.value;
        }, false);
    </script>
@endsection