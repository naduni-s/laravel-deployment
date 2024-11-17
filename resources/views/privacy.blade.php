@extends('layouts.layout') 
@section('title', 'privacy') 
@section('content')

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-8 bg-white shadow-md">
        <h1 class="text-3xl font-bold text-center mb-6">Privacy Policy</h1>
        
        <section class="mb-6">
            <h2 class="text-xl font-semibold">Our Usage on Data</h2>
            <p class="mt-2">
                We may collect various information to fulfill orders, manage accounts, and improve our services. This includes personal data such as name, address, contact information, and payment details.
            </p>
        </section>
        
        <section class="mb-6">
            <h2 class="text-xl font-semibold">Third Parties</h2>
            <p class="mt-2">
                We may share data with third parties for payments, fraud prevention, and analytics. Third-party use is governed by our privacy policies.
            </p>
        </section>

        <section class="mb-6">
            <h2 class="text-xl font-semibold">Our Usage on Personal Information</h2>
            <p class="mt-2">
                Personal information may be used for product delivery, customer service, and to contact you for promotions if consented.
            </p>
        </section>
        
        <section class="mb-6">
            <h2 class="text-xl font-semibold">Our Cookies</h2>
            <p class="mt-2">
                Cookies are used to enhance your experience on our website, allowing you to access features such as shopping carts and personalized settings.
            </p>
        </section>
    </div>
</body>

@endsection