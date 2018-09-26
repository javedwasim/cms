<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']);  $loggedin_user = $this->session->userdata('userdata');}?>
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
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-inst btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-category = '<?php echo $category['category'] ?>'
                       data-category-id = '<?php echo $category['id'] ?>'
                       data-href="<?php echo site_url('instruction/delete_instruction_category')?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                    <a class="edit-inst-btn btn btn-info btn-xs"
                       href="javascript:void(0)"
                       data-inst-id="<?php echo $category['id']; ?>"><i
                       class="far fa-question-circle"></i></a>
                <?php } elseif(in_array("special_instructions-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-inst btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-category = '<?php echo $category['category'] ?>'
                       data-category-id = '<?php echo $category['id'] ?>'
                       data-href="<?php echo site_url('instruction/delete_instruction_category')?>">
                       <i class="fa fa-trash" title="Delete"></i></a>
                    <a class="edit-inst-btn btn btn-info btn-xs"
                       href="javascript:void(0)"
                       data-inst-id="<?php echo $category['id']; ?>"><i
                       class="far fa-question-circle"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } ?>
            </td>
            <?php if($loggedin_user['is_admin']==1){ ?>
                <td contenteditable="true"
                    onBlur="saveInstructionCategory(this,'<?php echo $category['category']; ?>','<?php echo $category['id']; ?>')"
                    onClick="editInstructionCategory(this);">
                    <?php echo $category['name']; ?></td>
            <?php } elseif(in_array("special_instructions-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td contenteditable="true"
                    onBlur="saveInstructionCategory(this,'<?php echo $category['category']; ?>','<?php echo $category['id']; ?>')"
                    onClick="editInstructionCategory(this);">
                    <?php echo $category['name']; ?></td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $category['name']; ?></td>
            <?php } ?>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="inst_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="inst_form_modal" method="post" role="form"
              data-action="<?php echo site_url('instruction/save_inst_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="inst_id" id="inst_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Risk Factor and Cardiac Problems</label>
                        <textarea class="form-control" rows="3" name="description" id="inst_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_inst_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
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