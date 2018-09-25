<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
            	<div class="card-header">
            		<div class="row">
    					<div class="col-md-10 col-lg-8">
	    					<label>Research Name:</label>
                            <i class="far fa-question-circle hide" id="research_modal" data-toggle="modal" data-target="#history-modal"></i>
	    					<select class="form-control col-md-6" id="research_option">
                                <option>Select</option>
                                <?php foreach($researches as $research){?>
                                    <option value="<?php echo $research['id']; ?>"><?php echo $research['name']; ?></option>
                                <?php }?>
                            </select>
	    					<button class="btn btn-primary" id="assign_research">Add New</button>
    					</div>
    				</div>
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
                                    <select class="form-control">
                                        <option>Select</option>
                                        <option value="">Age Below</option>
                                        <option>Age Above</option>
                                        <option>Age Between</option>
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
                                        <select class="form-control col-md-8">
                                            <option>Select</option>
                                            <option>Height Below</option>
                                            <option>Height Above</option>
                                            <option>Height Between</option>
                                        </select>
                                        <input type="text" name="pat_height" class="form-control" onchange="research_filters()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>BMI</label>
                                    <div style="display: inline-flex;">
                                        <select class="form-control col-md-8"  >
                                            <option>Select</option>
                                            <option>BMI Below</option>
                                            <option>BMI Above</option>
                                            <option>BMI Between</option>
                                        </select>
                                        <input type="text" name="pat_bmi" class="form-control" onchange="research_filters()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>Weight</label>
                                    <div style="display: inline-flex;">
                                        <select class="form-control col-md-8" >
                                            <option>Select</option>
                                            <option>Weight Below</option>
                                            <option>Weight Above</option>
                                            <option>Weight Between</option>
                                        </select>
                                        <input type="text" name="pat_weight" class="form-control" onchange="research_filters()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>BSA</label>
                                    <div style="display: inline-flex;">
                                        <select class="form-control col-md-8"  >
                                            <option>Select</option>
                                            <option>BSA Below</option>
                                            <option>BSA Above</option>
                                            <option>BSA Between</option>
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
                                <button class="btn btn-primary">View/Print</button>
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
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Discription</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div id="research_modal_body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>