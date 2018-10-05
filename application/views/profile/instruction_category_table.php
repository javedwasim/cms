<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 9%">Delete</th>
        <th class="table-header">Category Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($instructions as $category): ?>
        <tr class="table-row">
            <td>
                <a class="edit-inst-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-inst-id="<?php echo $category['id']; ?>"><i
                   class="far fa-question-circle"></i></a>
            </td>
            <td contenteditable="true" class="inst_cate"
                onClick="editInstructionCategory(this,'<?php echo $category['id']; ?>');">
                <?php echo $category['name']; ?></td>
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
            </div>
        </form>
    </div>
</div>
<script>
    function editInstructionCategory(editableObj,id) {
        $('td.inst_cate').css('background', '#FFF');
        $('td.inst_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");

        $.ajax({
            url: '/cms/profile/get_instruction_item/'+id,
            type: 'get',
            cache: false,
            success: function (response) {
                $('#instruction_category_item_container').empty();
                $('#instruction_category_item_container').append(response.result_html);
            }
        });
        return false;
    }
</script>