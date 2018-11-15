<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th  style="width:55px;">Action</th>
        <th class="table-header">Medicines</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($medicines as $category): ?>
        <tr class="table-row">
            <td style="width:50px;">
                <a class="edit-medicine-cat-btn btn btn-info btn-xs" href="javascript:void(0)"
                   data-medicine-cat-id="<?php echo $category['id']; ?>">
                   <i class="far fa-question-circle"></i>
                </a>
            </td>
            <td class="medicine_category"
                onClick="editMedicineCategory(this,'<?php echo $category['id']; ?>');">
                <?php echo $category['name']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="medicine_cat_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="medicine_cat_form_modal" method="post" role="form"
              data-action="<?php echo site_url('medicine/save_medicine_category_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="medicine_cat_id" id="medicine_cat_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="medicine_category_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="medicine_category_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_medicine_category_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function editMedicineCategory(editableObj,id) {
        $('td.medicine_category').css('background', '#FFF');
        $('td.medicine_category').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");

        $.ajax({
            url: '/cms/profile/get_medicine_item/'+id,
            type: 'get',
            cache: false,
            success: function (response) {
                $('#medicine_category_item_container').empty();
                $('#medicine_category_item_container').append(response.result_html);
            }
        });
        return false;
    }
</script>