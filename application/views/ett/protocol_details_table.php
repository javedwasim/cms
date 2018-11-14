<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']);  $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive tbl_header_fix_350" cellspacing="0" id="" width="100%" >
   <thead>
        <tr>
            <th style="width: 21%">Stage Name</th>
            <th style="width: 20%">Speed mph</th>
            <th style="width: 20%">Grade %</th>
            <th style="width: 20%">Stage Time</th>
            <th style="width: 19%">Mets</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($protocol_details as $key){?>
        <tr>
            <?php if(($loggedin_user['is_admin']==1) || in_array("ett-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td style="width: 20%" contenteditable="true" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" class="exam_cate word_break"
                    onBlur="saveToDatabase(this,'stage_name','<?php echo $key['id']; ?>')"
                    onClick="showExamination(this);"><?php echo $key['stage_name']; ?></td>
                <td style="width: 20%" contenteditable="true" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" class="exam_cate word_break" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" onchange="consultant_booking(this)"
                    onBlur="saveToDatabase(this,'speed_mph','<?php echo $key['id']; ?>')"
                    onClick="showExamination(this);"><?php echo $key['speed_mph']; ?></td>
                <td style="width: 20%" contenteditable="true" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" class="exam_cate word_break" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" onchange="consultant_booking(this)"
                    onBlur="saveToDatabase(this,'grade','<?php echo $key['id']; ?>')"
                    onClick="showExamination(this);"><?php echo $key['grade']; ?></td>
                <td style="width: 20%" contenteditable="true" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" class="exam_cate word_break" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" onchange="consultant_booking(this)"
                    onBlur="saveToDatabase(this,'stage_time','<?php echo $key['id']; ?>')"
                    onClick="showExamination(this);"><?php echo date('h:i', strtotime($key['stage_time'])) ?></td>
                <td style="width: 20%" contenteditable="true" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';"  class="exam_cate word_break" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" onchange="consultant_booking(this)"
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
                }else{
                    document.execCommand('undo');
                    toastr["error"](response.message);
                }
            }
        });
        $(editableObj).css("color", "#212529");
    }
</script>