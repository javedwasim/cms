<table class="table table-bordered nowrap responsive history_table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width:100px;">Delete</th>
        <th class="table-header">Category Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row">
            <td style="width:100px;">
                <a class="delete-history btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('Profile_history/delete_profile_history/') . $category['id'] ?>">
                   <i class="fa fa-trash" title="Delete"></i></a>
                <a class="edit-profile-history-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-profile-history-id="<?php echo $category['id']; ?>">
                   <i class="far fa-question-circle"></i>
                </a>
            </td>
            <td contenteditable="true" class="exam_cate"
                onBlur="saveProfileHistory(this,'cate_name','<?php echo $category['id']; ?>')"
                onClick="showEdit(this);">
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
                        <label id="history_cat_name"></label>
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
    function showEdit(editableObj) {
        $('td.exam_cate').css('background', '#FFF');
        $('td.exam_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function saveProfileHistory(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'Profile_history/save_profile_history' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                }else{
                    toastr['error'](response.message);
                    document.execCommand('undo');
                }
            }
        });
        $(editableObj).css("color", "#212529");
    }

</script>