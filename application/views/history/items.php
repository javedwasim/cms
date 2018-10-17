<script type="text/javascript">
  $('#import_csv_history').submit(function(event){
        event.preventDefault();
        var itemfile = new FormData($('#import_csv_history')[0]);
        var catid = $('.prof_his_id option:selected').val();
        $.ajax({
           url:"<?php echo base_url(); ?>setting/import_history_items/"+catid,
           method:"POST",
           data: itemfile,
           contentType:false,
           cache:false,
           processData:false,
           success:function(response)
           {
              document.getElementById("csv_file").value = "";
              $('.prof_his_id').prop('selectedIndex',0);
                $('#history_items').prop('selectedIndex',0);
                if (response.success==true) {
                  toastr["success"](response.message);
                }else{
                  toastr["error"](response.message);
                }
           }
        });
    });
</script>

    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-6">
              <form id="history_item_form" method="post" role="form"
                  data-action="<?php echo site_url('Profile_history/add_history_item') ?>"
                  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="form-group">
                            <label>Item Name:</label>
                            <input type="text" class="form-control" id="history_items_name" name="name">
                        </div>
                    </div>
                    <div class=" col-lg-5 col-md-5">
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
                    <div class="col-lg-2 col-md-2 p-0">
                        <button class="btn btn-sm btn-primary m-t-30" id="history_item_btn">Add</button>
                    </div>
                </div>
            </form>
            </div>
            <div class="col-lg-6">
              <form id="import_csv_history" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group m-t-30">
                      <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
                    </div>
                  </div>
                  <div  class="col-md-4">
                    <div class="form-group m-t-25">
                        <input type="submit" name="import_csv" class="btn btn-sm btn-info" id="import_csv_btn" value="Add Multiple">
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


