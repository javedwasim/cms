<script type="text/javascript">
$(document.body).on('click','#import_dosage_btn', function(e){
        event.preventDefault();
        var itemfile = new FormData($('#import_csv_dosage')[0]);
        $.confirm({
            title: 'Confirm!',
            content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
            buttons: {
                Yes: function () {
                    $.ajax({
                       url:"<?php echo base_url(); ?>setting/import_dosage/",
                       method:"POST",
                       data: itemfile,
                       contentType:false,
                       cache:false,
                       processData:false,
                       success:function(response)
                       {
                            $('.district_content').remove();
                            $('#district_content').append(response.district_table);
                            document.getElementById("dosage_csv_file").value = "";
                            if (response.success==true) {
                              toastr["success"](response.message);
                            }else{
                              toastr["error"](response.message);
                            }
                       }
                    });
                },
                No: function (){
                    $.ajax({
                     url:"<?php echo base_url(); ?>setting/import_dosage/",
                     method:"POST",
                     data: itemfile,
                     contentType:false,
                     cache:false,
                     processData:false,
                     success:function(response)
                     {
                          $('.district_content').remove();
                          $('#district_content').append(response.district_table);
                          document.getElementById("dosage_csv_file").value = "";
                          if (response.success==true) {
                            toastr["success"](response.message);
                          }else{
                            toastr["error"](response.message);
                          }
                     }
                  });
                }
            }
        });
    });
</script>
<div class="tab-pane <?php echo  isset($active_tab)&&($active_tab=='dosage')?'active':''; ?>" id="dosage" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <div class="row">
              <div class="col-md-2 m-t-25">
                <button class="btn btn-danger btn-sm" id="delete_all_dosage" >Delete All</button>
              </div>
              <div class="col-md-1 p-l-0" style="margin-top: 25px;">
                  <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>setting/export_dosage" id="dosage_export">Export</a>
              </div>
                <div class="col-md-5">
                    <form id="import_csv_dosage" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group m-t-30">
                              <input type="file" name="csv_file" id="dosage_csv_file" required accept=".csv" />
                            </div>
                          </div>
                          <div  class="col-md-4">
                            <div class="form-group m-t-25">
                                <input type="submit" name="import_csv" class="btn btn-sm btn-primary" id="import_dosage_btn" value="Add Multiple">
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <form id="dosage_category_form">
                        <div class="form-group">
                            <label>New Dosage</label>
                            <input type="text" class="form-control" name="name" id="dosage_name" required maxlength="50">    
                        </div>
                    </form>
                </div>
                <div class="col-md-1 m-t-25">
                    <button class="btn btn-primary btn-sm add-dosage-category">Add</button>
                </div>
            </div>
        </div>
        <div class="card-body dosage_category_container">
            <?php $this->load->view('medicine/dosage_table'); ?>
        </div>
    </div>
</div>