<div class="tab-pane" id="ett5" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="ett_protocol_form">
                <div class="row">
                    <div class="col-md-3 col-lg-3">
                        <label>New Protocol</label>
                        <input type="text" class="form-control" name="new_protocol" id="new_protocol" required>
                    </div>
                    <div class="col-md-1 col-lg-1">
                        <label>Stages</label>
                        <input type="text" class="form-control" name="protocol_stages" id="protocol_stages" required>
                    </div>
                    <div class="col-md-1 col-lg-1">
                        <label>Recovery</label> 
                        <input type="text" class="form-control" name=" protocol_recovery" id="protocol_recovery" required>
                    </div>
                    <div class="col-md-2 col-lg-1 m-t-25">
                        <button class="btn btn-sm btn-primary" id="add_protocol">Add</button>
                    </div>
                    <div class="col-md-2 m-t-25">
                        <button class="btn btn-sm btn-danger" id="delete_all_protocol">Delete All</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body protocol_table_content">
            <?php $this->load->view('ett/protocol_table'); ?>
        </div>
    </div>
</div>