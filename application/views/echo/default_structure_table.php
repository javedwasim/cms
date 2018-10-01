<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive structure_table" cellspacing="0" style="width: 100%">
    <thead>
    <tr>
        <th class="table-header" style="width:5%;">Delete</th>
        <th class="table-header">Structure</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($structures as $structure): ?>
        <tr class="table-row">
            <td style="width:5%;">
                <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                    <i class="fa fa-trash" title="Delete"></i></a>

            </td>
            <td contenteditable="true" class="default_structure_cate"
                onBlur="defaultsaveStructure(this,'cate_name','<?php echo $structure['id']; ?>')"
                onClick="defaultstructureEdit(this,'<?php echo $structure['id']; ?>');"
                id="<?php echo $structure['id']; ?>">
                <?php echo $structure['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<input type="hidden" name="structure_id" id="structure_id">
<script>

    function defaultstructureEdit(editableObj,id) {
        $(".default_structure_cate").css("background-color", "");
        $(".default_structure_cate").css("color", "black");
        $(editableObj).css("background-color", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        var disease_id = $('#assign_disease_id').val();
        //load structure findings
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/get_default_findings_by_id'?>",
            type: "post",
            cache: false,
            data: {id: id,disease_id:disease_id},
            success: function (response) {
                $('.structure_finding_container').empty();
                $('.structure_finding_container').append(response.result_html);

                $('.structure_diagnosis_container').empty();
                $('.structure_diagnosis_container').append(response.diagnosis_html);

                $('.default_finding_container').empty();
                $('.default_finding_container').append(response.dfinding_html);

                $('.default_diagnosis_container').empty();
                $('.default_diagnosis_container').append(response.ddiagnose_html);
            }
        });

    }
    function defaultsaveStructure(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_structure_category' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                if (response.success) {
                    toastr["success"](response.message);
                }
            }
        });
    }

    $(document.body).on('click', '#structure_finding', function(){
        //remove background and color on all elements and remove color
        $(".structure_table td").css("background-color", "#FFF");
        $(".structure_table td").css("color", "#1b1a1a");

        var structure_id = $('#structure_id').val();
        $('#'+structure_id).css("background", "#1e88e5");
        $('#'+structure_id).css("color", "#FFF");
        return false;
    });

</script>