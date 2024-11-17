@extends('layouts.layout')

@section('title', 'Shopping Cart')

@section('content')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Shopping Cart</h1>

    @if(session('cart') && count(session('cart')) > 0)
    <!-- Cart Products Section -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg p-4">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="border-b">
                    <th class="px-4 py-2 text-left">Product</th>
                    <th class="px-4 py-2 text-left">Price</th>
                    <th class="px-4 py-2 text-left">Quantity</th>
                    <th class="px-4 py-2 text-left">Total</th>
                    <th class="px-4 py-2 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
    @foreach(session('cart') as $productKey => $product)
    <tr class="border-b">
        <td class="px-4 py-2">
            <div class="flex items-center space-x-4">
                <img src="{{ $product['image_url'] }}" alt="{{ $product['name'] }}" class="w-20 h-20 object-cover rounded-lg">
                <span>
            {{ $product['name'] }} 
            @if(isset($product['size']))
                ({{ $product['size'] }})
            @endif
        </span>
            </div>
        </td>
        <td class="px-4 py-2">LKR {{ number_format($product['price'], 2) }}</td>

        <td class="px-4 py-2">
            <form action="{{ route('cart.update', $productKey) }}" method="POST" class="inline-block">
                @csrf
                @method('PUT')
                <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1" class="w-16 p-2 border rounded-lg">
                <button type="submit" class="text-blue-500 hover:text-blue-600 ml-2">Update</button>
            </form>
        </td>
        <td class="px-4 py-2">LKR {{ number_format($product['quantity'] * $product['price'], 2) }}</td>
        <td class="px-4 py-2">
            <form action="{{ route('cart.remove', $productKey) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-600">Remove</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

        </table>

        <div class="flex justify-between items-center mt-6">
            <div>
                <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-600">Continue Shopping</a>
            </div>
            @php
    $total = 0;
    foreach (session('cart') as $product) { 
        $total += $product['price'] * $product['quantity'];
    }
@endphp
<div class="text-lg font-semibold">
    Total: LKR {{ number_format($total, 2) }}
</div>

        </div>
        
        <div class="mt-6 text-right">
    @if(auth()->check())
        <!-- User is logged in -->
        <a href="{{ route('checkout') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">Proceed to Checkout</a>
    @else
        <!-- User is not logged in -->
        <button 
            onclick="alert('Please log in to proceed to checkout.')" 
            class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-900"
        >
            Proceed to Checkout
        </button>
    @endif
</div>

    </div>
    @else
    <p>Your cart is empty. <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-600">Continue shopping</a></p>
    @endif
</div>
@endsection
