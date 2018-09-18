<div class="tab-pane" id="items" role="tabpanel">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-lg-2 col-md-3" >
					<div class="form-group">
						<label>Item Name:</label>
    					<input type="text" class="form-control" name="" >
					</div>
				</div>
				<div class=" col-lg-3 col-md-4" >
					<div class="form-group">
						<label>Category:</label>
    					<select class="form-control">
    						<option>Select</option>
    						<option>GIT Problem</option>
    						<option>Co-Resp</option>
						</select>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 p-0">
    				<div class="form-group m-t-25" style="display: inline-flex;">
    					<button class="btn btn-sm btn-primary">Add</button>
    					<div class="custom-file">
						    <input type="file" class="custom-file-input hide" id="inputGroupFile04" >
						    <label class="btn btn-info btn-sm" for="inputGroupFile04">Add Multiple</label>
						 </div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4">
					<div class="form-group ">
						<label>Select Category:</label>
    					<select class="form-control">
    						<option>Select</option>
    						<option>GIT Problem</option>
    						<option>Co-Resp</option>
						</select>
					</div>
				</div>
				<div class="col-lg-2 col-md-3">
					<div class="custom-file m-t-25">
					    <input type="file" class="custom-file-input hide" id="inputGroupFile04" >
					    <label class="btn btn-info btn-sm" for="inputGroupFile04">Export items</label>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<?php $this->load->view('history/items_table'); ?>
		</div>
	</div>
</div>