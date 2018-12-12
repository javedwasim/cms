<script type="text/javascript">
$(document.body).on('click','#import_disease_btn', function(e){
        event.preventDefault();
        var itemfile = new FormData($('#import_csv_disease')[0]);
        $.confirm({
            title: 'Confirm!',
            content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
            buttons: {
                Yes: function () {
                    $.ajax({
                      url:"<?php echo base_url(); ?>setting/import_diseases/",
                      method:"POST",
                      data: itemfile,
                      contentType:false,
                      cache:false,
                      processData:false,
                      success:function(response){
                        $('.disease_category_container').empty();
                        $('.disease_category_container').append(response.disease_table);
                        document.getElementById("disease_csv_file").value = "";
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
                    url:"<?php echo base_url(); ?>setting/import_diseases/",
                    method:"POST",
                    data: itemfile,
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(response){
                      $('.disease_category_container').empty();
                      $('.disease_category_container').append(response.disease_table);
                      document.getElementById("disease_csv_file").value = "";
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
<div class="tab-pane active disease_container" id="tb1" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4  col-sm-8 col-8">
                    <form id="disease_category_form">
                        <div class="form-group">
                          <label>New Disease</label>
                            <input type="text" class="form-control" name="disease" id="disease" required>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 p-l-0  col-sm-3 col-3" style="margin-top: 25px;">
                    <button class="btn btn-sm btn-primary add-disease-category">Add</button>
                </div>
                <div class="col-md-2 p-l-0" style="margin-top: 25px;">
                    <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>setting/export_diseases" id="disease_export">Export diseases</a>
                </div>
                <div class="col-md-5">
                  <form id="import_csv_disease" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group m-t-30">
                            <input type="file" name="csv_file" id="disease_csv_file" required accept=".csv" />
                          </div>
                        </div>
                        <div  class="col-md-4">
                          <div class="form-group m-t-25">
                              <input type="submit" name="import_csv" class="btn btn-sm btn-primary" id="import_disease_btn" value="Add Multiple">
                          </div>
                        </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
        <div class="card-body disease_category_container">
            <?php $this->load->view('echo/disease_table'); ?>
        </div>
    </div>
</div>
