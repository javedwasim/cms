<table class="table table-bordered nowrap responsive" cellspacing="0" id="medicine_cat_tbl" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width:100px;">Action</th>
        <th class="table-header">Category Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row" id="<?php echo $category['id']; ?>">
            <td>
                <a class="delete-medicine btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('medicine/delete_medicine_category/') . $category['id'] ?>">
                   <i class="fa fa-trash" title="Delete"></i></a>
                   <a class="edit-medicine-cat-btn btn btn-info btn-xs" href="javascript:void(0)"
                   data-medicine-cat-id="<?php echo $category['id']; ?>">
                   <i class="far fa-question-circle"></i></a>
            </td>
            <td class="medicine_category" onClick="editMedicineCategory(this);">
                <input type="text" class="form-control border-0 bg-transparent shadow-none" name="medicine_category" value="<?php echo $category['name']; ?>" onchange="saveMedicineCategory(this,'cate_name','<?php echo $category['id']; ?>')">
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
    function editMedicineCategory(editableObj) {
        $("#medicine_cat_tbl tbody tr").click(function (e) {
            $('#medicine_cat_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function saveMedicineCategory(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'medicine/save_medicine_category' ?>",
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
    table = $("#medicine_cat_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'medicine';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_medicine_cat_tbl/"+tblname+"/"+tblid,
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