@extends('master')
@section('content')
<div class="container">

    <div class="form-group my-account"> 
        @include('frontend.menu.MyAccount.header')
    </div>

    <h2 class="title">Order History</h2> 

    <div class="form-group order-history">
        <table class="table table-hover">
            <thead>
              <tr>
                  <th>Order</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Total</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($order as $orders )
                <tr>
                    <td ><a style="color: black" href="#">#{{ $orders->billNo }}<a></td>
                    <td>{{ $orders->order_date }}</td>
                    <td>{{ $orders->status }}</td>
                    <td>RM {{ $orders->amount }}</td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>

@endsection