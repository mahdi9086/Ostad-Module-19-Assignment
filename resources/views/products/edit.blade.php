@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center mb-3">
        <h4>Edit Product</h4>
        <a href="{{ route('products.index') }}" class="btn btn-primary bi bi-arrow-left-short ">Back</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="product_id" class="form-label">Product ID</label>
                <input type="text" class="form-control" name="product_id" id="product_id" value="{{ old('product_id', $product->product_id) }}" required>
                @error('product_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $product->price) }}" required>
                @error('price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock', $product->stock) }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image">
                <img src="/images/{{ $product->image }}" class="img-thumbnail mt-2" style="width: 150px;">
            </div>
            <button type="submit" class="btn btn-warning bi bi-floppy">Update</button>
        </form>
    </div>
</div>
@endsection
