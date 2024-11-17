<!-- resources/views/search-results.blade.php -->
@extends('layouts.layout')

@section('title', 'Search Results')

@section('content')
<div class="container mx-auto py-8 px-4">
    <h2 class="text-xl font-bold">Search Results for "{{ $query }}"</h2>

    @if($products->isEmpty())
        <p class="mt-4 text-gray-600">No products found matching your search.</p>
    @else
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
    @endif
</div>
@endsection
