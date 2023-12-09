<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS | Home</title>

    @include('partial.csimports')

    <style>
        /* Custom scrollbar styles */
        .btn-group::-webkit-scrollbar {
            width: 5px;
            /* Adjust the width as needed */
        }

        .btn-group::-webkit-scrollbar-thumb {
            background-color: #808080;
            /* Gray color, change as needed */
            border-radius: 10px;
        }

        .btn-group::-webkit-scrollbar-track {
            background-color: #f8f9fa;
            /* Light gray background, change as needed */
            border-radius: 10px;
        }

        /* Additional styles for button group */


        #productList {
            max-height: 600px;
            /* Set a maximum height for the container, adjust as needed */
            overflow-y: auto;
        }

        #productList::-webkit-scrollbar {
            width: 5px;
            /* Adjust the width as needed */
        }

        #productList::-webkit-scrollbar-thumb {
            background-color: #808080;
            /* Gray color, change as needed */
            border-radius: 10px;
        }

        #productList::-webkit-scrollbar-track {
            background-color: #f8f9fa;
            /* Light gray background, change as needed */
            border-radius: 10px;
        }

        #Totaltable tbody tr {
            height: -10px;
            /* Adjust the height as needed */
        }
        #productSummary {
            max-height: 250px;
            /* Set a maximum height for the container, adjust as needed */
            overflow-y: auto;
        }

        #productSummary::-webkit-scrollbar {
            width: 5px;
            /* Adjust the width as needed */
        }

        #productSummary::-webkit-scrollbar-thumb {
            background-color: #808080;
            /* Gray color, change as needed */
            border-radius: 10px;
        }

        #productSummary::-webkit-scrollbar-track {
            background-color: #f8f9fa;
            /* Light gray background, change as needed */
            border-radius: 10px;
        }
    </style>

</head>

