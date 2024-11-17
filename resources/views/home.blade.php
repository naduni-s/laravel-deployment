@extends('layouts.layout') 
@section('title', 'Home Page') 
@section('content')

    <!-- Blurred background under the cards -->
    <div class="relative bg-cover bg-center bg-no-repeat h-[1200px] md:h-[1400px] rounded-lg" style="background-image: url('wallpaper.jpg');">
        <!-- Apply the blur effect to the background -->
        <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-lg"></div>

        <!-- The Card Container -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10 p-8">
    <!-- Card 1 -->
    <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden fade-in-card">
        <img src="refill.jpg" alt="Decant Refilling" class="w-full h-auto object-cover md:h-60">
        <div class="p-2">
            <h3 class="text-lg font-semibold mb-2">Decant Refilling</h3>
            <p class="text-gray-700 text-sm">
                Experience a sustainable way to indulge in luxury scents! With our decant refilling service, you can refill your perfumes in just the right amount, helping to minimize waste while enjoying your favorite fragrances.
            </p>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden fade-in-card">
        <img src="recom.jpg" alt="Perfume Recommender" class="w-full h-auto object-cover md:h-60">
        <div class="p-2">
            <h3 class="text-lg font-semibold mb-2">Perfume Recommender</h3>
            <p class="text-gray-700 text-sm">
                Not sure which scent to choose? Use our Perfume Recommender to discover personalized fragrance suggestions tailored to your preferences and mood.
            </p>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-gray-100 shadow-lg rounded-lg overflow-hidden fade-in-card">
        <img src="locator.jpg" alt="Branch Locator" class="w-full h-auto object-cover md:h-60">
        <div class="p-2">
            <h3 class="text-lg font-semibold mb-2">Branch Locator</h3>
            <p class="text-gray-700 text-sm">
                Find the nearest branch for convenient refills and in-store services. Use our Branch Locator to explore locations closest to you for a seamless shopping experience.
            </p>
        </div>
    </div>
</div>

    </div>
    <br>
    <div class="mb-8">
    <div class="flex items-center justify-between mb-4">
        <div class="relative mr-6"> 
            <img src="formen.jpg" alt="For Men" class="w-48 h-48 object-cover rounded-md">
            <span class="absolute top-2 left-2 bg-black text-white text-lg font-semibold px-3 py-1 rounded">For Men</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 w-full">
            @foreach ($menProducts as $product)
                <div class="bg-white p-4 rounded transition-transform duration-300 transform hover:scale-105 hover:shadow-lg">
                    <a href="{{ route('product.detail', $product->id) }}">
                        <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover mb-2">
                        <h3 class="font-medium">{{ $product->name }}</h3>
                        <p class="text-gray-500">Rs. {{ number_format($product->price, 2) }}</p>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Arrow next to For Men section -->
        <a href="{{ route('formen') }}" class="text-white bg-black p-2 rounded-full hover:bg-gray-700 ml-6 flex items-center justify-center">
            <span class="text-2xl">&gt;</span> <!-- Arrow symbol -->
        </a>
    </div>
</div>


    <!-- For Women Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <div class="relative mr-6"> 
                <img src="forwomen.jpg" alt="For Women" class="w-48 h-48 object-cover rounded-md">
                <span class="absolute top-2 left-2 bg-black text-white text-lg font-semibold px-3 py-1 rounded">For Women</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 w-full">
                @foreach ($womenProducts as $product)
                    <div class="bg-white p-4 rounded transition-transform duration-300 transform hover:scale-105 hover:shadow-lg">
                        <a href="{{ route('product.detail', $product->id) }}">
                            <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover mb-2">
                            <h3 class="font-medium">{{ $product->name }}</h3>
                            <p class="text-gray-500">Rs. {{ number_format($product->price, 2) }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('forwomen') }}" class="text-white bg-black p-2 rounded-full hover:bg-gray-700 ml-6 flex items-center justify-center">
            <span class="text-2xl">&gt;</span> <!-- Arrow symbol -->
        </a>
        </div>
    </div>

    <!-- Unisex Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <div class="relative mr-6"> 
                <img src="unisex.jpg" alt="Unisex" class="w-48 h-48 object-cover rounded-md">
                <span class="absolute top-2 left-2 bg-black text-white text-lg font-semibold px-3 py-1 rounded">Unisex</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 w-full">
                @foreach ($unisexProducts as $product)
                    <div class="bg-white p-4 rounded transition-transform duration-300 transform hover:scale-105 hover:shadow-lg">
                        <a href="{{ route('product.detail', $product->id) }}">
                            <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover mb-2">
                            <h3 class="font-medium">{{ $product->name }}</h3>
                            <p class="text-gray-500">Rs. {{ number_format($product->price, 2) }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('unisex') }}" class="text-white bg-black p-2 rounded-full hover:bg-gray-700 ml-6 flex items-center justify-center">
            <span class="text-2xl">&gt;</span> <!-- Arrow symbol -->
        </a>
        </div>
    </div>

    <div class="relative h-48 md:h-64 mb-8"> 
        <img src="{{ asset('recwall.jpg') }}" alt="Perfume Image 1" class="w-full h-full object-cover">
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40">
            <p class="text-white text-xl md:text-2xl font-semibold text-center px-4">
                Let us choose a perfume according to your liking.
            </p>
        </div>
    </div>
</div>
<style>
    /* Custom fade-in animation */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Applying fade-in effect */
    .fade-in-card {
        opacity: 0; /* Initially hide the cards */
        animation: fadeIn 1s ease-in-out forwards;
    }

    /* Delay animations for each card */
    .fade-in-card:nth-child(1) {
        animation-delay: 0.2s;
    }
    .fade-in-card:nth-child(2) {
        animation-delay: 0.4s;
    }
    .fade-in-card:nth-child(3) {
        animation-delay: 0.6s;
    }
</style>

@endsection
