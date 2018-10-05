<table class="table table-bordered nowrap responsive history_table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width:5%;"></th>
        <th class="table-header">History</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($history_category as $category): ?>
        <tr class="table-row">
            <td style="width:100px;">
                <a class="edit-profile-history-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-profile-history-id="<?php echo $category['id']; ?>">
                    <i class="far fa-question-circle"></i></a>
            </td>
            <td contenteditable="true" class="exam_cate"
                onClick="loadHistoryItem(this,'<?php echo $category['id']; ?>');">
                <?php echo $category['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="profile_history_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="profile_history_item_form_modal" method="post" role="form"
              data-action="<?php echo site_url('Profile_history/save_profile_history_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="profile_history_id" id="profile_history_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Risk Factor and Cardiac Problems</label>
                        <textarea class="form-control" rows="3" name="description" id="profile_history_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_profile_history_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function loadHistoryItem(editableObj,id) {
        var patient_id = $('#label_patient_id').text();

        $('td.exam_cate').css('background', '#FFF');
        $('td.exam_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");

        $.ajax({
            url: '/cms/profile/get_history_category_item/'+id,
            type: 'get',
            cache: false,
            success: function (response) {
                $('#profile_history_item_container').empty();
                $('#profile_history_item_container').append(response.history_html);
            }
        });
        return false;

    }


</script>