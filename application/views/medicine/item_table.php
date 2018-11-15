<table class="table table-bordered nowrap responsive item_table tbl_header_fix_history" cellspacing="0" id="medicine_item_tbl" width="100%" >
    <thead>
    <tr>
        <th style="width: 100px;" >Action</th>
        <th>Item Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr class="table-row" id="<?php echo $item['id']; ?>">
            <td style="width:100px;">
                <a class="delete-medicine-item btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('medicine/delete_medicine_item/') . $item['id'] .'/'.$item['medicine_id'] ?>">
                    <i class="fa fa-trash" title="Delete"></i></a>
                <a class="edit-medicine-item-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-medicine-item-id="<?php echo $item['id']; ?>">
                   <i class="far fa-question-circle"></i></a>
            </td>
            <td class="medicine_item" onClick="medicineItemEdit(this);">
                <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="medicine_item" value="<?php echo $item['name']; ?>" onchange="saveToDatabase(this,'item_name','<?php echo $item['id']; ?>')" />
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="medicine_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="medicine_item_form_modal" method="post" role="form"
              data-action="<?php echo site_url('medicine/save_medicine_item_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="medicine_item_id" id="medicine_item_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="medicine_item_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="medicine_item_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_medicine_item_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function medicineItemEdit(editableObj) {
        $("#medicine_item_tbl tbody tr").click(function (e) {
            $('#medicine_item_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function saveToDatabase(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'medicine/save_medicine_item' ?>",
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
    table = $("#medicine_item_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'medicine_item';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_medicine_item_tbl/"+tblname+"/"+tblid,
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