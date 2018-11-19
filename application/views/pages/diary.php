<?php
    if(isset($rights[0]['user_rights'])){//print_r($rights[0]['rights']);
        $permissions = explode(',',$rights[0]['user_rights']);
    }else{
        $permissions = array();
    }
    $user_info = ($this->session->userdata('user_data_logged_in'));
?>
<div class="content-wrapper" style="margin: 0% 0.5%;">
    <div class="row p-t-10 m-0">
    	<div class="col-md-12 p-l-0 p-r-0">
    		<div class="card" style="margin-bottom:0px !important; ">
	    		<div class="card-body">
	    			<div class="row">
	    				<div class="col-md-12 col-lg-12 pt-info">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#old" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">View Old Notes</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#new" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Write New Note</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="old" role="tabpanel">
                                    <div class="row">
                                    	<div class="col-md-3 p-r-0">
                                    		<div class="card" style="height: 80vh;">
                                    			<div class="card-header">
                                    				Old Notes
                                    			</div>
                                    			<div class="card-body">
                                    				<div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Select User:</label>
                                                                <select class="form-control" id="diary_user_note">
                                                                    <option>Select...</option>
                                                                    <?php foreach($users as $user){?>
                                                                    <option value="<?php echo $user['username']; ?>"><?php echo $user['username']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12" id="diary_sidebar">

                                                        </div>
                                                    </div>
                                    			</div>
                                    		</div>
                                    	</div>
                                    	<div class="col-md-9 p-l-0">
                                    		<div class="card" id="diary_note_update">
                                    			<div class="card-header">
                                                    <button class="btn btn-default btn-md pull-right hide" <?php echo in_array("diary-can_edit-0", $permissions)?"disabled":''; ?> id="update_note">Update</button>
                                                </div>
                                    		</div>
                                    	</div>
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="new" role="tabpanel">
                                	<div class="row">
                                		<div class="col-md-12">
                                			<div class="card">
	                                			<div class="card-header">
	                                				<div class="row">
	                                					<div class="col-md-1">
	                                						<label>Select User:</label>
	                                					</div>
	                                					<div class="col-md-2">
		                                					<select class="form-control" id="diary_user">
		                                						<option>Select...</option>
                                                                <?php foreach($users as $user){?>
                                                                <option value="<?php echo $user['username']; ?>"><?php echo $user['username']; ?></option>
                                                                <?php } ?>
		                                					</select>
	                                					</div>
	                                					<div class="col-md-7"></div>
	                                					<div class="col-md-2">
	                                						<button class="btn btn-default btn-block pull-right" id="save_diary" <?php echo in_array("diary-can_add-0", $permissions)?"disabled":''; ?>>Save</button>
	                                					</div>
	                                				</div>
	                                			</div>
	                                			<div class="card-body">
	                                				<div contenteditable="true" style="height: 71vh; width: 100%;" id="diary_conent">
		                                    		</div>
	                                			</div>
	                                		</div>
                                		</div>
                                	</div>
                                </div>
                            </div>
				        </div>
	    			</div>
	    		</div>
	    	</div>	
    	</div>
    </div>
</div>