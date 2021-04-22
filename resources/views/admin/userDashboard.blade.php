@extends('layouts.admin')
@section('content')
    <div class="header pb-6 pt-5">
        <div class="container-fluid">
            <div class="header-body">

                <div class="row mb-4">
                    <div class="col-md-12 mt-2">
                        <form action="{{ route('user.dashboard') }}" method="get">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h3 class="h2 text mb-3 user-title">Dashboard</h3>
                                </div>
                                <div class="col-lg-3">
                                    <input class="form-control" type="date" id="fromDate" name="from"
                                        value="{{ request()->get('from') }}">
                                </div>
                                <div class="col-lg-3">
                                    <input class="form-control" type="date" id="toDate" name="to"
                                        value="{{ request()->get('to') }}">
                                </div>
                                <div class="col-lg-3">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <a class="btn btn-clear" href="{{route('user.dashboard')}}">Clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Card stats -->
                <div class="card-body">
                    <div class="row user-details">
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <a href="{{ route('user.invoices.index') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total Invoices</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $totalInvoices ?? 0}}</span>
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
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <a href="{{ route('user.invoices.index') }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Paid Invoices
                                            </h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $paid ?? 0}}</span>
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
                            <a href="{{ route('user.invoices.index') }}">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Unpaid Invoices</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $unpaid ?? 0}}</span>
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

@endsection
