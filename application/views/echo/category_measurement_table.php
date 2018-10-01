<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive category-measurement-table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 5%">Delete</th>
        <th class="table-header">Category</th>
        <th>Normal Value</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($measurements as $measurement): ?>
        <tr class="table-row">
            <td>
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-main-measurement btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_category_measurement/') . $measurement['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } elseif(in_array("echos-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-main-measurement btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_category_measurement/') . $measurement['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } ?>

            </td>
            <?php if($loggedin_user['is_admin']==1){ ?>
                <td contenteditable="true" class="measurement_care"
                    onBlur="saveItemMeasurement(this,'item','<?php echo $measurement['id']; ?>')"
                    onClick="showEdit(this);">
                    <?php echo $measurement['item']; ?></td>
                <td contenteditable="true" class="measurement_care"
                    onBlur="saveValueMeasurement(this,'value','<?php echo $measurement['id']; ?>')"
                    onClick="showEditMeasurement(this);">
                    <?php echo $measurement['value']; ?></td>
            <?php } elseif(in_array("echos-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td contenteditable="true" class="measurement_care"
                    onBlur="saveItemMeasurement(this,'item','<?php echo $measurement['id']; ?>')"
                    onClick="showEdit(this);">
                    <?php echo $measurement['item']; ?></td>
                <td contenteditable="true" class="measurement_care"
                    onBlur="saveValueMeasurement(this,'value','<?php echo $measurement['id']; ?>')"
                    onClick="showEditMeasurement(this);">
                    <?php echo $measurement['value']; ?></td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $measurement['value']; ?></td>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $measurement['value']; ?></td>
            <?php } ?>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function showEditMeasurement(editableObj) {
        $('td.measurement_care').css('background', '#FFF');
        $('td.measurement_care').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function saveItemMeasurement(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_category_measurement' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                }
            }
        });
        $(editableObj).css("color", "#212529");
    }

    function saveValueMeasurement(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_category_measurement' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                }
            }
        });
        $(editableObj).css("color", "#212529");
    }

</script>