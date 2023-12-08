<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier View</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your other CSS files here -->

    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar with categories and subcategories -->
            <div class="col-md-3">
                <h4>Categories</h4>
                <ul class="list-group">
                    <li class="list-group-item">
                    <strong>Phones</strong>
                        <select name="" id="">
                        <ul class="list-group">
                                <option value="admin">Iphone</option>
                                <option value="cashier">Oppo</option>
                                <option value="cashier">Samsung</option>
                        </ul>
                        </select>
                    </li>
                    <!-- Add more categories/subcategories here -->
                </ul>
            </div>

            <!-- Product tiles and selected item -->
            <div class="col-md-9">
                <div class="row">
                    <!-- Product tiles -->
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="product_image_url.jpg" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">$Price</p>
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    <!-- Add more product tiles here -->

                    <!-- Selected item and subtotal/total -->
                    <div class="col-md-8">
                        <h4>Selected Item</h4>
                        <div class="card">
                            <div class="card-body">
                                <!-- Display selected item details here -->
                                <h5 class="card-title">Selected Product Name</h5>
                                <p class="card-text">$Selected Price</p>
                                <!-- Add more details if needed -->

                                <!-- Subtotal and Total -->
                                <hr>
                                <p><strong>Subtotal:</strong> $Subtotal</p>
                                <p><strong>Total:</strong> $Total</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Your custom scripts -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/datatables-demo.js') }}"></script>

    <!-- Your additional custom scripts for the cashier view -->
    <script>
        // Add your specific scripts for the cashier view here
    </script>
</body>

</html>
