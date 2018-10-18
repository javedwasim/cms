<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
            	<div class="card-header">
                    <form id="manage_research_form">
                		<div class="row">
        					<div class="col-md-10 col-lg-8">
    	    					<label>Research Name:</label>
                                <i class="far fa-question-circle " style="visibility: hidden;color: #1e88e5!important;" id="research_modal" data-toggle="modal" data-target="#history-modal"></i>
    	    					<select class="form-control col-md-6" id="research_option" name="research_option">
                                    <option value="">Select</option>
                                    <?php foreach($researches as $research){?>
                                        <option value="<?php echo $research['id']; ?>"><?php echo $research['name']; ?></option>
                                    <?php }?>
                                </select>
    	    					<button class="btn btn-primary btn-sm" id="assign_research">Add New</button>
        					</div>
        				</div>
                    </form>
                    <form rol="form" style="width: 100%;" id="research_filter">
                        <div class="row m-t-10" >
                            <div class="col-lg-1 col-md-2">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" class="form-control" name="id" id="research_pro_id" onchange="research_filters()">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="pat_name" id="research_pro_name" onchange="research_filters()">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <div class="form-group" >
                                    <label>Profession</label>
                                    <select class="form-control" name="pat_profession" onchange="research_filters()">
                                        <option value="">Select</option>
                                        <?php 
                                            foreach ($professions as $key) {
                                        ?>
                                            <option value="<?php echo $key['profession_name'] ?>" style="text-transform: capitalize;"><?php echo $key['profession_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <div class="form-group">
                                    <label>District</label>
                                    <select class="form-control" name="pat_district" onchange="research_filters()">
                                        <option value="">Select</option>
                                        <?php 
                                            foreach ($districts as $key) {
                                        ?>
                                            <option value="<?php echo $key['district_name'] ?>" style="text-transform: capitalize;"><?php echo $key['district_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>Research</label>
                                    <select class="form-control" name="name" onchange="research_filters()">
                                        <option value="">Select</option>
                                        <?php foreach($researches as $research){?>
                                            <option value="<?php echo $research['id']; ?>"><?php echo $research['name'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>Age</label>
                                    <select class="form-control" name="age_bt">
                                        <option value="">Select</option>
                                        <option value="age_below">Age Below</option>
                                        <option value="age_above">Age Above</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label class="m-t-15"></label>
                                    <input type="text" name="pat_age" class="form-control" onchange="research_filters()">
                                </div>
                            </div>
                        
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>Sex</label>
                                    <select class="form-control" name="pat_sex" onchange="research_filters()">
                                        <option value="">Select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>Height</label>
                                    <div style="display: inline-flex;">
                                        <select class="form-control col-md-8" name="height_bt">
                                            <option value="">Select</option>
                                            <option value="height_below">Height Below</option>
                                            <option value="height_above">Height Above</option>
                                        </select>
                                        <input type="text" name="pat_height" class="form-control" onchange="research_filters()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>BMI</label>
                                    <div style="display: inline-flex;">
                                        <select class="form-control col-md-8" name="bmi_bt" >
                                            <option value="" >Select</option>
                                            <option value="bmi_below">BMI Below</option>
                                            <option value="bmi_above">BMI Above</option>
                                        </select>
                                        <input type="text" name="pat_bmi" class="form-control" onchange="research_filters()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>Weight</label>
                                    <div style="display: inline-flex;">
                                        <select class="form-control col-md-8" name="weight_bt" >
                                            <option value="">Select</option>
                                            <option value="weight_below">Weight Below</option>
                                            <option value="weight_above">Weight Above</option>
                                        </select>
                                        <input type="text" name="pat_weight" class="form-control" onchange="research_filters()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>BSA</label>
                                    <div style="display: inline-flex;">
                                        <select class="form-control col-md-8" name="bsa_bt"  >
                                            <option value="">Select</option>
                                            <option value="bsa_below">BSA Below</option>
                                            <option value="bsa_above">BSA Above</option>
                                        </select>
                                        <input type="text" name="pat_bsa" class="form-control" onchange="research_filters()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>In History</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                            </div>
                        
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>In Examination</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>In Investigation</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>In Advice</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>In Medicine</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 m-t-20">
                                <button type="reset" class="btn btn-primary" id="reset_research">Reset</button>
                                <a class="btn btn-primary" href="javascript:void(0)" onclick="printresearchData()">View/Print</a>
                                <a href="javascript:void(0)" class="btn btn-default" onclick="get_manage_reasearch('manage_research')">Refresh</a>
                            </div>
                        </div>
                    </form>
            	</div>
                <div class="card-body" id="manage_research_table">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
      <div id="history-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <form id="manageresearch_form" method="post" role="form"
                  data-action="<?php echo site_url('setting/save_research_description') ?>"
                  enctype="multipart/form-data">
                <input type="hidden" name="research_id" id="manage_research_id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Discription</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div id="research_modal_body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect" id="update_research_desccription" data-dismiss="modal">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>