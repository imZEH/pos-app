<script>
    $(document).ready(function () {
        getReturns();
    });
    function getReturns() {
        $('#salesTable').DataTable({
            ajax: {
                url: '/api/getReturns',
                dataSrc: 'data' // Specify the data source key
            },
            columns: [{
                data: 'orderNumber'
            },
            {
                data: null,
                render: function (data, type, row) {
                    return row.firstName + '  ' + row.lastName;
                }
            },
            {
                data: 'name'
            },
            {
                data: null,
                render: function (data, type, row) {
                    return row.price * row.qty;
                }
            },
            ],
        });
    }
</script>