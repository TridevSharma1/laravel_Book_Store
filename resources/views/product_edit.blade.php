<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>

    <!-- Bootstrap CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

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
</body>

</html>