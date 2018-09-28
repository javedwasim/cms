<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 5%">Delete</th>
        <th class="table-header">Category Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row">
            <td>
                <a class="delete-medicine btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('medicine/delete_medicine_category/') . $category['id'] ?>">
                   <i class="fa fa-trash" title="Delete"></i></a>
            </td>
            <td contenteditable="true" class="medicine_category"
                onBlur="saveMedicineCategory(this,'cate_name','<?php echo $category['id']; ?>')"
                onClick="editMedicineCategory(this);">
                <?php echo $category['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function editMedicineCategory(editableObj) {
        $('td.medicine_category').css('background', '#FFF');
        $('td.medicine_category').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function saveMedicineCategory(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'medicine/save_medicine_category' ?>",
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