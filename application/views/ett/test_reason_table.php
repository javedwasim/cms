<table class="table table-bordered nowrap responsive datatables tbl_header_fix_350" cellspacing="0" id="ett_test_reason_table" width="100%" >
   <thead>
    <tr>
        <th style="width:55px;">Action</th>
        <th>Reason</th>
    </tr>
    </thead>
    <tbody style="height: 58vh;">
        <?php foreach($test_reasons as $reason){?>
        <tr id="<?php echo $reason['id']; ?>">
            <td style="width:50px;">
                <a class="delete-test-reason btn btn-danger btn-xs" href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('ett/delete_ett_test_reason/') . $reason['id'] ?>">
                    <i class="fa fa-trash" title="Delete"></i>
                </a>
            </td>
            <td class="exam_cate" onClick="showExamination(this);">
                <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="test_reason" value="<?php echo $reason['test_reason']; ?>" onchange="saveettreason(this,'test_reason','<?php echo $reason['id']; ?>')">
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>
<script type="text/javascript">
    function showExamination(editableObj) {
        $("#ett_test_reason_table tbody tr").click(function (e) {
            $('#ett_test_reason_table tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function saveettreason(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'ett/update_ett_test_reason' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + val + '&id=' + id,
            success: function (response) {
                if (response.success == true) {
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
    table = $("#ett_test_reason_table");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'ett_test_reason';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_ett_test_reason_table/"+tblname+"/"+tblid,
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