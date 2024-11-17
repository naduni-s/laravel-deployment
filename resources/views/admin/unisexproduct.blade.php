<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scentsation Store - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="template/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .card {
    transition: transform 0.2s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card img {
    width: 100%;
    height: 200px;
    object-fit: cover; /* Makes the image cover the space */
    border-bottom: 1px solid #ddd; /* Optional: Adds a line to separate image */
}

.card-body {
    flex-grow: 1;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.card-text {
    font-size: 1rem;
    color: #555;
}

.btn-primary, .btn-danger {
    border-radius: 5px;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
}

.card:hover {
    transform: scale(1.05);
}
    
        .btn-primary {
            background-color: #4e73df;
            border: none;
        }
    
        .btn-danger {
            background-color: #e74a3b;
            border: none;
        }
    
        .modal-content {
            padding: 20px;
            border-radius: 10px;
        }
        #productImage {
            display: block;
            width: 100%;
            overflow: hidden; 
            text-overflow: ellipsis; 
}

    </style>
    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Scentsation Store</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Features
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Registation</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="buttons.html">Branch Admin</a>
                    </div>
                </div>
            </li>
           
                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Features
                    </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Products</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Products Catogeries</h6>
                        <a class="collapse-item" href="{{ route('menproduct') }}">Men</a>
                        <a class="collapse-item" href="{{ route('womenproduct') }}">Women</a>
                        <a class="collapse-item" href="{{ route('unisexproduct') }}">Unisex</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - branch Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target=""
                    aria-expanded="true" aria-controls="">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Branches</span>
                </a>
            </li>

             <!-- Nav Item - review Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target=""
                    aria-expanded="true" aria-controls="">
                    <i class="fas fa-fw fa-star"></i>
                    <span>Reviews</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                </div>
            </li>
<!-- Nav Item - orders Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-shopping-cart"></i>
        <span>Orders</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Order Catogeries</h6>
            <a class="collapse-item" href="{{ route('subscription') }}">Subscription Plan</a>
            <a class="collapse-item" href="">Refiliing Oders</a>
            <a class="collapse-item" href="">Delivery</a>
        </div>
    </div>
</li>

            <!-- Divider -->
            <hr class="sidebar-divider">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $userName}}</span>
                                <img class="img-profile rounded-circle"
                                    src="template/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    Logout
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Unisex Products</h1>
                    </div>

                    <!-- Display validation errors -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Display success message -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addProductModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add New Product</span>
                    </a>
                    
                 <br><br><br>
                    
<div class="row">
    @foreach($unisexproducts as $product)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                @if($product->image_url)
                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-20 object-contain mb-2">
                @else
                    <div class="w-full h-20 d-flex align-items-center justify-content-center bg-light mb-2">
                        <i class="fas fa-image fa-2x text-muted"></i> 
                    </div>
                @endif
                
                <div class="card-body text-center">
                    
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text text-success">LKR{{ $product->price }}</p>
                    <p class="card-text">{{ $product->description }}</p>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary btn-sm me-3" data-toggle="modal" data-target="#editProductModal{{ $product->id }}">Edit</button>
                        &nbsp;&nbsp;
                        
                        <button class="btn btn-danger btn-sm me-3" data-toggle="modal" data-target="#deleteProductModal{{ $product->id }}">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Product Modal -->
        <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel{{ $product->id }}">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for editing product details -->
                        <form action="{{ route('updateunisexproduct', $product->id) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="name" value="{{ $product->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="productName">Product Image</label>
                                <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-20 object-contain mb-2" style="width: 300px; height: 300px;">
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <label for="productImage">New Image</label>
                                <div class="form-group" style="width: 400px;">
                                    
                                    <input type="file" class="form-control" id="productImage" name="image_url" accept="image/*" onchange="previewImage(event)" style="width: 100%;">
                                </div>

                                <div id="imagePreview" style="display: none;">
                                    <img id="previewImage" src="" alt="Image preview" style="max-width: 100%; height: auto; margin-top: 10px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product Price</label>
                                <input type="text" class="form-control" id="productPrice" name="price" value="{{ $product->price }}" required>
                            </div>
                            <div class="form-group">
                                <label for="productDescription">Description</label>
                                <textarea class="form-control" id="productDescription" name="description" required>{{ $product->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteProductModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteProductModalLabel{{ $product->id }}">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <strong>{{ $product->name }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('destroyunisexproduct', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding new product details -->
                <form action="{{ route('storeunisexproduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                       <!-- Left side: Image Preview and Upload -->
                        <div class="col-md-4 text-center mb-3">
                            <label for="productImage">Product Image</label>
                            <div class="form-group" style="width: 400px;">
                                <!-- File Input with Increased Width -->
                                <input type="file" class="form-control" id="productImage" name="image_url" accept="image/*" onchange="previewImage(event)" required style="width: 100%;">
                            </div>
                            <!-- Image preview -->
                            <div id="imagePreview" style="display: none;">
                                <img id="previewImage" src="" alt="Image preview" style="max-width: 100%; height: auto; margin-top: 10px;">
                            </div>
                        </div>

                        &nbsp;&nbsp;     &nbsp;&nbsp;     &nbsp;&nbsp;     &nbsp;&nbsp;     &nbsp;&nbsp;
                        <!-- Right side: Product Info -->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input style="width: 400px;" type="text" class="form-control" id="productName" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product Price</label>
                                <input style="width: 400px;" type="text" class="form-control" id="productPrice" name="price" required>
                            </div>
                            <div class="form-group">
                                <label for="productDescription">Product Description</label>
                                <textarea style="width: 400px;"  class="form-control" id="productDescription" name="description" required></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to preview the selected image -->
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('previewImage');
            preview.src = reader.result;

            // Show the preview div
            document.getElementById('imagePreview').style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>





            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Scentsation Store Website 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="template/js/demo/chart-area-demo.js"></script>
    <script src="template/js/demo/chart-pie-demo.js"></script>

</body>

</html>