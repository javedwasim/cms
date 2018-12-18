<div class="tab-pane active" id="category" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <label>New Category</label>
                    <input type="text" class="form-control col-md-4 col-sm-6 col-6" name="profile_history" id="profile_history">
                    <button class="btn btn-primary btn-sm add-profile-history">Add</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-danger btn-sm" id="delete_all_history" >Delete All</button>
                </div>
            </div>
        </div>
        <div class="card-body history_category_container" >
            <?php $this->load->view('history/history_table'); ?>
        </div>
    </div>
</div>