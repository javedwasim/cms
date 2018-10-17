<div class="tab-pane <?php echo  isset($active_tab)&&($active_tab=='dosage')?'active':''; ?>" id="dosage" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="dosage_category_form">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>New Dosage</label>
                            <input type="text" class="form-control" name="name" id="dosage_name" required maxlength="50">    
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-1 m-t-25">
                        <button class="btn btn-primary btn-sm add-dosage-category">Add</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body dosage_category_container" style="height: 400px; overflow-y: scroll;">
            <?php $this->load->view('medicine/dosage_table'); ?>
        </div>
    </div>
</div>