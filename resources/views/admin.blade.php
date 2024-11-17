<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800 h-screen flex items-center justify-center">

  <!-- Dashboard Container -->
  <div class="flex bg-opacity-30 bg-white rounded-xl shadow-lg backdrop-blur-lg p-8 w-full max-w-5xl">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-white bg-opacity-20 rounded-lg p-6">
      <h2 class="text-2xl font-bold text-white mb-6">Dashboard</h2>
      <nav class="space-y-3 text-white">
        <button onclick="showSection('addProduct')" class="block py-2 px-3 w-full text-left rounded-lg hover:bg-white hover:bg-opacity-20 transition">Add Product</button>
        <button onclick="showSection('removeProduct')" class="block py-2 px-3 w-full text-left rounded-lg hover:bg-white hover:bg-opacity-20 transition">Remove Product</button>
        <button onclick="showSection('updateProduct')" class="block py-2 px-3 w-full text-left rounded-lg hover:bg-white hover:bg-opacity-20 transition">Update Product</button>
        <button onclick="showSection('customerOrders')" class="block py-2 px-3 w-full text-left rounded-lg hover:bg-white hover:bg-opacity-20 transition">Customer Orders</button>
      </nav>
    </aside>
    
    <!-- Main Content -->
    <main class="flex-1 ml-8 text-white">
      <header class="text-3xl font-semibold mb-4">Admin Dashboard</header>

      <!-- Welcome Section -->
      <section id="welcomeSection">
        <h3 class="text-2xl font-bold mb-4">Welcome to Admin Dashboard</h3>
        <p class="mb-4">Manage your products, view orders, and update your inventory all in one place. 
          Use the sidebar to access different sections of the dashboard.</p>
        
      </section>

      <!-- Add Product Form -->
      <section id="addProduct" class="hidden">
        <h3 class="text-2xl font-bold mb-4">Add Product</h3>
        @if(session('success'))
    <div class="text-green-500 mb-4">
        {{ session('success') }}
    </div>
    @endif
    @if($errors->any())
        <div class="text-red-500 mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{ route('admin.storeProduct') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div>
    <label class="block mb-1">Product Name</label>
    <input type="text" name="name" class="w-full p-2 rounded bg-white bg-opacity-20 text-white" placeholder="Enter product name" required>
  </div>
  <div>
    <label class="block mb-1">Price</label>
    <input type="number" name="price" class="w-full p-2 rounded bg-white bg-opacity-20 text-white" placeholder="Enter price" required>
  </div>
  <div>
  <label class="block mb-1">Image</label>
  <input type="file" name="image_url" class="w-full p-2 rounded bg-white bg-opacity-20 text-white" required>
  </div>
  <div>
  <label class="block mb-1">Category</label>
  <select name="category" class="w-full p-2 rounded bg-white bg-opacity-20 text-black" required>
    <option value="">Select Category</option>
    <option value="mens">Mens</option>
    <option value="women">Women</option>
    <option value="unisex">Unisex</option>
  </select>
</div>


  <div>
    <label class="block mb-1">Description</label>
    <textarea name="description" class="w-full p-2 rounded bg-white bg-opacity-20 text-white" rows="3" placeholder="Enter product description" required></textarea>
  </div>
  <button type="submit" class="py-2 px-4 bg-blue-500 rounded hover:bg-blue-600 transition">Add Product</button>
</form>

      </section>

      <!-- Remove Product Form -->
<section id="removeProduct" class="hidden">
  <h3 class="text-2xl font-bold mb-4">Remove Product</h3>
  <!-- Display success or error messages -->
@if(session('success'))
  <div class="text-green-500 mb-4">
    {{ session('success') }}
  </div>
@elseif(session('error'))
  <div class="text-red-500 mb-4">
    {{ session('error') }}
  </div>
@endif

  <!-- Form for removing the product -->
  <form action="{{ route('admin.removeProduct') }}" method="POST" class="space-y-4">
    @csrf
    <div>
      <label class="block mb-1">Product ID</label>
      <input type="text" name="product_id" class="w-full p-2 rounded bg-white bg-opacity-20 text-white" placeholder="Enter product ID" required>
    </div>
    <button type="submit" class="py-2 px-4 bg-red-500 rounded hover:bg-red-600 transition">Remove Product</button>
</form>
</section>

      <!-- Update Product Form -->
      <section id="updateProduct" class="hidden">
  <h3 class="text-2xl font-bold mb-4">Update Product</h3>

  <form id="searchForm" class="space-y-4">
    <div>
      <label class="block mb-1">Product ID</label>
      <input type="text" id="searchProductId" class="w-full p-2 rounded bg-white bg-opacity-20 text-white" placeholder="Enter product ID" required>
    </div>
    <button type="button" onclick="searchProduct()" class="py-2 px-4 bg-yellow-500 rounded hover:bg-yellow-600 transition">Search</button>
  </form>

  <form id="updateForm" action="{{ route('admin.updateProduct') }}" method="POST" class="space-y-4 hidden" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="product_id" id="productId">

    <div>
      <label class="block mb-1">Product Name</label>
      <input type="text" name="name" id="productName" class="w-full p-2 rounded bg-white bg-opacity-20 text-white" required>
    </div>
    <div>
      <label class="block mb-1">Price</label>
      <input type="number" name="price" id="productPrice" class="w-full p-2 rounded bg-white bg-opacity-20 text-white" required>
    </div>
    <div>
      <label class="block mb-1">Image</label>
      <input type="file" name="image_url" id="productImageUrl" class="w-full p-2 rounded bg-white bg-opacity-20 text-white">
      <img id="imagePreview" class="mt-2 hidden w-48 h-48 object-cover" alt="Product Image Preview">
    </div>
    <div>
      <label class="block mb-1">Description</label>
      <textarea name="description" id="productDescription" class="w-full p-2 rounded bg-white bg-opacity-20 text-white" rows="3" required></textarea>
    </div>
    <button type="submit" class="py-2 px-4 bg-green-500 rounded hover:bg-green-600 transition">Update Product</button>
  </form>
</section>

      <!-- Customer Orders Section -->
      <section id="customerOrders" class="hidden">
        <h3 class="text-2xl font-bold mb-4">Customer Orders</h3>
        <p>This section will display customer orders</p>
      </section>
    </main>
<form action="{{ route('logout') }}" method="POST">
  @csrf
  <button type="submit" class="block py-2 px-3 w-full text-left rounded-lg hover:bg-white hover:bg-opacity-20 transition text-white">
    Logout
  </button>
</form>
  </div>

  <script>
    function showSection(sectionId) {
      document.querySelectorAll('section').forEach(section => {
        section.classList.add('hidden');
      });
      document.getElementById(sectionId).classList.remove('hidden');
    }
    
    function searchProduct() {
    const productId = document.getElementById('searchProductId').value;
    if (!productId) {
        alert('Please enter a product ID.');
        return;
    }

    fetch(`/admin/searchProduct/${productId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const product = data.product;
                document.getElementById('productId').value = product.id;
                document.getElementById('productName').value = product.name;
                document.getElementById('productPrice').value = product.price;
                document.getElementById('productDescription').value = product.description;
                document.getElementById('productCategory').value = product.category;
                if (product.image_url) {
                    document.getElementById('imagePreview').src = '/storage/' + product.image_url;
                    document.getElementById('imagePreview').classList.remove('hidden');
                }
                document.getElementById('updateForm').classList.remove('hidden');
            } else {
                alert('Product not found!');
            }
        })
        .catch(error => console.error('Error:', error));
}
  </script>

</body>
</html>
