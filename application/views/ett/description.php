<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']);  $loggedin_user = $this->session->userdata('userdata');}?>
<div class="tab-pane" id="ett3" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="ett_discription_form">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>New Description</label>
                            <textarea class="form-control" name="ett_discription" id="ett_discription" required="required"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-1 m-t-25">
                        <?php if($loggedin_user['is_admin']==1){ ?>
                        <button class="btn btn-sm btn-primary" id="add_ett_discription">Add</button>
                        <?php } elseif(in_array("ett-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                            <button class="btn btn-sm btn-primary" id="add_ett_discription">Add</button>
                        <?php } else{ ?>
                            <button type= "button" class="btn btn-sm btn-primary"  style="opacity: 0.5;" onclick="showError()">Add</button>
                        <?php } ?>    
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body discription-table" style="height: 60vh; overflow-x: scroll;">
            <?php $this->load->view('ett/description_table'); ?>
        </div>
    </div>
</div>