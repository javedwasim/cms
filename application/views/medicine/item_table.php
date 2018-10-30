<table class="table table-bordered nowrap responsive item_table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" >Action</th>
        <th class="table-header">Item Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr class="table-row">
            <td>
                <a class="delete-medicine-item btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('medicine/delete_medicine_item/') . $item['id'] ?>">
                    <i class="fa fa-trash" title="Delete"></i></a>
                <a class="edit-medicine-item-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-medicine-item-id="<?php echo $item['id']; ?>">
                   <i class="far fa-question-circle"></i></a>
            </td>
            <td contenteditable="true" class="medicine_item"
                onBlur="saveToDatabase(this,'item_name','<?php echo $item['id']; ?>')"
                onClick="medicineItemEdit(this);">
                <?php echo $item['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="medicine_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="medicine_item_form_modal" method="post" role="form"
              data-action="<?php echo site_url('medicine/save_medicine_item_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="medicine_item_id" id="medicine_item_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="medicine_item_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="medicine_item_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_medicine_item_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function medicineItemEdit(editableObj) {
        $('td.medicine_item').css('background', '#FFF');
        $('td.medicine_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function saveToDatabase(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'medicine/save_medicine_item' ?>",
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