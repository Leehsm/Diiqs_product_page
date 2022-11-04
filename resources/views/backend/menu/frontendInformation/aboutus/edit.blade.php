@extends('backend.admin_master')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add About Us</h1>
</div>

<form method="post" action="{{ route('update-about-us') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $aboutus->id }}">
    <div class="mb-3">
        <label for="description1" class="form-label">{{ __('Description Line 1') }}</label>
        <textarea class="form-control" name="description1" id="description1" rows="3">{{ $aboutus->description_line_1 }}</textarea>
    </div>
    
    <div class="mb-3">
        <label for="description2" class="form-label">{{ __('Description Line 2') }}</label>
        <textarea class="form-control" name="description2" id="description2" rows="3">{{ $aboutus->description_line_2 }}</textarea>
    </div>
    
    <div class="mb-3">
        <label for="description3" class="form-label">{{ __('Description Line 3') }}</label>
        <textarea class="form-control" name="description3" id="description3" rows="3">{{ $aboutus->description_line_3 }}</textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">{{ __('Image') }}</label>
        <input class="form-control" type="file" id="image" name="image" value="{{ $aboutus->image }}">
    </div>
    
    <button type="button" class="btn btn-warning">Add New</button>
</form>

@endsection