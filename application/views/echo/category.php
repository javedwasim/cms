<div class="tab-pane" id="tb4" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="2d_echo_category_item_form" method="post" role="form"
                  data-action="<?php echo site_url('Echo_controller/add_main_category_item') ?>"
                  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label>Item Name:</label>
                            <input type="text" class="form-control" name="main_category_name" id="main_category_name">
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-4">
                        <div class="form-group">
                            <label>Main Category:</label>
                            <select class="form-control" name="main_category" id="main_category">
                                <option>Select</option>
                                <option value="dooplers">Dooplers</option>
                                <option value="mmode">MMODE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 p-0">
                        <div class="form-group m-t-25" style="display: inline-flex;">
                            <button type= "submit" class="btn btn-sm btn-primary" id="main_category_item_btn">Add</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="form-group ">
                        <label>Select Category:</label>
                        <select class="form-control" name="main_category_filter" onchange="main_category_item_filter(this.value)">
                            <option value="">Select</option>
                            <option value="0">All</option>
                            <option value="dooplers">Dooplers</option>
                            <option value="mmode">MMODE</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body main_category_container">
            <?php $this->load->view('echo/main_category_table'); ?>
        </div>
    </div>
</div>