<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width:1px !important;">Action</th>
        <th class="table-header">Item Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr class="table-row">
            <td>
                <a class="edit-inst-item-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-inst-item-id="<?php echo $item['id']; ?>"><i
                   class="far fa-question-circle"></i></a>
            </td>
            <td contenteditable="true" class="p_item"
                onClick="showEdit(this, <?php echo $item['id']; ?>, <?php echo $item['instruction_id']; ?>, '<?php echo $item['name']; ?>');">
                <?php echo $item['name']; ?></td>

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
                        <label>Risk Factor and Cardiac Problems</label>
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
    function showEdit(editableObj ,item_id, inst_id, description) {
        $('td.p_item').css('background', '#FFF');
        $('td.p_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        $('#special_instruction').append(description+"\n");

//        $.ajax({
//            url: '/cms/profile/patient_special_instruction',
//            type: 'post',
//            data: {patient_id:1,item_id:item_id,instruction_id:inst_id,description:description},
//            cache: false,
//            success: function(response) {
//                if (response.success) {
//                    $('#special_instruction').append(description+"\n");
//                    toastr["success"](response.message);
//                }
//            }
//        });
//        return false;
    }

</script>