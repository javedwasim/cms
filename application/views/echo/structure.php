<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<div class="tab-pane" id="tb2" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-2 col-md-3" >
                    <div class="form-group">
                        <label>New Disease</label>
                        <input type="text" class="form-control" name="structure" id="structure" required >
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 p-0">
                    <div class="form-group m-t-25">
                        <?php if($loggedin_user['is_admin']==1){ ?>
                            <button class="btn btn-sm btn-primary add-structure-category">Add</button>
                        <?php } elseif(in_array("echos-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                            <button class="btn btn-sm btn-primary add-structure-category">Add</button>
                        <?php } else{ ?>
                            <button type= "button" class="btn btn-sm btn-primary"  style="opacity: 0.5;" onclick="showError()">Add</button>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3" >
                    <div class="form-group">
                        <label>New Finding:</label>
                        <input type="text" class="form-control" name="structure_finding" id="structure_finding" required >
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 p-0">
                    <div class="form-group m-t-25">
                        <?php if($loggedin_user['is_admin']==1){ ?>
                            <button class="btn btn-sm btn-primary add-structure-finding">Add</button>
                        <?php } elseif(in_array("echos-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                            <button class="btn btn-sm btn-primary add-structure-finding">Add</button>
                        <?php } else{ ?>
                            <button type= "button" class="btn btn-sm btn-primary"  style="opacity: 0.5;" onclick="showError()">Add</button>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3" >
                    <div class="form-group">
                        <label>New Diagnosis:</label>
                        <input type="text" class="form-control" name="name" id="structure_diagnosis" required >
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 p-0">
                    <div class="form-group m-t-25">
                        <?php if($loggedin_user['is_admin']==1){ ?>
                            <button class="btn btn-sm btn-primary add-structure-diagnosis">Add</button>
                        <?php } elseif(in_array("echos-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                            <button class="btn btn-sm btn-primary add-structure-diagnosis">Add</button>
                        <?php } else{ ?>
                            <button type= "button" class="btn btn-sm btn-primary"  style="opacity: 0.5;" onclick="showError()">Add</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Structure
                        </div>
                        <div class="card-body structure_category_container">
                            <?php $this->load->view('echo/structure_table'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="card">
                        <div class="card-header">
                            Findings
                        </div>
                        <div class="card-body structure_finding_container" >
                            <?php $this->load->view('echo/finding_table'); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Diagnosis
                        </div>
                        <div class="card-body structure_diagnosis_container">
                            <?php $this->load->view('echo/diagnosis_table'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>