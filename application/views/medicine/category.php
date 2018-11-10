<div class="tab-pane active" id="category" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="medicine_category_form">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>New Category</label>
                            <input type="text" class="form-control" name="medicine_name" id="medicine_name" maxlength="50" required>
                        </div>    
                    </div>
                    <div class="col-md-2 col-lg-1 m-t-25">
                        <button class="btn btn-primary btn-sm add-medicine-category">Add</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body medicine_category_container">
            <?php $this->load->view('medicine/category_table'); ?>
        </div>
    </div>
</div>