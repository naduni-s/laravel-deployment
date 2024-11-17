<div class="fixed right-0 top-0 w-[400px] h-full bg-white shadow-lg p-6 cart-slide">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Shopping Cart</h2>
        <button onclick="closeCart()" class="text-xl text-black">&times;</button>

    </div>

    <!-- Product List -->
    <div class="flex items-center justify-between mb-6 border-b pb-4">
        <img src="product-image-url" alt="Product" class="w-16 h-16 object-cover rounded-md">
        <div class="ml-4 flex-1">
            <h3 class="font-semibold text-lg">Anua Double Cleanse Mini Duo</h3>
            <p class="text-sm">Rs 4,390</p>
            <div class="flex items-center mt-2">
                <button class="px-2 py-1 border">-</button>
                <span class="mx-2">1</span>
                <button class="px-2 py-1 border">+</button>
                <a href="#" class="text-red-500 ml-4">Remove</a>
            </div>
        </div>
    </div>

    <!-- Subtotal -->
    <div class="flex justify-between items-center mb-6">
        <span class="font-semibold">Subtotal</span>
        <span class="text-lg font-bold">Rs 4,390</span>
    </div>

    <!-- Checkout Button -->
    <button class="w-full py-3 mb-3 bg-purple-600 text-white rounded-lg">Checkout</button>

    <!-- Go to Cart Button -->
    <button onclick="goToCart()" class="w-full py-3 bg-gray-600 text-white rounded-lg">Go to Cart</button>
</div>

<script>
function closeCart() {
    document.querySelector('.cart-slide').style.display = 'none';
}

// Function to redirect to the cart page
function goToCart() {
    window.location.href = '/cart'; // Update this URL to your cart page URL
}
</script>
