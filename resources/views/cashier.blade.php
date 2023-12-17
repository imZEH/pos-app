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

    @include('partial.css_cashier')

</head>

<body id="page-top">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-8">
                <div class="col-12">
                    <div class="row">
                        <div class="input-group">
                            <input id="searchProduct" type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for Product..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button id="searchButton" class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                                <button id="clearButton" class="btn btn-primary" type="button">
                                    Clear
                                </button>
                            </div>
                        </div>
                        <div class="container mt-4">
                            <div class="btn-group" role="group" aria-label="Button group">
                                <div id="categoryContainer" class="row">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4 mb-4">
                    <div id="productList" class="row">

                    </div>

                </div>
            </div>
            <div class="col-4">
                <div class="row ">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-9">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" id="customerName"
                                        placeholder="Search for Customer..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                        <input type="hidden" id="customerId">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="suggestionsPanel" class="position-absolute bg-light border rounded mt-1"
                                    style="display: none; max-height: 150px; overflow-y: auto; z-index: 2147483647;width: 85%;">
                                    <!-- Autocomplete results will be displayed here -->
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
                        <table class="table table-borderless align-items-center mb-1" id="productTable" cellspacing="0">
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
                                        <td id="subtotalvalue" class="text-right">₱0.00</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td id="totalValue" class="text-right">₱0.00</td>
                                    </tr>
                                    <tr style="
                                    font-size: 15px;
                                ">
                                        <th>Amount Tendered</th>
                                        <td class="text-right">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">₱</span>
                                                </div>
                                                <input id="amountTendered" type="text" class="form-control"
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
                                        <td id="changeValue" class="text-right">₱0.00</td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="col-12">
                                <a id="btnOrderSave" class="col-12 btn btn-success " href="#">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('partial.jsimports')
    @include('partial.js_cashier')

</body>

</html>
