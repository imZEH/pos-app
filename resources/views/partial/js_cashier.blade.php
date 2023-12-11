<script>
    var subids = [];
    var selectedProducts = {};

    // document.querySelectorAll('.btn').forEach(function (button) {
    //     button.addEventListener('click', function () {
    //         console.log("test");
    //         // Remove 'active' class from all buttons
    //         document.querySelectorAll('.btn').forEach(function (btn) {
    //             btn.classList.remove('active');
    //         });

    //         // Add 'active' class to the clicked button
    //         this.classList.add('active');
    //     });
    // });

    $(document).ready(function () {
        getCategory();
        getProducts(subids);
        registerEventsListener();
    });

    function registerEventsListener() {

        var searchInput = $("#searchProduct");

        searchInput.on('input', function () {
            getProducts(subids);
        });
        
        var searchButton = $("#searchButton");
        var clearButton = $("#clearButton");

        searchButton.on('click', function () {
            getProducts(subids);
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
        if (selectedProducts[product.name]) {
            var newQuantity = selectedProducts[product.name].quantity + 1;
            selectedProducts[product.name].quantity = newQuantity;
            updateQuantityInput(product.name, newQuantity);
        } else {
            selectedProducts[product.name] = {
                name: product.name,
                quantity: 1,
                sellingPrice: product.sellingPrice,
            };

            addRowToProductTable(product.name, product.sellingPrice, 1);

            updateTotals();
        }
    }

    function addRowToProductTable(name, sellingPrice, quantity) {
        var row = $('<tr>').append(
            $('<td>').text(name),
            $('<td>').append($('<input>').attr({
                type: 'number',
                class: 'quantity-input',
                value: quantity,
                min: 1
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
        var subtotal = 0;

        for (var productName in selectedProducts) {
            if (selectedProducts.hasOwnProperty(productName)) {
                var product = selectedProducts[productName];
                var itemSubtotal = product.sellingPrice * product.quantity;
                subtotal += itemSubtotal;
            }
        }

        $('#subtotalvalue').text('$' + subtotal.toFixed(2));
        $('#totalValue').text('$' + subtotal.toFixed(2));
    }

</script>
