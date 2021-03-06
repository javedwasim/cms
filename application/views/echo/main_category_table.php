<table class="table table-bordered nowrap responsive main-category-table tbl_header_fix_350" cellspacing="0" id="main_cat_tbl" width="100%" >
    <thead>
    <tr>
        <th  style="width:50px;">Action</th>
        <th>Category</th>
    </tr>
    </thead>
    <tbody style="height: 49vh">
    <?php foreach ($main_categories as $category): ?>
        <tr class="table-row">
            <td style="width:50px;">
                <a class="delete-main-category-item btn btn-danger btn-xs" href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_main_category_item/') . $category['id'] ?>">
                    <i class="fa fa-trash" title="Delete"></i>
                </a>
                
            </td>
            <td class="2d_echo_cate" onClick="showEditMainCategory(this);">
                <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo $category['name']; ?>"  onchange="saveMainCategoryItem(this,'cate_name','<?php echo $category['id']; ?>')">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function showEditMainCategory(editableObj) {
        $("#main_cat_tbl tbody tr").click(function (e) {
            $('#main_cat_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function saveMainCategoryItem(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_main_category_item' ?>",
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