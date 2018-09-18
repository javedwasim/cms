<div class="tab-pane active" id="category" role="tabpanel">
    <div class="card">
		<div class="card-header" style="display: inline-flex;">
			<div class="row">
				<div class="col-md-12">
					<label>New Category</label>
					<input type="text" class="form-control col-md-6" name="history_category" id="history_category" >
					<button class="btn btn-primary" id="add_history_category">Add</button>
				</div>
			</div>
		</div>
		<div class="card-body history_category_content">
			<?php $this->load->view('history/category_table'); ?>
		</div>
	</div>
</div>