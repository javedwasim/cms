<?php
if(isset($rights[0]['user_rights']))
{
    $appointment_rights = explode(',',$rights[0]['user_rights']);
    //print_r($appointment_rights);
    $loggedin_user = $this->session->userdata('userdata');
}
?>
<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width:100px;">Delete</th>
        <th class="table-header">Category Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row">
            <td style="width:100px;">
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-examination btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('examination/delete_examination_category/') . $category['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                    <a class="edit_examination_category_modal btn btn-info btn-xs" href="javascript:void(0)" data-examination-cat-id="<?php echo $category['id']; ?>">
                        <i class="far fa-question-circle"></i>
                    </a>
                <?php } elseif(in_array("examinations-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-examination btn btn-danger btn-xs" href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('examination/delete_examination_category/') . $category['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i>
                    </a>
                    <a class="edit-profile-history-btn btn btn-info btn-xs" href="javascript:void(0)" data-examination-cat-id="<?php echo $category['id']; ?>">
                        <i class="far fa-question-circle"></i>
                    </a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                        <a class="edit-profile-history-btn btn btn-info btn-xs" onclick="showError()" href="javascript:void(0)" > <i class="far fa-question-circle"></i>
                    </a>
                <?php } ?>
            </td>

            <?php if($loggedin_user['is_admin']==1){ ?>
                <td contenteditable="true" class="exam_cate"
                    onBlur="saveExamination(this,'cate_name','<?php echo $category['id']; ?>')"
                    onClick="showExamination(this);">
                    <?php echo $category['name']; ?></td>
            <?php } elseif(in_array("examinations-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td contenteditable="true" class="exam_cate"
                    onBlur="saveExamination(this,'cate_name','<?php echo $category['id']; ?>')"
                    onClick="showExamination(this);">
                    <?php echo $category['name']; ?></td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $category['name']; ?></td>
            <?php } ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="examination_category_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="examination_category_modal_form" method="post" role="form"
              data-action="<?php echo site_url('Examination/save_examination_category_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="examination_cat_id" id="examination_cat_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="exam_cat_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="examination_cate_desc"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_examination_category_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function showError() {
        toastr["error"]('You are not authorised for this action.');
    }
    function showExamination(editableObj) {
        $('td.exam_cate').css('background', '#FFF');
        $('td.exam_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function saveExamination(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'examination/save_examination_category' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                }else{
                    toastr["error"](response.message);
                    document.execCommand('undo');
                }
            }
        });
        $(editableObj).css("color", "#212529");

    }
</script>