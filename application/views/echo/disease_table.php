<table class="table table-bordered nowrap responsive disease_table tbl_header_fix_350" cellspacing="0" id="echo_disease_tbl" width="100%" >
    <thead>
    <tr>
        <th style="width: 50px;">Action</th>
        <th >Name</th>
    </tr>
    </thead>
    <tbody style="height: 58vh;">
    <?php foreach ($categories as $category): ?>
        <tr class="table-row" id="<?php echo $category['id']; ?>" >
            <td style="width: 50px;">
                <a class="delete-disease btn btn-danger btn-xs" href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_disease_category/') . $category['id'] ?>">
                    <i class="fa fa-trash" title="Delete"></i>
                </a>
            </td>
            <td data-disease-id = "<?php echo $category['id']; ?>" id = "<?php echo "d".$category['id']; ?>"
                onClick="showEdit(this,'<?php echo $category['id']; ?>');">
                <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="dis_id" value="<?php echo $category['name']; ?>" onchange="saveToDatabase(this,'cate_name','<?php echo $category['id']; ?>')">        
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
    function showEdit(editableObj,id) {
        $("#echo_disease_tbl tbody tr").click(function (e) {
            $('#echo_disease_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
        $('#assign_disease_id').val(id);
    }
    function saveToDatabase(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_disease_category' ?>",
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
    table = $("#echo_disease_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'disease';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_echo_disease_tbl/"+tblname+"/"+tblid,
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