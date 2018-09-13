<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 10%">Delete</th>
        <th class="table-header">Recommendations</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($recommendations as $recommendation): ?>
        <tr class="table-row">
            <td>
                <a class="delete-recommendation btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('Angio_recommendation/delete_recommendation/') . $recommendation['id'] ?>">
                   <i class="fa fa-trash" title="Delete"></i></a>
            </td>
            <td contenteditable="true"
                onBlur="saveToDatabase(this,'cate_name','<?php echo $recommendation['id']; ?>')"
                onClick="showEdit(this);">
                <?php echo $recommendation['description']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function showEdit(editableObj) {
        $(editableObj).css("background", "#FFF");
    }
    function saveToDatabase(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $.ajax({
            url: "<?php echo base_url() . 'Angio_recommendation/save_recommendation' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["success"](response.message);
                }
            }
        });
    }

</script>