@extends('layouts.auth')
@section('content')
<div class="comman_outer_page reset_password">
        <div class="conta_iner">
            <div class="logo_form">
            </div>
            
            <form action="{{route('password.update')}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" style="display:none;">
                    <input type="password" class="form-control" id="exampleInputPassword1" name="new_password" required placeholder="New Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="confirm_password" required placeholder="Confirm Password">
                </div>
                <input hidden value="{{$user->id}}" name="id">
                <input hidden value="{{$user->otp}}" name="otp">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
        
        
        
        </div>
        
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
@endsection