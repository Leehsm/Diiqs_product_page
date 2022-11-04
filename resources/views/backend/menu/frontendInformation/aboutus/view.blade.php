@extends('backend.admin_master')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">About Us</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('create-about-us') }}">Add New</a></button>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Description 1</th>
                <th scope="col">Description 2</th>
                <th scope="col">Description 3</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aboutus as $abtus)
            <tr>
                <td>{{ $abtus->description_line_1 }}</td>
                <td>{{ $abtus->description_line_2 }}</td>
                <td>{{ $abtus->description_line_3 }}</td>
                <td><img src="{{ asset($abtus->image) }}" style="width: 70px; height: 40px;"></td>
                <td>
                    <a href="{{ route('edit-about-us',$abtus->id) }}" class="btn btn-info btn-sm" title="Edit Data">Edit</a>
                    <a href="{{ route('delete-about-us',$abtus->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection