@extends('layouts.layout') <!-- Extends the layout -->

@section('title', 'Unisex Page') <!-- Sets the page title -->

@section('content')
    <!-- Content Section -->
    <div class="container mx-auto py-8 px-4">
        <!-- Filter by Price Section -->
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2"> 
            <form method="GET" action="{{ route('filter.unisex') }}" class="flex items-center space-x-2">
                <label class="text-sm font-medium">Filter by price</label>
                <input type="range" id="price-range" name="max_price" class="w-40" min="4500" max="15000" value="15000" step="100" oninput="updatePrice()">
                <span class="text-sm">Price LKR <span id="price-min">4500</span> - LKR <span id="price-max">15000</span></span>
                <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">Filter</button>
            </form>
            </div>

        </div>

        <h2 class="text-xl font-bold mt-8">Unisex</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-4">
            
        @foreach($products as $product)
                <div class="text-center transition-transform duration-300 transform hover:scale-105 hover:shadow-lg">
                <a href="{{ route('product.detail', $product->id) }}">
                    
                <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-40 object-contain mb-2"><p class="mt-2 font-semibold">{{ $product->name }}</p>
                    <p class="text-sm text-gray-700">LKR {{ number_format($product->price, 2) }}</p>
                    </a>
                </div>
            @endforeach
        
        </div>
    </div>
    <script>
    const priceRange = document.getElementById('price-range');
    const priceMax = document.getElementById('price-max');

    function updatePrice() {
        priceMax.textContent = priceRange.value;
    }

    priceRange.addEventListener('input', updatePrice);
</script>
@endsection
