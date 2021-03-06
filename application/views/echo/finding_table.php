<table class="table table-bordered nowrap responsive finding_table tbl_header_fix_350" cellspacing="0" id="finding_tbl" width="100%" >
    <thead>
    <tr>
        <th  style="width: 50px;">Action</th>
        <th>finding</th>
    </tr>
    </thead>
    <tbody style="height: 25vh;">
    <?php foreach ($findings as $finding): ?>
        <tr class="table-row" id="<?php echo $finding['id']; ?>">
            <td style="width: 50px;">
                <a class="delete-finding btn btn-danger btn-xs" href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_structure_finding/') . $finding['id'] ?>">
                    <i class="fa fa-trash" title="Delete"></i>
                </a>
            </td>
            <td class="finding_cate" onClick="findingEdit(this);">
                <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo $finding['name']; ?>" onchange="saveFinding(this,'cate_name','<?php echo $finding['id']; ?>')">
                <input type="hidden" id="finding_selected_id" value="<?php echo $finding['id']; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function findingEdit(editableObj) {
        $("#finding_tbl tbody tr").click(function (e) {
            $('#finding_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });

    }
    function saveFinding(editableObj, column, id) {
        var val = editableObj.value;
         $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_structure_finding' ?>",
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
    table = $("#finding_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'structure_finding';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_echo_finding_tbl/"+tblname+"/"+tblid,
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