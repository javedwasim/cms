<?php
if(isset($rights[0]['user_rights']))
{
    $appointment_rights = explode(',',$rights[0]['user_rights']);
    //print_r($appointment_rights);
    $loggedin_user = $this->session->userdata('userdata');
}
?>
<table class="table table-bordered nowrap responsive tbl_header_fix_350" cellspacing="0" id="examination_cat_tbl" width="100%" >
    <thead>
    <tr>
        <th  style="width:100px;">Action</th>
        <th >Category Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row" id="<?php echo $category['id']; ?>" >
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
                <td class="exam_cate" onClick="showExamination(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="exam_cate" value="<?php echo $category['name']; ?>" onchange="saveExamination(this,'cate_name','<?php echo $category['id']; ?>')" >        
                </td>
            <?php } elseif(in_array("examinations-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td class="exam_cate" onClick="showExamination(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="exam_cate" value="<?php echo $category['name']; ?>" onchange="saveExamination(this,'cate_name','<?php echo $category['id']; ?>')" >        
                </td>
            <?php } else{ ?>
                <td onClick="showError(this);">
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
        $("#examination_cat_tbl tbody tr").click(function (e) {
            $('#examination_cat_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function saveExamination(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'examination/save_examination_category' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + val + '&id=' + id,
            success: function (response) {
                if (response.success) {
                    toastr["success"](response.message);
                }else{
                    toastr["error"](response.message);
                    document.execCommand('undo');
                }
            }
        });
    }

$(document).ready(function () {
    // Sortable rows
    table = $("#examination_cat_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'examination';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_examination_table/"+tblname+"/"+tblid,
                type: 'post',
                data: tabledata,
                cache: false,
                success: function(response){
                   
                }
           });
        }
    });
});
</script>