<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']);  $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id="ett_description_tbl" width="100%" >
   <thead>
        <tr>
            <th style="width:30px;">Action</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($descriptions as $key){?>
        <tr id="<?php echo $key['id']; ?>">
            <td style="width:30px;">
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-description btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('ett/delete_ett_description/') . $key['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } elseif(in_array("ett-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-description btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('ett/delete_ett_description/') . $key['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } ?>

            </td>
            <?php if($loggedin_user['is_admin']==1){ ?>
                <td class="exam_cate" onClick="showExamination(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" value="<?php echo $key['description'] ?>" name="ett_description" onchange="saveTodiscrption(this,'description','<?php echo $key['id']; ?>')">        
                </td>
            <?php } elseif(in_array("ett-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td class="exam_cate" onClick="showExamination(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" value="<?php echo $key['description'] ?>" name="ett_description" onchange="saveTodiscrption(this,'description','<?php echo $key['id']; ?>')">        
                </td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $key['description']; ?></td>
            <?php } ?>
        </tr>
    <?php }?>
    </tbody>
</table>

<script type="text/javascript">
    $("#ett_description_tbl tbody tr").click(function (e) {
            $('#ett_description_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
    });
    function saveTodiscrption(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'ett/update_ett_description' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + val + '&id=' + id,
            success: function (response) {
                if (response.success == true) {
                    toastr["success"](response.message);
                }else{
                    document.execCommand('undo');
                    toastr["error"](response.message);
                }
            }
        });
    }
$(document).ready(function () {
    // Sortable rows
    table = $("#ett_description_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'ett_description';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_ett_description_tbl/"+tblname+"/"+tblid,
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