<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="user">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="name"
                            aria-describedby="namehelp" placeholder="Enter Name ...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="sellingPrice"
                            aria-describedby="sellingPricehelp" placeholder="Enter SellingPrice ...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="stock"
                            aria-describedby="stockhelp" placeholder="Enter Stock ...">
                    </div>
                    <div class="form-group">                      
                            <select type="text" class="form-control" id="unitId"
                            aria-describedby="rolehelp" placeholder="Select Role ...">
                            <label for="">
                                <!-- <option value="admin">Admin</option>
                                <option value="cashier">Cashier</option> -->
                            </label>
                        </select>
                    </div>
                    <div class="form-group">                      
                            <select type="text" class="form-control" id="categoryId"
                            aria-describedby="rolehelp" placeholder="Select Role ...">
                            <label for="">
                                <!-- <option value="admin">Admin</option>
                                <option value="cashier">Cashier</option> -->
                            </label>
                        </select>
                    </div>
                    <div class="form-group">                      
                            <select type="text" class="form-control" id="subCategoryId"
                            aria-describedby="rolehelp" placeholder="Select Role ...">
                            <label for="">
                                <!-- <option value="admin">Admin</option>
                                <option value="cashier">Cashier</option> -->
                            </label>
                        </select>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btnProductSave" class="btn btn-primary" href="#">Save</a>
            </div>
        </div>
    </div>
</div>
