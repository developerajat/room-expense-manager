@extends('layouts.admin')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Manage expenses</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">

                        </nav>
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
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <form action="{{ route('expenses.index') }}" method="get">
                            <div class="row">
                                <h4 class="col-auto text-right">Search</h4>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" type="text" name="keyword" placeholder="Room no, expense amount, Description" value="{{ request()->get('keyword') }}">
                                </div>
                                <div class="col-auto">
                                    <div class="search_btn">
                                        <button class="btn btn-sm btn-primary" type="submit">Apply</button>
                                        <a class="btn btn-sm btn-warning" href="{{ route('expenses.index') }}">Clear</a>
                                    </div> 
                                </div>
                                <div class="col-5 text-right">
                               <a href="{{ route('expenses.create') }}" class="btn btn-sm btn-dark">Add New Expense</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead class="thead-light">
                                <tr class="">
                                    <th scope="col">#</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse($expenses as $index=>$expense)
                                    <tr>
                                        <td> {{ $index + $expenses->firstItem() }} </td>
                                        <td> {{ $expense->amount ? '₹'.$expense->amount : '--' }} </td>
                                        <td> {{ $expense->description ?? '--' }} </td>
                                        <td> {{ $expense->created_at ?? '--' }} </td>
                                        <td> {{ $expense->created_at ?? '--' }} </td>
                                       
                                        <td class="text-center">
                                            <a href="{{ route('expenses.show', [base64_encode($expense->id)]) }}"
                                                class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('expenses.edit', [base64_encode($expense->id)]) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                            {{-- <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-confirm"
                                                data-form="deleteForm-{{ $user->id }}">Delete</a> --}}
                                            {{-- <form id="deleteForm-{{ $user->id }}"
                                                action="{{ route('expenses.destroy', [base64_encode($user->id)]) }}" method="post">
                                                @csrf @method('DELETE')
                                            </form> --}}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
                                        {{ $expenses->withQueryString()->links() }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection