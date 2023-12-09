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
        getsubCategory();
        getcategory();
        // Click event for the Save button in the modal
        $('#btnSubcategorySave').on('click', function (e) {
            e.preventDefault();
            // Make the POST request here if needed
            save();
            
            // Fetch data from the API
            get();
            // Close the modal after the request is completed
            closeModal();
        });
    });
    function getsubCategory() {
        $('#dataTable').DataTable({
            ajax: {
                url: '/api/subcategory',
                dataSrc: 'data'  // Specify the data source key
            },
            columns: [
                { data: 'name' },
                { data: 'categoryname' },
                { 
                    data: 'created_at',
                    render: function(data, type, row) {
                        // Format date only for display, not for sorting
                        if (type === 'display' || type === 'filter') {
                            return formatDate(data); // Use your formatDate function
                        }
                        return data;
                    }
                },
                { 
                    data: 'updated_at',
                    render: function(data, type, row) {
                        // Format date only for display, not for sorting
                        if (type === 'display' || type === 'filter') {
                            return formatDate(data); // Use your formatDate function
                        }
                        return data;
                    }
                },
            ],
        });
    }

    function get() {
        $.ajax({
            url: '/api/subcategory',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                // Clear existing table rows
                $('#dataTable tbody').empty();

                // Check if the response status is 200 and data is available
                if (response.status === 200 && response.data.length > 0) {
                    // Iterate through the received data and append rows to the table
                    $.each(response.data, function (index, item) {
                        var newRow = '<tr>' +
                            '<td>' + item.name + '</td>' +
                            '<td>' + item.categoryname + '</td>' +
                            '<td>' + formatDate(item.created_at) + '</td>' +
                            '<td>' + formatDate(item.updated_at) + '</td>' +
                            '<td>Actions</td>' +
                            '</tr>';

                        $('#dataTable tbody').append(newRow);
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
        $('#subcategoryModal').modal('hide');
    }

    function save() {
        var apiEndpoint = "/api/subcategory";

        // Get values from input fields
        var name = $('#subcategoryName').val();
        var categoryId = $('#categoryName').val();
        

        // JSON body data
        var requestBody = {
            "name": name,
            "categoryId": categoryId
        };

        // Make POST request
        $.ajax({
            url: apiEndpoint,
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(requestBody),
            success: function (response) {
                console.log('POST request successful:', response);
                $('#subcategoryName').val("");
                $('#categoryName').val("");
                // Close the modal after a successful request
                closeModal();
            },
            error: function (error) {
                console.error('Error making POST request:', error);
            }
        });
    }

    function getcategory() {
        $.ajax({
            url: '/api/category',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                // Clear existing table rows
                $('#categoryName').empty();

                // Check if the response status is 200 and data is available
                if (response.status === 200 && response.data.length > 0) {
                    // Iterate through the received data and append rows to the table
                    $.each(response.data, function (index, item) {
                        var newRow = '<option value="'+item["id"]+'">'+item["name"]+'</option>';

                        $('#categoryName').append(newRow);
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

</script>
