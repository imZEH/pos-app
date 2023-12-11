<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="user">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="firstName"
                            aria-describedby="namehelp" placeholder="Enter First Name ...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="lastName"
                            aria-describedby="sellingPricehelp" placeholder="Enter Last Name ...">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="contactNumber"
                            aria-describedby="stockhelp" placeholder="Enter Contact Number ...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="address"
                            aria-describedby="stockhelp" placeholder="Enter Address ...">
                    </div>
                    
                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btnCustomerSave" class="btn btn-primary" href="#">Save</a>
            </div>
        </div>
    </div>
</div>
