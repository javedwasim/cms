<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive disease_table tbl_header_fix_350" cellspacing="0" id="echo_disease_tbl" width="100%" >
    <thead>
    <tr>
        <th style="width: 50px;">Action</th>
        <th >Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row" id="<?php echo $category['id']; ?>" >
            <td style="width: 50px;">
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-disease btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_disease_category/') . $category['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } elseif(in_array("echos-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-disease btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_disease_category/') . $category['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } ?>

            </td>
            <?php if($loggedin_user['is_admin']==1){ ?>
                <td data-disease-id = "<?php echo $category['id']; ?>" id = "<?php echo "d".$category['id']; ?>"
                    onClick="showEdit(this,'<?php echo $category['id']; ?>');">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" name="dis_id" value="<?php echo $category['name']; ?>" onchange="saveToDatabase(this,'cate_name','<?php echo $category['id']; ?>')">        
                </td>
            <?php } elseif(in_array("echos-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td data-disease-id = "<?php echo $category['id']; ?>" id = "<?php echo "d".$category['id']; ?>"
                    onClick="showEdit(this,'<?php echo $category['id']; ?>');">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" name="dis_id" value="<?php echo $category['name']; ?>" onchange="saveToDatabase(this,'cate_name','<?php echo $category['id']; ?>')">        
                </td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $category['name']; ?></td>
            <?php } ?>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
    function showEdit(editableObj,id) {
        $("#echo_disease_tbl tbody tr").click(function (e) {
            $('#echo_disease_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
        $('#assign_disease_id').val(id);
    }
    function saveToDatabase(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_disease_category' ?>",
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
$(document).ready(function () {
    // Sortable rows
    table = $("#echo_disease_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'disease';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_echo_disease_tbl/"+tblname+"/"+tblid,
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