<table class="table table-bordered nowrap responsive item_table tbl_header_fix_history" cellspacing="0" id="investigation_item_tbl" width="100%" >
    <thead>
    <tr>
        <th style="width:100px;">Action</th>
        <th>Item Name</th>
    </tr>
    </thead>
    <tbody style="height:48vh;">
    <?php foreach ($items as $item): ?>
        <tr class="table-row" id="<?php echo $item['id']; ?>">
            <td style="width:100px;">
                <a class="delete-investigation-item btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('investigation/delete_investigation_item/') . $item['id']. '/'.$item['investigation_id'] ?>">
                    <i class="fa fa-trash" title="Delete"></i></a>
                <a class="edit-investigation-item-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-investigation-item-id="<?php echo $item['id']; ?>">
                   <i class="far fa-question-circle"></i></a>
            </td>
            <td class="investigation_item" onClick="showEdit(this);">
                <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="investigation_item" value="<?php echo $item['name']; ?>" onchange="saveToDatabase(this,'item_name','<?php echo $item['id']; ?>')"   />
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="investigation_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="investigation_item_form_modal" method="post" role="form"
              data-action="<?php echo site_url('investigation/save_investigation_item_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="investigation_item_id" id="investigation_item_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="investigation_item_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="investigation_item_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_investigation_item_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function showEdit(editableObj) {
    $("#investigation_item_tbl tbody tr").click(function (e) {
        $('#investigation_item_tbl tbody tr.row_selected').removeClass('row_selected');
        $(this).addClass('row_selected');
    });
}
function saveToDatabase(editableObj, column, id) {
    var val = editableObj.value;
    $.ajax({
        url: "<?php echo base_url() . 'investigation/save_investigation_item' ?>",
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
    table = $("#investigation_item_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'investigation_item';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_investigation_item_tbl/"+tblname+"/"+tblid,
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