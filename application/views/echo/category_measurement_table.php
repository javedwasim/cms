<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive category-measurement-table tbl_header_fix_350" cellspacing="0" id="echo_cat_meas_tbl" width="100%" >
    <thead>
    <tr>
        <th  style="width: 50px;">Action</th>
        <th style="width: 50%;">items</th>
        <th style="width: 47%">Normal Value</th>
    </tr>
    </thead>
    <tbody style="height: 400px;">
    <?php foreach ($measurements as $measurement): ?>
        <tr class="table-row" id="<?php echo $measurement['id']; ?>">
            <td style="width: 50px;">
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-main-measurement btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_category_measurement/') . $measurement['id'].'/'.$measurement['category_id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } elseif(in_array("echos-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-main-measurement btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_category_measurement/') . $measurement['id'].'/'.$measurement['category_id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } ?>

            </td>
            <?php if($loggedin_user['is_admin']==1){ ?>
                <td class="measurement_care" style="width: 50%;" onClick="showEditMeasurement(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="measurement_item" value="<?php echo $measurement['item']; ?>" onchange="saveItemMeasurement(this,'item','<?php echo $measurement['id']; ?>')">        
                </td>
                <td class="measurement_care" style="width: 50%;" onClick="showEditMeasurement(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="measurement_val" value="<?php echo $measurement['value']; ?>" onchange="saveValueMeasurement(this,'value','<?php echo $measurement['id']; ?>')" />        
                </td>
            <?php } elseif(in_array("echos-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td class="measurement_care" style="width: 50%;" onClick="showEditMeasurement(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="measurement_item" value="<?php echo $measurement['item']; ?>" onchange="saveItemMeasurement(this,'item','<?php echo $measurement['id']; ?>')">        
                </td>
                <td class="measurement_care" style="width: 50%;" onClick="showEditMeasurement(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="measurement_val" value="<?php echo $measurement['value']; ?>" onchange="saveValueMeasurement(this,'value','<?php echo $measurement['id']; ?>')" />        
                </td>
            <?php } else{ ?>
                <td style="width: 50%;" onClick="showError(this);">
                    <?php echo $measurement['value']; ?></td>
                <td style="width: 50%;" onClick="showError(this);">
                    <?php echo $measurement['value']; ?></td>
            <?php } ?>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function showEditMeasurement(editableObj) {
        $("#echo_cat_meas_tbl tbody tr").click(function (e) {
            $('#echo_cat_meas_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function saveItemMeasurement(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_category_measurement' ?>",
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

    function saveValueMeasurement(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_category_measurement' ?>",
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
    table = $("#echo_cat_meas_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'category_measurement';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_echo_cat_meas_tbl/"+tblname+"/"+tblid,
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