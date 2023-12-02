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
        getUserTypes();
        // Click event for the Save button in the modal
        $('#btnUserSave').on('click', function (e) {
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
            url: '/api/user',
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
                            '<td>' + item.firstName + '</td>' +
                            '<td>' + item.lastName + '</td>' +
                            '<td>' + item.address + '</td>' +
                            '<td>' + item.contactNumber + '</td>' +
                            '<td>' + item.name + '</td>' +
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
        $('#createmodal').modal('hide');
    }

    function save() {
        var apiEndpoint = "/api/user";

        // Get values from input fields
        var unitfirstName = $('#unitfirstName').val();
        var unitlastName = $('#unitlastName').val();
        var unitaddress = $('#unitaddress').val();
        var unitcontactNumber = $('#unitcontactNumber').val();
        var unitrole = $('#unitrole').val();

        // JSON body data
        var requestBody = {
            "firstName": unitfirstName,
            "lastName": unitlastName,
            "address": unitaddress,
            "contactNumber": unitcontactNumber,
            "userTypeId": unitrole,
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
                $('#unitfirstName').val("");
                $('#unitlastName').val("");
                $('#unitaddress').val("");
                $('#unitcontactNumber').val("");
                $('#unitrole').val("");
                // Close the modal after a successful request
                closeModal();
            },
            error: function (error) {
                console.error('Error making POST request:', error);
            }
        });
    }

    function getUserTypes() {
        $.ajax({
            url: '/api/user_type',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                // Clear existing table rows
                $('#unitrole').empty();

                // Check if the response status is 200 and data is available
                if (response.status === 200 && response.data.length > 0) {
                    // Iterate through the received data and append rows to the table
                    $.each(response.data, function (index, item) {
                        var newRow = '<option value="'+item["id"]+'">'+item["name"]+'</option>';

                        $('#unitrole').append(newRow);
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
