@extends('master')
@section('content')
<div class="container">

    <div class="form-group checkout-detail-product">
        <h4>Ordered Item</h4> 
        <table class="table table-hover">
            <thead>
              <tr>
                  <th>image</th>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Price</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $cartItem)
                    <tr>
                        <td><img class="cart-product" src="{{ $cartItem->gallery }}"></td>
                        <td>{{ $cartItem->name }}</td>
                        <td>{{ $cartItem->cart_quantity }}</td>
                        <td>RM {{ $cartItem->price * $cartItem->cart_quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h2>Checkout Page</h2> 
    <div class="form-group checkout-form">
        <form action="/checkout-detail" method="POST">
            @csrf
            <label for="usr">Fullname:</label>
            <input type="text" class="form-control checkout-detail" name="name" id="name" required>
        
            <label for="email">Email:</label>
            <input type="email" class="form-control checkout-detail" name="email" id="email" required>
        
            <label for="phone">Phone:</label>
            <input type="text" class="form-control checkout-detail" name="phone" id="phone" required>
        
            <label for="address">Address:</label>
            <input type="text" class="form-control checkout-detail" name="address" id="address" required>
        
            <label for="postcode">Post Code:</label>
            <input type="text" class="form-control checkout-detail" name="postcode" id="postcode" required>
        
            <label for="city">City:</label>
            <input type="text" class="form-control checkout-detail" name="city" id="city" required>
        
            {{-- <label for="pwd">State:</label>
            <input type="text" class="form-control checkout-detail" id="state"> --}}

            <div class="form-group">
                <label for="sel1">State:</label>
                <select class="form-control checkout-detail" name="state" id="state" required>
                    <option value=""></option>
                    <option value="johor">JOHOR</option>
                    <option value="kedah">KEDAH</option>
                    <option value="kelantan">KELANTAN</option>
                    <option value="kl">KUALA LUMPUR</option>
                    <option value="labuan">LABUAN</option>
                    <option value="melaka">MELAKA</option>
                    <option value="negeri sembilan">NEGERI SEMBILAN</option>
                    <option value="pahang">PAHANG</option>
                    <option value="perak">PERAK</option>
                    <option value="perlis">PERLIS</option>
                    <option value="pulau pinang">PULAU PINANG</option>
                    <option value="putrajaya">PUTRAJAYA</option>
                    <option value="sabah">SABAH</option>
                    <option value="sarawak">SARAWAK</option>
                    <option value="selangor">SELANGOR</option>
                    <option value="terengganu">TERENGGANU</option>
                </select>
            </div>
        
            <label for="country">country:</label>
            <input type="text" class="form-control checkout-detail" name="country" id="country" value="MALAYSIA" disabled>

            <label for="comment">Notes:</label>
            <textarea class="form-control checkout-detail" rows="5" name="notes" id="notes"></textarea>

            <input type="hidden" name="subTotal" id="subTotal" value="{{ $total }}">

            <div class="form-group total-payment">
                {{-- <label for="coupon">Coupon:</label>
                <input type="text" class="form-control" name="coupon" id="coupon">
                <button type="button" class="btn btn-primary coupon-btn" title="Submit" id="submit">Submit</button> --}}
                <label for="total" class="totAmount">Subtotal: RM{{ $total }}</label>
                <label for="total" class="shipping">
                    Shipping: RM 10 (Semenanjung) <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rm 15 (Sabah & Sarawak)
                </label>
                
                {{-- <label for="total" class="shipping">Total: RM 10</label> --}}
                <button type="submit" class="btn btn-success checkout-btn">Proceed To Payment</button>
            </div>
        </form>
    </div>
</div>

@endsection