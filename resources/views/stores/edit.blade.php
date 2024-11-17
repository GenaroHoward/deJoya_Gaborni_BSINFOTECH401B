<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Edit Product</h1>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('stores.update', $stores->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name:</label>
                        <input type="text" name="product_name" id="product_name"
                            class="form-control"
                            value="{{ old('product_name', $stores->product_name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="product_price" class="form-label">Product Price:</label>
                        <input type="number" name="product_price" id="product_price"
                            class="form-control"
                            value="{{ old('product_price', $stores->product_price) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="product_quantity" class="form-label">Product Quantity:</label>
                        <input type="number" name="product_quantity" id="product_quantity"
                            class="form-control"
                            value="{{ old('product_quantity', $stores->product_quantity) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="product_description" class="form-label">Product Description:</label>
                        <textarea name="product_description" id="product_description"
                            class="form-control"
                            rows="4">{{ old('product_description', $stores->product_description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="product_image" class="form-label">Product Image:</label>
                        <input type="file" name="product_image" id="product_image"
                            class="form-control" accept="image/*">

                        @if ($stores->product_image)
                            <div class="mt-3">
                                <p>Current Image:</p>
                                <img src="{{ asset('storage/' . $stores->product_image) }}"
                                    alt="Product Image" class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Update Product</button>
                    <a href="{{ route('stores.dashboard') }}" class="btn btn-secondary">Back to Store</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
