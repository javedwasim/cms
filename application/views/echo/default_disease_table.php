<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive disease_table tbl_header_fix_350" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th style="width: 50px;">Action</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row">
            <td style="width: 50px;">
                <a class="btn btn-danger btn-xs">
                    <i class="fa fa-trash" title="Delete"></i></a>

            </td>
            <td class="default_disease_cate" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';"
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
        $(".default_structure_cate").css("background-color", "");
        $(".default_structure_cate").css("color", "black");
        $('.structure_diagnosis_container').empty();
        $('.default_finding_container').empty();
        $('.default_diagnosis_container').empty();
        $(editableObj).css("background-color", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        $('#assign_disease_id').val(id);
        var structure_id = $('#assign_structure_id_id').val();
        var disease_id = id;
    }
</script>