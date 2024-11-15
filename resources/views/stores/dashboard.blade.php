<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Cards Interface</title>
    <!-- Bootstrap CSS Online ko na para wag na mag download -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">CRUD Cards Interface</h1>

        <div class="text-end mb-3">
            <button class="btn btn-success" id="addItem">Add New Item</button>
        </div>

        <!-- Card Grid para madali buhay -->
        <div class="d-flex justify-content-center">
            <div class="row g-4 d-flex justify-content-center" id="cardContainer" style="max-width: 1200px;">

                <!-- Starts ng Cards -->
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Item Image">
                        <div class="card-body">
                            <h5 class="card-title">Item 1</h5>
                            <p class="card-text">This is a short description of the item. Replace this with dynamic data.</p>
                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-primary btn-sm" id="editItem">Edit</button>
                            <button class="btn btn-danger btn-sm" id="deleteItem">Delete</button>
                        </div>
                    </div>
                </div>
                <!--DIto seperation-->
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Item Image">
                        <div class="card-body">
                            <h5 class="card-title">Item 1</h5>
                            <p class="card-text">This is a short description of the item. Replace this with dynamic data.</p>
                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-primary btn-sm" id="editItem">Edit</button>
                            <button class="btn btn-danger btn-sm" id="deleteItem">Delete</button>
                        </div>
                    </div>
                </div>

                <!--DIto end ng cards-->
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
