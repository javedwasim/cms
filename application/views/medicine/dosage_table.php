<table class="table table-bordered nowrap responsive dosage-table dd" cellspacing="0" id="dosage_tbl" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 95%" align="right">Dosage</th>
        <th class="table-header" style="width: 5%" align="right">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($dosages as $dosage): ?>
        <tr class="table-row">
            <td  align="right" class="dosage_category" onClick="dosageEdit(this);">
                <input type="text" class="form-control border-0 bg-transparent shadow-none" value="<?php echo $dosage['name']; ?>" onchange="saveDosage(this,'cate_name','<?php echo $dosage['id']; ?>')" style="text-align: right;" />
            </td>
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
        $("#dosage_tbl tbody tr").click(function (e) {
            $('#dosage_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function saveDosage(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'medicine/save_dosage_category' ?>",
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

</script>