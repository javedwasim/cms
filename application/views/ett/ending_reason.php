<div class="tab-pane" id="ett2" role="tabpanel">
	<div class="card">
		<div class="card-header" style="display: inline-flex;">
			<div class="row">
				<div class="col-md-12">
					<label>New Reason</label>
					<input type="text" class="form-control col-md-6" name="ending_reason" id="ending_reason" >
					<button class="btn btn-primary" id="add_ending_reason">Add</button>
				</div>
			</div>
		</div>
		<div class="card-body ins_category_container">
			<?php $this->load->view('ett/ending_reason_table'); ?>
		</div>
	</div>
</div>