@extends('layouts.admin')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Manage Users</h6>
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
                        <form action="{{ route('users.index') }}" method="get">
                            <div class="row">
                                <h4 class="col-auto text-right">Search</h4>
                                <div class="col-4">
                                    <input class="form-control form-control-sm" type="text" name="keyword" placeholder="First Name, Last Name, Email, Phone Number" value="{{ request()->get('keyword') }}">
                                </div>
                                <div class="col-auto">
                                    <div class="search_btn">
                                        <button class="btn btn-sm btn-primary" type="submit">Apply</button>
                                        <a class="btn btn-sm btn-warning" href="{{ route('users.index') }}">Clear</a>
                                    </div>
                                </div>
                                <div class="col-5 text-right">
                               
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    @if (Auth::user()->isSuperAdmin()) <th scope="col">Status</th> @endif
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse($users as $index=>$user)
                                    <tr>
                                        <td> {{ $index + $users->firstItem() }} </td>
                                        <td> {{ $user->first_name ? $user->name : '--' }} </td>
                                        <td> {{ $user->email ?? '--' }} </td>
                                        <td> {{ $user->phone_number ?? '--' }} </td>
                                        @if (Auth::user()->isSuperAdmin())
                                        <td>
                                            <input type="button" user-id="{{ $user->id }}" status="{{ $user->active ? 0 : 1 }}"
                                                value="{{ $user->active ? 'Active' : 'Inactive' }}"
                                                class="changeStatus btn btn-{{ $user->active ? 'success' : 'warning' }} btn-sm">
                                        </td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{ route('users.show', [base64_encode($user->id)]) }}"
                                                class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('users.edit', [base64_encode($user->id)]) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-confirm"
                                                data-form="deleteForm-{{ $user->id }}">Delete</a>
                                            <form id="deleteForm-{{ $user->id }}"
                                                action="{{ route('users.destroy', [base64_encode($user->id)]) }}" method="post">
                                                @csrf @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
                                        {{ $users->withQueryString()->links() }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    @endsection
    @section('extra_scripts')
    <script>
        $('.changeStatus').on('click', function(event) {
            event.preventDefault();
            var user_id = $(this).attr('user-id');
            var status = $(this).attr('status');
            var message = "Are you sure you want to change status of this User?";
            swal.fire({
                title: message,
                // text: "You want to change status of this User",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
            }).then(function(value) {
                console.log(value)
                if (value.isConfirmed) {
                    $('.loader').show();
                    $.ajax({
                        url: "{{ route('users.ChangeStatus') }}",
                        type: 'get',
                        data: {
                            'user_id': user_id,
                            'status': status,
                        },
                        success: function(id) {
                            $('.loader').hide()
                            swal.fire({
                                title: 'Success',
                                text: 'Status changed successfully',
                                icon: '',
                            }).then(function() {
                                location.reload();
                            });
                        },
                    })
                } else {
                    // window.location.href = window.location.href;
                }
            });
        });

    </script>
@endsection