<body id="page-top">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-8">
                <div class="col-12">
                    <div class="row">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for Product..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        <div class="container mt-4">
                            <div class="btn-group" role="group" aria-label="Button group">
                                <div class="row">
                                    <div class="col dropdown">
                                        <button class="btn btn-light dropdown-toggle" type="button"
                                            id="mobilePhonesDropdown" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Mobile Phones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="mobilePhonesDropdown">
                                            <a class="dropdown-item" href="#">Android</a>
                                            <a class="dropdown-item" href="#">iOS</a>
                                            <a class="dropdown-item" href="#">Windows</a>
                                        </div>
                                    </div>

                                    <!-- Repeat the above structure for other categories -->

                                    <!-- Juice -->
                                    <div class="col dropdown">
                                        <button class="btn btn-light dropdown-toggle" type="button" id="juiceDropdown"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Juice
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="juiceDropdown">
                                            <a class="dropdown-item" href="#">Fruit Juice</a>
                                            <a class="dropdown-item" href="#">Vegetable Juice</a>
                                            <a class="dropdown-item" href="#">Smoothies</a>
                                        </div>
                                    </div>

                                    <!-- RTW -->
                                    <!-- Add similar structures for RTW, Foods, and Laptop -->

                                    <div class="col dropdown">
                                        <button class="btn btn-light dropdown-toggle" type="button" id="rtwDropdown"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            RTW
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="rtwDropdown">
                                            <a class="dropdown-item" href="#">Shirts</a>
                                            <a class="dropdown-item" href="#">Pants</a>
                                            <a class="dropdown-item" href="#">Dresses</a>
                                        </div>
                                    </div>

                                    <!-- Foods -->
                                    <div class="col dropdown">
                                        <button class="btn btn-light dropdown-toggle" type="button" id="foodsDropdown"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Foods
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="foodsDropdown">
                                            <a class="dropdown-item" href="#">Fruits</a>
                                            <a class="dropdown-item" href="#">Vegetables</a>
                                            <a class="dropdown-item" href="#">Meat</a>
                                        </div>
                                    </div>

                                    <!-- Laptop -->
                                    <div class="col dropdown">
                                        <button class="btn btn-light dropdown-toggle" type="button" id="laptopDropdown"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Laptop
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="laptopDropdown">
                                            <a class="dropdown-item" href="#">Windows</a>
                                            <a class="dropdown-item" href="#">MacOS</a>
                                            <a class="dropdown-item" href="#">Chromebook</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="productList" class="col-12 mt-4 mb-4">
                    <div class="row">
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                        <div class="card  mr-4 mb-4" style="width: 15rem;">
                            <img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">
                            <div class="card-body">
                                <span class="card-text">
                                    <h5>iPhone 12</h5>
                                </span>
                                <p class="card-text" style="color: orange;">$10.00</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-4">
                <div class="row ">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-9">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for Customer..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <div class="col" id="productSummary">
                        <table class="table table-borderless align-items-center mb-1" id="productTable" 
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DATA HERE -->
                                <tr class="odd" style="
                                font-size: 15px;
                            ">
                                    <td class="sorting_1">Iphone12 Pro Max</td>
                                    <td><input type="number" class="form-control bg-light border-0 small"></td>
                                    <td>8000</td>

                                </tr>
                                <tr class="odd" style="
                                font-size: 15px;
                            ">
                                    <td class="sorting_1">Iphone12 Pro Max</td>
                                    <td><input type="number" class="form-control bg-light border-0 small"></td>
                                    <td>8000</td>

                                </tr>
                                <tr class="odd" style="
                                font-size: 15px;
                            ">
                                    <td class="sorting_1">Iphone12 Pro Max</td>
                                    <td><input type="number" class="form-control bg-light border-0 small"></td>
                                    <td>8000</td>

                                </tr>
                                <tr class="odd" style="
                                font-size: 15px;
                            ">
                                    <td class="sorting_1">Iphone12 Pro Max</td>
                                    <td><input type="number" class="form-control bg-light border-0 small"></td>
                                    <td>8000</td>

                                </tr>
                                <tr class="odd" style="
                                font-size: 15px;
                            ">
                                    <td class="sorting_1">Iphone12 Pro Max</td>
                                    <td><input type="number" class="form-control bg-light border-0 small"></td>
                                    <td>8000</td>

                                </tr>
                                <tr class="odd" style="
                                font-size: 15px;
                            ">
                                    <td class="sorting_1">Iphone12 Pro Max</td>
                                    <td><input type="number" class="form-control bg-light border-0 small"></td>
                                    <td>8000</td>

                                </tr>
                                <tr class="odd" style="
                                font-size: 15px;
                            ">
                                    <td class="sorting_1">Iphone12 Pro Max</td>
                                    <td><input type="number" class="form-control bg-light border-0 small"></td>
                                    <td>8000</td>

                                </tr>
                                <tr class="odd" style="
                                font-size: 15px;
                            ">
                                    <td class="sorting_1">Iphone12 Pro Max</td>
                                    <td><input type="number" class="form-control bg-light border-0 small"></td>
                                    <td>8000</td>

                                </tr>
                                




                            </tbody>
                        </table>
                    </div>


                    <div class="col-12">
                        <div class="row">


                            <table id="Totaltable" class="table table-borderless align-items-center">
                                <tbody>
                                    <tr style="
                                    font-size: 15px;
                                ">
                                        <th>Subtotal</th>
                                        <td class="text-right">$100</td>
                                    </tr>
                                    <tr >
                                        <th>Total</th>
                                        <td class="text-right">$100</td>
                                    </tr>
                                    <tr style="
                                    font-size: 15px;
                                ">
                                        <th>Amount Tendered</th>
                                        <td class="text-right">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="
                                    font-size: 15px;
                                ">
                                        <th>Change</th>
                                        <td class="text-right">$20</td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="col-12">
                                <a id="btnProductSave" class="col-12 btn btn-success " href="#">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('partial.jsimports')

    <script>
        // Add click event listener to the buttons
        document.querySelectorAll('.btn').forEach(function (button) {
            button.addEventListener('click', function () {
                console.log("test");
                // Remove 'active' class from all buttons
                document.querySelectorAll('.btn').forEach(function (btn) {
                    btn.classList.remove('active');
                });

                // Add 'active' class to the clicked button
                this.classList.add('active');
            });
        });

    </script>

</body>

</html>