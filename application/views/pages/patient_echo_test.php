<div class="content-wrapper" style="margin: 0% 0.5%;">
    <div class="row page-titles" style="padding-bottom: 0px;">
        <div class="col-md-5">
        
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)" id="echo_to_profile">profile</a></li>
                <li class="breadcrumb-item active">echo</li>
            </ol>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb -->
    <!-- ============================================================== -->
    <div class="row p-t-10 m-0">
    	<div class="col-md-12 p-l-0 p-r-0">
    		<div class="card" style="margin-bottom:0px !important; ">
	    		<div class="card-body">
	    			<div class="row">
	    				<div class="col-md-12 col-lg-12 pt-info" id="pats_ett_information">
	    					
	    				</div>
	    			</div>
	    		</div>
	    	</div>	
    	</div>
    	<div class="col-md-12">
    		<div class="row">
		    	<div class="col-md-5 p-l-0 p-r-0">
		    		<div class="card">
		    			<div class="card-body">
		    				<div class="row">
		    					<div class="col-md-5 p-r-0">
		    						<div class="card">
		    							<div class="card-header">
		    								Select Value Name	
		    							</div>
		    							<div class="card-body p-0">
		    								<ul class="list-group" id="main_category_list">
				    							<li class="list-group-item">MMOD</li>
				    							<li class="list-group-item">MITRAL VALUW </li>
				    						</ul>		
		    							</div>
		    						</div>
		    					</div>
		    					<div class="col-md-7 p-l-5">
                                    <form id="echo_profile_form" method="post" role="form"
                                          data-action="<?php echo site_url('profile/set_echo_data') ?>"
                                          enctype="multipart/form-data">
                                        <input type="hidden" name="echo_detail_id" class="echo_detail_id"/>
                                        <input type="hidden" name="measurement_cate_id" id="measurement_cate_id"/>
                                        <input type="hidden" name="patient_id" id="patient_id"/>
                                        <div id="main_category_items">
                                            <table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
                                                <thead>
                                                <tr>
                                                    <th> Items</th>
                                                    <th> Value</th>
                                                    <th> Normal Value</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary btn-sm">Clear Values</button>
                                            <button type="submit" class="btn btn-default pull-right btn-sm" id="echo_profile_form_btn">Get Values</button>
                                        </div>
                                    </form>
		    					</div>
		    				</div>
		    			</div>
		    		</div>
		    	</div>
		    	<div class="col-md-7 p-l-0 p-r-0">
		    		<div class="card">
		    			<div class="card-body">
		    				<div class="row">
		    					<div class="col-md-5 p-r-0">
                                    <form id="echo_mmode_content_form" method="post" role="form"
                                          data-action="<?php echo site_url('profile/set_echo_data') ?>"
                                          enctype="multipart/form-data">
                                        <input type="hidden" name="patient_id" class="patient_id"/>
                                        <input type="hidden" name="echo_detail_id_mmode" class="echo_detail_id" value="<?php echo isset($measurements)?$measurements[0]['echo_detail_id']:''; ?>"/>
                                        <div id="mmode_content">
                                            <table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
                                                <thead>
                                                <tr>
                                                    <th> MMODE Measurment</th>
                                                    <th> Value</th>
                                                    <th> Noramal Value</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(isset($measurements)): ?>
                                                        <?php foreach ($measurements as $measurement): if($measurement['main_category']=='mmode'): ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $measurement['item'] ?>
                                                                    <input type="hidden" name="item_id[]" value="<?php echo $measurement['item_id']; ?>">
                                                                </td>
                                                                <td>
                                                                    <?php echo $measurement['item_value'] ?>
                                                                    <input type="hidden" name="item_value[]" value="<?php echo isset($measurement['item_value'])?$measurement['item_value']:''; ?>"  class="form-control" />
                                                                </td>
                                                                <td>
                                                                    <?php echo $measurement['measurement_value'] ?>
                                                                    <input type="hidden" name="measurement_value[]" value="<?php echo $measurement['measurement_value']; ?>">
                                                                </td>
                                                            </tr>
                                                        <?php endif; endforeach; ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>

					                <div>
					                	<button class="btn btn-primary btn-sm pull-right">Reset MMode Measurements</button>	
					                </div>
		    					</div>
		    					<div class="col-md-5 p-l-0 p-r-0">
                                    <form id="echo_dooplers_content_form" method="post" role="form"
                                          data-action="<?php echo site_url('profile/set_echo_data') ?>"
                                          enctype="multipart/form-data">
                                        <input type="hidden" name="echo_detail_id_dooplers" class="echo_detail_id" value="<?php echo isset($measurements)?$measurements[0]['echo_detail_id']:''; ?>"/>
                                        <input type="hidden" name="patient_id" class="patient_id"/>
                                        <div id="dooplers_content">
                                            <table class="table table-bordered responsive" cellspacing="0" id="" width="100%" >
                                                <thead>
                                                <tr>
                                                    <th> Doppler Measurement</th>
                                                    <th> Value</th>
                                                    <th> Noramal Value</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(isset($measurements)): ?>
                                                        <?php  foreach ($measurements as $measurement): if($measurement['main_category']=='dopplers'): ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $measurement['item'] ?>
                                                                    <input type="hidden" name="item_id[]" value="<?php echo $measurement['item_id']; ?>">
                                                                </td>
                                                                <td>
                                                                    <?php echo $measurement['item_value'] ?>
                                                                    <input type="hidden" name="item_value[]" value="<?php echo isset($measurement['item_value'])?$measurement['item_value']:''; ?>"  class="form-control">
                                                                </td>
                                                                <td>
                                                                    <?php echo $measurement['measurement_value'] ?>
                                                                    <input type="hidden" name="measurement_value[]" value="<?php echo $measurement['measurement_value']; ?>">
                                                                </td>
                                                            </tr>
                                                        <?php endif; endforeach; ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
					                <div>
					                	<button class="btn btn-primary btn-sm pull-right">Reset Doppler Measurements</button>	
					                </div>
		    					</div>
		    					<div class="col-md-2 p-l-0">
		    						<div class="card">
		    							<div class="card-header" style="font-size: 13px;">
		    								Color Doppler Flow
		    							</div>
		    							<div class="card-body p-0">
                                        <form id="echo_color_dooplers_content_form" method="post" role="form"
                                          data-action="<?php echo site_url('profile/set_echo_data') ?>"
                                          enctype="multipart/form-data">
                                        <input type="hidden" name="echo_detail_id_dooplers" class="echo_detail_id" value="<?php echo isset($measurements)?$measurements[0]['echo_detail_id']:''; ?>"/>
                                        <input type="hidden" name="patient_id" class="patient_id"/>
		    								<ul class="list-group" id="color-doppler-table">
                                                <?php if(isset($color_doppler)){
                                                        foreach ($color_doppler as $dop) {
                                                ?>
				    							<li class="list-group-item">
                                                    <?php echo $dop['doopler_mr']; ?>
                                                    <input type="hidden" name="doopler_mr" value="<?php echo $dop['doopler_mr']; ?>">
                                                </li>
                                                <li class="list-group-item">
                                                    <?php echo $dop['doopler_ar']; ?>
                                                    <input type="hidden" name="doopler_ar" value="<?php echo $dop['doopler_ar']; ?>">
                                                </li>
                                                <li class="list-group-item">
                                                    <?php echo $dop['doopler_pr']; ?>
                                                    <input type="hidden" name="doopler_pr" value="<?php echo $dop['doopler_pr']; ?>">
                                                </li>
                                                <li class="list-group-item">
                                                    <?php echo $dop['doopler_tr']; ?>
                                                    <input type="hidden" name="doopler_tr" value="<?php echo $dop['doopler_tr']; ?>">
                                                </li>
                                                <?php } }?>
				    						</ul>
                                        </form>	
		    							</div>
		    						</div>
		    						<div>
		    							<button class="btn btn-default btn-xs pull-right">Reset Color Doppler Flow</button>
		    						</div>
		    					</div>
		    				</div>
		    			</div>
		    		</div>
		    	</div>
	    	</div>
    	</div>
    	<div class="col-md-12 p-l-0 p-r-0">
    		<div class="card">
    			<div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <label>Report Finding / Feeding Section</label><br>
                            <label class="radio-inline m-r-10"><input type="radio" name="optradio" id="get_disease">Report By Disease</label>
                            <label class="radio-inline m-r-10"><input type="radio" name="optradio" id="get_structure_findings" >Finding By Structure</label>
                            <label class="radio-inline m-r-10"><input type="radio" name="optradio" id="get_structure_diagnosis">Diagnosis By Structure</label>
                        </div>
                        <div class="col-md-4">
                            <form id="echo_upload_file_form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-9 m-t-5 p-r-0">
                                        <div class="form-group">
                                                <input type="file" class="form-control-file" name="profile_upload" id="echo_upload_file" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-l-0">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success btn-sm" value="Uploads" id="echo_upload">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
    			</div>
    			<div class="card-body">
    				<div class="row">
    					<div class="col-md-2 p-r-0">
	    					<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body p-0 disease_structure_table ">
                                    
								</div>
							</div>
	    				</div>
	    				<div class="col-md-3 p-r-0 p-l-0">
	    					<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body p-0 findings_diagnosis_table">
                                    
								</div>
							</div>
	    				</div>
	    				<div class="col-md-4 p-r-0 p-l-0">
                            <form id="echo_finding_form" method="post" role="form"
                                  data-action="<?php echo site_url('profile/set_echo_data') ?>"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="echo_detail_id_finding" class="echo_detail_id" value="<?php echo isset($findings)?$findings[0]['echo_detail_id']:''; ?>"/>
                                <input type="hidden" name="patient_id" class="patient_id"/>
                                <input type="hidden" name="disease_id" id="disease_id" value="<?php echo isset($findings[0]['disease_id'])?$findings[0]['disease_id']:''; ?>"/>
                                <div class="card">
                                    <div class="card-header">
                                        
                                    </div>
                                    <div class="card-body p-0" id="disease_findings">
                                        <ul class="list-group">
                                            <?php if(isset($findings)): ?>
                                                <?php foreach ($findings as $finding): ?>
                                                    <input type="text" name="disease_finding_value[]" class="form-control" value="<?php echo $finding['finding_value']; ?>">
                                                    <input type="hidden" name="finding_structure_id[]" id="finding_structure_id" value="<?php echo $finding['structure_id']; ?>">
                                                    <input type="hidden" name="disease_finding_id[]" id="disease_finding_id" value="<?php echo $finding['finding_id']; ?>">
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </form>
	    				</div>
	    				<div class="col-md-3 p-l-0">
                            <form id="echo_diagnosis_form" method="post" role="form"
                                  data-action="<?php echo site_url('profile/set_echo_data') ?>"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="patient_id" class="patient_id"/>
                                <input type="hidden" name="echo_detail_id_diagnosis" class="echo_detail_id" value="<?php echo isset($diagnosis)?$diagnosis[0]['echo_detail_id']:''; ?>"/>
                                <input type="hidden" name="disease_id" id="disease_id" value="<?php echo isset($diagnosis[0]['disease_id'])?$diagnosis[0]['disease_id']:''; ?>"/>
                                <div class="card">
                                    <div class="card-header">
                                       
                                    </div>
                                    <div class="card-body p-0" id="disease_diagnosis">
                                        <ul class="list-group">
                                            <?php if(isset($diagnosis)): ?>
                                                <?php foreach ($diagnosis as $diagnose): ?>
                                                    <input type="text" name="disease_diagnosis_value[]" class="form-control" value="<?php echo $diagnose['diagnosis_value']; ?>">
                                                    <input type="hidden" name="disease_diagnosis_id[]" id="disease_diagnosis_id" value="<?php echo $diagnose['diagnosis_id']; ?>">
                                                    <input type="hidden" name="diagnose_structure_id[]" id="diagnose_structure_id" value="<?php echo $diagnose['structure_id']; ?>">
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </form>
	    				</div>
    				</div>
    			</div>
    		</div>
    		<div class="col-lg-4 col-md-6 pull-right" style="display: inline-flex;">
    			<label class="checkbox-inline m-r-10 m-t-15"><input type="checkbox" value="" id="echosig">Change Signature ?</label>
                <form id="echo_sig_form" style="width:200px;">
                    <select class="form-control col-md-6 m-t-10" name="sig-echo" id="sig-echo" disabled="disabled">
                        <?php if(isset($doc_sig->doc_sig)){?>
                            <option value="<?php  echo  $doc_sig->doc_sig; ?>"><?php  echo  $doc_sig->doc_sig ?></option>
                        <?php } ?>
                        <?php foreach ($users as $user) { ?>
                            <option value="<?php echo $user['username']; ?>"><?php echo $user['username']; ?></option>
                        <?php } ?>
                    </select>
                </form>
    			<button class="btn btn-primary" id="save_patient_echo_info">Save</button>
    		</div>
    	</div>   	
    </div>
</div>