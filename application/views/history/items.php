<div class="tab-pane" id="items" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="history_item_form" method="post" role="form"
                  data-action="<?php echo site_url('Profile_history/add_history_item') ?>"
                  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label>Item Name:</label>
                            <input type="text" class="form-control" id="history_items_name" name="name">
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-4">
                        <div class="form-group">
                            <label>Category:</label>
                            <select class="form-control prof_his_id" id="profile_history_id" name="profile_history_id" >
                                <option value="">Select</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2 p-0">
                        <button class="btn btn-sm btn-primary m-t-30" id="history_item_btn">Add</button>
                    </div>
                    <div class="col-lg-5 col-md-5 p-0" style="display: inline-flex;">
                        <form method="post" id="import_csv_history" enctype="multipart/form-data">
                          <div class="form-group m-t-30">
                            <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
                          </div>
                          <div class="form-group m-t-25">
                              <button type="submit" name="import_csv" class="btn btn-sm btn-info" id="import_csv_btn">Add Multiple</button>
                          </div>
                        </form>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="form-group ">
                        <label>Select Category:</label>
                        <select class="form-control" name="filter_history_category" onchange="filter_history_item_category(this.value)" id="history_items" required>
                            <option value="">Select</option>
                            <option value="0">All</option>
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
                        <a class="btn btn-sm btn-info" href="javascript:void(0)" id="export_history_items" >Export items</a>    
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body history_item_container">
            <?php $this->load->view('history/item_table'); ?>
        </div>
    </div>
<!--     <script type="text/javascript">
     $('#csv_file').on('change', function(event){
          event.preventDefault();
          var itemfile = new FormData(this);
          var catid = $('.prof_his_id option:selected').val();
          $.ajax({
               url:"<?php echo base_url(); ?>setting/import_history_items",
               method:"POST",
               data:new FormData(this),
               contentType:false,
               cache:false,
               processData:false,
               success:function(data)
               {
                    console.log(data);
               }
          });
     });
</script> -->
</div>

