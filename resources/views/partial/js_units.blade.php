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
        get();
        // Click event for the Save button in the modal
        $('#btnUnitSave').on('click', function (e) {
            e.preventDefault();
            // Make the POST request here if needed
            save();
            
            // Fetch data from the API
            get();
            // Close the modal after the request is completed
            closeModal();
        });
    });

    function get() {
        $.ajax({
            url: '/api/unit',
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
                            '<td>' + item.slug + '</td>' +
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
        $('#unitModal').modal('hide');
    }

    function save() {
        var apiEndpoint = "/api/unit";

        // Get values from input fields
        var unitName = $('#unitName').val();
        var unitSlug = $('#unitSlug').val();

        // JSON body data
        var requestBody = {
            "name": unitName,
            "slug": unitSlug
        };

        // Make POST request
        $.ajax({
            url: apiEndpoint,
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(requestBody),
            success: function (response) {
                console.log('POST request successful:', response);
                $('#unitName').val("");
                $('#unitSlug').val("");
                // Close the modal after a successful request
                closeModal();
            },
            error: function (error) {
                console.error('Error making POST request:', error);
            }
        });
    }

</script>
