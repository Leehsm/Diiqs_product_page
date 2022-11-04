@extends('backend.admin_master')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit About Product</h1>
</div>

<form method="post" action="{{ route('update-product-and-combo') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $aboutproduct->id }}">
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Name') }}</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $aboutproduct->name }}">
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">{{ __('Description') }}</label>
        <textarea class="form-control" name="description" id="description" rows="3">{{ $aboutproduct->name }}</textarea>
    </div>
    
    <div class="mb-3">
        <label for="ingredient" class="form-label">{{ __('Ingredient') }}</label>
        <textarea class="form-control" name="ingredient" id="ingredient" rows="3">{{ $aboutproduct->name }}</textarea>
    </div>

    <label for="volume" class="form-label">{{ __('Volume') }}</label>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3">ml</span>
    <input type="text" class="form-control" id="volume" name="volume" aria-describedby="basic-addon3" value="{{ $aboutproduct->name }}">
    </div>

    <label for="price" class="form-label">{{ __('Price') }}</label>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3">RM</span>
    <input type="text" class="form-control" id="price" name="price" aria-describedby="basic-addon3" value="{{ $aboutproduct->name }}">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">{{ __('Image') }}</label>
        <input class="form-control" type="file" id="image" name="image" value="{{ $aboutproduct->image }}">
    </div>
    
    <button type="button" class="btn btn-warning">Add New</button>
</form>

@endsection