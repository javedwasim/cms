<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive disease_table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 5%">Delete</th>
        <th class="table-header">Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row">
            <td>
                <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                    <i class="fa fa-trash" title="Delete"></i></a>

            </td>
            <td contenteditable="true" class="default_disease_cate"
                data-disease-id = "<?php echo $category['id']; ?>"
                id = "<?php echo "d".$category['id']; ?>"
                onClick="defaultDiseaseEdit(this,'<?php echo $category['id']; ?>');">
                <?php echo $category['name']; ?></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
    function defaultDiseaseEdit(editableObj,id) {
        $(".default_disease_cate").css("background-color", "");
        $(".default_disease_cate").css("color", "black");
        $(editableObj).css("background-color", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        $('#assign_disease_id').val(id);
        var structure_id = $('#assign_structure_id_id').val();
        var disease_id = id;

//        $.ajax({
//            url: "<?php //echo base_url() . 'Echo_controller/get_default_findings'?>//",
//            type: "post",
//            cache: false,
//            data: {id: id,disease_id:disease_id},
//            success: function (response) {
//                $('.structure_finding_container').empty();
//                $('.structure_finding_container').append(response.result_html);
//
//                $('.structure_diagnosis_container').empty();
//                $('.structure_diagnosis_container').append(response.diagnosis_html);
//
//                $('.default_finding_container').empty();
//                $('.default_finding_container').append(response.dfinding_html);
//
//                $('.default_diagnosis_container').empty();
//                $('.default_diagnosis_container').append(response.ddiagnose_html);
//            }
//        });
    }
</script>