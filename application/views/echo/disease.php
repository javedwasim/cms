<div class="tab-pane active disease_container" id="tb1" role="tabpanel">
    <div class="card">
        <div class="card-header" style="display: inline-flex;">
            <div class="row">
                <form id="disease_category_form">
                    <div class="col-md-12">
                        <label>New Disease</label>
                        <input type="text" class="form-control col-md-6" name="disease" id="disease" required>
                        <button class="btn btn-sm btn-primary add-disease-category">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body disease_category_container">
            <?php $this->load->view('echo/disease_table'); ?>
        </div>
    </div>
</div>
