<!-- Logout Modal-->
<div class="modal fade" id="createmodal" tabindex="-1" role="dialog"        aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="firstName"
                            aria-describedby="firstNamehelp" placeholder="Enter First Name ...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="lastName"
                            aria-describedby="lastNamehelp" placeholder="Enter Last Name ...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="address"
                            aria-describedby="addresshelp" placeholder="Enter Address ...">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="contactNumber"
                            aria-describedby="contactNumberhelp" placeholder="Enter Contact Number ...">
                    </div>
                    <div class="form-group">
                        <select type="text" class="form-control" id="role"
                            aria-describedby="rolehelp" placeholder="Select Role ...">
                            <label for="">
                                <!-- <option value="admin">Admin</option>
                                <option value="cashier">Cashier</option> -->
                            </label>
                        </select>
                        <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btnUserSave" class="btn btn-primary" href="#">Save</a>
            </div>
                    </div>
                </form>
        </div>
    </div>
</div>
</div>