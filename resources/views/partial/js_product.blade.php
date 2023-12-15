<script>
    function formatDate(dateString) {
        const options = {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
        };
        const formattedDate = new Date(dateString).toLocaleDateString('en-US', options);
        return formattedDate;
    }

    $(document).ready(function () {
        getProducts();
        getUnit();
        getCategory();
        // getsubcategory();
        // Trigger on change
        // Display selected file name
        $('#imgPath').change(function () {
            var fileName = $(this).val().split('\\').pop();
            $('#imageLabel').text(fileName);
        });

        // Form submission
        $('#productForm').submit(function (e) {
            e.preventDefault();

            var formData = new FormData($(this)[0]);

            $.ajax({
                url: '/api/product',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    get();
                    // Close the modal after the request is completed
                    closeModal();
                    // Handle success response
                },
                error: function (error) {
                    console.log(error);
                    // Handle error response
                }
            });
        });

        $('#categoryId').change(function () {
            var categoryId = $(this).val();
            if (categoryId) {
                getsubcategoryId(categoryId);
            } else {
                $('#subCategoryId').html('<option value="">Please select a category</option>');
            }
        });
        // Click event for the Save button in the modal
        // $('#btnProductSave').on('click', function (e) {
        //     e.preventDefault();
        //     // Make the POST request here if needed
        //     save();

        //     // Fetch data from the API
        //     get();
        //     // Close the modal after the request is completed
        //     closeModal();
        // });
    });

    function getProducts() {
        $('#productTable').DataTable({
            ajax: {
                url: '/api/product',
                dataSrc: 'data' // Specify the data source key
            },
            columns: [{
                    data: 'name'
                },
                {
                    data: 'sellingPrice'
                },
                {
                    data: 'stock'
                },
                {
                    data: 'unit'
                },
                {
                    data: 'categoryname'
                },
                {
                    data: 'subcategoryname'
                },
                {
                    data: 'imgPath'
                },
            ],
        });
    }

    function get() {
        $.ajax({
            url: '/api/product',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                // Clear existing table rows
                $('#productTable tbody').empty();

                // Check if the response status is 200 and data is available
                if (response.status === 200 && response.data.length > 0) {
                    // Iterate through the received data and append rows to the table
                    $.each(response.data, function (index, item) {
                        var newRow = '<tr>' +
                            '<td>' + item.name + '</td>' +
                            '<td>' + item.sellingPrice + '</td>' +
                            '<td>' + item.stock + '</td>' +
                            '<td>' + item.unit + '</td>' +
                            '<td>' + item.categoryname + '</td>' +
                            '<td>' + item.subcategoryname + '</td>' +
                            '<td>' + item.imgPath + '</td>' +
                            '<td>Actions</td>' +
                            '</tr>';

                        $('#productTable tbody').append(newRow);
                    });
                } else {
                    console.log('No data available.');
                }
            },
            error: function (error) {
                console.log('Error fetching data:', error);
            }
        });
    }

    // Function to close the modal
    function closeModal() {
        $('#productModal').modal('hide');
    }

    function save() {
        var apiEndpoint = "/api/product";

        // Get values from input fields
        var name = $('#name').val();
        var sellingPrice = $('#sellingPrice').val();
        var stock = $('#stock').val();
        var unitId = $('#unitId').val();
        var categoryId = $('#categoryId').val();
        var subCategoryId = $('#subCategoryId').val();
        var imgPath = $('#imgPath')[0].files[0];

        // Use FormData for file uploads
        var formData = new FormData();
        formData.append('name', name);
        formData.append('sellingPrice', sellingPrice);
        formData.append('stock', stock);
        formData.append('unitId', unitId);
        formData.append('categoryId', categoryId);
        formData.append('subCategoryId', subCategoryId);
        formData.append('imgPath', imgPath);

        // Make POST request with FormData
        $.ajax({
            url: apiEndpoint,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log('POST request successful:', response);
                // Clear input fields
                $('#name, #sellingPrice, #stock, #unitId, #categoryId, #subCategoryId, #imgPath').val("");
                // Close the modal after a successful request
                closeModal();
            },
            error: function (error) {
                console.error('Error making POST request:', error);
            }
        });
    }


    function getUnit() {
        $.ajax({
            url: '/api/unit',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                // Clear existing table rows
                $('#unitId').empty();

                // Check if the response status is 200 and data is available
                if (response.status === 200 && response.data.length > 0) {
                    // Iterate through the received data and append rows to the table
                    $.each(response.data, function (index, item) {
                        var newRow = '<option value="' + item["id"] + '">' + item["name"] +
                            '</option>';

                        $('#unitId').append(newRow);
                    });
                } else {
                    console.log('No data available.');
                }
            },
            error: function (error) {
                console.log('Error fetching data:', error);
            }
        });
    }

    function getCategory() {
        $.ajax({
            url: '/api/category',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                // Clear existing table rows
                $('#categoryId').empty();

                // Check if the response status is 200 and data is available
                if (response.status === 200 && response.data.length > 0) {
                    // Iterate through the received data and append rows to the table
                    $.each(response.data, function (index, item) {
                        var newRow = '<option value="' + item["id"] + '">' + item["name"] +
                            '</option>';

                        $('#categoryId').append(newRow);

                        var initialCategoryId = $('#categoryId').val();
                        if (initialCategoryId) {
                            getsubcategoryId(initialCategoryId);
                        }
                    });
                } else {
                    console.log('No data available.');
                }
            },
            error: function (error) {
                console.log('Error fetching data:', error);
            }
        });
    }

    function getsubcategory() {
        $.ajax({
            url: '/api/subcategory',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                // Clear existing table rows
                $('#subCategoryId').empty();

                // Check if the response status is 200 and data is available
                if (response.status === 200 && response.data.length > 0) {
                    // Iterate through the received data and append rows to the table
                    $.each(response.data, function (index, item) {
                        var newRow = '<option value="' + item["id"] + '">' + item["name"] +
                            '</option>';

                        $('#subCategoryId').append(newRow);
                    });
                } else {
                    console.log('No data available.');
                }
            },
            error: function (error) {
                console.log('Error fetching data:', error);
            }
        });
    }

    function getsubcategoryId(categoryId) {
        $.ajax({
            url: '/api/subcategory/' + categoryId,
            type: 'GET',
            success: function (response) {
                if (response.status === 200) {
                    var subcategories = response.data;
                    var options = '';
                    $.each(subcategories, function (key, value) {
                        options += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('#subCategoryId').html(options);
                } else {
                    $('#subCategoryId').html('<option value="">No subcategories found</option>');
                }
            },
            error: function () {
                $('#subCategoryId').html('<option value="">Error fetching subcategories</option>');
            }
        });
    }

</script>
