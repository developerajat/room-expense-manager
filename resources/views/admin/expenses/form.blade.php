@extends('layouts.admin')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        @php $name = isset($expense) ? 'Update ' : 'Add New'; @endphp
                        <h6 class="h2 text-white d-inline-block mb-0">{{ $name }} Expense</h6>
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
                                        <a class="btn btn-primary btn-sm" href="{{ route('expenses.index') }}">
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
                            @php $action = isset($expense) ? route('expenses.update', [$expense->id]) : route('expenses.store'); @endphp
                            <form class="form" method="post" action="{{ $action }}" enctype="multipart/form-data">
                                @if (isset($expense)) @method('PUT') @endif
                                @csrf
                                <!-- <h6 class="heading-small text-muted mb-4">expense information</h6> -->
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label required" for="input-amount">Amount</label>
                                                <input type="text" id="input-amount" name="amount"
                                                    class="form-control" placeholder="Amount"
                                                    value="{{ old('amount', $expense->amount ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label required" for="input-date">Date</label>
                                                <input type="text" id="input-date" class="form-control"
                                                    name="date" placeholder="Date"
                                                    value="{{ old('date', $expense->created_at ?? '') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label required" for="input-description">Description</label>
                                                <textarea class="form-control" name="description" id="input-description" cols="30" rows="10" placeholder="Description">{{old('description', $expense->description)}}</textarea>
                                                
                                            </div>
                                        </div>
                                        {{--<div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label required">Manager</label>
                                                @if (count($expenses))
                                                    <select required class="form-control" aria-label="Sales Manager"
                                                        name="sales_manager_id">
                                                        <option value="" hidden selected>Select Manager</option>
                                                        @foreach ($expenses as $agent)
                                                            <option
                                                                {{ ($expense->sales_manager_id ?? old('sales_manager_id')) == $agent->id ? 'selected' : '' }}
                                                                value="{{ $agent->id }}">{{ $agent->name ?? '' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif

                                            </div>
                                        </div>--}}
                                    </div>
                                    <input type="hidden" name="expense_id" value="{{ Auth::id() }}">
                                </div>
                                <button  type="submit" class="btn btn-primary my-4"> {{$name}} </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
