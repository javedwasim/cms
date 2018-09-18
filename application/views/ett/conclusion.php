<div class="tab-pane" id="ett4" role="tabpanel">
	<div class="card">
		<div class="card-header" style="display: inline-flex;">
			<div class="row">
				<div class="col-md-12">
					<label>New Conclusion</label>
					<input type="text" class="form-control col-md-6" name="ett_conclusion" id="ett_conclusion" >
					<button class="btn btn-primary" id="add_conclusion">Add</button>
				</div>
			</div>
		</div>
		<div class="card-body ins_category_container">
			<?php $this->load->view('ett/conclusion_table'); ?>
		</div>
	</div>
</div>