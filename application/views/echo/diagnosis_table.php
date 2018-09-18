<table class="table table-bordered nowrap responsive diagnosis_table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 10%">Delete</th>
        <th class="table-header">diagnosis</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($diagnosis as $diagnose): ?>
        <tr class="table-row">
            <td>
                <a class="delete-diagnosis btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('Echo_controller/delete_structure_diagnosis/') . $diagnose['id'] ?>">
                    <i class="fa fa-trash" title="Delete"></i></a>
            </td>
            <td contenteditable="true"
                onBlur="savediagnosis(this,'cate_name','<?php echo $diagnose['id']; ?>')"
                onClick="diagnosisEdit(this);">
                <?php echo $diagnose['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function diagnosisEdit(editableObj) {
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        //select parent structure
        $(".structure_table td").css("background-color", "");
        var structure_id = $('#structure_id').val();
        $('#'+structure_id).css("background", "#1e88e5");
        $('#'+structure_id).css("color", "#FFF");

    }
    function savediagnosis(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $(editableObj).css("color", "#1b1a1a");
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_structure_diagnosis' ?>",
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

    $(document.body).on('click', '#structure_diagnosis', function(){
        //remove background and color on all elements and remove color
        $(".structure_table td").css("background-color", "#FFF");
        $(".structure_table td").css("color", "#1b1a1a");

        var structure_id = $('#structure_id').val();
        $('#'+structure_id).css("background", "#1e88e5");
        $('#'+structure_id).css("color", "#FFF");
        return false;
    });

</script>