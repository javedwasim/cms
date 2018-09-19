<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 10%">Delete</th>
        <th class="table-header">Category Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row">
            <td>
                <a class="delete-inst btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-category = '<?php echo $category['category'] ?>'
                   data-category-id = '<?php echo $category['id'] ?>'
                   data-href="<?php echo site_url('instruction/delete_instruction_category')?>">
                   <i class="fa fa-trash" title="Delete"></i></a>
            </td>
            <td contenteditable="true"
                onBlur="saveInstructionCategory(this,'<?php echo $category['category']; ?>','<?php echo $category['id']; ?>')"
                onClick="editInstructionCategory(this);">
                <?php echo $category['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function editInstructionCategory(editableObj) {
        $(editableObj).css("background", "#FFF");
    }
    function saveInstructionCategory(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $.ajax({
            url: "<?php echo base_url() . 'instruction/save_inst_category' ?>",
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