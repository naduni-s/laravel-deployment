@extends('layouts.layout') 
@section('title', 'Subscription') 
@section('content')

<style>
    .fade-in-bg {
        animation: fadeIn 2s ease-in-out forwards;
        opacity: 40;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
</style>

<!-- Main container -->
<div class="container mx-auto p-8 bg-purple">

    <!-- Subscription Overview Section with Cream and Peach Tones -->
    <div class="bg-gradient-to-r from-pink-300 via-peach-400 to-cream text-black p-8 rounded-xl shadow-xl relative overflow-hidden bg-cover bg-center bg-no-repeat parallax fade-in-bg" style="background-image: url('subwall.jpeg');">

        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="relative z-10">
        <h2 class="text-4xl font-extrabold leading-tight mb-6 animate__animated animate__fadeIn animate__delay-1s animate__duration-3s">Exclusive Perfume Decant Subscription</h2>
        <p class="text-lg mb-8 animate__animated animate__fadeIn animate__delay-2s animate__duration-3s">
            A curated selection of premium decants delivered right to your doorstep every month. Our subscription plan offers you the convenience of receiving 
            two premium perfume decants each month. Choose from our monthly billing plan of LKR 6,999. Experience the luxury of trying different scents without 
            the commitment of purchasing full bottles. Whether you're a fragrance enthusiast or someone looking to discover new scents, our subscription is the perfect way to indulge in a variety of 
            high-quality perfumes, try new combinations, and enjoy a unique olfactory experience every month.</p>
        <a href="#order-summary" class="bg-yellow-400 text-black py-2 px-6 rounded-lg text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">Start Your Subscription</a>
        
    </div>
    </div>

    <!-- Order Summary Section with Peach/Light Pink Accents -->
    <div id="order-summary" class="mt-16 p-8 bg-white rounded-xl shadow-xl hover:shadow-2xl transition-all ease-in-out duration-500 animate__animated animate__fadeInUp animate__delay-3s">
        <h2 class="text-3xl font-bold text-black mb-6">Your Order Summary</h2>
        <div class="flex justify-between mb-4 text-gray-700">
            <span>Subscription Plan:</span>
            <span>Monthly</span>
        </div>
        <div class="border-b border-gray-300 pb-4 mb-4">
            <div class="flex justify-between mb-4 text-gray-700">
                <span>Premium Decants x 2</span>
                <span>LKR 6,999.00</span>
            </div>
        </div>
        <div class="flex justify-between text-black font-bold mb-4">
            <span>Total (Including delivery):</span>
            <span>LKR 6,999.00</span>
        </div>
    </div>

    <!-- Subscription Details Form Section with Soft Colors -->
    <div class="mt-16 p-8 bg-white rounded-xl shadow-xl hover:shadow-2xl transition-all ease-in-out duration-500">
        <h2 class="text-3xl font-semibold text-black mb-6">Subscription Details</h2>
        
        <!-- Subscription Form -->
        <form id="subscription-form" action="{{ route('subscription.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-black">Full Name*</label>
                <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300" required>
            </div>
            <div>
                <label for="phone" class="block text-black">Phone Number*</label>
                <input type="tel" id="phone" name="phone" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300" required pattern="\d{10}" title="Phone number must be 10 digits long and contain only numbers">
            </div>

            <div>
                <label for="address" class="block text-black">Delivery Address*</label>
                <textarea id="address" name="address" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 transition duration-300" required></textarea>
            </div>
            <div>
                <label for="gender" class="block text-black">Gender*</label>
                <select id="gender" name="gender" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 transition duration-300" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div>
                <label for="perfumes" class="block text-black">Current Perfumes You Have (Enter at least one)*</label>
                <input type="text" id="perfumes" name="perfumes[]" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300" placeholder="Enter perfume names" required>
            </div>

            <!-- Notes Section -->
            <div>
                <label for="notes" class="block text-black">Special Order Notes</label>
                <textarea id="notes" name="notes" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300" placeholder="Add any special instructions or requests."></textarea>
            </div>

            <!-- Checkbox Agreement -->
            <div class="flex items-center space-x-3">
                <input type="checkbox" id="agreement-checkbox" name="agreed_to_terms" class="h-5 w-5 text-green-400 border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 transition duration-300" required>
                <label for="agreement-checkbox" class="text-black">I agree to the terms and conditions.</label>
            </div>

            <!-- Submit Button with Peach Hover Effect -->
            <button type="submit" class="bg-yellow-300 text-black py-3 px-6 w-full rounded-lg text-xl font-semibold shadow-lg transform hover:scale-105 transition-all duration-300 mt-6">Subscribe Now</button>
        </form>
    </div>

</div>

<!-- Custom JavaScript for validation and interaction -->
<script>
    document.getElementById('subscription-form').addEventListener('submit', function (e) {
        const name = document.getElementById('name').value.trim();
        const phone = document.getElementById('phone').value;
        const phonePattern = /^\d{10}$/;
        const namePattern = /^[a-zA-Z\s.]+$/; 

        if (!name.match(namePattern)) {
            alert("It should not contain numbers or special characters(@,#,$,%,&,*)");
            e.preventDefault();
            return;
        }
        // Validate phone number
        if (!phone.match(phonePattern)) {
            alert("Please enter a valid 10-digit phone number.");
            e.preventDefault();
            return;
        }
        const form = e.target;
        const gender = document.getElementById('gender').value;
        const perfumes = document.getElementById('perfumes').value.trim();
        const agreementChecked = document.getElementById('agreement-checkbox').checked;

        // Prevent form submission if validation fails
        if (!gender || !perfumes || !agreementChecked) {
            alert("Please ensure all fields are filled correctly and you agree to the terms.");
            e.preventDefault();
        }
    });
</script>

@endsection
