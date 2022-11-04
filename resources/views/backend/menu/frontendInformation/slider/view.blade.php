@extends('backend.admin_master')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Slider</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('create-slider') }}" class="btn btn-outline-dark">Add New</a>
        </div>
    </div>
</div>

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
                <td>
                    <a href="{{ route('edit-slider',$sliders->id) }}" class="btn btn-info btn-sm" title="Edit Data">Edit</a>
                    <a href="{{ route('delete-slider',$sliders->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection