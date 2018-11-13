<table class="table table-bordered nowrap responsive tbl_header_fix_350" cellspacing="0" id="investigation_cat_tbl" width="100%" >
    <thead>
    <tr>
        <th style="width:100px;">Action</th>
        <th >Category Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row" id="<?php echo $category['id']; ?>">
            <td style="width:100px;">
                <a class="delete-investigation btn btn-danger btn-xs" href="javascript:void(0)" title="delete" data-href="<?php echo site_url('investigation/delete_investigation_category/') . $category['id'] ?>">
                   <i class="fa fa-trash" title="Delete"></i>
                </a>
                <a class="edit_investigation_category_modal btn btn-info btn-xs" href="javascript:void(0)" data-investigation-cat-id="<?php echo $category['id']; ?>">
                        <i class="far fa-question-circle"></i>
                </a>
            </td>
            <td class="invest_cate" onClick="editInvestigationCategory(this);">
                <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="invest_cate" value="<?php echo $category['name']; ?>" onchange="saveInvestigationCateGOry(this,'cate_name','<?php echo $category['id']; ?>')" >        
            </td>
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
    function editInvestigationCategory(editableObj) {
        $("#investigation_cat_tbl tbody tr").click(function (e) {
            $('#investigation_cat_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function saveInvestigationCateGOry(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'investigation/save_investigation_category' ?>",
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
    table = $("#investigation_cat_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'investigation';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_investigation_table/"+tblname+"/"+tblid,
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