<div class="tab-pane <?php echo isset($active_tab) && ($active_tab == 'category') ? 'active' : ''; ?>"
     id="category" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <form id="lab_cat_form">
                        <div class="form-group">
                            <label>New Category</label>
                            <input type="text" class="form-control" name="" id="lab_category">
                        </div>
                    </form>
                </div>
                <div class="col-md-1 p-l-0" style="margin-top: 25px;">
                    <button class="btn btn-primary btn-sm add-lab-category">Add</button>
                </div>
                <div class="col-md-2 p-l-0" style="margin-top: 25px;">
                    <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>setting/export_lab_cat" id="lab_cat_export">Export Category</a>
                </div>
                <div class="col-md-5">
                    <form id="import_csv_lab_cat" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group m-t-30">
                                <input type="file" name="csv_file" id="lab_cat_csv_file" required="required" />
                                </div>
                            </div>
                            <div  class="col-md-4">
                            <div class="form-group m-t-25">
                                <button type="submit" name="import_csv" class="btn btn-sm btn-primary" id="import_lab_cat_btn">Import</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered nowrap responsive tbl_header_fix_350" cellspacing="0" id="lab_cat_tbl"
                   width="100%">
                <thead>
                <tr>
                    <th style="width:95px;">Action</th>
                    <th>Category Name</th>
                </tr>
                </thead>
                <tbody style="height: 57vh;">
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td style="width:95px;" data-toggle="modal" data-target="#history-modal">
                            <a class="delete-lab-category btn btn-danger btn-xs"
                               href="javascript:void(0)" title="delete"
                               data-href="<?php echo site_url('setting/delete_lab_category/') . $category['id'] ?>">
                                <i class="fa fa-trash" title="Delete"></i>
                            </a>
                            <a class="edit-lab-cat-btn btn btn-info btn-xs"
                               href="javascript:void(0)"
                               data-lab-category-id="<?php echo $category['id']; ?>">
                               <i class="far fa-question-circle"></i>
                           </a>
                        </td>
                        <td class="exam_cate" style="word-break: break-all;">
                            <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="lab_cat" value="<?php echo $category['name']; ?>" onchange="saveToDatabase(this,'cate_name','<?php echo $category['id']; ?>')" />
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="lab_category_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="lab_category_form" method="post" role="form"
              data-action="<?php echo site_url('setting/save_lab_category_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="lab_category_id" id="lab_category_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="lab_cat_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_lab_category_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
$(document.body).on('click','#import_lab_cat_btn', function(e){
    event.preventDefault();
    var itemfile = new FormData($('#import_csv_lab_cat')[0]);
    var fileName = $('#lab_cat_csv_file').val();
    if (fileName == '') {
        toastr["warning"]('Choose file.');
    }else{
        $.confirm({
            title: 'Confirm!',
            content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
            buttons: {
                Yes: function () {
                    $.ajax({
                      url:"<?php echo base_url(); ?>setting/import_lab_cat/",
                      method:"POST",
                      data: itemfile,
                      contentType:false,
                      cache:false,
                      processData:false,
                      success:function(response){
                        $('.profession_table').remove();
                        $('#profession_table').append(response.profession_table);
                        document.getElementById("lab_cat_csv_file").value = "";
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
                    url:"<?php echo base_url(); ?>setting/import_lab_cat/",
                    method:"POST",
                    data: itemfile,
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(response){
                      $('.profession_table').remove();
                      $('#profession_table').append(response.profession_table);
                      document.getElementById("lab_cat_csv_file").value = "";
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
    }
});
    $("#lab_cat_tbl tbody tr").click(function (e) {
        $('#lab_cat_tbl tbody tr.row_selected').removeClass('row_selected');
        $(this).addClass('row_selected');
    });
  
    function saveToDatabase(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'setting/save_lab_category' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + val + '&id=' + id,
            success: function (response) {
                if (response.success) {
                    toastr["success"](response.message);
                }else{
                    document.execCommand('undo');
                    toastr["error"](response.message);
                }
            }
        });
    }
</script>