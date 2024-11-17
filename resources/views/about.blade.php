@extends('layouts.layout') 

@section('title', 'About') 

@section('content')
<body class="bg-white text-gray-800">

    <!-- Header Section -->
    <div class="bg-gray-200 p-10">
        <div class="text-yellow-600 font-semibold px-4 py-1 inline-block bg-yellow-200 rounded mb-4">Scentsation Store</div>
        <h1 class="text-4xl font-bold mb-2 pb-10">The Premium Online Fragrance Store in Sri Lanka.</h1>
        <div class="flex space-x-8 mt-4">
            <div>
                <h3 class="text-xl font-bold pb-3">Perfume for Him and Her</h3>
                <p>We have perfumes for him, perfumes for her, and unisex perfumes. Decide what fragrance family appeals to you and browse our selection – we know you’ll find the perfect match!</p>
            </div>
            <div>
                <h3 class="text-xl font-bold pb-3">There is a World of Fragrances to Explore</h3>
                <p>There are intense, woody ones, energetic ones and seductive ones. Some perfumes will make you feel confident, and some will cheer you up.</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto my-10 p-5">
        <div class="flex flex-wrap items-center">
            <!-- Perfume Image -->
            <div class="w-full md:w-1/2 p-5">
                <img src="decantsabout.jpg" alt="Perfume Bottle" class="rounded-lg shadow-lg">
            </div>
            <!-- About Section -->
            <div class="w-full md:w-1/2 p-5">
                <h2 class="text-2xl font-bold mb-4">About our online store</h2>
                <p>Scentsation Store is the hottest online perfume store in Sri Lanka established with the ambition of providing customers with a unique shopping experience. We provide you with a wide range of perfumes, for any occasion, plus easy stress-free shopping any time of the day or night. Looking for a gift for someone special? We can gift wrap and send perfume straight to someone else.</p>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="bg-gray-900 text-white py-10">
        <div class="container mx-auto flex flex-wrap justify-center space-x-8">
            <div class="text-center px-6 py-4">
                <div class="text-yellow-400 text-4xl font-bold">12,000+</div>
                <p>Social Media Followers</p>
            </div>
            <div class="text-center px-6 py-4">
                <div class="text-yellow-400 text-4xl font-bold">50+</div>
                <p>Brands</p>
            </div>
            <div class="text-center px-6 py-4">
                <div class="text-yellow-400 text-4xl font-bold">10,000+</div>
                <p>Website Visitors</p>
            </div>
        </div>
    </div>

    <!-- Product Guarantee Section -->
    <div class="container mx-auto my-10 p-5">
        <h3 class="text-2xl font-bold mb-4">PRODUCT GUARANTEE</h3>
        <p>All of the products showcased throughout scentsationstore.lk are 100% original branded products. We only carry genuine brand name perfumes, colognes and beauty products. Absolutely NO imitations or counterfeits. If you are looking to buy authentic perfume online, scentsationstore.lk is the most reliable online store in Sri Lanka. Finding a top-notch quality perfume for a reasonable price is nearly impossible in Sri Lanka. It’s no surprise that many customers imagine they have to pay five additional thousands of rupees for quality.</p>
    </div>

</body>
@endsection