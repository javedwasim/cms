<table class="table table-bordered nowrap responsive datatables tbl_header_fix" cellspacing="0" id="angio_tbl" width="100%" >
    <thead>
    <tr>
        <th style="width:50px;">Action</th>
        <th>Recommendations</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($recommendations as $recommendation): ?>
        <tr class="table-row">
            <td style="width:50px;">
                <a class="delete-recommendation btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('Angio_recommendation/delete_recommendation/') . $recommendation['id'] ?>">
                   <i class="fa fa-trash" title="Delete"></i></a>
            </td>
            <td class="recommendation" onClick="showEdit(this);">
                <input type="text" class="form-control border-0 bg-transparent shadow-none" value="<?php echo $recommendation['description']; ?>"  onchange="saveToDatabase(this,'cate_name','<?php echo $recommendation['id']; ?>')">        
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function showEdit(editableObj) {
        $("#angio_tbl tbody tr").click(function (e) {
            $('#angio_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function saveToDatabase(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'Angio_recommendation/save_recommendation' ?>",
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