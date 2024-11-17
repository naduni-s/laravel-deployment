
  function searchProduct() {
    const productId = document.getElementById('searchProductId').value;
    
    // Make sure the product ID is not empty
    if (!productId) {
      alert("Please enter a Product ID to search.");
      return;
    }

    // AJAX request to fetch product details
    fetch(`/admin/searchProduct/${productId}`)
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // Fill the form with the product details
          document.getElementById('updateForm').classList.remove('hidden');
          document.getElementById('productId').value = data.product.id;
          document.getElementById('productName').value = data.product.name;
          document.getElementById('productPrice').value = data.product.price;
          document.getElementById('productImageUrl').value = data.product.image_url;
          document.getElementById('productDescription').value = data.product.description;
        } else {
          alert("Product not found!");
        }
      })
      .catch(error => {
        console.error("Error fetching product:", error);
        alert("An error occurred while searching for the product.");
      });
  }

