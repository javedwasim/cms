<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']);  $loggedin_user = $this->session->userdata('userdata');}?>
<div class="tab-pane active" id="ett1" role="tabpanel">
    <div class="card">
		<div class="card-header" style="display: inline-flex;">
			<div class="row">
				<div class="col-md-12">
					<label>New Reason</label>
					<input type="text" class="form-control col-md-6" name="ett_test_reason" id="ett_test_reason" >
                    <?php if($loggedin_user['is_admin']==1){ ?>
                        <button class="btn btn-primary btn-sm add_ett_test_reason">Add</button>
                    <?php } elseif(in_array("ett-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                        <button class="btn btn-primary btn-sm add_ett_test_reason">Add</button>
                    <?php } else{ ?>
                        <button type= "button" class="btn btn-sm btn-primary"  style="opacity: 0.5;" onclick="showError()">Add</button>
                    <?php } ?>
				</div>
			</div>
		</div>
		<div class="card-body ins_category_container" style="height: 60vh; overflow-x: scroll;">
			<?php $this->load->view('ett/test_reason_table'); ?>
		</div>
	</div>
</div>