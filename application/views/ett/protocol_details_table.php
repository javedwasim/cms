<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']);  $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
   <thead>
        <tr>
            <th>Stage Name</th>
            <th>Speed mph</th>
            <th>Grade %</th>
            <th>Stage Time</th>
            <th>Mets</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($protocol_details as $key){?>
        <tr>
            <?php if(($loggedin_user['is_admin']==1) || in_array("ett-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td contenteditable="true" class="exam_cate"
                    onBlur="saveToDatabase(this,'stage_name','<?php echo $key['id']; ?>')"
                    onClick="showExamination(this);"><?php echo $key['stage_name']; ?></td>
                <td contenteditable="true" class="exam_cate"
                    onBlur="saveToDatabase(this,'speed_mph','<?php echo $key['id']; ?>')"
                    onClick="showExamination(this);"><?php echo $key['speed_mph']; ?></td>
                <td contenteditable="true" class="exam_cate"
                    onBlur="saveToDatabase(this,'grade','<?php echo $key['id']; ?>')"
                    onClick="showExamination(this);"><?php echo $key['grade']; ?></td>
                <td contenteditable="true" class="exam_cate"
                    onBlur="saveToDatabase(this,'stage_time','<?php echo $key['id']; ?>')"
                    onClick="showExamination(this);"><?php echo date('h:i', strtotime($key['stage_time'])) ?></td>
                <td contenteditable="true" class="exam_cate"
                    onBlur="saveToDatabase(this,'mets','<?php echo $key['id']; ?>')"
                    onClick="showExamination(this);"><?php echo $key['mets']; ?></td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $key['stage_name']; ?></td>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $key['speed_mph']; ?></td>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $key['grade']; ?></td>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $key['stage_time']; ?></td>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $key['mets']; ?></td>
            <?php } ?>

        </tr>
    <?php }?>
    </tbody>
</table>
<script type="text/javascript">
    function saveToDatabase(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'ett/update_protocol_details' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success == true) {
                    toastr["success"](response.message);
                }
            }
        });
        $(editableObj).css("color", "#212529");
    }
</script>