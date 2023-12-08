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

        getUnits();

        //get();
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

    function getUnits() {
        $('#dataTable').DataTable({
            ajax: {
                url: '/api/unit',
                dataSrc: 'data'  // Specify the data source key
            },
            columns: [
                { data: 'name' },
                { data: 'slug' },
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
                { data: null, defaultContent: 'Actions' }
            ],
            order: [[2, 'desc']]
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
