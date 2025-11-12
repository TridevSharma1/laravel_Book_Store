@extends('base')

@section('title', 'Home Page')

@section('content')
<section class="py-5 bg-light">

    {{-- ✅ Top Bar with Login & Signup --}}
    <div class="container mb-4 text-end">
        @auth
            <span class="me-3">Welcome, <strong>{{ Auth::user()->name }}</strong></span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        @else
            <a href="" class="btn btn-outline-primary btn-sm me-2">Login</a>
            <a href="" class="btn btn-primary btn-sm">Sign Up</a>
        @endauth
    </div>

    {{-- ✅ Product Cards --}}
    <div class="container">
        <h2 class="text-center mb-4 fw-bold">My Shop Products</h2>
        <div class="row g-4">
            {{-- ✅ Dynamic Bootstrap Carousel (First 3 Products) --}}
            @if($products->count() > 0)
            <div id="productCarousel" class="carousel slide mb-5" data-bs-ride="carousel">

                {{-- Indicators --}}
                <div class="carousel-indicators">
                    @foreach($products->take(3) as $index => $item)
                    <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="{{ $index }}"
                        class="{{ $index == 0 ? 'active' : '' }}"></button>
                    @endforeach
                </div>

                {{-- Carousel Inner --}}
                <div class="carousel-inner rounded shadow">
                    @foreach($products->take(3) as $index => $item)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        @if($item->product_image)
                        <img src="{{ asset('storage/' . $item->product_image) }}"
                            class="d-block w-100" height="400" alt="{{ $item->product_name }}">
                        @else
                        <img src="https://via.placeholder.com/1200x400.png?text=No+Image"
                            class="d-block w-100" height="400" alt="No Image">
                        @endif

                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                            <h5 class="fw-bold">{{ $item->product_name }}</h5>
                            <p>{{ Str::limit($item->product_description, 100) }}</p>
                            <p class="fw-bold">${{ number_format($item->product_price, 2) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Controls --}}
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

            </div>
            @endif

            {{-- ✅ Product Cards Loop --}}
            @foreach($products as $tridev)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    @if($tridev->product_image)
                    <img src="{{ asset('storage/' . $tridev->product_image) }}" class="card-img-top" alt="{{ $tridev->product_name }}">
                    @else
                    <img src="https://via.placeholder.com/300x200.png?text=No+Image" class="card-img-top" alt="No Image">
                    @endif

                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $tridev->product_name }}</h5>
                        <p class="card-text text-muted">{{ $tridev->product_description }}</p>
                        <p class="fw-bold">${{ number_format($tridev->product_price, 2) }}</p>
                        <a href="{{ route('product.view', $tridev->id) }}" class="btn btn-outline-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</section>
@endsection
