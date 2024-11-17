<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $stores->product_name }}</h1>
        <img src="{{ asset('storage/' . $stores->product_image) }}" alt="Product Image" class="img-fluid mb-4">
        <p><strong>Price:</strong> ${{ $stores->product_price }}</p>
        <p><strong>Quantity:</strong> {{ $stores->product_quantity }}</p>
        <p><strong>Description:</strong> {{ $stores->product_description }}</p>
        <a href="{{ route('stores.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
    </div>
</body>
</html>
