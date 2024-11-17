@extends('layouts.layout') 
@section('title', 'Contact') 
@section('content')

<body class="bg-white text-gray-800">

    <div class="flex flex-wrap justify-center p-10">
        <!-- Contact Us Section -->
        <div class="w-full md:w-1/2 lg:w-1/3 p-5">
            <h2 class="text-2xl font-bold mb-4">Contact us</h2>
            <div class="mb-6">
                <p class="text-lg">📞 077 777 7777</p>
            </div>
            <div class="mb-6">
                <p class="text-lg">📧 <a href="mailto:scentsationstore37@gmail.com" class="underline">scentsationstore37@gmail.com</a></p>
            </div>
            <div class="mb-6">
                <p class="text-lg">📍 No 45, Flower Road, Colombo 07</p>
            </div>
        </div>
    </div>

    <!-- Footer Info -->
    <div class="flex flex-wrap justify-center bg-gray-200 p-4">
        <div class="flex flex-col items-center text-center m-4">
            <span class="text-xl">🚚 Islandwide Shipping</span>
            <p class="text-sm">Delivery in 2-3 working days</p>
        </div>
        <div class="flex flex-col items-center text-center m-4">
            <span class="text-xl">💳 Save money with Refills</span>
            <p class="text-sm">Return empty decants and get discounts</p>
        </div>        
        <div class="flex flex-col items-center text-center m-4">
            <span class="text-xl">🔒 Guaranteed Authentic</span>
            <p class="text-sm">Money back guarantee</p>
        </div>
        <div class="flex flex-col items-center text-center m-4">
            <span class="text-xl">💳 100% Secure Checkout</span>
            <p class="text-sm">MasterCard / Visa</p>
        </div>
    </div>
</body>
@endsection