@extends('backend.admin_master')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit About Product</h1>
</div>

<form action="#">
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Name') }}</label>
        <textarea class="form-control" name="name" id="name" rows="3"></textarea>
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">{{ __('Description') }}</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    </div>
    
    <div class="mb-3">
        <label for="ingredient" class="form-label">{{ __('Ingredient') }}</label>
        <textarea class="form-control" name="ingredient" id="ingredient" rows="3"></textarea>
    </div>

    <label for="volume" class="form-label">{{ __('Volume') }}</label>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3">ml</span>
    <input type="text" class="form-control" id="volume" name="volume" aria-describedby="basic-addon3">
    </div>

    <label for="price" class="form-label">{{ __('Price') }}</label>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3">RM</span>
    <input type="text" class="form-control" id="price" name="price" aria-describedby="basic-addon3">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">{{ __('Image') }}</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    
    <button type="button" class="btn btn-warning">Add New</button>
</form>

@endsection