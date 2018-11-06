<?php
if(isset($rights[0]['user_rights']))
{
    $appointment_rights = explode(',',$rights[0]['user_rights']);
    //print_r($appointment_rights);
    $loggedin_user = $this->session->userdata('userdata');
}
?>
<table class="table table-bordered nowrap responsive" cellspacing="0" id="examination_item_tbl" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 9%;">Action</th>
        <th class="table-header">Item Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr class="table-row" id="<?php echo $item['id']; ?>">
            <td>
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-examination-item btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('examination/delete_examination_item/') . $item['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                    <a class="edit-examination-item-btn btn btn-info btn-xs"
                       href="javascript:void(0)"
                       data-examination-item-id="<?php echo $item['id']; ?>">
                        <i class="far fa-question-circle"></i></a>
                <?php } elseif(in_array("examinations-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-examination-item btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('examination/delete_examination_item/') . $item['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                    <a class="edit-examination-item-btn btn btn-info btn-xs"
                       href="javascript:void(0)"
                       data-examination-item-id="<?php echo $item['id']; ?>">
                        <i class="far fa-question-circle"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                    <a class="btn btn-info btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="far fa-question-circle"></i></a>
                <?php } ?>
            </td>
            <?php if($loggedin_user['is_admin']==1){ ?>
                <td class="exam_item" onClick="showEdit(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" name="exam_item" value="<?php echo $item['name']; ?>" onchange="updatexaminationitem(this,'item_name','<?php echo $item['id']; ?>')" >        
                </td>
            <?php } elseif(in_array("examinations-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td class="exam_item" onClick="showEdit(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" name="exam_item" value="<?php echo $item['name']; ?>" onchange="updatexaminationitem(this,'item_name','<?php echo $item['id']; ?>')" >        
                </td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $item['name']; ?></td>
            <?php } ?>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="examination_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="examination_item_form_modal" method="post" role="form"
              data-action="<?php echo site_url('examination/save_examination_item_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="examination_item_id" id="examination_item_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="exam_item_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="examination_item_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_examination_item_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function showEdit(editableObj) {
        $("#examination_item_tbl tbody tr").click(function (e) {
            $('#examination_item_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function updatexaminationitem(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'examination/save_examination_item' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + val + '&id=' + id,
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

$(document).ready(function () {
    // Sortable rows
    table = $("#examination_item_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'examination_item';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_examination_item_table/"+tblname+"/"+tblid,
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