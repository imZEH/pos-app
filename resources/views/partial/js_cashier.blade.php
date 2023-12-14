<script>
    var subids = [];
    var selectedProducts = {};
    var subtotal = 0;

    $(document).ready(function () {
        selectedProducts = JSON.parse(localStorage.getItem('selectedProducts')) || {};
        getCategory();
        getProducts(subids);
        registerEventsListener();

        restoreOrders();
        updateTotals();
    });

    function restoreOrders() {
        Object.keys(selectedProducts).forEach(function (id) {
            var product = selectedProducts[id];
            addRowToProductTable(id, product.name, product.sellingPrice, product.quantity);
        });
    }

    function registerEventsListener() {
        var searchInput = $("#searchProduct");
        const customerNameInput = $('#customerName');
        const suggestionsPanel = $('#suggestionsPanel');

        searchInput.on('input', function () {
            getProducts(subids);
        });

        var searchButton = $("#searchButton");
        var clearButton = $("#clearButton");
        var btnOrderSave = $("#btnOrderSave");

        searchButton.on('click', function () {
            getProducts(subids);
        });

        btnOrderSave.on('click', function () {
            saveOrder();
        });

        clearButton.on('click', function () {
            $('.dropdown-item').removeClass('active');
            $('#searchProduct').val('');
            subids = [];
            getProducts(subids);
        });

        $('#amountTendered').on('input', function () {
            var totalAmount = parseFloat($('#subtotalvalue').text().replace('$', ''));
            var amountTendered = parseFloat($(this).val()) || 0;
            var change = amountTendered - totalAmount;
            $('#changeValue').text('$' + change.toFixed(2));
        });

        customerNameInput.on('input', function () {
            const query = $(this).val();
            if (query.length >= 1) {
                getCustomers(query);
            } else {
                suggestionsPanel.hide();
            }
        });

        // Close suggestions panel when clicking outside the input and panel
        $(document).on('click', function (event) {
            if (!$(event.target).closest('.input-group').length) {
                suggestionsPanel.hide();
            }
        });
    }

    function getCustomers(query) {
        $.ajax({
            url: '/api/getcustomerbysearch',
            method: 'POST',
            contentType: 'application/json', // Set the content type to JSON
            data: JSON.stringify({
                query: query
            }),
            success: function (customers) {
                const suggestionsPanel = $('#suggestionsPanel');
                suggestionsPanel.empty();

                for (let i = 0; i < customers["data"].length; i++) {
                    const customer = customers["data"][i];
                    const suggestionItem = $('<div class="autocomplete-item p-2">' + customer.firstName +
                        ' ' + customer.lastName +
                        '</div>');

                    suggestionItem.on('click', function () {
                        // Handle item selection, e.g., fill input with selected value
                        $('#customerName').val(customer.firstName + ' ' + customer.lastName);
                        $('#customerId').val(customer.id);
                        suggestionsPanel.hide();
                    });

                    suggestionsPanel.append(suggestionItem);
                }

                if (customers["data"].length > 0) {
                    suggestionsPanel.show();
                } else {
                    suggestionsPanel.hide();
                }
            },
            error: function (error) {
                console.error('Error fetching product data:', error);
            }
        });
    }

    function updateSuggestions(data) {
        var suggestions = data.data;

        if (suggestions.length > 0) {
            var suggestionHtml = '';

            suggestions.forEach(function (customer) {
                suggestionHtml += '<div class="p-2 suggestion-item" data-id="' + customer.id + '">' +
                    customer.firstName + ' ' + customer.lastName +
                    '</div>';
            });

            suggestionsPanel.html(suggestionHtml);
            suggestionsPanel.show();

            $('.suggestion-item').on('click', function () {
                var selectedId = $(this).data('id');
                var selectedCustomer = suggestions.find(function (customer) {
                    return customer.id === selectedId;
                });

                $('#customerName').val(selectedCustomer.firstName + ' ' + selectedCustomer.lastName);
                suggestionsPanel.hide();
            });
        } else {
            suggestionsPanel.hide();
        }
    }


    function getCategory() {
        $.get('/api/category', function (categories) {
            categories["data"].forEach(function (category) {
                // Create the button for the category
                var categoryButton = $('<button>', {
                    class: 'btn btn-light dropdown-toggle',
                    type: 'button',
                    'data-toggle': 'dropdown',
                    'aria-haspopup': 'true',
                    'aria-expanded': 'false',
                    text: category.name,
                });

                var dropdownMenu = $('<div>', {
                    class: 'dropdown-menu',
                    'aria-labelledby': category.id +
                        'Dropdown',
                });

                $.get('/api/subcategory/' + category.id, function (subcategories) {
                    subcategories["data"].forEach(function (subcategory) {

                        var dropdownItem = $('<a>', {
                            class: 'dropdown-item',
                            href: '#',
                            text: subcategory.name,
                            id: subcategory.id
                        });

                        dropdownItem.click(function () {
                            dropdownItem.toggleClass('active');

                            var subcategoryId = subcategory.id;

                            if (dropdownItem.hasClass('active')) {
                                subids.push(subcategoryId);
                            } else {
                                var index = subids.indexOf(
                                    subcategoryId);
                                if (index !== -1) {
                                    subids.splice(index, 1);
                                }
                            }

                            getProducts(subids);
                            event.stopPropagation();
                        });

                        dropdownMenu.append(dropdownItem);
                    });
                });

                var categoryContainer = $('<div>', {
                    class: 'col dropdown',
                });

                categoryContainer.append(categoryButton, dropdownMenu);

                $('#categoryContainer').append(categoryContainer);
            });
        });
    }

    function getProducts(subids) {
        var query = $('#searchProduct').val();
        $.ajax({
            url: '/api/getproductbysearch',
            method: 'POST',
            contentType: 'application/json', // Set the content type to JSON
            data: JSON.stringify({
                query: query,
                subcategoryIds: subids
            }),
            success: function (products) {
                $('#productList').empty();
                for (let i = 0; i < products["data"].length; i++) {
                    let product = products["data"][i];

                    let card = $('<div class="card product-item  mr-4 mb-4" style="width: 15rem;">');

                    // card.append('<img src="' + product.image + '" class="card-img-top" alt="..." height="200">');
                    card.append(
                        '<img src="../img/iphone1.jpg" class="card-img-top" alt="..." height="200">');

                    card.append('<div class="card-body">' +
                        '<span class="card-text"><h5>' + product.name + '</h5></span>' +
                        '<p class="card-text" style="color: orange;">$' + product.sellingPrice.toFixed(
                            2) + '</p>' +
                        '</div>');

                    card.on('click', function () {
                        addToProductTable(product);
                    });

                    $('#productList').append(card);
                }
            },
            error: function (error) {
                console.error('Error fetching product data:', error);
            }
        });
    }

    function addToProductTable(product) {
        if (selectedProducts[product.id]) {
            var newQuantity = selectedProducts[product.id].quantity + 1;
            selectedProducts[product.id].quantity = newQuantity;
            updateQuantityInput(product.name, newQuantity);
        } else {
            selectedProducts[product.id] = {
                name: product.name,
                quantity: 1,
                sellingPrice: product.sellingPrice,
            };

            addRowToProductTable(product.id, product.name, product.sellingPrice, 1);

            updateTotals();
        }

        localStorage.setItem('selectedProducts', JSON.stringify(selectedProducts));
    }

    function addRowToProductTable(id, name, sellingPrice, quantity) {
        var row = $('<tr>').append(
            $('<td>').text(name),
            $('<td>').append($('<input>').attr({
                type: 'number',
                class: 'quantity-input',
                value: quantity,
                min: 1
            }).on('change', function () {
                selectedProducts[id] = {
                    name: name,
                    quantity: this.value,
                    sellingPrice: sellingPrice,
                };

                updateTotals();

                localStorage.setItem('selectedProducts', JSON.stringify(selectedProducts));
            })),
            $('<td>').text('$' + sellingPrice.toFixed(2))
        );

        $('#productTable').append(row);
    }

    function updateQuantityInput(name, newQuantity) {
        $('#productTable .quantity-input').each(function () {
            if ($(this).closest('tr').find('td:first-child').text() === name) {
                $(this).val(newQuantity);
            }
        });

        updateTotals();
    }

    function updateTotals() {
        for (var id in selectedProducts) {
            if (selectedProducts.hasOwnProperty(id)) {
                var product = selectedProducts[id];
                var itemSubtotal = product.sellingPrice * product.quantity;
                subtotal += itemSubtotal;
            }
        }

        $('#subtotalvalue').text('$' + subtotal.toFixed(2));
        $('#totalValue').text('$' + subtotal.toFixed(2));
    }

    function saveOrder() {
        var amountTendered = parseFloat($('#amountTendered').val()) || 0;
        var customerName = $('#customerName').val();

        const result = parseName(customerName);

        if (subtotal <= 0) {
            $.toast({
                heading: 'Error',
                text: "Empty order",
                showHideTransition: 'slide',
                position: 'bottom-right',
                icon: 'error'
            })
            return;
        }

        if (amountTendered >= subtotal) {
            var customerId = $('#customerId').val();
            var orderData = {
                "customerId": customerId,
                "customerFirstName": result.firstName,
                "customerLastName": result.lastName,
                "transctionId": 1,
                "products": selectedProducts,
            };

            var apiUrl = "/api/orders";
            $.ajax({
                type: "POST",
                url: apiUrl,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify(orderData),
                success: function (response) {
                    $.toast({
                        heading: 'Success',
                        text: 'Order created successfully',
                        showHideTransition: 'slide',
                        position: 'bottom-right',
                        icon: 'success'
                    })

                    clearOrders();
                },
                error: function (error) {
                    $.toast({
                        heading: 'Error',
                        text: "Error creating order:",
                        error,
                        showHideTransition: 'slide',
                        position: 'bottom-right',
                        icon: 'error'
                    })
                }
            });
        } else {
            $.toast({
                heading: 'Error',
                text: "The amount tendered is less than the total amount",
                showHideTransition: 'slide',
                position: 'bottom-right',
                icon: 'error'
            })
        }
    }

    function parseName(fullName) {
        const words = fullName.split(' ');
        const firstName = words[0];
        let lastName = '';

        if (words.length > 1) {
            // Concatenate the second to last word as the last name
            lastName = words.slice(1).join(' ');
        }

        return {
            firstName: firstName,
            lastName: lastName
        };
    }

    function clearOrders() {
        $('#customerName').val("");
        $('#customerId').val("");
        $('#searchProduct').val("");
        $('#productTable').empty();
        $('#amountTendered').val("");
        $('#changeValue').text('$0.00');
        $('.dropdown-item').removeClass('active');
        subids = [];
        selectedProducts = {};
        localStorage.setItem('selectedProducts', JSON.stringify(selectedProducts));
        subtotal = 0;
        updateTotals();
        getProducts(subids);
    }

</script>
