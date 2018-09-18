<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 10%">Delete</th>
        <th class="table-header">Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row">
            <td>
                <a class="delete-disease btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('Echo_controller/delete_disease_category/') . $category['id'] ?>">
                    <i class="fa fa-trash" title="Delete"></i></a>
            </td>
            <td contenteditable="true"
                data-disease-id = "<?php echo $category['id']; ?>"
                onBlur="saveToDatabase(this,'cate_name','<?php echo $category['id']; ?>')"
                onClick="showEdit(this,'<?php echo $category['id']; ?>');">
                <?php echo $category['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
    function showEdit(editableObj,id) {
        $(editableObj).css("background", "#FFF");
        $('#assign_disease_id').val(id);
    }
    function saveToDatabase(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_disease_category' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                }
            }
        });
    }

</script>