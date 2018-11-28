<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive disease_table tbl_header_fix_350" cellspacing="0" id="default_disease_table" width="100%" >
    <thead>
    <tr>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row">
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
        $('.structure_diagnosis_container').empty();
        $('.default_finding_container').empty();
        $('.default_diagnosis_container').empty();
        $('#assign_disease_id').val(id);
        var structure_id = $('#assign_structure_id_id').val();
        var disease_id = id;
    }
    $("#default_disease_table tbody tr").click(function (e) {
            $('#default_disease_table tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
</script>