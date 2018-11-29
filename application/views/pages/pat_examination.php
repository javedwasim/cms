<?php
if(isset($rights[0]['user_rights']))
{
    $permissions = explode(',',$rights[0]['user_rights']);
    $loggedin_user = $this->session->userdata('userdata');
}
?>
<div class="content-wrapper">
	<div class="row page-titles" style="padding-bottom: 0px;">
        <div class="col-md-5">
        
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)" id="examination_to_profile">profile</a></li>
                <li class="breadcrumb-item active">examination</li>
            </ol>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb -->
    <!-- ============================================================== -->
    <div class="row p-t-10 m-0">
    	<div class="col-md-12">
    		<div class="card" style="margin-bottom: 0px !important;">
	            <div class="card-body">
	                <div class="row m-0" id="pat_ett_information">

	                </div>
	            </div>
	        </div>
    	</div>
    	<div class="col-md-6 col-lg-6 p-r-0">
    		<div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                        	<a class="nav-link active p-10" data-toggle="tab" href="#exe1" role="tab">
                        		<span class="hidden-sm-up"><i class="ti-home"></i></span>
                        		<span class="hidden-xs-down">History</span>
                        	</a>
                        </li>
                        <li class="nav-item">
                        	<a class="nav-link p-10" data-toggle="tab" href="#exe2" role="tab">
                        		<span class="hidden-sm-up"><i class="ti-user"></i></span>
                        		<span class="hidden-xs-down">Examination</span>
                        	</a>
                        </li>
                        <li class="nav-item">
                        	<a class="nav-link p-10" data-toggle="tab" href="#exe3" role="tab">
                        		<span class="hidden-sm-up"><i class="ti-user"></i></span>
                        		<span class="hidden-xs-down">Investigation</span></a>
                        </li>
                        <li class="nav-item">
                        	<a class="nav-link p-10" data-toggle="tab" href="#exe4" role="tab">
                        		<span class="hidden-sm-up"><i class="ti-user"></i></span>
                        		<span class="hidden-xs-down">Medicine</span>
                        	</a>
                        </li>
                        <li class="nav-item">
                        	<a class="nav-link p-10" data-toggle="tab" href="#exe5" role="tab">
                        		<span class="hidden-sm-up"><i class="ti-user"></i></span>
                        		<span class="hidden-xs-down">Test Advice</span>
                        	</a>
                        </li>
                        <li class="nav-item">
                        	<a class="nav-link p-10" data-toggle="tab" href="#exe6" role="tab">
                        		<span class="hidden-sm-up"><i class="ti-user"></i></span>
                        		<span class="hidden-xs-down">Instructions</span>
                        	</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane active pro-div" id="exe1" role="tabpanel">
                        	<div class="row m-0">
                        		<div class="col-md-5 p-0">
	                        		<div class="card">
						    			<div class="card-body" id="profile_history_container">
						    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>History</th>
						                        </tr>
							                    </thead>
							                    <tbody>
                                                    <?php foreach ($history_category as $category): ?>
                                                        <tr>
                                                            <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
                                                            <td><?php echo $category['name']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
							                    </tbody>
							                </table>
						    			</div>
		    						</div>
	                        	</div>
	                        	<div class="col-md-7 p-0">
	                        		<div class="card">
	                        			<div class="card-body" id="profile_history_item_container">
	                        				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>items</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                           <!-- <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>&nbsp;</td>
						                            </tr> -->

							                    </tbody>
							                </table>
	                        			</div>
	                        		</div>
	                        	</div>
                        	</div>
                        </div>
                        <div class="tab-pane pro-div" id="exe2" role="tabpanel">
                        	<div class="row m-0">
                        		<div class="col-md-12 p-0">
	                        		<div class="card">
						    			<div class="card-body">
						    				<div class="row">
						    					<div class="col-lg-3 col-md-4" id="profile_examination_container">
							    					<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
								                       <thead>
								                        <tr>
								                            <th>Examinations</th>
								                        </tr>
									                    </thead>
									                    <tbody>
								                            <tr>
								                                <td>CVS</td>
								                            </tr>

									                    </tbody>
									                </table>
							    				</div>
							    				<div class="col-lg-9 col-md-8" id="patient_examination_item_container">
							    					<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
								                       <thead>
								                        <tr>
								                            <th style="width: 10%"></th>
								                            <th>Item</th>
								                        </tr>
									                    </thead>
									                    <tbody>
								                          <!-- <tr>
								                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
								                                <td>&nbsp;</td>
								                            </tr> -->
									                    </tbody>
									                </table>
							    				</div>
						    				</div>
						    			</div>
		    						</div>
	                        	</div>
                        	</div>
                        </div>
                        <div class="tab-pane pro-div" id="exe3" role="tabpanel">
                        	<div class="card">
                        		<div class="card-header">
			    					<div class="form-group">
	                                    <label class="radio-inline"><input type="radio" name="inclinic"  value="" class="" checked="checked">In Clinic</label>
	                                    <label class="radio-inline"><input type="radio" name="inclinic"  value="" class="">Outsite Clinic</label>
	                                </div>
			    				</div>
                        		<div class="card-body">
                        			<div class="row m-0">
		                        		<div class="col-md-5 p-0">
			                        		<div class="card">
								    			<div class="card-body" id="investigation_category_container">
								    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
								                       <thead>
								                        <tr>
								                            <th style="width: 5%"></th>
								                            <th>Investigations</th>
								                        </tr>
									                    </thead>
									                    <tbody>
									                    </tbody>
									                </table>
								    			</div>
				    						</div>
			                        	</div>
			                        	<div class="col-md-7 p-0">
			                        		<div class="card">
			                        			<div class="card-body" id="investigation_category_item_container">
			                        				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
								                       <thead>
								                        <tr>
								                            <th style="width: 10%"></th>
								                            <th>Items</th>
								                        </tr>
									                    </thead>
									                    <tbody>
								                           <!-- <tr>
								                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
								                                <td>CVS</td>
								                            </tr> -->

									                    </tbody>
									                </table>
			                        			</div>
			                        		</div>
			                        	</div>
		                        	</div>	
                        		</div>
                        	</div>
                        </div>
                        <div class="tab-pane pro-div" id="exe4" role="tabpanel">
                        	<div class="row m-0">
                        		<div class="col-md-4 p-0">
	                        		<div class="card">
						    			<div class="card-body" id="medicine_category_container">
						    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>Medicines</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>&nsbp;</td>
						                            </tr>
							                    </tbody>
							                </table>
						    			</div>
		    						</div>
	                        	</div>
	                        	<div class="col-md-3 p-0">
	                        		<div class="card">
	                        			<div class="card-body" id="medicine_category_item_container">
	                        				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>Items</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                           <!-- <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CVS</td>
						                            </tr> -->
							                    </tbody>
							                </table>
	                        			</div>
	                        		</div>
	                        	</div>
	                        	<div class="col-md-5 p-0">
	                        		<div class="card">
	                        			<div class="card-body" id="medicine_dosage_container">
	                        				<table class="table table-bordered nowrap responsive right-table" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th>Dosage</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <!-- <tr>
						                                <td>CVS</td>
						                            </tr> -->
							                    </tbody>
							                </table>
	                        			</div>
	                        		</div>
	                        	</div>
                        	</div>
                        </div>
                        <div class="tab-pane pro-div" id="exe5" role="tabpanel">
                        	<div class="row m-0">
                        		<div class="col-md-5 p-0">
	                        		<div class="card">
						    			<div class="card-body" id="advice_category_container">
						    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>Advice</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                           <!-- <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>&nbsp;</td>
						                            </tr> -->
							                    </tbody>
							                </table>
						    			</div>
		    						</div>
	                        	</div>
	                        	<div class="col-md-7 p-0">
	                        		<div class="card">
	                        			<div class="card-body" id="advice_category_item_container">
	                        				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>Items</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                           <!-- <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>&nbsp;</td>
						                            </tr> -->
							                    </tbody>
							                </table>
	                        			</div>
	                        		</div>
	                        	</div>
                        	</div>
                        </div>
                        <div class="tab-pane pro-div" id="exe6" role="tabpanel">
                        	<div class="row m-0">
                        		<div class="col-md-5 p-0">
	                        		<div class="card">
						    			<div class="card-body" id="instruction_category_container">
						    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>Instructions</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                           <!-- <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>&nbsp;</td>
						                            </tr> -->
							                    </tbody>
							                </table>
						    			</div>
		    						</div>
	                        	</div>
	                        	<div class="col-md-7 p-0">
	                        		<div class="card">
	                        			<div class="card-body" id="instruction_category_item_container">
	                        				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>Items</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <!-- <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>&nbsp;</td>
						                            </tr> -->
							                    </tbody>
							                </table>
	                        			</div>
	                        		</div>
	                        	</div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    	<div class="col-md-6 col-lg-6 p-l-0">
    		<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" >
                            <div class="row">
                                <div class="col-lg-4 col-md-4 p-r-0">
                                    <form id="history_profile_form" method="post" role="form"
                                          data-action="<?php echo site_url('profile/set_examination_data') ?>"
                                          enctype="multipart/form-data">
                                         <!--  <?php print_r($history_details);?> -->
                                        <input type="hidden" name="history_id"  id="history_id"/>
                                        <input type="hidden" name="exe_history_id" value="<?php if(isset($history_details)){foreach($history_details as $key){echo $key['id'];}}?>"  />
                                        <input type="hidden" name="patient_id" class="patient_id"/>
                                        <input type="hidden" name="examination_testid" value="<?php if(isset($visit_date)){foreach($visit_date as $key){echo $key['id'];}}?>">
                                        <input type="hidden" name="clone_val_examination" id="clone_val_examination" value="">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
                                                   <thead><tr><th>History</th></tr></thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding: 0px">
                                                                <textarea class="form-control" rows="5" name="history_item" id="history_item"><?php if(isset($history_details)){foreach($history_details as $key){echo $key['history_value'];}}?></textarea>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4 col-md-4 p-l-0 p-r-0">
                                    <form id="examination_profile_form" method="post" role="form"
                                          data-action="<?php echo site_url('profile/set_examination_data') ?>"
                                          enctype="multipart/form-data">
                                          <input type="hidden" name="patient_id" class="patient_id"/>
                                        <input type="hidden" name="examination_id" value="<?php if(isset($examination_details)){foreach($examination_details as $key){echo $key['id'];}}?>" id="measurement_cate_id"/>
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
                                                    <thead><tr><th>Examination</th></tr></thead>
                                                    <tbody>
                                                    <tr>
                                                        <td style="padding: 0px">
                                                            <textarea class="form-control" rows="5" name="examination_item" id="examination_item"><?php if(isset($examination_details)){foreach($examination_details as $key){echo $key['examination_value'];}}?></textarea>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4 col-md-4 p-l-0">
                                    <form id="investigation_profile_form" method="post" role="form"
                                          data-action="<?php echo site_url('profile/set_examination_data') ?>"
                                          enctype="multipart/form-data">
                                        <input type="hidden" name="patient_id" class="patient_id"/>
                                        <input type="hidden" name="investigation_id" value="<?php if(isset($investigation_details)){foreach($investigation_details as $key){echo $key['id'];}}?>" id="measurement_cate_id"/>
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
                                                    <thead><tr><th>Investigation</th></tr></thead>
                                                    <tbody>
                                                    <tr>
                                                        <td style="padding: 0px">
                                                            <textarea class="form-control" rows="5" name="investigation_item" id="investigation_item"><?php if(isset($investigation_details)){foreach($investigation_details as $key){echo $key['investigation_value'];}}?></textarea>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6  p-r-0">
                                    <form id="medicine_profile_form" method="post" role="form"
                                          data-action="<?php echo site_url('profile/set_examination_data') ?>"
                                          enctype="multipart/form-data">
                                        <input type="hidden" name="patient_id" class="patient_id"/>
                                        <input type="hidden" name="measurement_cate_id" id="measurement_cate_id"/>
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-bordered nowrap responsive tbl_header_fix_history" cellspacing="0" id="" width="100%" >
                                                    <thead><tr><th>Medicine</th></tr></thead>
                                                    <tbody id="medicine_item" style="height: 20vh">
	                                                    	<?php if(isset($medicine_details)){ foreach($medicine_details as $med){?>
	                                                    	<tr><td><input class="form-control" type="text" name="medicine_value[]" value="<?php echo $med['medicine_value']; ?>" ></td></tr>
	                                                    <?php } }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6 col-md-6 p-l-0 ">
                                    <form id="dosage_profile_form" method="post" role="form"
                                          data-action="<?php echo site_url('profile/set_examination_data') ?>"
                                          enctype="multipart/form-data">
                                          <input type="hidden" name="patient_id" class="patient_id"/>
                                        <input type="hidden" name="measurement_cate_id" id="measurement_cate_id"/>
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-bordered nowrap responsive  tbl_header_fix_history" cellspacing="0" id="" width="100%" >
                                                    <thead><tr><th>Dosage</th></tr></thead>
                                                    <tbody id="dosage_item" style="height: 20vh">
                                                    	<?php if(isset($dosage_details)){ foreach($dosage_details as $dos){?>
	                                                    	<tr><td><input class="form-control" type="text" name="dosage_value[]" value="<?php echo $dos['dosage_value']; ?>" ></td></tr>
	                                                    <?php } }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6  p-r-0">
                                    <form id="advice_profile_form" method="post" role="form"
                                          data-action="<?php echo site_url('profile/set_examination_data') ?>"
                                          enctype="multipart/form-data">
                                          <input type="hidden" name="patient_id" class="patient_id"/>
                                        <input type="hidden" name="advice_id" value="<?php if(isset($advice_details)){foreach($advice_details as $key){echo $key['id'];}}?>" id="measurement_cate_id"/>
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
                                                    <thead><tr><th>Test Advice</th></tr></thead>
                                                    <tbody>
                                                    <tr>
                                                        <td style="padding: 0px">
                                                            <textarea class="form-control" rows="5" name="advice_item" id="advice_item"><?php if(isset($advice_details)){foreach($advice_details as $key){echo $key['advice_value'];}}?></textarea>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6 p-l-0">
	                        		<form id="instruction_profile_form" method="post" role="form"
	                                      data-action="<?php echo site_url('profile/set_examination_data') ?>"
	                                      enctype="multipart/form-data">
	                                      <input type="hidden" name="patient_id" class="patient_id"/>
	                                    <input type="hidden" name="instruction_id" value="<?php if(isset($instruction_details)){foreach($instruction_details as $key){echo $key['id'];}}?>" id="measurement_cate_id"/>
	                                    <div class="card">
	                                        <div class="card-body">
	                                            <table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
	                                                <thead><tr><th>Instruction</th></tr></thead>
	                                                <tbody>
	                                                <tr>
	                                                    <td style="padding: 0px">
	                                                        <textarea class="form-control" rows="5" name="instruction_item" id="instruction_item"><?php if(isset($instruction_details)){foreach($instruction_details as $key){echo $key['instruction_value'];}}?></textarea>
	                                                    </td>
	                                                </tr>
	                                                </tbody>
	                                            </table>
	                                        </div>
	                                    </div>
	                                </form>
	                        	</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                    	<div class="card-body">
                    		<div class="row">
                                <div class="col-md-6">
                                	<form id="next_date_visit_form" method="post" role="form"
                                  data-action="<?php echo site_url('profile/set_examination_data') ?>"
                                  enctype="multipart/form-data">
                                  <input type="hidden" name="patient_id" class="patient_id"/>
                                    <div class="form-group show-inline m-t-10">
                                        <label>Next Visit Date: </label>
                                        <input type="text" name="next_date_visit_form" id="next_date_visit_form" class="app_date form-control col-md-7" value="<?php if(isset($visit_date) && !empty($visit_date)){
	                                        	foreach($visit_date as $date){
	                                        		echo date('d-M-Y',strtotime($date['next_visit_date']));
	                                        	}
	                                        }else{
	                                        	echo date('d-M-Y');
	                                        }?>" >
                                    </div>
                                    </form>
                                </div>
                            	<div class="col-md-6">
                            		<button class="btn btn-primary btn-md waves-effect waves-light exa-pat-spInstructions" <?php echo in_array("special_instructions-can_add-0", $permissions)?"disabled":''; ?> style="padding: 10px 15px;" type="button">Sp. Instructions</button>
                                    <button class="btn btn-info btn-md waves-effect waves-light exa-pat-labtest" style="padding: 10px 10px;" <?php echo in_array("lab_tests-can_add-0", $permissions)?"disabled":''; ?> type="button">Lab. Test</button>
                                    <button class="btn btn-primary btn-md waves-effect waves-light " id="save_patient_examination_info" style="padding: 10px 15px;" type="button">Save</button>
                            	</div>
                            </div>
                    	</div>
                    </div>
                </div>    
            </div>
    	</div>
    </div>
</div>