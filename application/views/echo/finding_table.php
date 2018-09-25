<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive finding_table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 10%">Delete</th>
        <th class="table-header">finding</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($findings as $finding): ?>
        <tr class="table-row">
            <td>
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
                <td contenteditable="true"
                    onBlur="saveFinding(this,'cate_name','<?php echo $finding['id']; ?>')"
                    onClick="findingEdit(this);">
                    <?php echo $finding['name']; ?></td>
            <?php } elseif(in_array("echos-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td contenteditable="true"
                    onBlur="saveFinding(this,'cate_name','<?php echo $finding['id']; ?>')"
                    onClick="findingEdit(this);">
                    <?php echo $finding['name']; ?></td>
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
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        //select parent structure
        $(".structure_table td").css("background-color", "");
        var structure_id = $('#structure_id').val();
        $('#'+structure_id).css("background", "#1e88e5");
        $('#'+structure_id).css("color", "#FFF");

    }
    function saveFinding(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $(editableObj).css("color", "#1b1a1a");
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_structure_finding' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                if (response.success) {
                    toastr["success"](response.message);
                }
                $(editableObj).css('background-image', 'none');
            }
        });
    }

</script>