<script type="text/javascript">
  $('#import_csv_investigation').submit(function(event){
        event.preventDefault();
        var itemfile = new FormData($('#import_csv_investigation')[0]);
        var catid = $('#investigation_id option:selected').val();
        $.ajax({
           url:"<?php echo base_url(); ?>setting/import_investigation_items/"+catid,
           method:"POST",
           data: itemfile,
           contentType:false,
           cache:false,
           processData:false,
           success:function(response)
           {
              document.getElementById("csv_investigation_file").value = "";
                if (response.success==true) {
                  toastr["success"](response.message);
                }else{
                  toastr["error"](response.message);
                }
           }
        });
    });
</script>
<div class="tab-pane" id="items" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <form id="investigation_item_form" method="post" role="form" data-action="<?php echo site_url('investigation/add_investigation_item') ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label>Item Name:</label>
                                    <input type="text" class="form-control" name="name" maxlength="50" required>
                                </div>
                            </div>
                            <div class=" col-lg-5 col-md-5">
                                <div class="form-group">
                                    <label>Category:</label>
                                    <select class="form-control" name="investigation_id" id="investigation_id" required>
                                        <option value="">Select</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?php echo $category['id']; ?>"
                                                <?php echo isset($selected_category)&&($selected_category==$category['id'])?'selected':'' ?>>
                                                <?php echo $category['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 p-0">
                                <div class="form-group m-t-25">
                                    <button type= "submit" class="btn btn-sm btn-primary" id="investigation_item_btn">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form id="import_csv_investigation" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group m-t-30">
                              <input type="file" name="csv_investigation_file" id="csv_investigation_file" required accept=".csv" />
                            </div>
                          </div>
                          <div  class="col-md-4">
                            <div class="form-group m-t-25">
                                <input type="submit" name="import_csv_investigation" class="btn btn-sm btn-info" id="import_csv_investigation_btn" value="Add Multiple">
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="form-group ">
                        <label>Select Category:</label>
                        <select class="form-control" name="filter_investigation_category" onchange="filter_investigation_item_category(this.value)">
                            <option value="0">Select</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>"
                                    <?php echo isset($selected_category)&&($selected_category==$category['id'])?'selected':'' ?>>
                                    <?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="form-group m-t-25">
                        <a class="btn btn-sm btn-info" href="javascript:void(0)" id="export_investigation_items" >Export items</a>    
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body investigation_item_container">
            <?php $this->load->view('investigation/item_table'); ?>
        </div>
    </div>
</div>
