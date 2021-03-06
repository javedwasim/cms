<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th>Action</th>
        <th>Investigations</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($investigations as $investigation): ?>
        <tr class="table-row">
            <td>
                <a class="edit_investigation_category_modal btn btn-info btn-xs" href="javascript:void(0)" data-investigation-cat-id="<?php echo $investigation['id']; ?>">
                        <i class="far fa-question-circle"></i>
                </a>
            </td>
            <td class="invest_cate"
                onClick="editInvestigationCategory(this,'<?php echo $investigation['id']; ?>','<?php echo $investigation['name']; ?>');">
                <?php echo $investigation['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="investigation_category_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="investigation_category_modal_form" method="post" role="form"
              data-action="<?php echo site_url('Investigation/save_investigation_category_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="investigation_cat_id" id="investigation_cat_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="investigation_cat_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="investigation_cate_desc"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_investigation_category_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function editInvestigationCategory(editableObj,id,name) {
        $('td.invest_cate').css('background', '#FFF');
        $('td.invest_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        $.ajax({
            url: window.location.origin+window.location.pathname+'Profile/get_investigation_item/'+id+'/'+name,
            type: 'get',
            cache: false,
            success: function (response) {
                $('#investigation_category_item_container').empty();
                $('#investigation_category_item_container').append(response.result_html);
            }
        });
        return false;
    }
</script>