@extends('backend.admin_master')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Slider</h1>
</div>

<form method="post" action="{{ route('store-slider') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Slider Name') }}</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">{{ __('Slider Description') }}</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    </div>
    
    <div class="mb-3">
        <label for="link" class="form-label">{{ __('Slider Link') }}</label>
        <input type="text" class="form-control" id="link" name="link">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">{{ __('Slider Image') }}</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>

    
    <button type="submit" class="btn btn-warning">Add New</button>
</form>

@endsection