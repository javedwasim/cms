<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id=""
       width="100%">
    <thead>
    <tr>
        <th style="width: 10%"></th>
        <th>Item Name</th>
        <th>Value</th>
        <th>Units</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td style="width: 5%" data-toggle="modal" data-target="#history-modal">
                <a class="info-lab-test-item-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-lab-test-item-id="<?php echo $item['id']; ?>">
                   <i class="far fa-question-circle"></i>
               </a>
            </td>
            <td contenteditable="true">
                <?php echo $item['name']; ?>
                <input type="hidden" name="item_id[]" value="<?php echo $item['id']; ?>">
            </td>
            <td><input type="text" name="item_value[]" value="" style="width: 100%;"></td>
            <td contenteditable="true">
                <?php echo $item['units']; ?>
                <input type="hidden" name="item_units[]" value="<?php echo $item['units']; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document.body).on('click', '.info-lab-test-item-btn', function(){
        $('#lab_test_item_form')[0].reset();
        var test_id = $(this).attr('data-lab-test-item-id');
        $('#lab_test_item_id').val($(this).attr('data-lab-test-item-id'));
        $.ajax({
            url: '/cms/setting/get_lab_test_item_description',
            type: 'post',
            data: {id:test_id},
            cache: false,
            success: function(response) {
                if (response.success) {
                    $('#test_item_description').val(response.description);
                    $('#lab_test_item_modal').modal('show');
                } else {
                    toastr["error"](response.message);
                }
            }
        });

        return false;

    });
</script>

<div id="lab_test_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="lab_test_item_form" method="post" role="form"
              data-action="<?php echo site_url('setting/save_lab_category_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="lab_test_item_id" id="lab_test_item_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Risk Factor and Cardiac Problems</label>
                        <textarea class="form-control" rows="3" name="description" id="test_item_description"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
