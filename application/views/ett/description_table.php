<table class="table table-bordered nowrap responsive datatables tbl_header_fix_350" cellspacing="0" id="ett_description_tbl" width="100%" >
   <thead>
        <tr>
            <th style="width:55px;">Action</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody style="height: 55vh;">
        <?php foreach($descriptions as $key){?>
        <tr id="<?php echo $key['id']; ?>">
            <td style="width:50px;">
                <a class="delete-description btn btn-danger btn-xs" href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('ett/delete_ett_description/') . $key['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i>
                </a>
            </td>
            <td class="exam_cate" onClick="showExamination(this);">
                <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo $key['description'] ?>" name="ett_description" onchange="saveTodiscrption(this,'description','<?php echo $key['id']; ?>')">        
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>

<script type="text/javascript">
    $("#ett_description_tbl tbody tr").click(function (e) {
            $('#ett_description_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
    });
    function saveTodiscrption(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'ett/update_ett_description' ?>",
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
    table = $("#ett_description_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'ett_description';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_ett_description_tbl/"+tblname+"/"+tblid,
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