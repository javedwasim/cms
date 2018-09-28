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
                <a class="delete-investigation btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('investigation/delete_investigation_category/') . $category['id'] ?>">
                   <i class="fa fa-trash" title="Delete"></i></a>
            </td>
            <td contenteditable="true" class="invest_cate"
                onBlur="saveInvestigationCateGOry(this,'cate_name','<?php echo $category['id']; ?>')"
                onClick="editInvestigationCategory(this);">
                <?php echo $category['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function editInvestigationCategory(editableObj) {
        $('td.invest_cate').css('background', '#FFF');
        $('td.invest_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function saveInvestigationCateGOry(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'investigation/save_investigation_category' ?>",
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