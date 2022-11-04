@extends('backend.admin_master')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">About Product</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('create-about-product') }}">Add New</a></button>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Ingredient</th>
                <th scope="col">Volume</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aboutproduct as $abtproduct)
            <tr>
                <td>{{ $abtproduct->name }}</td>
                <td>{{ $abtproduct->description }}</td>
                <td>{{ $abtproduct->ingredients }}</td>
                <td>{{ $abtproduct->volume }}</td>
                <td>{{ $abtproduct->price }}</td>
                <td><img src="{{ asset($abtproduct->image) }}" style="width: 70px; height: 40px;"></td>
                <td>
                    <a href="{{ route('edit-about-product',$abtproduct->id) }}" class="btn btn-info btn-sm" title="Edit Data">Edit</a>
                    <a href="{{ route('delete-about-product',$abtproduct->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection