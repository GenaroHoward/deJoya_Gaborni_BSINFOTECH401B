<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
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

    <div class="container text-center my-5 p-5 bg-white" style="border-radius:10px;">
        <div class="row row-cols-xxl-2 mb-4">
            <div class="col-md-6 text-start mb-4">
                <a href="{{ route('stores.dashboard') }}" class="btn" style="background-color:#102542;color:#ffffff;"><i class="bi bi-arrow-left me-2 align-middle"></i>Back to Dashboard</a>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('stores.edit', $stores->id) }}" class="btn me-2" style="background-color:#F3C677;"><i class="bi bi-pencil-square me-2 align-middle"></i>Edit</a>
                <form action="{{ route('stores.destroy', $stores->id) }}" method="POST" id="deleteForm-{{ $stores->id }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn" style="background-color:#F87060;color:#ffffff;" onclick="confirmDelete({{ $stores->id }})"><i class="bi bi-trash-fill me-2 align-middle"></i>Delete</button>
                </form>
            </div>
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
        <div class="row row-cols-xxl-2">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $stores->product_image) }}" alt="Product Image" class="img-fluid img-preview border mb-4">
            </div>
            <div class="col-md-6 text-start">
                <h1 class="picton-blue funnel-display" style="overflow-wrap: anywhere;">{{ $stores->product_name }}</h1>
                <div class="container bordered-item p-3 my-3">
                    <span class="align-middle"><strong><i class="bi bi-tag-fill me-2 fs-4 align-middle"></i>Price:</strong> PHP {{ $stores->product_price }}</span>
                </div>
                <div class="container bordered-item p-3 my-3">
                    <span class="align-middle"><strong><i class="bi bi-hash me-2 fs-4 align-middle"></i>Quantity:</strong> {{ $stores->product_quantity }}</span>
                </div>
                <div class="container bordered-item p-3 my-3">
                    <span class="align-middle" style="overflow-wrap: anywhere;"><strong><i class="bi bi-clipboard me-2 fs-4 align-middle"></i>Description:</strong> {{ $stores->product_description }}</span>
                </div>
            </div>
        </div>
    </div>

    <div style="background-color:#ffffff; margin-top:100px; position:relative; bottom:0; width:100%;">
        <hr class="custom-divider">
        <div class="p-5">
            <div class="row">
                <div class="col">
                    <h3 class="funnel-display">
                        What You Can Do While Viewing A Product...
                    </h3>
                    <div class="ps-4">
                        1. There will be information displayed about the chosen product.<br>
                        <div class="ps-4">
                            a. <strong>Image:</strong> This helps in envisioning what the product may look like.<br>
                            b. <strong>Name:</strong> This is the currently chosen product's name.<br>
                            c. <strong>Price:</strong> The Philippine Peso (PHP) is automatically attached for understanding it's monetary value.<br>
                            d. <strong>Quantity:</strong> This displays how many of the currently chosen product is listed.<br>
                            e. <strong>Description:</strong> A description added to the product to understand more about it.
                        </div>
                        2. Edit the currently chosen product by clicking on the "<i class="bi bi-pencil-square me-2 align-middle"></i>Edit" button.<br>
                        3. Delete the currently chosen product by clicking on the "<i class="bi bi-trash-fill me-2 align-middle"></i>Delete" button.<br>
                        4. If you wish to see the other products again, click on the "<i class="bi bi-arrow-left me-2 align-middle"></i>Back to Dashboard" button.
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
