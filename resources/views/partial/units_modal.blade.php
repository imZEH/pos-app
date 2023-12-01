<div class="modal fade" id="unitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Unit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="user">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="unitName"
                            aria-describedby="namehelp" placeholder="Enter Name ...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="unitSlug"
                            aria-describedby="slughelp" placeholder="Enter Slug ...">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btnUnitSave" class="btn btn-primary" href="#">Save</a>
            </div>
        </div>
    </div>
</div>
