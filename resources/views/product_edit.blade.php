<!-- resources/views/edit.blade.php -->

@extends('base')

@section('title', 'Edit Product')

@section('content')
    <h2 class="mb-4">Edit Product</h2>

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Product Image</label><br>
            @if($product->product_image)
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" width="100"><br><br>
            @endif
            <input type="file" name="product_image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Product Price</label>
            <input type="text" name="product_price" value="{{ $product->product_price }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Product Description</label>
            <textarea name="product_description" class="form-control">{{ $product->product_description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection
