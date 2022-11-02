@extends('master')
@section('content')
<div style="text-align: center;" class="container">
    <div class="product-wrapper" id="aboutProduct">
        <h3> {{$product['name']}} </h3>
        <div class="our-product">
            <div class="about-us">
                <img class="about-detail-img " src="{{asset($product['gallery'])}}">
            </div>
            <div style=" width:50%;float: right;">
                <h4>Price: RM {{$product['price']}}</h4>
                <a style="color: black">Description: {{$product['description']}}</a>
                <form action="/add_to_cart" method="POST">
                    @csrf
                    <input style="width: 50%; margin: auto;" class="form-control prodQty" type="number" id="quantity" name="quantity" min="1" max="{{ $product['quantity'] }}" value="1" required>
                    <input type="hidden" name="product_id" value={{ $product['id'] }}>
                    <button class="btn btn-primary addToCart-btn"> Add To Cart </button>
                </form>
            </div>
        </div>
    </div>
    
    <br><br>

    <div class="product-wrapper">
        <h3>Feedback & Review</h3>
        <div class="our-product">
            Review
        </div>
    </div>
</div>
@endsection