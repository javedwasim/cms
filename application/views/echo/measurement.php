<div class="tab-pane" id="tb5" role="tabpanel">
    <div class="card">
        <div class="card-header" style="display: inline-flex;">
            <form id="2d_echo_category_measurment_form" method="post" role="form"
                  data-action="<?php echo site_url('Echo_controller/add_category_measurement') ?>"
                  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-2 col-md-3  col-sm-12 col-12">
                        <div class="form-group">
                            <label>New Item:</label>
                            <input type="text" class="form-control"  name="item" id="measurement_item" required="required">
                            <!-- <input type="text" class="form-control" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="item" id="measurement_item"> -->
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3  col-sm-12 col-12">
                        <div class="form-group">
                            <label>Normal Value:</label>
                            <input type="text" class="form-control" name="value" id="normal_value" required="required">
                        <!--     <input type="text" class="form-control" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="value" id="normal_value"> -->
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-4  col-sm-9 col-9">
                        <div class="form-group">
                            <label>Category:</label>
                            <select class="form-control" name="category_id" id="category_id" required="required">
                                <option value="">Select</option>
                                <?php foreach ($main_cate as $category): ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 p-0  col-sm-3 col-3">
                        <div class="form-group m-t-25">
                            <button type="submit" class="btn btn-sm btn-primary" id="main_category_measurement_btn">Add</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group ">
                        <label>Select Category:</label>
                        <select class="form-control" onchange="category_measurement_filter(this.value)">
                            <option value="0">Select</option>
                            <?php foreach ($main_cate as $category): ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body category_measurement_container" >
            <?php $this->load->view('echo/category_measurement_table') ?>
        </div>
    </div>
</div>