<div class="tab-pane active" id="category" role="tabpanel">
    <div class="card">
        <div class="card-header" style="display: inline-flex;">
            <div class="row">
                <div class="col-md-12">
                    <label>New Category</label>
                    <input type="text" class="form-control col-md-6" name="profile_history" id="profile_history">
                    <button class="btn btn-primary add-profile-history">Add</button>
                </div>
            </div>
        </div>
        <div class="card-body history_category_container">
            <?php $this->load->view('history/history_table'); ?>
        </div>
    </div>
</div>