<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']);  $loggedin_user = $this->session->userdata('userdata');}?>
<div class="tab-pane <?php echo isset($active_tab) && ($active_tab == 'category') ? 'active' : ''; ?>"
     id="category" role="tabpanel">
    <div class="card">
        <div class="card-header" style="display: inline-flex;">
            <div class="row">
                <div class="col-md-12">
                    <label>New Category</label>
                    <input type="text" class="form-control col-md-6" name="" id="lab_category">
                    <?php if($loggedin_user['is_admin']==1){ ?>
                        <button class="btn btn-primary btn-sm add-lab-category">Add</button>
                    <?php } elseif(in_array("lab_tests-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                        <button class="btn btn-primary btn-sm add-lab-category">Add</button>
                    <?php } else{ ?>
                        <button type= "button" class="btn btn-sm btn-primary"  style="opacity: 0.5;" onclick="showError()">Add</button>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card-body" style="height: 400px; overflow-y: scroll;">
            <table class="table table-bordered nowrap responsive" cellspacing="0" id="lab_cat_tbl"
                   width="100%">
                <thead>
                <tr>
                    <th style="width:95px;">Action</th>
                    <th>Category Name</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td style="width:95px;" data-toggle="modal" data-target="#history-modal">
                            <?php if(($loggedin_user['is_admin']==1) || (in_array("lab_tests-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0))) { ?>
                                <a class="delete-lab-category btn btn-danger btn-xs"
                                   href="javascript:void(0)" title="delete"
                                   data-href="<?php echo site_url('setting/delete_lab_category/') . $category['id'] ?>">
                                    <i class="fa fa-trash" title="Delete"></i></a>
                                <a class="edit-lab-cat-btn btn btn-info btn-xs"
                                   href="javascript:void(0)"
                                   data-lab-category-id="<?php echo $category['id']; ?>"><i
                                   class="far fa-question-circle"></i></a>
                            <?php } else{ ?>
                                <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                                    <i class="fa fa-trash" title="Delete"></i></a>
                                <a class="btn btn-info btn-xs" style="opacity: 0.5;" onclick="showError()">
                                    <i class="far fa-question-circle" title="Delete"></i></a>
                            <?php } ?>
                        </td>
                        <?php if(($loggedin_user['is_admin']==1) || (in_array("lab_tests-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0))){ ?>
                            <td class="exam_cate" style="word-break: break-all;">
                                <input type="text" class="form-control border-0 bg-transparent shadow-none" name="lab_cat" value="<?php echo $category['name']; ?>" onchange="saveToDatabase(this,'cate_name','<?php echo $category['id']; ?>')" />
                            </td>
                        <?php } else{ ?>
                            <td class="exam_cate"  onClick="showError(this);">
                                <?php echo $category['name']; ?></td>
                        <?php } ?>
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