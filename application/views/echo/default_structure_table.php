<table class="table table-bordered nowrap responsive structure_table tbl_header_fix_350" id="default_structure_tbl" cellspacing="0" style="width: 100%">
    <thead>
    <tr>
        <th >Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($structures as $structure): ?>
        <tr class="table-row">
            <td onBlur="defaultsaveStructure(this,'cate_name','<?php echo $structure['id']; ?>')"
                onClick="defaultstructureEdit(this,'<?php echo $structure['id']; ?>');"
                id="<?php echo $structure['id']; ?>">
                <?php echo $structure['name']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<input type="hidden" name="structure_id" id="structure_id">
<script>

    function defaultstructureEdit(editableObj,id) {
        $('#assign_structure_id').val(id);
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
    $("#default_structure_tbl tbody tr").click(function (e) {
        $('#default_structure_tbl tbody tr.row_selected').removeClass('row_selected');
        $(this).addClass('row_selected');
    });
    $(document.body).on('click', '#structure_finding', function(){
        //remove background and color on all elements and remove color
        $(".structure_table td").removeClass('row_selected');

        var structure_id = $('#structure_id').val();
        $('#'+structure_id).addClass('row_selected');
        return false;
    });

</script>