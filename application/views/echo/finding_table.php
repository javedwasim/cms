<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive finding_table tbl_header_fix_350" cellspacing="0" id="finding_tbl" width="100%" >
    <thead>
    <tr>
        <th  style="width: 50px;">Action</th>
        <th>finding</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($findings as $finding): ?>
        <tr class="table-row">
            <td style="width: 50px;">
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-finding btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_structure_finding/') . $finding['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } elseif(in_array("echos-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-finding btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_structure_finding/') . $finding['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } ?>

            </td>
            <?php if($loggedin_user['is_admin']==1){ ?>
                <td class="finding_cate" onClick="findingEdit(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo $finding['name']; ?>" onchange="saveFinding(this,'cate_name','<?php echo $finding['id']; ?>')">
                </td>
            <?php } elseif(in_array("echos-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td class="finding_cate" onClick="findingEdit(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo $finding['name']; ?>" onchange="saveFinding(this,'cate_name','<?php echo $finding['id']; ?>')">
                </td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $finding['name']; ?></td>
            <?php } ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function findingEdit(editableObj) {
        $("#finding_tbl tbody tr").click(function (e) {
            $('#finding_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });

    }
    function saveFinding(editableObj, column, id) {
        var val = editableObj.value;
         $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_structure_finding' ?>",
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