<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive diagnosis_table tbl_header_fix_350" cellspacing="0" id="diagnosis_tbl" width="100%" >
    <thead>
    <tr>
        <th  style="width: 50px;">Action</th>
        <th >diagnosis</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($diagnosis as $diagnose): ?>
        <tr class="table-row">
            <td style="width: 50px;">
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-diagnosis btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_structure_diagnosis/') . $diagnose['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } elseif(in_array("echos-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-diagnosis btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_structure_diagnosis/') . $diagnose['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } ?>

            </td>
            <?php if($loggedin_user['is_admin']==1){ ?>
                <td class="diagnosis_cate" onClick="diagnosisEdit(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" value="<?php echo $diagnose['name']; ?>" onchange="savediagnosis(this,'cate_name','<?php echo $diagnose['id']; ?>')">        
                </td>
            <?php } elseif(in_array("echos-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td class="diagnosis_cate" onClick="diagnosisEdit(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" value="<?php echo $diagnose['name']; ?>" onchange="savediagnosis(this,'cate_name','<?php echo $diagnose['id']; ?>')">        
                </td>
            <?php } else{ ?>
                <td onClick="showError(this);">
                    <?php echo $diagnose['name']; ?></td>
            <?php } ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function diagnosisEdit(editableObj) {
        $("#diagnosis_tbl tbody tr").click(function (e) {
            $('#diagnosis_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function savediagnosis(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_structure_diagnosis' ?>",
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

    $(document.body).on('click', '#structure_diagnosis', function(){
        //remove background and color on all elements and remove color
        $(".structure_table td").css("background-color", "#FFF");
        $(".structure_table td").css("color", "#1b1a1a");

        var structure_id = $('#structure_id').val();
        $('#'+structure_id).css("background", "#3300FF");
        $('#'+structure_id).css("color", "#FFF");
        return false;
    });

</script>