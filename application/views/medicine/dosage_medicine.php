<div class="tab-pane" id="assign-dosage" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="dosage_cat_form">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Select Category:</label>
                            <select class="form-control" onchange="assign_medicine_category(this.value)">
                                <option value="0">Select</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <form id="update_dosage_medicine_form" method="post" role="form"
                  data-action="<?php echo site_url('medicine/update_dosage_medicine') ?>"
                  enctype="multipart/form-data">
            <div class="card-body">
                <input type="hidden" name="medicine_category" value="" id="medicine_category">
                    <div class="dosage_medicine_table">
                        <?php $this->load->view('medicine/dosage_medicine_table'); ?>
                    </div>
            </div>
            <button type="submit" class="btn btn-primary col-md-2 col-md-offset-10 pull-right btn-sm" id="update_dosage_medicine_btn">Update</button>
        </form>
    </div>
</div>