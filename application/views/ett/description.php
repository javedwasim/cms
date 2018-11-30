<script type="text/javascript">
$(document.body).on('click','#import_ett_description_btn', function(e){
    event.preventDefault();
    var itemfile = new FormData($('#import_csv_ett_description')[0]);
    $.confirm({
        title: 'Confirm!',
        content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
        buttons: {
            Yes: function () {
                $.ajax({
                  url:"<?php echo base_url(); ?>setting/import_ett_descriptions/",
                  method:"POST",
                  data: itemfile,
                  contentType:false,
                  cache:false,
                  processData:false,
                  success:function(response){
                    $('.discription-table').empty();
                    $('.discription-table').append(response.ett_descriptions_table);
                    document.getElementById("ett_description_csv_file").value = "";
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
                url:"<?php echo base_url(); ?>setting/import_ett_descriptions/",
                method:"POST",
                data: itemfile,
                contentType:false,
                cache:false,
                processData:false,
                success:function(response){
                    $('.discription-table').empty();
                    $('.discription-table').append(response.ett_descriptions_table);
                    document.getElementById("ett_description_csv_file").value = "";
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
<div class="tab-pane" id="ett3" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <form id="ett_discription_form">
                        <label>New Description</label>
                        <textarea class="form-control" name="ett_discription" id="ett_discription" required="required"></textarea>
                    </form>
                </div>
                <div class="col-md-1 p-l-0" style="margin-top: 25px;">
                    <button class="btn btn-sm btn-primary" id="add_ett_discription">Add</button>
                </div>
                <div class="col-md-2 p-l-0" style="margin-top: 25px;">
                    <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>setting/export_ett_descriptions">Export</a>
                </div>
                <div class="col-md-5">
                    <form id="import_csv_ett_description" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                              <div class="form-group m-t-30">
                                <input type="file" name="csv_file" id="ett_description_csv_file" required />
                              </div>
                            </div>
                            <div  class="col-md-4">
                              <div class="form-group m-t-25">
                                  <input type="submit" name="import_csv" class="btn btn-sm btn-primary" id="import_ett_description_btn" value="Add Multiple">
                              </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body discription-table">
            <?php $this->load->view('ett/description_table'); ?>
        </div>
    </div>
</div>