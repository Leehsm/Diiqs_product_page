@extends('master')
@section('content')
<div class="custom-product-slider">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner" id="ourproduct">
            @foreach ($slider as $sliders )
                <div class="item {{ $sliders->id==1?'active':'' }}">
                    <a href="detail/{{ $sliders->link }}">
                        <img class="slider-img" src={{ $sliders->image }}>
                        <div class="carousel-caption slider-text" >
                            <h3>{{ $sliders->name }}</h3>
                            <p>{{ $sliders->descripttion }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
      
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="custom-product">
    <div class="product-wrapper">
        <h3 > Product</h3>
        @foreach ($product as $products )
            <div class="our-product">
                <img class="our-product-img" src={{ $products['gallery'] }}>
                <a href="detail/{{ $products['id'] }}">
                    <div class="product-name">
                        <h4>{{ $products['name'] }}</h4>
                    </div>
                </a>
                <div class="product-price">
                    <h5>RM {{ $products['price'] }}</h5>
                </div>
            </div>
        @endforeach
    </div>

    <div class="product-wrapper" id="about">
        <h3> Combo </h3>
        @foreach ($combo as $combos )
            <div class="our-product">
                <img class="our-product-img" src={{ $combos['gallery'] }}>
                <a href="detail/{{ $combos['id'] }}">
                    <div class="product-name">
                        <h4>{{ $combos['name'] }}</h4>
                    </div>
                </a>
                <div class="product-price">
                    <h5>RM {{ $combos['price'] }}</h5>
                </div>
            </div>
        @endforeach
    </div>

    <div class="product-wrapper" id="aboutProduct">
        <h3> About Us </h3>
        <div class="our-product">
            <div class="about-us">
                <img class="about-us-img" src="{{ url('/upload/allproduct.jpeg')}}">
            </div>
            <div class="about-us-desc">
                <a>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</a>
            </div>
        </div>
    </div>

    <div class="product-wrapper" >
        <h3> About Products </h3>
        @foreach ($product_detail as $prod_details )       
        <div class="special">    
            <div class="our-product detail">
                <img class="our-product-img" src={{ $prod_details->image }}>
                <div class="product-name">
                    <h4>{{ $prod_details->name }}</h4>
                </div>
                <div class="product-price">
                    <h5>RM {{ $prod_details->description }}</h5>
                </div>
                <div class="product-price">
                    <h5>RM {{ $prod_details->ingredients }}</h5>
                </div>
                <div class="product-price">
                    <h5>RM {{ $prod_details->volume }}</h5>
                </div>
                <div class="product-price">
                    <h5>RM {{ $prod_details->price }}</h5>
                </div>
            </div>
        </div>
        @endforeach  
    </div>
    
    <div class="product-wrapper" id="feedback">
        <h3> Give Us Some Review :) </h3>
        <div class="our-product">
            <p> Tell Us your feedback about our product or something we can improve. </p>
            <form action="/feedback" method="GET" class="feedback">
                <div class="form-group">
                    <label for="feedback_name">Name:</label>
                    <input type="text" class="form-control" name="feedback_name" id="feedback_name">
                </div>
                <div class="form-group">
                    <label for="feedback_comment">Comments:</label>
                    <textarea class="form-control checkout-detail" rows="7" name="feedback_comment" id="feedback_comment"></textarea>
                </div>
                <div class="form-group">
                    <label for="feedback_file">Picture:</label>
                    <input type="file" class="form-control" name="feedback_file" id="feedback_file">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

{{-- <div class="custom-product"> 
    
</div>

<div class="custom-product">
    
</div>

<div class="custom-product review">
    
</div> --}}
@endsection