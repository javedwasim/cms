<script type="text/javascript">
  $('#import_csv_angio').submit(function(event){
        event.preventDefault();
        var itemfile = new FormData($('#import_csv_angio')[0]);
         $.confirm({
          title: 'Confirm!',
          content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
          buttons: {
              Yes: function () {
                $.ajax({
                   url:"<?php echo base_url(); ?>setting/import_angio/",
                   method:"POST",
                   data: itemfile,
                   contentType:false,
                   cache:false,
                   processData:false,
                   success:function(response)
                   {
                    document.getElementById("csv_angio_file").value = "";
                    if (response.success==true) {
                        toastr["success"](response.message);
                        $('.recommendation_container').empty();
                        $('.recommendation_container').append(response.result_html);
                    }else{
                      toastr["error"](response.message);
                    }
                   }
                });
              },
              No: function () {
                $.ajax({
                   url:"<?php echo base_url(); ?>setting/import_angio/",
                   method:"POST",
                   data: itemfile,
                   contentType:false,
                   cache:false,
                   processData:false,
                   success:function(response)
                   {
                    document.getElementById("csv_angio_file").value = "";
                    if (response.success==true) {
                        toastr["success"](response.message);
                        $('.recommendation_container').empty();
                        $('.recommendation_container').append(response.result_html);
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
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                            <form id="angio_form">
                                <div class="form-group">
                                    <label>Recommendation</label>
                                    <textarea class="form-control" id="add_description"  name="description" rows="3" required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-1 p-l-0" style="margin-top: 25px;">
                            <button class="btn btn-sm btn-primary" id="add_recommendation">Add</button>
                        </div>
                        <div class="col-md-3 p-l-0" style="margin-top: 25px;">
                            <div class="form-group">
                                <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>setting/export_angio" id="angio_export">Export Recommendations</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <form id="import_csv_angio" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-8">
                                    <div class="form-group m-t-30">
                                      <input type="file" name="csv_file" id="csv_angio_file" required accept=".csv" />
                                    </div>
                                  </div>
                                  <div  class="col-md-4">
                                    <div class="form-group m-t-25">
                                        <input type="submit" name="import_csv_angio" class="btn btn-sm btn-info" id="import_csv_angio_btn" value="Add Multiple">
                                    </div>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body recommendation_container" >
                    <?php $this->load->view('angio/recommendation_table'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
