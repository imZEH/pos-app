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
        .btn-group {
            overflow-x: auto;
            white-space: nowrap;
            width: 100%;
        }

        #productList{
            max-height: 600px; /* Set a maximum height for the container, adjust as needed */
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

    </style>

</head>

<body id="page-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="col-12">
                    <div class="row">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="container mt-4">
                                <div class="btn-group" role="group" aria-label="Button group"
                                    style="overflow-x: auto; white-space: nowrap; width: 100%;">
                                    <button type="button" class="btn btn-light mr-2">Mobile Phones</button>
                                    <button type="button" class="btn btn-light mr-2">Juice</button>
                                    <button type="button" class="btn btn-light mr-2">RTW</button>
                                    <button type="button" class="btn btn-light mr-2">Foods</button>
                                    <button type="button" class="btn btn-light mr-2">Laptop</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div  id="productList" class="col-12 mt-4">
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
            <div class="col-3">
                One of three columns
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
