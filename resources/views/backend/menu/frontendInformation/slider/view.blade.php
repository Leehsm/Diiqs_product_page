@extends('backend.admin_master')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Product & Combo</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('create-slider') }}">Add New</a></button>
        </div>
    </div>
</div>

<h2>Slider</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Link</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($slider as $sliders)
            <tr>
                <td>{{ $sliders->id }}</td>
                <td>{{ $sliders->name }}</td>
                <td>{{ $sliders->description }}</td>
                <td>{{ $sliders->link }}</td>
                <td><img src="{{ asset($sliders->image) }}" style="width: 70px; height: 40px;"></td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection