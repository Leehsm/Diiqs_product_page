@extends('master')
@section('content')
<div class="container">

    <div class="form-group my-account"> 
        @include('frontend.menu.MyAccount.header')
    </div>

    <h2 class="title">Dashboard</h2> 

    <h4>Hi {{ $user }}. (not {{ $user }} <a href="#">Log out</a>)</h4>

    <h4>From your account dashboard you can view your recent orders, manage your addresses, and edit your password and account details.</h4>

    <div class="dashboard-button">
        <div class="layer">
            <button type="button" class="btn btn-default btn-lg">Orders</button>
            <button type="button" class="btn btn-default btn-lg">Address</button>
            <button type="button" class="btn btn-default btn-lg">Account Details</button>
        </div>
    </div>

    
</div>

@endsection