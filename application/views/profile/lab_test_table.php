<table class="table table-bordered nowrap responsive datatables tbl_header_fix_history" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width:55px !important;">Action</th>
        <th class="table-header">Item Name</th>
    </tr>
    </thead>
    <tbody style="height: 500px;">
    <?php foreach ($tests as $test): ?>
        <tr class="table-row">
            <td style="width: 50px;">
                <a class="info-lab-test-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-lab-test-id="<?php echo $test['id']; ?>"><i
                   class="far fa-question-circle"></i></a>
            </td>
            <td contenteditable="true" class="p_item"
                onClick="showEdit(this, <?php echo $test['id']; ?>, <?php echo $test['lab_category_id']; ?>, '<?php echo $test['name']; ?>');">
                <?php echo $test['name']; ?></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="lab_test_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="lab_test_form" method="post" role="form"
              data-action="<?php echo site_url('setting/save_lab_category_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="lab_test_id" id="lab_test_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Risk Factor and Cardiac Problems</label>
                        <textarea class="form-control" rows="3" name="description" id="test_description"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document.body).on('click', '.info-lab-test-btn', function(){
        $('#lab_test_form')[0].reset();
        var test_id = $(this).attr('data-lab-test-id');
        $('#lab_test_id').val($(this).attr('data-lab-test-id'));
        $.ajax({
            url: window.location.origin+window.location.pathname+'Setting/get_lab_test_description',
            type: 'post',
            data: {id:test_id},
            cache: false,
            success: function(response) {
                if (response.success) {
                    $('#test_description').val(response.description);
                    $('#lab_test_modal').modal('show');
                } else {
                    toastr["error"](response.message);
                }
            }
        });
        return false;
    });
</script>
<script>
    function showEdit(editableObj ,test_id, category_id) {
        $('td.p_item').css('background', '#FFF');
        $('td.p_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        $('#test_id').val(test_id);
        $('#category_id').val(category_id);

        $.ajax({
            url: window.location.origin+window.location.pathname+'Profile/get_lab_item_by_test_id/'+test_id,
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
