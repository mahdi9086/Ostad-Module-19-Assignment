@extends('layouts.app')

@section('content')

<div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center mb-3">
        <h4>Product Details</h4>
        <a href="{{ route('products.index') }}" class="btn btn-primary bi bi-arrow-left-short ">Back</a>
    </div>
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/images/{{ $product->image }}" class="img-fluid rounded-start" alt="{{ $product->name }}">
    </div>
    <div class="col-md-8 ">
      <div class="card-body">
        <h3 class="card-title">{{ $product->name }}</h3>
        <p class="card-text">{{ $product->description }}</p>
        <div class="row g-0">
            <div class="col-md-2">
                <h5>Price:</h5>
                <h5>Stock:</h5>
            </div>
            <div class="col-md-10">
                <h5 class="card-text">${{ $product->price }}</h5>
                <h5 class="card-text">{{ $product->stock }}</h5>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
