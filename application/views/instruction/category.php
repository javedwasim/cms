<div class="tab-pane active" id="category" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="inst_category_form">
                <div class="row">
                    <div class="col-md-6 col-lg-4  col-sm-8 col-8">
                        <div class="form-group">
                            <label>New Category</label> 
                            <input type="text" class="form-control" name="instruction_name" id="instruction_name"  required>
                            <input type="hidden" name="instruction_category" id="instruction_category"
                               required value="<?php echo isset($category)?$category:'' ?>">   
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-1 m-t-25  col-sm-4 col-4">
                        <button class="btn btn-primary btn-sm add-instruction-category">Add</button>
                    </div>
                    <div class="col-md-2 m-t-25">
                      <button class="btn btn-danger btn-sm" id="delete_all_instructions" >Delete All</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body ins_category_container" >
            <?php $this->load->view('instruction/category_table'); ?>
        </div>
    </div>
</div>