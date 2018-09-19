<div class="tab-pane" id="ett3" role="tabpanel">
    <div class="card">
        <div class="card-header" style="display: inline-flex;">
            <div class="row">
                <div class="col-md-12">
                    <label>New Description</label>
                    <input type="text" class="form-control col-md-6" name="ett_discription" id="ett_discription" >
                    <button class="btn btn-primary" id="add_ett_discription">Add</button>
                </div>
            </div>
        </div>
        <div class="card-body discription-table" style="height: 60vh; overflow-x: scroll;">
            <?php $this->load->view('ett/description_table'); ?>
        </div>
    </div>
</div>