<table class="table table-bordered nowrap responsive tbl_header_fix_350" cellspacing="0" id="instruction_cat_tbl" width="100%" >
    <thead>
    <tr>
        <th  style="width: 100px;">Action</th>
        <th >Category Name</th>
    </tr>
    </thead>
    <tbody style="height: 58vh">
    <?php foreach ($categories as $category): ?>
        <tr class="table-row" id="<?php echo $category['id']; ?>">
            <td style="width: 100px;">
                <a class="delete-inst btn btn-danger btn-xs" href="javascript:void(0)" title="delete"
                   data-category = '<?php echo $category['category'] ?>'
                   data-category-id = '<?php echo $category['id'] ?>'
                   data-href="<?php echo site_url('instruction/delete_instruction_category')?>">
                    <i class="fa fa-trash" title="Delete"></i>
                </a>
                <a class="edit-inst-btn btn btn-info btn-xs" href="javascript:void(0)"
                   data-inst-id="<?php echo $category['id']; ?>">
                   <i class="far fa-question-circle"></i>
               </a>
            </td>
            <td class="inst_cate" onClick="editInstructionCategory(this);">
                <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="inst_cat" value="<?php echo $category['name']; ?>" onchange="saveInstructionCategory(this,'<?php echo $category['category']; ?>','<?php echo $category['id']; ?>')" />
            </td>
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
                        <label id="instruction_cate_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="inst_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_inst_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function editInstructionCategory(editableObj) {
        $("#instruction_cat_tbl tbody tr").click(function (e) {
            $('#instruction_cat_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function saveInstructionCategory(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'instruction/save_inst_category' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + val + '&id=' + id,
            success: function (response) {
                if (response.success) {
                    toastr["success"](response.message);
                }else{
                    document.execCommand('undo');
                    toastr["error"](response.message);
                }
            }
        });
    }
$(document).ready(function () {
    // Sortable rows
    table = $("#instruction_cat_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'instruction';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_instruction_cat_tbl/"+tblname+"/"+tblid,
                type: 'post',
                data: tabledata,
                cache: false,
                success: function(response){
                   
                }
           });
        }
    });
});
</script>