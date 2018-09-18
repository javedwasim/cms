<table class="table table-bordered nowrap responsive main-category-table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 10%">Delete</th>
        <th class="table-header">Category</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($main_categories as $category): ?>
        <tr class="table-row">
            <td>
                <a class="delete-main-category-item btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('Echo_controller/delete_main_category_item/') . $category['id'] ?>">
                   <i class="fa fa-trash" title="Delete"></i></a>
            </td>
            <td contenteditable="true"
                onBlur="saveMainCategoryItem(this,'cate_name','<?php echo $category['id']; ?>')"
                onClick="showEditMainCategory(this);">
                <?php echo $category['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function showEditMainCategory(editableObj) {
        $(editableObj).css("background", "#FFF");
    }
    function saveMainCategoryItem(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_main_category_item' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                }
                $(editableObj).css('background-image', 'none');
            }
        });
    }

</script>