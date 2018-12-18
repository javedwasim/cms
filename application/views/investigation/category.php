<div class="tab-pane active" id="category" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="investigation_category_form">
                <div class="row">
                    <div class="col-md-6 col-lg-4  col-sm-8 col-8">
                        <label>New Category</label>
                        <input type="text" class="form-control" name="instruction_name" id="instruction_name" maxlength="50" required>
                    </div>
                    <div class="col-md-2 col-lg-1 m-t-25  col-sm-4 col-4">
                        <button class="btn btn-primary btn-sm add-investigation-category">Add</button>
                    </div>
                    <div class="col-md-2 m-t-25">
                        <button class="btn btn-danger btn-sm" id="delete_all_investigations" >Delete All</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body investigation_category_container">
            <?php $this->load->view('investigation/category_table'); ?>
        </div>
    </div>
</div>