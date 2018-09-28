<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']);  $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id="" width="100%" >
   <thead>
        <tr>
            <th style="width:30px;">Delete</th>
            <th>Protocol</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($protocols as $key){?>
        <tr>
            <td style="width:30px;">
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-protocol btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('ett/delete_protocol/') . $key['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } elseif(in_array("ett-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-protocol btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('ett/delete_protocol/') . $key['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } ?>

            </td>
            <?php if($loggedin_user['is_admin']==1){ ?>
                <td contenteditable="true" class="exam_cate"
                    onBlur="saveToprotocol(this,'protocol','<?php echo $key['id']; ?>')"
                    onClick="showExamination(this);"><?php echo $key['protocol']; ?></td>
            <?php } elseif(in_array("ett-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td contenteditable="true" class="exam_cate"
                    onBlur="saveToprotocol(this,'protocol','<?php echo $key['id']; ?>')"
                    onClick="showExamination(this);"><?php echo $key['protocol']; ?></td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $key['protocol']; ?></td>
            <?php } ?>

        </tr>
    <?php }?>
    </tbody>
</table>
<script type="text/javascript">
    function saveToprotocol(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'ett/update_protocol' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                }
            }
        });
        $(editableObj).css("color", "#212529");
    }
</script>