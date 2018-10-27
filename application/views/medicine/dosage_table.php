<table class="table table-bordered nowrap responsive dosage-table dd" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 95%" align="right">Dosage</th>
        <th class="table-header" style="width: 5%" align="right">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($dosages as $dosage): ?>
        <tr class="table-row">
            <td contenteditable="true"  align="right" class="dosage_category"
                onBlur="saveDosage(this,'cate_name','<?php echo $dosage['id']; ?>')"
                onClick="dosageEdit(this);">
                <?php echo $dosage['name']; ?></td>
                <td align="right">
                <a class="delete-dosage btn btn-danger btn-xs" align="right"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('medicine/delete_dosage_category/') . $dosage['id'] ?>">
                   <i class="fa fa-trash" title="Delete"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function dosageEdit(editableObj) {
        $('td.dosage_category').css('background', '#FFF');
        $('td.dosage_category').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function saveDosage(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'medicine/save_dosage_category' ?>",
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