<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DIIQS Beauty Skincare</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body class="antialiased">
    @include('frontend.layout.header')

    @yield('content')
<br>
    @include('frontend.layout.footer')
</body>

<style>
/* font-family: "Open Sans", sans-serif; */
    html {
    scroll-behavior: smooth;
    }
    .custom-login{
        height: 500px;
        padding-top: 100px;
    }
    .navbar-default{
        z-index: 10;
        width: 100%;
    }
    img.slider-img{
        height: 250px !important;
    }
    .custom-product{
        /* background-color: #35443585; */
        /* height: 300px;    */
        /* padding-bottom: 3%; */
        text-align: center;
    }
    
    .custom-product-slider{
        /* height: 250px; */
        /* width: 1311px; */
        /* background-color:aqua; */
    }
    .slider-text{
        background-color: #35443585 !important;
    }
    .our-product-img{
        height: 200px;
    }
    .our-product{
        /* background-color: red; */
        display: inline-block;
        /* height: 260px; */
        text-align: center;
        padding: 8px;
    }
    .special{
        /* background-color: blue; */
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        /* display: inline;
        align-items: center;
        justify-content: center; */
        
    }
    .detail{ 
        /* width: 26.6%; */
        margin-top: 1%;
        height: auto;
        padding: 8px;
        background-color: #ffff;
        border-radius: 3px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .product-wrapper{
        margin-top: 2%;
        margin-left: 5%;
        margin-right: 5%;
        /* height: 20px; */
        /* background-color: green; */
    }
    .product-wrapper h3{
        /* text-align: center; */
        display:block;
        border-bottom: 1px solid rgb(201, 201, 201);
    }
    .detail-img{
        /* height: 200px; */
        width: 80%;
        float: right;
    }
    .cart-product{
        height: 50px;
    }
    .coupon-cart{
        margin-left: 80%;
        margin-bottom: 2%;
    }
    .coupon-btn{
        margin-top: 2%;
        margin-left: 70%;
    }
    .checkout-btn{
        float: right;
    }
    .totAmount, .shipping{
        float: right;
    }
    .product-name, .product-price{
        color: black;
    }
    .addToCart-btn{
        margin-top: 2%;
        margin-bottom: 2%;
    }
    .prodQty{
        width: 10%;
        text-align: center;
    }
    .checkout-form{
        width: 50%;
        margin-top: 3%;
        float: left;
    }
    .checkout-detail{
        margin-bottom: 3%;
    }
    .checkout-detail-product{
        width: 40%;
        margin-top: 3%;
        float: right;
    }
    .total-payment{
        width: 50%;
        margin-left: 50%;
        margin-bottom: 2%;
    }
    .totAmount-final, .shipping-final, .checkout-btn-final{
        margin-left: 50%;
    }
    .order-history{
        /* width: 50%; */
        margin-top: 3%;
        margin-left: auto;
        margin-right: auto;
    }
    .title{
        text-align: center;
        background-color: rgb(255, 250, 190);
        padding: 2%;
        padding-left: 2%;
    }
    .my-account{
        /* float: left; */
        /* margin-top: 3%; */
        margin-left: auto;
        margin-right: auto;
        /* width: 50%; */
    }
    .my-account-a{
        color: rgb(172, 157, 157);
    }
    .my-account-a:hover{
        color: black;
    }
    .header-brand{
        padding: 3%;
    }
    .navbar-nav{
        font-weight: bolder;
    }
    .header-logo{
        text-align: center;
        color: black;
        background-color: #ffff;
        padding: 0.5%;
    }
    .header-logo-a{
        color: black;
    }
    a:hover {
        text-decoration: none;
    }
    .footer{
        margin-top: 5%;
        background-color: #e5e4e4ae;
    }
    .combo{
        margin-top: 5%;
    }
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
    }
    .sticky + .content {
        padding-top: 102px;
    }
    .feedback{
        /* width: 800px; */
        background-color: #ffff;
        padding: 3%;
        border-radius: 3px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .review{
        margin-top: 20%;
    }
    .dashboard-button{
        /* background-color: darkblue; */
    }
    .layer{
        text-align: center;
        /* background-color: saddlebrown; */
        margin-left: auto;
        /* margin-right: auto; */
    }
    .btn-lg{
        margin-top: 2%;
        margin-left: auto;
        margin-right: auto;
    }
    .about-us{
        /* background-color: khaki; */
        width: 50%;
        float: left;
    }
    .about-us-desc{
        /* background-color: firebrick; */
        float: right;
        width: 50%;
    }
    .about-us-img{
        width: 80%;
    }
    .about-us-desc{
        margin-top: 13%;
    }
    .footer-icon{
        width: 8%;
        margin-bottom: 1%;
    }
    .fot a{
        margin-right: 2%;
        color: rgb(110, 108, 108);
        /* font-weight: bold; */
    }
    .about-detail-img{
        width: 80%;
        /* margin-top: 25%; */
    }
</style>

<script>
    window.onscroll = function() {myFunction()};
    
    var header = document.getElementById("header");
    var sticky = header.offsetTop;
    
    function myFunction() {
      if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    }
</script>

</html>