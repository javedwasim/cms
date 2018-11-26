<script type="text/javascript">
  $('#structure_form').submit(function(event){
        event.preventDefault();
        var itemfile = new FormData($('#structure_form')[0]);
        var structure_id = $.trim($('#echo_structure_tbl tbody tr.row_selected').find('#structure_selected_id').val());
        $.confirm({
          title: 'Confirm!',
          content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
          buttons: {
            Yes: function () {
                $.ajax({
                 url:"<?php echo base_url(); ?>setting/import_structure/",
                 method:"POST",
                 data: itemfile,
                 contentType:false,
                 cache:false,
                 processData:false,
                 success:function(response)
                 {
                    document.getElementById("structure_csv_file").value = "";
                      if (response.success==true) {
                        $('.structure_category_container').empty();
                        $('.structure_category_container').append(response.structure_table);
                        toastr["success"](response.message);
                      }else{
                        toastr["error"](response.message);
                      }
                  }
              });
            },
            No: function () {
                $.ajax({
                 url:"<?php echo base_url(); ?>setting/import_structure/",
                 method:"POST",
                 data: itemfile,
                 contentType:false,
                 cache:false,
                 processData:false,
                 success:function(response)
                 {
                    document.getElementById("structure_csv_file").value = "";
                      if (response.success==true) {
                        $('.structure_category_container').empty();
                        $('.structure_category_container').append(response.structure_table);
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

    $('#finding_form').submit(function(event){
        event.preventDefault();
        var itemfile = new FormData($('#finding_form')[0]);
        var structure_id = $.trim($('#echo_structure_tbl tbody tr.row_selected').find('#structure_selected_id').val());
        if(structure_id == ''){
            toastr['warning']('Please select structure.');
        }else{
            $.confirm({
              title: 'Confirm!',
              content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
              buttons: {
                Yes: function () {
                    $.ajax({
                     url:"<?php echo base_url(); ?>setting/import_finding/"+structure_id,
                     method:"POST",
                     data: itemfile,
                     contentType:false,
                     cache:false,
                     processData:false,
                     success:function(response)
                     {
                        document.getElementById("finding_csv_file").value = "";
                          if (response.success==true) {
                            $('.structure_finding_container').empty();
                            $('.structure_finding_container').append(response.finding_table);
                            toastr["success"](response.message);
                          }else{
                            toastr["error"](response.message);
                          }
                      }
                  });
                },
                No: function () {
                    $.ajax({
                     url:"<?php echo base_url(); ?>setting/import_finding/"+structure_id,
                     method:"POST",
                     data: itemfile,
                     contentType:false,
                     cache:false,
                     processData:false,
                     success:function(response)
                     {
                        document.getElementById("structure_csv_file").value = "";
                          if (response.success==true) {
                            $('.structure_finding_container').empty();
                            $('.structure_finding_container').append(response.finding_table);
                            toastr["success"](response.message);
                          }else{
                            toastr["error"](response.message);
                          }
                     }
                  });
                }
            }
          });
        }   
    });

    $('#diagnosis_form').submit(function(event){
        event.preventDefault();
        var itemfile = new FormData($('#diagnosis_form')[0]);
        var structure_id = $.trim($('#echo_structure_tbl tbody tr.row_selected').find('#structure_selected_id').val());
        if(structure_id == ''){
            toastr['warning']('Please select structure.');
        }else{
            $.confirm({
              title: 'Confirm!',
              content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
              buttons: {
                Yes: function () {
                    $.ajax({
                     url:"<?php echo base_url(); ?>setting/import_diagnosis/"+structure_id,
                     method:"POST",
                     data: itemfile,
                     contentType:false,
                     cache:false,
                     processData:false,
                     success:function(response)
                     {
                        document.getElementById("diagnosis_csv_file").value = "";
                          if (response.success==true) {
                            $('.structure_diagnosis_container').empty();
                            $('.structure_diagnosis_container').append(response.diagnosis_table);
                            toastr["success"](response.message);
                          }else{
                            toastr["error"](response.message);
                          }
                      }
                  });
                },
                No: function () {
                    $.ajax({
                     url:"<?php echo base_url(); ?>setting/import_diagnosis/"+structure_id,
                     method:"POST",
                     data: itemfile,
                     contentType:false,
                     cache:false,
                     processData:false,
                     success:function(response)
                     {
                        document.getElementById("diagnosis_csv_file").value = "";
                          if (response.success==true) {
                            $('.structure_diagnosis_container').empty();
                            $('.structure_diagnosis_container').append(response.diagnosis_table);
                            toastr["success"](response.message);
                          }else{
                            toastr["error"](response.message);
                          }
                     }
                  });
                }
            }
          });
        }   
    });
</script>
<div class="tab-pane" id="tb2" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-2 col-md-3" >
                    <div class="form-group">
                        <label>New Structure:</label>
                        <input type="text" class="form-control" name="structure" id="structure" required >
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 p-0">
                    <div class="form-group m-t-25">
                        <button class="btn btn-sm btn-primary add-structure-category">Add</button>
                        <a href="<?php echo base_url('setting/export_structure'); ?>" class="btn btn-sm btn-primary m-l-0" id="export_structure">Export</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3" >
                    <div class="form-group">
                        <label>New Finding:</label>
                        <input type="text" class="form-control" name="structure_finding" id="structure_finding" required >
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 p-0">
                    <div class="form-group m-t-25">
                        <button class="btn btn-sm btn-primary add-structure-finding">Add</button>
                        <a href="#" class="btn btn-sm btn-primary m-l-0" id="export_findings">Export</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3" >
                    <div class="form-group">
                        <label>New Diagnosis:</label>
                        <input type="text" class="form-control" name="name" id="structure_diagnosis" required >
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 p-0">
                    <div class="form-group m-t-25">
                        <button class="btn btn-sm btn-primary add-structure-diagnosis">Add</button>
                        <a href="#" class="btn btn-sm btn-primary m-l-0" id="export_diagnosis">Export</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <form id="structure_form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 p-r-0">
                                <div class="form-group m-t-5">
                                    <input type="file" style="width: 235px;" name="csv_file" id="structure_csv_file" required="required" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 p-l-0">
                                <button type="submit" name="import_csv" id="import_structure_btn" class="btn btn-sm btn-primary">Import</button>
                            </div>  
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <form id="finding_form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 p-r-0">
                                <div class="form-group m-t-5">
                                    <input type="file" style="width: 235px;" name="csv_file" id="finding_csv_file" required="required" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 p-l-0">
                                <button type="submit" name="import_csv" id="import_finding_btn" class="btn btn-sm btn-primary">Import</button>
                            </div>  
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <form id="diagnosis_form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 p-r-0">
                                <div class="form-group m-t-5">
                                    <input type="file" style="width: 235px;" name="csv_file" id="diagnosis_csv_file" required="required" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 p-l-0">
                                <button type="submit" name="import_csv" id="import_diagnosis_btn" class="btn btn-sm btn-primary">Import</button>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Structure
                        </div>
                        <div class="card-body structure_category_container">
                            <?php $this->load->view('echo/structure_table'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="card">
                        <div class="card-header">
                            Findings
                        </div>
                        <div class="card-body structure_finding_container" >
                            <?php $this->load->view('echo/finding_table'); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Diagnosis
                        </div>
                        <div class="card-body structure_diagnosis_container">
                            <?php $this->load->view('echo/diagnosis_table'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>