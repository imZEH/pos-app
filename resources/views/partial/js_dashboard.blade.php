<script>
    $(document).ready(function () {
        getCustomercount();
        getProductcount();
        getDailyEarnings();
        getAnnualEarnings();
    });

    function getCustomercount() {
        $.ajax({
            url: '/api/getnumberofcustomer',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                
                $("#customerCount").text(response.data);

            },
            error: function (error) {
                console.log('Error fetching data:', error);
            }
        });
    }
    function getProductcount() {
        $.ajax({
            url: '/api/getnumberofproduct',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                
                $("#productCount").text(response.data);

            },
            error: function (error) {
                console.log('Error fetching data:', error);
            }
        });
    }
    function getDailyEarnings() {
        $.ajax({
            url: '/api/dailyEarnings',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                
                $("#dailyEarning").text("₱" + response.data);

            },
            error: function (error) {
                console.log('Error fetching data:', error);
            }
        });
    }
    function getAnnualEarnings() {
        $.ajax({
            url: '/api/annualEarnings',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                
                $("#annualEarning").text("₱" + response.data);

            },
            error: function (error) {
                console.log('Error fetching data:', error);
            }
        });
    }
</script>