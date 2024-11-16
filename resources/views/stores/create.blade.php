<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add a Product</h1>

        <form action="{{ route('stores.store') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name">
            </div>
            <div class="mb-3">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="number" class="form-control" id="product_price" name="product_price">
            </div>
            <div class="mb-3">
                <label for="product_quantity" class="form-label">Product Quantity</label>
                <input type="number" class="form-control" id="product_quantity" name="product_quantity">
            </div>
            <div class="mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <textarea class="form-control" id="product_description" name="product_description"></textarea>
            </div>
            <div class="mb-3">
                <label for="product_image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="product_image" name="product_image">
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
            <a href="{{route('stores.dashboard')}}" class="btn btn-danger">Cancel</a>
        </form>





    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
