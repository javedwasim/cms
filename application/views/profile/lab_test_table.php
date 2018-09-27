<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width:1px !important;">Action</th>
        <th class="table-header">Item Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tests as $test): ?>
        <tr class="table-row">
            <td>
                <a class="edit-inst-item-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-inst-item-id="<?php echo $test['id']; ?>"><i
                   class="far fa-question-circle"></i></a>
            </td>
            <td contenteditable="true" class="p_item"
                onClick="showEdit(this, <?php echo $test['id']; ?>, <?php echo $test['lab_category_id']; ?>, '<?php echo $test['name']; ?>');">
                <?php echo $test['name']; ?></td>

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
    function showEdit(editableObj ,test_id, category_id) {
        $('td.p_item').css('background', '#FFF');
        $('td.p_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        $('#test_id').val(test_id);
        $('#category_id').val(category_id);

        $.ajax({
            url: '/cms/profile/get_lab_item_by_test_id/'+test_id,
            type: 'post',
            data: {test_id: test_id, category_id:category_id},
            cache: false,
            success: function (response) {
                $('.laboratory-test-item-content').empty();
                $('.laboratory-test-item-content').append(response.result_html);
            }
        });
        return false;
    }
</script>