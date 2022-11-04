@extends('backend.admin_master')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Product / Combo</h1>
</div>

<form method="post" action="{{ route('update-product-and-combo') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Product Name') }}</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
    </div>

    <label for="price" class="form-label">{{ __('Product Price') }}</label>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3">RM</span>
    <input type="text" class="form-control" id="price" aria-describedby="basic-addon3" value="{{ $product->price }}">
    </div>

    <label for="category" class="form-label">{{ __('Product Category') }}</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="category" id="normal" value="normal"{{ $product->category == 'normal' ? 'checked' : '' }}>
        <label class="form-check-label" for="normal">
        Normal
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="category" id="combo" value="combo" {{ $product->category == 'combo' ? 'checked' : '' }}>
        <label class="form-check-label" for="combo">
        Combo
        </label>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">{{ __('Product Description') }}</label>
        <textarea class="form-control" name="description" id="description" rows="3">{{ $product->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">{{ __('Product Quantity') }}</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">{{ __('Product Image') }}</label>
        <input class="form-control" type="file" id="image" name="image" value="{{ $product->gallery }}">
    </div>

    
    <button type="button" class="btn btn-warning">Update</button>
</form>

@endsection