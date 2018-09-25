<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<div class="tab-pane" id="tb4" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="2d_echo_category_item_form" method="post" role="form"
                  data-action="<?php echo site_url('Echo_controller/add_main_category_item') ?>"
                  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label>Item Name:</label>
                            <input type="text" class="form-control" name="main_category_name" id="main_category_name">
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-4">
                        <div class="form-group">
                            <label>Main Category:</label>
                            <select class="form-control" name="main_category" id="main_category">
                                <option>Select</option>
                                <option value="dooplers">Dooplers</option>
                                <option value="mmode">MMODE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 p-0">
                        <div class="form-group m-t-25" style="display: inline-flex;">
                            <?php if($loggedin_user['is_admin']==1){ ?>
                                <button type= "submit" class="btn btn-sm btn-primary" id="main_category_item_btn">Add</button>
                            <?php } elseif(in_array("echos-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                                <button type= "submit" class="btn btn-sm btn-primary" id="main_category_item_btn">Add</button>
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
                        <select class="form-control" name="main_category_filter" onchange="main_category_item_filter(this.value)">
                            <option value="">Select</option>
                            <option value="0">All</option>
                            <option value="dooplers">Dooplers</option>
                            <option value="mmode">MMODE</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body main_category_container">
            <?php $this->load->view('echo/main_category_table'); ?>
        </div>
    </div>
</div>