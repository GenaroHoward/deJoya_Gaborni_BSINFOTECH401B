<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Cards Interface</title>
    <!-- Bootstrap CSS Online ko na para wag na mag download -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .card-body {
        font-size: 0.85rem;
    }
    .card-title {
        font-size: 1rem;
        font-weight: bold;
    }
    .card-text{
        font-size: 0.7rem;
        margin-bottom: 2px;
    }
    .btn
    {
        font-size: .7rem;
    }
</style>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">CRUD Cards Interface</h1>

        <div class="text-end mb-3">
            <a href="{{route('stores.create')}}" class="btn btn-success" id="addItem">Add New Item</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-4 g-4 d-flex justify-content-center">
            @if($stores->isEmpty())
                <p class="text-center fs-4">No Products Currently Listed</p>
            @else
            @foreach($stores as $store)
                <div class="col">
                    <div class="card">
                        <!-- Display image need ata set size kaso di ko lam pano -->
                        <img src="{{ asset('storage/' . $store->product_image) }}" class="card-img-top" alt="Product Image">

                        <div class="card-body">
                            <h5 class="card-title">{{ $store->product_name }}</h5>
                            <p class="card-text">{{ $store->product_description }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ $store->product_price }}</p>
                            <p class="card-text"><strong>Quantity:</strong> {{ $store->product_quantity }}</p>

                            <div class="d-flex justify-content-center">
                                <div>
                                    <a href="{{ route('stores.view', $store->id) }}" class="btn btn-primary">View</a>
                                </div>
                                <div>
                                    <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-warning">Edit</a>
                                </div>
                                <form action="{{ route('stores.destroy', $store->id) }}" method="POST" id="deleteForm-{{ $store->id }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $store->id }})">Delete</button>
                                </form>

                                <script>
                                    function confirmDelete(storeId) {
                                        if (confirm("Are you sure you want to delete this item?")) {
                                            // If user clicks 'OK', submit the form
                                            document.getElementById('deleteForm-' + storeId).submit();
                                        } else {
                                            event.preventDefault();
                                            return false;
                                        }
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
        <!-- Card Grid ends here -->
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
