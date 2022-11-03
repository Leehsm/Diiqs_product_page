@extends('backend.admin_master')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Product & Combo</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('create-product-and-combo') }}">Add New</a></button>
        </div>
    </div>
</div>

<h2>Product</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">Gallery</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $products)
            <tr>
                <td>{{ $products->id }}</td>
                <td>{{ $products->name }}</td>
                <td>{{ $products->price }}</td>
                <td>{{ $products->category }}</td>
                <td>{{ $products->description }}</td>
                <td>{{ $products->quantity }}</td>
                <td><img src="{{ asset($products->gallery) }}" style="width: 70px; height: 40px;"></td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<h2>Combo</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">Gallery</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($combo as $combos)
            <tr>
                <td>{{ $combos->id }}</td>
                <td>{{ $combos->name }}</td>
                <td>{{ $combos->price }}</td>
                <td>{{ $combos->category }}</td>
                <td>{{ $combos->description }}</td>
                <td>{{ $combos->quantity }}</td>
                <td><img src="{{ asset($products->gallery) }}" style="width: 70px; height: 40px;"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection