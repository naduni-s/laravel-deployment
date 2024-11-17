<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <style>
        .glass-effect {
            backdrop-filter: none; 
            background-color: black; 
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #ffffff;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-button {
            cursor: pointer;
            padding: 8px 16px;
        }
        
        body {
            overflow-x: hidden; /* Prevents horizontal scrolling */
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 40;
            display: none; /* Initially hidden */
        }


        #cart-slide-panel p {
            color: black;
        }
        #cart-slide-panel {
    max-width: 400px;
    background-color: rgba(255, 255, 255, 1); 
    height: 100%;
    position: fixed; 
    top: 0;
    right: 0;
    width: 80%; /* Adjusted width for smaller screens */
    z-index: 50;
    transform: translateX(100%); 
    transition: transform 0.3s ease-in-out;
}

@media screen and (max-width: 768px) {
    #cart-slide-panel {
        width: 100%; /* Full width for smaller screens */
    }

    .cart-container {
        display: block; /* Show cart on smaller screens */
        margin-top: 10px;
    }

    #cart-count {
        position: absolute;
        top: 0;
        right: 0;
        font-size: 14px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
    }
}

</style>
</head>
<body class="bg-white font-sans">
    <div class="hero-section relative bg-cover bg-center h-30">
        <!-- Navbar -->
        <header class="bg-black text-white sticky top-0 z-50 glass-effect">
    <div class="container mx-auto py-4 px-4 md:px-8">
        <nav class="flex justify-center items-center space-x-6">
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <a href="{{ route('formen') }}" class="hover:underline">Mens</a>
                <a href="{{ route('forwomen') }}" class="hover:underline">Women</a>
                <a href="{{ route('unisex') }}" class="hover:underline">Unisex</a>
                <a href="#" class="hover:underline">Decant Refills</a>
                <a href="{{ route('check-subscription') }}" class="hover:underline">Subscriptions</a>
                <a href="{{ route('store-locator') }}" class="hover:underline">Store Locator</a>
            </div>
            <div class="md:hidden w-full space-y-4 flex flex-col items-center mt-4">
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <a href="{{ route('formen') }}" class="hover:underline">Mens</a>
                <a href="{{ route('forwomen') }}" class="hover:underline">Women</a>
                <a href="{{ route('unisex') }}" class="hover:underline">Unisex</a>
                <a href="#" class="hover:underline">Decant Refills</a>
                <a href="{{ route('check-subscription') }}" class="hover:underline">Subscriptions</a>
                <a href="{{ route('store-locator') }}" class="hover:underline">Store Locator</a>
            </div>
            <!-- Login/Register Dropdown -->
            <div class="relative dropdown">
                <button class="dropdown-button hover:underline">Login/Register</button>
                <div class="dropdown-content bg-white p-2 shadow-lg rounded-lg">
                    @if (Auth::check())
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                           class="text-black block px-4 py-2 hover:bg-gray-200">
                           Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-black block px-4 py-2 hover:bg-gray-200">Login</a>
                        <a href="{{ route('register') }}" class="text-black block px-4 py-2 hover:bg-gray-200">Register</a>
                    @endif
                </div>
            </div>
        </nav>
        <div class="flex items-center justify-between mt-1 space-y-4 md:space-y-0 ml-10">
            <!-- Centered logo section -->
            <div class="flex items-center justify-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('scLogo.jpeg') }}" alt="Store Logo" class="h-12 md:h-16 ">
                </a>
            </div>
            <!-- Search Bar -->
            <form action="{{ route('search') }}" method="GET" class="flex items-center space-x-2 w-full md:w-auto mx-auto">
                <input type="text" name="query" placeholder="Search Products" class="px-6 py-1 rounded-full text-black w-full md:w-96 lg:w-128">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 cursor-pointer text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
            <!-- Cart Icon -->
            <div class="hidden md:block relative mr-10">
                <img id="cart-icon" src="{{ asset('cart.png') }}" alt="Cart Icon" class="w-6 h-6 cursor-pointer" />
                <span id="cart-count" class="text-sm font-semibold">
                    {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }}
                </span>
            </div>
            <div class="relative block md:hidden">
    <!-- Mobile Cart Icon -->
    <img id="cart-icon-mobile" src="{{ asset('cart.png') }}" alt="Cart Icon" class="w-6 h-6 cursor-pointer" />
    <span id="cart-count" class="text-sm font-semibold absolute top-0 right-0 text-white bg-red-500 rounded-full px-1">
        {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }}
    </span>
