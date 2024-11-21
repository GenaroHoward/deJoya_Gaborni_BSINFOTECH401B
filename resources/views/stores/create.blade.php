<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <script type="text/javascript">
        function previewImage(event) {
            var input = event.target;
            var image = document.getElementById('preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                image.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</head>


<body class="dm-sans home-theme">
    <nav class="navbar sticky-top oxford-blue">
        <div class="container-fluid">
            <a href="{{ route('stores.dashboard') }}" class="m-2 h3 picton-blue" style="text-decoration:none;">de Joya & Gaborni</a>
        </div>
    </nav>

    <div class="container text-center my-5 p-5 bg-white" style="border-radius:10px;">
        <div class="text-start mb-4">
            <a href="{{ route('stores.dashboard') }}" class="btn" style="background-color:#102542;color:#ffffff;"><i class="bi bi-arrow-left me-2 align-middle"></i>Back to Dashboard</a>
        </div>
        <h1 class="text-center mb-4 playfair-display picton-blue"><strong>Adding New Product...</strong></h1>
        <!-- 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        -->
        <div class="row row-cols-xxl-2">
            <div class="col-md-6">
                <span>Preview Image:</span><br>
                <img id="preview" alt="Preview Image" class="img-fluid img-preview border mb-4">
            </div>
            <div class="col-md-6 text-start">
                <form action="{{ route('stores.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-box-seam-fill fs-4 oxford-blue-text"></i></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}">
                                    <label for="product_name" class="form-label">Product Name</label>
                                </div>
                        </div>
                        @error('product_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-tag-fill fs-4 oxford-blue-text"></i></i></span>
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="product_price" name="product_price" value="{{ old('product_price') }}">
                                    <label for="product_price" class="form-label">Product Price</label>
                                    
                                </div>
                        </div>
                        @error('product_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-hash fs-4 oxford-blue-text"></i></i></span>
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="product_quantity" name="product_quantity" value="{{ old('product_quantity') }}">
                                    <label for="product_quantity" class="form-label">Product Quantity</label>
                                    
                                </div>
                        </div>
                        @error('product_quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-clipboard fs-4 oxford-blue-text"></i></i></span>
                                <div class="form-floating">
                                    <textarea class="form-control" id="product_description" name="product_description">{{ old('product_description') }}</textarea>
                                    <label for="product_description" class="form-label">Product Description</label>
                                    
                                </div>
                        </div>
                        @error('product_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="container border p-3 my-3" style="border-radius:8px;">
                        <label for="product_image" class="form-label">Product Image</label>
                        <input type="file" class="form-control" onchange="previewImage(event)" id="product_image" name="product_image">
                        @error('product_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-center my-3">
                        <button type="submit" class="btn" style="background-color:#00A6FB;color:#ffffff;"><i class="bi bi-bag-plus-fill me-2 align-middle"></i>Add Product</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <div style="background-color:#ffffff; margin-top:100px; position:relative; bottom:0; width:100%;">
        <hr class="custom-divider">
        <div class="p-5">
            <div class="row">
                <div class="col">
                    <h3 class="funnel-display">
                        What You Can Do While Adding A Product...
                    </h3>
                    <div class="ps-4">
                        1. There will be input fields displayed about the chosen product that you can fill in. Keep in mind that each of these items are required.<br>
                        <div class="ps-4">
                            a. <strong>Image:</strong> This helps in envisioning what the product may look like.<br>
                            b. <strong>Name:</strong> This is the currently chosen product's name.<br>
                            c. <strong>Price:</strong> The Philippine Peso (PHP) is automatically attached for understanding it's monetary value.<br>
                            d. <strong>Quantity:</strong> This displays how many of the currently chosen product is listed.<br>
                            e. <strong>Description:</strong> A description added to the product to understand more about it.
                        </div>
                        2. Add the currently chosen product by clicking on the "<i class="bi bi-bag-plus-fill me-2 align-middle"></i>Add Product" button.<br>
                        3. If you wish to see the other products again, click on the "<i class="bi bi-arrow-left me-2 align-middle"></i>Back to Dashboard" button.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>