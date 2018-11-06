<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<div class="tab-pane" id="tb5" role="tabpanel">
    <div class="card">
        <div class="card-header" style="display: inline-flex;">
            <form id="2d_echo_category_item_form" method="post" role="form"
                  data-action="<?php echo site_url('Echo_controller/add_category_measurement') ?>"
                  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label>New Item:</label>
                            <input type="text" class="form-control" name="item" id="measurement_item">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label>Normal Value:</label>
                            <input type="text" class="form-control" name="value" id="normal_value">
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-4">
                        <div class="form-group">
                            <label>Category:</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option>Select</option>
                                <?php foreach ($main_categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 p-0">
                        <div class="form-group m-t-25">
                            <?php if($loggedin_user['is_admin']==1){ ?>
                                <button type="submit" class="btn btn-sm btn-primary" id="main_category_measurement_btn">Add</button>
                            <?php } elseif(in_array("echos-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                                <button type="submit" class="btn btn-sm btn-primary" id="main_category_measurement_btn">Add</button>
                            <?php } else{ ?>
                                <button type= "button" class="btn btn-sm btn-primary"  style="opacity: 0.5;" onclick="showError()">Add</button>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group ">
                        <label>Select Category:</label>
                        <select class="form-control" onchange="category_measurement_filter(this.value)">
                            <option>Select</option>
                            <option value="0">All</option>
                            <?php foreach ($main_categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body category_measurement_container" style="height: 300px; overflow-y: scroll;">
            <?php $this->load->view('echo/category_measurement_table') ?>
        </div>
    </div>
</div>