</div>

        </div>
    </div>
    <!-- Cart Slide-out Panel -->
<div id="cart-slide-panel" class="fixed top-0 right-0 w-80 h-full bg-white shadow-lg z-50 transform translate-x-full transition-transform duration-300">
    <div class="flex justify-between items-center p-4 bg-gray-900 text-white">
        <h2 class="text-lg font-semibold">Your Cart</h2>
        <button id="close-cart-btn" class="text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div id="cart-items" class="p-4 overflow-y-auto">
    @php
        $cart = session()->get('cart', []);
    @endphp

    @if (!empty($cart))
        <ul>
            @foreach ($cart as $item)
                <li class="flex items-center justify-between py-2">
                    <div class="flex items-center space-x-4">
                        <img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}" class="w-12 h-12">
                        <div>
                            <p class="font-semibold text-black">{{ $item['name'] }}</p>
                            <p>Qty: {{ $item['quantity'] }}</p>
                            <p>Price: LKR{{ $item['price'] }}</p>
                        </div>
                    </div>
                    </li>
            @endforeach
        </ul>
    @else
        <p class="text-center">Your cart is empty</p>
    @endif
</div>

    <div class="p-4">
        <a href="{{ route('cart') }}" class="w-full block bg-black text-white text-center py-2 rounded hover:bg-gray-700">Go to Cart</a>
        <a href="{{ route('checkout') }}" class="w-full block bg-green-500 text-white text-center py-2 mt-4 rounded hover:bg-green-600">Checkout</a>
   
    </div>
</div>

                </div>
            </div>
</header>
    </div>

        <!-- Main Content -->
        <div class="container mx-auto my-10 px-4 md:px-8 min-h-screen">
    <div id="overlay" class="overlay"></div>
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-4 mb-0">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 px-4 md:px-0">
            <div class="space-y-1">
                <h4 class="text-lg font-semibold">Receive Updates on New Arrivals and Special Promotions!</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-blue-500"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-blue-700"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-pink-500"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Categories</h4>
                <ul class="space-y-1">
                    <li><a href="{{ route('formen') }}" class="hover:underline">Mens</a></li>
                    <li><a href="{{ route('forwomen') }}" class="hover:underline">Women</a></li>
                    <li><a href="{{ route('unisex') }}" class="hover:underline">Unisex</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Customer Care</h4>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:underline">Terms & Conditions</a></li>
                    <li><a href="{{ route('privacy') }}" class="hover:underline">Privacy Policy</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Pages</h4>
                <ul class="space-y-1">
                    <li><a href="{{ route('about') }}" class="hover:underline">About Us</a></li>
                    <li><a href="{{ url('/') }}" class="hover:underline">Shop</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:underline">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        // Cart Panel toggle functionality
        const cartIcon = document.getElementById('cart-icon');
        const cartIconMobile = document.getElementById('cart-icon-mobile');
        const cartSlidePanel = document.getElementById('cart-slide-panel');
        const closeCartBtn = document.getElementById('close-cart-btn');
        const overlay = document.getElementById('overlay');
        let isCartOpen = false;

        function toggleCartPanel() {
            if (isCartOpen) {
                cartSlidePanel.style.transform = 'translateX(100%)'; 
                overlay.style.display = 'none'; 
            } else {
                cartSlidePanel.style.transform = 'translateX(0)'; 
                overlay.style.display = 'block'; 
            }
            isCartOpen = !isCartOpen;
        }

        cartIcon.addEventListener('click', (event) => {
            event.preventDefault();
            toggleCartPanel();
        });

        closeCartBtn.addEventListener('click', toggleCartPanel);

        overlay.addEventListener('click', () => {
    toggleCartPanel();
});

window.addEventListener('click', (event) => {
    if (isCartOpen && !cartSlidePanel.contains(event.target) && !cartIcon.contains(event.target)) {
        toggleCartPanel();
    }
});
const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});
cartIconMobile.addEventListener('click', (event) => {
    event.preventDefault();
    toggleCartPanel();
});
</script>
</body>
</html>
