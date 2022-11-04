@extends('backend.admin_master')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Slider</h1>
</div>

<form method="post" action="{{ route('update-slider') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $slider->id }}">
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Slider Name') }}</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $slider->name }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">{{ __('Slider Description') }}</label>
        <textarea class="form-control" name="description" id="description" rows="3" aria-valuemax="{{ $slider->description }}">{{ $slider->description }}</textarea>
    </div>
    
    <div class="mb-3">
        <label for="link" class="form-label">{{ __('Slider Link') }}</label>
        <input type="text" class="form-control" id="link" name="link" value="{{ $slider->link }}">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">{{ __('Slider Image') }}</label>
        <input class="form-control" type="file" id="image" name="image" value="{{ $slider->image }}">
    </div>

    <button type="submit" class="btn btn-warning">Update</button>
</form>

@endsection