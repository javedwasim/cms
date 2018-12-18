<script type="text/javascript">
$(document.body).on('click','#import_district_btn', function(e){
        event.preventDefault();
        var itemfile = new FormData($('#import_csv_district')[0]);
        $.confirm({
            title: 'Confirm!',
            content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
            buttons: {
                Yes: function () {
                    $.ajax({
                      url:"<?php echo base_url(); ?>setting/import_district/",
                      method:"POST",
                      data: itemfile,
                      contentType:false,
                      cache:false,
                      processData:false,
                      success:function(response)
                      {
                        $('.district_content').remove();
                        $('#district_content').append(response.district_table);
                        document.getElementById("district_csv_file").value = "";
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
                      url:"<?php echo base_url(); ?>setting/import_district/",
                      method:"POST",
                      data: itemfile,
                      contentType:false,
                      cache:false,
                      processData:false,
                      success:function(response)
                      {
                        $('.district_content').remove();
                        $('#district_content').append(response.district_table);
                        document.getElementById("district_csv_file").value = "";
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
<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-lg-12 col-md-12">
            <div class="card card-top-margin">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3 col-sm-8 col-8">
                            <div class="form-group">
                                <label>New District</label>
                                <input type="text" class="form-control" name="distrtict_add" id="district_add" style="text-transform: capitalize;" required="required">
                            </div>
                        </div>
                        <div class="col-md-1 p-l-0 col-sm-4 col-4" style="margin-top: 25px;">
                            <button class="btn btn-primary btn-sm" id="add_district">Add</button>
                        </div>
                        <div class="col-md-1 p-l-0" style="margin-top: 25px;">
                            <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>setting/export_district" id="district_export">Export</a>
                        </div>
                        <div class="col-md-5">
                            <form id="import_csv_district" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-8">
                                    <div class="form-group m-t-30">
                                      <input type="file" name="csv_file" id="district_csv_file" required accept=".csv" />
                                    </div>
                                  </div>
                                  <div  class="col-md-4">
                                    <div class="form-group m-t-25">
                                        <input type="submit" name="import_csv" class="btn btn-sm btn-primary" id="import_district_btn" value="Add Multiple">
                                    </div>
                                  </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2 p-l-0 col-sm-4 col-4" style="margin-top: 25px;">
                          <button class="btn btn-danger btn-sm" id="delete_districts">Delete all</button>
                      </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="district_content">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
