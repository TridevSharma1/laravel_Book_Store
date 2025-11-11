<!-- resources/views/edit.blade.php -->

@extends('base')

@section('title', 'Edit Product')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Card -->
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4 py-3">
                    <h3 class="mb-0 fw-bold">✏️ Edit Product</h3>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Product Name -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Product Name</label>
                            <input type="text"
                                name="product_name"
                                value="{{ $product->product_name }}"
                                class="form-control form-control-lg rounded-3 shadow-sm"
                                placeholder="Enter product name" required>
                        </div>

                        <!-- Product Image -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Product Image</label><br>
                            @if($product->product_image)
                            <div class="mb-3 text-center">
                                <img src="{{ asset('storage/' . $product->product_image) }}"
                                    alt="Product Image"
                                    class="img-thumbnail rounded-4 shadow-sm"
                                    style="max-width: 180px;">
                            </div>
                            @endif
                            <input type="file" name="product_image" class="form-control form-control-lg rounded-3 shadow-sm">
                        </div>

                        <!-- Product Price -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Product Price</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light fw-bold">₹</span>
                                <input type="text"
                                    name="product_price"
                                    value="{{ $product->product_price }}"
                                    class="form-control form-control-lg rounded-3 shadow-sm"
                                    placeholder="Enter price" required>
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Product Description</label>
                            <textarea name="product_description"
                                rows="4"
                                class="form-control form-control-lg rounded-3 shadow-sm"
                                placeholder="Enter product description">{{ $product->product_description }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3 shadow">
                                💾 Update Product
                            </button>
                            <button type="reset" class="btn btn-secondary px-4">Reset</button>
                            <a class="btn btn-info" href="{{ route('product.list') }}">Back to product list</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>
</div>
@endsection