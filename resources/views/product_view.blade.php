@extends('base')

@section('title', $product->product_name)

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- ✅ Main Product Details --}}
                <div class="card shadow border-0">
                    @if($product->product_image)
                    <img src="{{ asset('storage/' . $product->product_image) }}" 
                         class="card-img-top" 
                         alt="{{ $product->product_name }}">
                    @else
                    <img src="https://via.placeholder.com/600x400.png?text=No+Image" 
                         class="card-img-top" 
                         alt="No Image">
                    @endif

                    <div class="card-body text-center">
                        <h3 class="card-title fw-bold">{{ $product->product_name }}</h3>
                        <p class="text-muted">{{ $product->product_description }}</p>
                        <p class="fw-bold fs-4 text-success">${{ number_format($product->product_price, 2) }}</p>
                        <a href="{{ route('product.home')}}" class="btn btn-outline-secondary">Back to Shop</a>
                    </div>
                </div>

            </div>
        </div>

        {{-- ✅ Other Products Section --}}
        @if($otherProducts->count() > 0)
        <div class="mt-5">
            <h4 class="fw-bold mb-4 text-center">You May Also Like</h4>
            <div class="row g-4">
                @foreach($otherProducts as $item)
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 h-100">
                        @if($item->product_image)
                        <img src="{{ asset('storage/' . $item->product_image) }}" 
                             class="card-img-top" 
                             alt="{{ $item->product_name }}">
                        @else
                        <img src="https://via.placeholder.com/300x200.png?text=No+Image" 
                             class="card-img-top" 
                             alt="No Image">
                        @endif

                        <div class="card-body text-center">
                            <h6 class="card-title">{{ $item->product_name }}</h6>
                            <p class="fw-bold">${{ number_format($item->product_price, 2) }}</p>
                            <a href="{{ route('product.view', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>
@endsection
