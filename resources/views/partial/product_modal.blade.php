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
            <form class="user" id="productForm" enctype="multipart/form-data">
            <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="name"
                           name="name" aria-describedby="namehelp" placeholder="Enter Name ...">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="sellingPrice"
                        name="sellingPrice" aria-describedby="sellingPricehelp" placeholder="Enter SellingPrice ...">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="stock"
                        name="stock" aria-describedby="stockhelp" placeholder="Enter Stock ...">
                    </div>
                    <div class="form-group">                      
                            <select type="text" class="form-control" id="unitId" name="unitId"
                            aria-describedby="rolehelp" placeholder="Select Role ...">
                            <label for="">
                                <!-- <option value="admin">Admin</option>
                                <option value="cashier">Cashier</option> -->
                            </label>
                        </select>
                    </div>
                    <div class="form-group">                      
                            <select type="text" class="form-control" id="categoryId" name="categoryId"
                            aria-describedby="rolehelp" placeholder="Select Role ...">
                            <label for="">
                                <!-- <option value="admin">Admin</option>
                                <option value="cashier">Cashier</option> -->
                            </label>
                        </select>
                    </div>
                    <div class="form-group">                      
                            <select type="text" class="form-control" id="subCategoryId" name="subCategoryId"
                            aria-describedby="rolehelp" placeholder="Select Role ...">
                            <label for="">
                                <!-- <option value="admin">Admin</option>
                                <option value="cashier">Cashier</option> -->
                            </label>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="imgPath" class="form-control " id="imgPath"
                            aria-describedby="namehelp">
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" href="#">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
