@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>All Products</h4>
        <form class="d-flex" method="GET" action="{{ route('products.index') }}">
            <input  class="form-control me-2" type="text" name="search" placeholder="Search" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
        @if (session('success'))
            <div class="alert alert-success m-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product ID</th>
                    <th>Image</th>
                    <th>
                        
                        <a href="{{ route('products.index', ['sortBy' => 'name', 'sort' => request('sortBy') == 'name' && request('sort') == 'asc' ? 'desc' : 'asc']) }}">
                            Name
                            <i class="bi {{ request('sortBy') == 'name' && request('sort') == 'asc' ? 'bi-arrow-up-short' : 'bi-arrow-down-short' }}"></i>
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('products.index', ['sortBy' => 'price', 'sort' => request('sortBy') == 'price' && request('sort') == 'asc' ? 'desc' : 'asc']) }}">
                            Price
                            <i class="bi {{ request('sortBy') == 'price' && request('sort') == 'asc' ? 'bi-arrow-up-short' : 'bi-arrow-down-short' }}"></i>
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('products.index', ['sortBy' => 'description', 'sort' => request('sortBy') == 'description' && request('sort') == 'asc' ? 'desc' : 'asc']) }}">
                            Description
                            <i class="bi {{ request('sortBy') == 'description' && request('sort') == 'asc' ? 'bi-arrow-up-short' : 'bi-arrow-down-short' }}"></i>
                        </a>
                    </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $product->product_id }}</td>
                        <td><img src="/images/{{ $product->image }}" width="120px" alt="{{ $product->name }}"></td>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td style="max-width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm bi bi-view-list "> View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm bi bi-pencil-square"> Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm bi bi-trash3" type="submit"> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection
