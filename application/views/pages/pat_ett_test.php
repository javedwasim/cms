<div class="content-wrapper" style="margin: 0% 0.5%;">
    <div class="row p-t-10 m-0">
        <form id="ett_protocol_form">
            <input type="hidden" name="pat_id" value="" id="ett_pat_id">
        	<div class="col-md-12 p-l-0 p-r-0">
        		<div class="card" style="margin-bottom:0px !important; ">
    	    		<div class="card-body">
    	    			<div class="row">
    	    				<div class="col-md-12 col-lg-12 pt-info" id="pat_ett_information">
    				         
    				        </div>
    	    			</div>
    	    		</div>
    	    	</div>	
        	</div>
        	<div class="col-md-12 p-l-0 p-r-0">
        		<div class="card">
        			<div class="card-body">
        				<div class="row">
        					<div class="col-md-3 p-r-0">
        						<div class="form-group">
        							<label>Reason for Test</label>
        							<select class="form-control" name="test_reason" id="ett_test_reason">
        								<option value="">Select ...</option>
                                        <?php foreach($test_reasons as $reason){?>
                                            <option value="<?php echo $reason['id']; ?>"><?php echo $reason['test_reason']; ?></option>
                                        <?php }?>
        							</select>
        						</div>
        						<div class="form-group">
        							<label>Medication</label>
<textarea class="form-control" rows="6" name="medication" id="ett_medication"><?php if(isset($details)){ foreach($details as $info){ echo $info['medication']; }}?></textarea>
                                </div>
        						<div class="form-group">
        							<div class="card">
        								<div class="card-body" style="height: 27vh; overflow-y: scroll;">
                                            <table class="table table-bordered responsive" id="profile_ett_desc_table">
                                                <thead>
                                                    <th>Description</th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($descriptions as $desc){?>
                                                        <tr >
                                                            <td class="ett_pro_desc"><?php echo $desc['description']; ?></td>
                                                        </tr>
                                                    <?php }?>
                                                </tbody>                           
                                            </table>
        								</div>
        							</div>
        						</div>
        						<div class="form-group">
        							<div class="card">
        								<div class="card-body" style="height: 25vh; overflow-y: scroll;">
        									<table class="table table-bordered responsive" id="profile_ett_conc_table">
                                                <thead>
                                                    <th>Conclusion</th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($conclusions as $conc){?>
                                                        <tr >
                                                            <td class="ett_pro_conc"><?php echo $conc['conclusion']; ?></td>
                                                        </tr>
                                                    <?php }?>
                                                </tbody>                           
                                            </table>
        								</div>
        							</div>
        						</div>
        					</div>
        					<div class="col-md-4 p-l-0 p-r-0">
        						<div class="card">
        							<div class="card-body">
        								<div class="row">
        									<div class="col-md-12 m-t-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Resting HR:</label>
                                                            <input type="text" name="resting_hr"
                                                            <?php if(isset($details)){
                                                                foreach($details as $info){ ?>
                                                            value="<?php echo $info['resting_hr']; ?> " <?php } }?>  id="resting_hr" class="form-control">
                                                        </div>    
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Resting BP:</label>
                                                            <div style="display: inline-flex;">
                                                                <input type="test" name="resting_bp_a" id="resting_bp_a" 
                                                                <?php if(isset($details)){
                                                                foreach($details as $info){ 
                                                                    $bp = explode('\\', $info['resting_bp'])
                                                                    ?>
                                                                    value="<?php echo $bp[0]?>"
                                                                <?php } }?>
                                                                class="form-control col-md-5">
                                                                <label class="">/</label>
                                                                <input type="text" name="resting_bp_b"
                                                                <?php if(isset($details)){
                                                                foreach($details as $info){ ?>
                                                                    value="<?php echo $bp[1]?>"
                                                                <?php } }?>
                                                                 id="resting_bp_b" class="form-control col-md-5">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        									</div>
        									<div class="col-md-12 m-t-10" style="display: inline-flex;">
        										<div class="row">
                                                    <div class="col-md-6">
                                                        <label>Max HR:</label>
                                                        <input type="text" name="max_hr"
                                                        <?php if(isset($details)){
                                                                foreach($details as $info){ ?>
                                                                    value="<?php echo $info['max_hr']?>"
                                                                <?php } }?>
                                                         id="max_hr" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Max BP:</label>
                                                        <div style="display: inline-flex;">
                                                            <input type="test" name="max_bp_a"
                                                                <?php if(isset($details)){
                                                                foreach($details as $info){ 
                                                                    $mbp = explode('\\', $info['max_bp'])
                                                                    ?>
                                                                    value="<?php echo $mbp[0]?>"
                                                                <?php } }?>
                                                             id="max_bp_a" class="form-control col-md-5">
                                                            <label class="">/</label>
                                                            <input type="text" name="max_bp_b"
                                                            <?php if(isset($details)){
                                                                foreach($details as $info){ ?>
                                                                    value="<?php echo $mbp[1]?>"
                                                                <?php } }?>
                                                             id="max_bp_b" class="form-control col-md-5">
                                                        </div>
                                                    </div>
                                                </div>
        									</div>
        									<div class="col-md-12 m-t-10">
        										<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Max Predicted Target HR:</label>
                                                            <input type="text" name="max_pre_tar"
                                                            <?php if(isset($details)){
                                                                foreach($details as $info){ ?>
                                                                    value="<?php echo $info['max_pre_tar']?>"
                                                                <?php } }?>
                                                             id="max_pre_tar" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>% Max Predicted HR:</label>
                                                            <div style="display: inline-flex;">
                                                                <input type="text" name="max_pre_hr"
                                                                <?php if(isset($details)){
                                                                foreach($details as $info){ ?>
                                                                    value="<?php echo $info['max_pre_hr']?>"
                                                                <?php } }?>
                                                                 id="max_pre_hr" class="form-control">
                                                                <label>%</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        									</div>
        									<div class="col-md-12 m-t-10" style="display: inline-flex;">
        										<label class="m-r-10">HR X BP:</label>
        										<input type="text" name="hr_bp" 
                                                <?php if(isset($details)){
                                                                foreach($details as $info){ ?>
                                                                    value="<?php echo $info['hr_bp']?>"
                                                                <?php } }?>
                                                id="hr_bp" class="form-control col-md-4">
        										<label class="m-r-10 m-l-20">Mets:</label>
        										<input type="test" name="mets" id="ett_mets"
                                                <?php if(isset($details)){
                                                    foreach($details as $info){ ?>
                                                        value="<?php echo $info['mets']?>"
                                                    <?php } }?>
                                                 class="form-control col-md-4">
        									</div>
        									<div class="col-md-12 m-t-10" style="display: inline-flex;">
        										<label class="m-r-10">Total exercise time:</label>
        										<input type="text" name="exercise_time"
                                                <?php if(isset($details)){
                                                    foreach($details as $info){ ?>
                                                        value="<?php echo $info['exercise_time']?>"
                                                    <?php } }?>
                                                 id="exercise_time" class="form-control col-md-2">
        									</div>
        									<div class="col-md-12 m-t-10" style="display: inline-flex;">
        										<label class="m-r-10">Reason of ending test:</label>
        										<select class="form-control col-md-6" name="ending_reason" id="ett_ending_reason">
        											<option value="">Select...</option>
                                                    <?php foreach($ending_reasons as $key){?>
                                                        <option value="<?php echo $key['id']; ?>"><?php echo $key['ending_reason']; ?></option>
                                                    <?php }?>
        										</select>
        									</div>
        									<div class="col-md-12">
