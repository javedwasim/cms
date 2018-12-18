<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
          <div class="card card-top-margin">
			<div class="card-header">
				<form id="doc_signature_form_validation">
					<div class="row">
						<div class="col-lg-2 col-md-4" >
							<div class="form-group">
	    						<label>Name:</label>
		    					<input type="text" class="form-control" name="doc_sig_name" id="doc_sig_name"  required="required">
	    					</div>
	    				</div>
	    				<div class="col-lg-3 col-md-4" >
							<div class="form-group">
	    						<label>Qualification:</label>
		    					<input type="text" class="form-control" name="doc_sig_quali" id="doc_sig_quali" required="required">
	    					</div>
	    				</div>
	    				<div class="col-lg-2 col-md-4" >
							<div class="form-group">
	    						<label>Designation:</label>
		    					<input type="text" class="form-control" name="doc_sig_desi" id="doc_sig_desi"  required="required">
	    					</div>
	    				</div>
	    				<div class="col-lg-3 col-md-4" >
							<div class="form-group">
	    						<label>Institute:</label>
		    					<input type="text" class="form-control" name="doc_sig_institution" id="doc_sig_institution" required="required">
	    					</div>
	    				</div>
	    				<div class="col-lg-2 col-md-4 p-0">
		    				<div class="form-group m-t-25">
		    					<button class="btn btn-sm btn-primary" id="save_signature">Add</button>
							</div>
						</div>
					</div>
				</form>
				<button class="btn btn-danger btn-sm" id="delete_all_doctor">Delete All</button>
			</div>
			<div class="card-body" id="signature_table">
				
			</div>
		</div>
        </div>
    </div>
</div>
<!-- row -->