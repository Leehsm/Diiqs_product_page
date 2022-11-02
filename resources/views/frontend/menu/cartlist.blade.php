@extends('master')
@section('content')
<div class="container">
    <h2>Cart List</h2>           
    <table class="table table-hover">
      <thead>
        <tr>
            <th></th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th> </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $cartItem)
            <tr>
                <td><img class="cart-product" src="{{ $cartItem->gallery }}"></td>
                <td>{{ $cartItem->name }}</td>
                <td>{{ $cartItem->cart_quantity }}</td>
                <td>RM {{ $cartItem->price }}</td>
                <td>
                    <a href="/cart/delete/{{ $cartItem->cart_id }}" class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash">x</i></a>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    
    {{-- Kena tambah Form --}}
    <div class="form-group coupon-cart">
        {{-- <label for="coupon">Coupon:</label>
        <input type="text" class="form-control" name="coupon" id="coupon">
        <button type="button" class="btn btn-primary coupon-btn" title="Submit" id="submit">Submit</button> --}}
        <label for="total" class="totAmount">Total: RM{{ $total }}</label>
        <a href="checkout" class="btn btn-success checkout-btn" title="payment" id="payment">Proceed To Checkout</a>
    </div>
</div>
@endsection