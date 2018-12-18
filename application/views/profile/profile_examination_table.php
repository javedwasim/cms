<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th>Action</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($examination_category as $category): ?>
        <tr>
            <td>
                <a class="edit_examination_category_modal btn btn-info btn-xs" href="javascript:void(0)" data-examination-cat-id="<?php echo $category['id']; ?>">
                        <i class="far fa-question-circle"></i>
                </a>
            </td>
            <td class="profile_history_info"
                onClick="loadExaminationItem(this,'<?php echo $category['id']; ?>','<?php echo $category['name']; ?>');">
                <?php echo $category['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="examination_category_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="examination_category_modal_form" method="post" role="form"
              data-action="<?php echo site_url('Examination/save_examination_category_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="examination_cat_id" id="examination_cat_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="exam_cat_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="examination_cate_desc"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_examination_category_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function loadExaminationItem(editableObj, id,name) {
        $('td.profile_history_info').css('background', '#FFF');
        $('td.profile_history_info').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        $.ajax({
            url: window.location.origin+window.location.pathname+'Profile/get_examination_category_item/'+id+'/'+name,
            type: 'get',
            cache: false,
            success: function (response) {
                $('#patient_examination_item_container').empty();
                $('#patient_examination_item_container').append(response.result_html);
            }
        });
        return false;
    }
</script>