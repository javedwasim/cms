<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']);  $loggedin_user = $this->session->userdata('userdata');}?>
<div class="tab-pane" id="ett5" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <label>New Protocol</label>
                    <input type="text" class="form-control" name="new_protocol" id="new_protocol">
                </div>
                <div class="col-md-1 col-lg-1">
                    <label>Stages</label>
                    <input type="text" class="form-control" name="protocol_stages" id="protocol_stages">
                </div>
                <div class="col-md-1 col-lg-1">
                    <label>Recovery</label>
                    <input type="text" class="form-control" name=" protocol_recovery" id="protocol_recovery">
                </div>
                <div class="col-md-2 col-lg-1 m-t-25">
                    <?php if($loggedin_user['is_admin']==1){ ?>
                        <button class="btn btn-primary" id="add_protocol">Add</button>
                    <?php } elseif(in_array("ett-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                        <button class="btn btn-primary" id="add_protocol">Add</button>
                    <?php } else{ ?>
                        <button type= "button" class="btn btn-sm btn-primary"  style="opacity: 0.5;" onclick="showError()">Add</button>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card-body protocol_table_content" style="height: 60vh; overflow-x: scroll;">
            <?php $this->load->view('ett/protocol_table'); ?>
        </div>
    </div>
</div>