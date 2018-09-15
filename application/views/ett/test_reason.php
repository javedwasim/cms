<div class="tab-pane active" id="ett1" role="tabpanel">
    <div class="card">
		<div class="card-header" style="display: inline-flex;">
			<div class="row">
				<div class="col-md-12">
					<label>New Reason</label>
					<input type="text" class="form-control col-md-6" name="ett_test_reason" id="ett_test_reason" >
					<button class="btn btn-primary add_ett_test_reason">Add</button>
				</div>
			</div>
		</div>
		<div class="card-body ins_category_container" style="height: 60vh; overflow-x: scroll;">
			<?php $this->load->view('ett/test_reason_table'); ?>
		</div>
	</div>
</div>
