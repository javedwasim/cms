<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-lg-5 col-md-5">
            <div class="card">
            	<div class="card-body">
            		<form id="report-setting-form" enctype="multipart/form-data">
            			<div class="row">
            				<div class="col-lg-12">
            					<div class="form-group">
            						<label>Doctor Name</label>
            						<input type="text" name="doc-name" class="form-control" required="required"
            						style="text-transform: capitalize;" value="<?php echo $report->doc_name; ?>" />
            					</div>
            					<div class="form-group">
            						<label>Phone</label>
            						<input type="number" name="phone" class="form-control" maxlength="11" required="required" value="<?php echo $report->phone; ?>" />
            					</div>
            					<div class="form-group">
            						<label>Degree</label>
            						<input type="text" name="degree" class="form-control" required="required" 
            						value="<?php echo $report->degree; ?>" />
            					</div>
            					<div class="form-group">
            						<label>Address</label>
            						<textarea class="form-control" name="address" required="required"><?php echo $report->address;?></textarea>
            					</div>
            					<div class="form-group">
            						<label>Clinic Name</label>
            						<input type="text" name="report_heading" class="form-control" value="<?php echo $report->report_heading; ?>" />
            					</div>
            					<div class="form-group">
            						<label>Report Logo</label>
            						 <input type="file" class="form-control" name="report_logo" id="report_logo" />
            					</div>
            					<div class="form-group">
            						<button  class="btn btn-primary" id="rep-setting-btn"> Submit </button>
            					</div>
            				</div>
            			</div>
            		</form>
            		<!-- <form id="report_logo_form" enctype="multipart/form-data">
            			<div class="row">
            				<div class="col-lg-12">
            					
            				</div>
            			</div>
            		</form> -->
            	</div>
            </div>
        </div>
        <div class="col-md-2">
        	<div class="card">
        		<div class="card-header">
        			<p>Switch on for custom report template</p>
        		</div>
        		<div class="card-body">
        			<div class="row">
        				<div class="col-md-8 offset-2">
        					<label class="radio-inline"><input type="radio" value="1" class="custom_report" name="optradio" checked>ON</label>
							<label class="radio-inline"><input type="radio" value="0" class="custom_report" name="optradio">OFF</label>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div>
