<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
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
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-main-category-item btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_main_category_item/') . $category['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } elseif(in_array("echos-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-main-category-item btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_main_category_item/') . $category['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } ?>
            </td>
            <?php if($loggedin_user['is_admin']==1){ ?>
                <td contenteditable="true"
                    onBlur="saveMainCategoryItem(this,'cate_name','<?php echo $category['id']; ?>')"
                    onClick="showEditMainCategory(this);">
                    <?php echo $category['name']; ?></td>
            <?php } elseif(in_array("echos-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td contenteditable="true"
                    onBlur="saveMainCategoryItem(this,'cate_name','<?php echo $category['id']; ?>')"
                    onClick="showEditMainCategory(this);">
                    <?php echo $category['name']; ?></td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $category['name']; ?></td>
            <?php } ?>

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