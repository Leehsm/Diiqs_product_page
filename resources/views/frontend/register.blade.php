@extends('master')
@section('content')  
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="register" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="your name" aria-describedby="basic-addon2" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="your email" aria-describedby="basic-addon2" required>
                </div>
            
                <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password" aria-describedby="basic-addon2" required>
                </div>
                
                <button type="submit" class="btn btn-default">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection