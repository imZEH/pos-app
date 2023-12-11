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
        getCustomers();
        // Click event for the Save button in the modal
        $('#btnCustomerSave').on('click', function (e) {
            e.preventDefault();
            // Make the POST request here if needed
            save();
            
            // Fetch data from the API
            get();
            // Close the modal after the request is completed
            closeModal();
        });
    });
    
    function getCustomers() {
    $('#customerTable').DataTable({
        ajax: {
            url: '/api/customer',
            dataSrc: 'data', // Specify the data source key
        },
        columns: [
            { data: 'firstName' },
            { data: 'lastName' },
            { data: 'contactNumber' },
            { data: 'address' },
        ],
        "initComplete": function(settings, json) {
            if (json.data.length === 0) {
                // Handle empty data case, for example, show a message
                $('#customerTable').html('<p>No customers available</p>');
            }
        }
    });
}


    function get() {
        $.ajax({
            url: '/api/customer',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                // Clear existing table rows
                $('#customerTable tbody').empty();

                // Check if the response status is 200 and data is available
                if (response.status === 200 && response.data.length > 0) {
                    // Iterate through the received data and append rows to the table
                    $.each(response.data, function (index, item) {
                        var newRow = '<tr>' +
                            '<td>' + item.firstName + '</td>' +
                            '<td>' + item.lastName + '</td>' +
                            '<td>' + item.contactNumber + '</td>' +
                            '<td>' + item.address + '</td>' +
                            '<td>Actions</td>' +
                            '</tr>';

                        $('#customerTable tbody').append(newRow);
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
        $('#customerModal').modal('hide');
    }

    function save() {
        var apiEndpoint = "/api/customer";

        // Get values from input fields
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var contactNumber = $('#contactNumber').val();
        var address = $('#address').val();

        // JSON body data
        var requestBody = {
            "firstName": firstName,
            "lastName": lastName,
            "contactNumber": contactNumber,
            "address": address,
        };
console.log(requestBody);
        // Make POST request
        $.ajax({
            url: apiEndpoint,
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(requestBody),
            success: function (response) {
                console.log('POST request successful:', response);
                $('#firstName').val("");
                $('#lastName').val("");
                $('#contactNumber').val("");
                $('#address').val("");
                // Close the modal after a successful request
                closeModal();
            },
            error: function (error) {
                console.error('Error making POST request:', error);
            }
        });
    }

    

</script>
