@extends('base')

@section('title', 'Product List')

@section('content')

 <div class="container mt-5">
    <h1 class="text-center mb-4">📦 Product List</h1>
    <a class="btn btn-info" href="{{ route('product.store.form') }}">Create Product</a>

    <table class="table table-bordered table-striped shadow">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Image</th>
                <th>Price (₹)</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $tridev)
            <tr>
                <td>{{ $tridev->id }}</td>
                <td>{{ $tridev->product_name }}</td>
                <td>
                    @if($tridev->product_image)
                    <img src="{{ asset('images/' . $tridev->product_image) }}" alt="Image" width="80">
                    @else
                    <span class="text-muted">No image</span>
                    @endif
                </td>
                <td>{{ number_format($tridev->product_price, 2) }}</td>
                <td>{{ $tridev->product_description }}</td>
                <td>{{ $tridev->created_at->format('d M Y') }}</td>
                <td>
                    <form action="{{ route('product.destroy', $tridev->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                    <a class="btn btn-success" href="{{ route('product.edit', $tridev->id) }}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
 </div>
@endsection