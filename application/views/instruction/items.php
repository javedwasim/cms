<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<div class="tab-pane" id="items" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="lab_test_item_form" method="post" role="form"
                  data-action="<?php echo site_url('instruction/add_instruction_item') ?>"
                  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label>Item Name:</label>
                            <input type="text" class="form-control" name="name">
                            <input type="hidden" name="category" id="category"
                                   value="<?php $scategory = $category; echo $scategory; ?>">
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-4">
                        <div class="form-group">
                            <label>Category:</label>
                            <select class="form-control" name="instruction_id">
                                <option>Select</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>"
                                        <?php echo isset($selected_category)&&($selected_category==$category['id'])?'selected':'' ?>>
                                        <?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 p-0">
                        <div class="form-group m-t-25" style="display: inline-flex;">
                            <?php if($loggedin_user['is_admin']==1){ ?>
                                <button type= "submit" class="btn btn-sm btn-primary" id="inst_item_btn">Add</button>
                            <?php } elseif(in_array("special_instructions-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                                <button type= "submit" class="btn btn-sm btn-primary" id="inst_item_btn">Add</button>
                            <?php } else{ ?>
                                <button type= "button" class="btn btn-sm btn-primary"  style="opacity: 0.5;" onclick="showError()">Add</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="form-group ">
                        <label>Select Category:</label>
                        <select class="form-control" name="filter_inst_category" onchange="filter_inst_item_category(this.value,'<?php echo $scategory; ?>')">
                            <option value="">Select</option>
                            <option value="0">All</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>"
                                    <?php echo isset($selected_category)&&($selected_category==$category['id'])?'selected':'' ?>>
                                    <?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body ins_item_container">
            <?php $this->load->view('instruction/item_table'); ?>
        </div>
    </div>
</div>