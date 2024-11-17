@extends('layouts.layout')

@section('title', 'Product Details')
@section('content')

<style>
    #notification {
    transition: opacity 0.5s ease-in-out;
    z-index: 60; 
}
</style>
<div class="min-h-screen flex flex-col items-center bg-gray-100 py-8">
    <div class="w-full max-w-6xl flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden">
        
        <div class="md:w-1/2 p-4 flex items-center justify-center bg-gray-50">
            <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" 
                 class="w-full h-80 object-cover rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300">
        </div>

        <div class="md:w-1/2 p-6">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
            <p class="text-lg text-gray-700 mb-6">{{ $product->description }}</p>
            <p class="text-2xl font-semibold text-green-600 mb-6" id="product-price">LKR {{ number_format($product->price, 2) }}</p>

            <!-- Size Selection -->
            <div class="flex items-center mb-6">
                <label for="size" class="mr-4 text-lg font-semibold text-gray-800">Size:</label>
                <select id="size" name="size" class="p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400">
                    <option value="2ml" data-price="{{ $product->price }}">2ml - LKR {{ number_format($product->price, 2) }}</option>
                    <option value="5ml" data-price="{{ $product->price +1000 }}">5ml - LKR {{ number_format($product->price +1000, 2) }}</option>
                    <option value="10ml" data-price="{{ $product->price +2000 }}">10ml - LKR {{ number_format($product->price +2000, 2) }}</option>
                </select>
            </div>

            <div class="flex items-center mb-6">
                <label for="quantity" class="mr-4 text-lg font-semibold text-gray-800">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" 
                       class="w-20 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Add to Cart Button -->
            <button id="add-to-cart" 
                    data-product-id="{{ $product->id }}" 
                    data-product-name="{{ $product->name }}" 
                    data-product-price="{{ $product->price }}" 
                    data-product-image="{{ asset('storage/' . $product->image_url) }}" 
                    class="w-full bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3 rounded-lg 
                           shadow-lg hover:shadow-xl hover:from-blue-600 hover:to-blue-800 transition duration-300">
                Add to Cart
            </button>

            <!-- Notification Message -->
            <div id="notification" class="hidden fixed top-10 right-10 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
                Product added to cart successfully!
            </div>

        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-6">
        <a href="{{ route('home') }}" 
           class="text-blue-600 hover:text-blue-800 font-semibold">
           ← Back to Shop
        </a>
    </div>
</div>

<script>
    
    document.getElementById('size').addEventListener('change', function () {
        const priceElement = document.getElementById('product-price');
        
        const selectedOption = this.options[this.selectedIndex];
        const selectedPrice = selectedOption.getAttribute('data-price');
        priceElement.textContent = 'LKR ' + new Intl.NumberFormat().format(selectedPrice);
    });
    
    const cartIcon = document.getElementById('cart-icon');
    const cartSlidePanel = document.getElementById('cart-slide-panel');
    const closeCartBtn = document.getElementById('close-cart-btn');
    const overlay = document.getElementById('overlay');
    let isCartOpen = false;

    cartIcon?.addEventListener('click', (event) => {
        event.preventDefault();
        window.location.href = "{{ route('cart') }}";
    });

    function toggleCartPanel() {
        if (isCartOpen) {
            cartSlidePanel.classList.add('translate-x-full'); 
            overlay.style.display = 'none'; 
        } else {
            cartSlidePanel.classList.remove('translate-x-full'); 
            overlay.style.display = 'block'; 
        }
        isCartOpen = !isCartOpen;
    }

    // Handle clicks on overlay and close button
    overlay?.addEventListener('click', toggleCartPanel);

    window.addEventListener('click', (event) => {
        if (isCartOpen && !cartSlidePanel.contains(event.target) && !cartIcon.contains(event.target)) {
            toggleCartPanel();
        }
    });
    document.getElementById('add-to-cart').addEventListener('click', function() {
    const productId = this.getAttribute('data-product-id');
    const productName = this.getAttribute('data-product-name');
    const selectedSize = document.getElementById('size').value;
    const selectedSizePrice = document.querySelector(`#size option[value="${selectedSize}"]`).getAttribute('data-price'); // get selected size price
    const productImage = this.getAttribute('data-product-image');
    const quantity = document.getElementById('quantity').value;

    fetch("{{ route('addToCart') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            product_id: productId,
            name: productName,
            price: selectedSizePrice,
            image_url: productImage,
            quantity: quantity,
            size: selectedSize
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('Product added to cart successfully!');
            
            // Update the cart count after adding to cart
            updateCartCount(data.cartCount);
        } else {
            showNotification('Failed to add product to cart.', true);
        }
    })
    .catch(error => {
        console.error('Error adding to cart:', error);
        showNotification('An error occurred while adding to cart.', true);
    });
});

// Function to update the cart count dynamically
function updateCartCount(cartCount) {
    const cartCountElement = document.getElementById('cart-count');
    if (cartCountElement) {
        cartCountElement.textContent = cartCount;
    }
}


/**
 * Function to show notification message
 * @param {string} message - The message to display
 * @param {boolean} isError - Flag to indicate error message
 */
function showNotification(message, isError = false) {
    const notification = document.getElementById('notification');
    notification.textContent = message;
    notification.classList.remove('hidden', 'bg-green-500', 'bg-red-500');
    notification.classList.add(isError ? 'bg-red-500' : 'bg-green-500');

    // Show the notification
    notification.style.opacity = '1';

    // Hide the notification after 3 seconds
    setTimeout(() => {
        notification.style.opacity = '0';
    }, 3000);

    // After fade-out animation, hide the element
    setTimeout(() => {
        notification.classList.add('hidden');
    }, 3500);
}

</script>

@endsection
