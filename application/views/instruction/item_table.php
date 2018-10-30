<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 9%">Action</th>
        <th class="table-header">Item Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr class="table-row">
            <td>
                <?php if(($loggedin_user['is_admin']==1) || (in_array("special_instructions-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0))){ ?>
                    <a class="delete-inst-item btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-category = '<?php echo $item['category'] ?>'
                       data-category-id = '<?php echo $item['id'] ?>'
                       data-href="<?php echo site_url('instruction/delete_inst_item') ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                    <a class="edit-inst-item-btn btn btn-info btn-xs"
                       href="javascript:void(0)"
                       data-inst-item-id="<?php echo $item['id']; ?>"><i
                       class="far fa-question-circle"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } ?>

            </td>
            <?php if($loggedin_user['is_admin']==1){ ?>
                <td contenteditable="true" class="inst_item"
                    onBlur="saveToDatabase(this,'item_name','<?php echo $item['id']; ?>')"
                    onClick="showEdit(this);">
                    <?php echo $item['name']; ?></td>
            <?php } elseif(in_array("special_instructions-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td contenteditable="true" class="inst_item"
                    onBlur="saveToDatabase(this,'item_name','<?php echo $item['id']; ?>')"
                    onClick="showEdit(this);">
                    <?php echo $item['name']; ?></td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $category['name']; ?></td>
            <?php } ?>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="inst_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="inst_item_form_modal" method="post" role="form"
              data-action="<?php echo site_url('instruction/save_inst_item_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="inst_item_id" id="inst_item_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="instruction_item_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="inst_item_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_inst_item_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function showEdit(editableObj) {
        $('td.inst_item').css('background', '#FFF');
        $('td.inst_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function saveToDatabase(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'instruction/save_inst_item' ?>",
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