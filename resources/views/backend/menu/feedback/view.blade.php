@extends('backend.admin_master')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Customer Feedback</h1>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Comment</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedback as $feedbacks)
            <tr>
                <td>{{ $feedbacks->name }}</td>
                <td>{{ $feedbacks->email }}</td>
                <td>{{ $feedbacks->comment }}</td>
                <td><img src="{{ asset($sliders->image) }}" style="width: 70px; height: 40px;"></td>
                <td>
                    {{-- <a href="{{ route('edit-slider',$sliders->id) }}" class="btn btn-info btn-sm" title="Edit Data">Edit</a> --}}
                    <a href="{{ route('delete-slider',$sliders->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection