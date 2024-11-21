<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Cards Interface</title>
    <!-- Bootstrap CSS Online ko na para wag na mag download -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body class="dm-sans home-theme">
    <nav class="navbar sticky-top oxford-blue">
        <div class="container-fluid">
            <a href="{{ route('stores.dashboard') }}" class="m-2 h3 picton-blue" style="text-decoration:none;">de Joya & Gaborni</a>
        </div>
    </nav>
    <div class="container mt-5 page-container">
        <h1 class="text-center mb-4 playfair-display picton-blue"><strong>Dashboard</strong></h1>

        <form method="GET" action="{{ route('stores.dashboard') }}">
            <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping"><button type="submit" class="btn" name="search"><i class="bi bi-search my-2 align-middle"></i></button></span>
                <input type="text" class="form-control w-75" name="filtersearch" placeholder="Search" value="{{ request('filtersearch') }}">
                <select name="sort" class="form-select" style="width: 200px;">
                    <option value="" disabled selected>Sort By</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price (Low to High)</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price (High to Low)</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A to Z)</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z to A)</option>
                </select>
            </div>
        </form>

        <div class="d-flex justify-content-end align-items-center mb-4">
            <a href="{{ route('stores.create') }}" class="btn" style="background-color:#00A6FB;color:#ffffff;" id="addItem"><i class="bi bi-bag-plus-fill me-2 align-middle"></i>Add New Product</a>
        </div>


        @if(session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-lg me-2 align-middle"></i>{{ session('success') }}
            </div>
        @endif

        
            @if($stores->isEmpty())
                <p class="text-center fs-4">No Products Currently Listed!</p>
            @else
            <div class="row row-cols-xxl-6">
            @foreach($stores as $store)
                <div class="col my-2">
                    <a href="{{ route('stores.view', $store->id) }}">
                    <div class="card" style="width:12rem;height:19rem;">
                        <!-- Display image need ata set size kaso di ko lam pano --> 
                        <img src="{{ asset('storage/' . $store->product_image) }}" class="card-img-top rounded-top" alt="Product Image">

                        <div class="card-body">
                            <h5 class="card-title funnel-display picton-blue text-truncate" style="max-width:200px;">{{ $store->product_name }}</h5>
                            <p class="card-subtitle" style="font-size:.9rem;"><strong>PHP</strong> {{ $store->product_price }}</p>
                            <p class="card-text" style="font-size:0.8rem;opacity: 0.5;"><strong>Quantity:</strong> {{ $store->product_quantity }}</p>

                            <div class="d-flex justify-content-end">
                                

                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
            @endif
        </div>
        <!-- Card Grid ends here -->
    </div>

    <div style="background-color:#ffffff; margin-top:100px; position:relative; bottom:0; width:100%;">
        <hr class="custom-divider">
        <div class="p-5">
            <div class="row row-cols-xxl-2">
                <div class="col-md-6 mb-3">
                    <h3 class="funnel-display">
                        What You Can Do While At The Dashboard...
                    </h3>
                    <div class="ps-4">
                        1. There will be products listed and displayed. Click on a chosen product to view a more detailed page on it.<br>
                        <div class="ps-4">
                            a. <strong>Image:</strong> This helps in envisioning what the product may look like.<br>
                            b. <strong>Name:</strong> This is the currently chosen product's name.<br>
                            c. <strong>Price:</strong> The Philippine Peso (PHP) is automatically attached for understanding it's monetary value.<br>
                            d. <strong>Quantity:</strong> This displays how many of the currently chosen product is listed.<br>
                        </div>
                        2. Use the search bar to look for a specific product.<br>
                        3. Create new products by clicking on the "<i class="bi bi-bag-plus-fill me-2 align-middle"></i>Add New Product" button.
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="funnel-display">
                        How to use SEARCH and SORT BY?
                    </h3>
                    <div class="ps-4">
                        1. Enter the keyword you want to search with.<br>
                        2. Select from "Sort By" how you would like the items to be sorted by.<br>
                        3. Press "Enter" on your keyboard or click on the "<i class="bi bi-search align-middle"></i>" button on the search bar.<br>
                        4. Your items are now sorted by what you searched for! :)
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
