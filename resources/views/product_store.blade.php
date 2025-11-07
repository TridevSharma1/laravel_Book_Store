@extends('base')

@section('title', 'Product form')

@section('content')


    <div class="container mt-5">
        <a class="btn btn-info" href="{{ route('product.list') }}">Back to product list</a>
        <div class="card shadow-lg p-4">
            <h2 class="mb-4 text-center text-primary">Add New Product</h2>

            {{-- Success message --}}
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            {{-- Validation errors --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Product form --}}
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter product name" required>
                </div>

                <div class="mb-3">
                    <label for="product_image" class="form-label">Product Image</label>
                    <input type="file" name="product_image" id="product_image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="product_price" class="form-label">Product Price (₹)</label>
                    <input type="number" name="product_price" id="product_price" class="form-control" step="0.01" placeholder="Enter price" required>
                </div>

                <div class="mb-3">
                    <label for="product_description" class="form-label">Product Description</label>
                    <textarea name="product_description" id="product_description" class="form-control" rows="3" placeholder="Enter description"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4">Save Product</button>
                    <button type="reset" class="btn btn-secondary px-4">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection