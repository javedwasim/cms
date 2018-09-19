<div class="tab-pane" id="ett5" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <label>New Protocol</label>
                    <input type="text" class="form-control" name="new_protocol" id="new_protocol">
                </div>
                <div class="col-md-1 col-lg-1">
                    <label>Stages</label>
                    <input type="text" class="form-control" name="protocol_stages" id="protocol_stages">
                </div>
                <div class="col-md-1 col-lg-1">
                    <label>Recovery</label>
                    <input type="text" class="form-control" name=" protocol_recovery" id="protocol_recovery">
                </div>
                <div class="col-md-2 col-lg-1 m-t-25">
                    <button class="btn btn-primary" id="add_protocol">Add</button>
                </div>
            </div>
        </div>
        <div class="card-body protocol_table_content" style="height: 60vh; overflow-x: scroll;">
            <?php $this->load->view('ett/protocol_table'); ?>
        </div>
    </div>
</div>