<textarea class="form-control" id="ett_desc_pro" name="description" rows="7"><?php if(isset($details)){foreach($details as $info){echo $info['description']; } }?></textarea>
        									</div>
        									<div class="col-md-12">
<textarea class="form-control" id="ett_conc_pro" name="conclusion" rows="5"><?php if(isset($details)){foreach($details as $info){echo $info['conclusion']; } }?></textarea>
        									</div>
        								</div>
        							</div>
        						</div>
        					</div>
        					<div class="col-md-5 p-l-0">
        						<div class="card">
        							<div class="card-header" style="display: inline-flex;">
        								<label class="m-t-10">Select Protocol:</label>
        								<select class="form-control col-md-6" name="protocol_id" onchange="profile_protocol_details(this.value)" id="ett_protocol_id">
                                            <option value="">Select..</option>
                                            <?php foreach($protocols as $pro){?>
                                                <option value="<?php echo $pro['id']; ?>" ><?php echo $pro['protocol']; ?></option>
                                            <?php }?>
                                        </select>
        							</div>
        							<div class="card-body" style="height: 60vh;">
        								<table class="table table-bordered responsive">
        									<thead>
        										<tr>
        											<th>Stage Name</th>
    	    										<th>Speed</th>
    	    										<th>Grade %</th>
    	    										<th>Stage Time</th>
    	    										<th>Mets</th>
    	    										<th>HR</th>
    	    										<th>SBP</th>
    	    										<th>DBP</th>
    	    										<th>Condition</th>
        										</tr>
        									</thead>
                                            <tbody id="profile_protocol_table">
                                                
                                            </tbody>
        								</table>
        							</div>
        						</div>
        						<div class="col-lg-12 col-md-12" style="display: inline-flex;">
    				    			<label class="checkbox-inline m-r-10 m-t-15"><input type="checkbox" value="" class="m-r-10">Change Signature ?</label>
    				    			<select class="form-control col-md-6 m-t-10" name="doc_sig">
    				    				<option value="">Select</option>
    				    				<option value="admin">admin</option>
    				    			</select>
    				    			<button class="btn btn-primary" id="save_ett_test">Save</button>
    				    		</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </form>
    </div>
</div>