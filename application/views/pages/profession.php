<script type="text/javascript">
$(document.body).on('click','#import_profession_btn', function(e){
        event.preventDefault();
        var itemfile = new FormData($('#import_csv_profession')[0]);
        $.ajax({
           url:"<?php echo base_url(); ?>setting/import_professions/",
           method:"POST",
           data: itemfile,
           contentType:false,
           cache:false,
           processData:false,
           success:function(response)
           {
                $('.profession_table').remove();
                $('#profession_table').append(response.profession_table);
                document.getElementById("profession_csv_file").value = "";
                if (response.success==true) {
                  toastr["success"](response.message);
                }else{
                  toastr["error"](response.message);
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
                    <?php if(isset($rights[0]['rights'])):
                        $permissions = explode(',',$rights[0]['rights']);
                        if (in_array("create_new_profile-1", $permissions)): ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <form id="profession_form">
                                        <div class="form-group">
                                            <label>New Profession</label>
                                            <input type="text" class="form-control" name="profession_add" id="profession_add" style="text-transform: capitalize;" required="required">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-1 p-l-0" style="margin-top: 25px;">
                                    <button class="btn btn-primary btn-sm" id="profes_add">Add</button>
                                </div>
                                <div class="col-md-2 p-l-0" style="margin-top: 25px;">
                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>setting/export_professions" id="profes_export">Export Professions</a>
                                </div>
                                <div class="col-md-5">
                                    <form id="import_csv_profession" enctype="multipart/form-data">
                                        <div class="row">
                                          <div class="col-md-8">
                                            <div class="form-group m-t-30">
                                              <input type="file" name="csv_file" id="profession_csv_file" required accept=".csv" />
                                            </div>
                                          </div>
                                          <div  class="col-md-4">
                                            <div class="form-group m-t-25">
                                                <input type="submit" name="import_csv" class="btn btn-sm btn-info" id="import_profession_btn" value="Add Multiple">
                                            </div>
                                          </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="card-body" style="overflow-y:auto; height:510px">
                    <div id="profession_table">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
$(document).ready(function () {
    var professionvalidate = $('#profession_form').validate();
});
</script>
