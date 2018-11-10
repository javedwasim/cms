<input type="hidden" name="item_category_id" id="item_category_id" value="<?php echo isset($measurements[0]['category_id'])?$measurements[0]['category_id']:''; ?>"/>
<table class="table table-bordered nowrap responsive category-measurement-table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Item</th>
        <th class="table-header">Value</th>
        <th>Normal Value</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($measurements as $measurement): ?>
        <tr class="table-row">
            <td  class="measurement_care"
                onBlur="saveItemMeasurement(this,'item','<?php echo $measurement['id']; ?>')"
                onClick="showEdit(this);">
                <?php echo $measurement['item']; ?></td>
            <input type="hidden" name="item_id[]" value="<?php echo $measurement['id']; ?>">
            <td style="text-align: center">
                <input type="text" name="item_value[]" value="<?php echo isset($measurement['item_value'])?$measurement['item_value']:''; ?>"  class="form-control border-0 no-shadow">
            </td>
            <td class="measurement_care"
                onBlur="saveValueMeasurement(this,'value','<?php echo $measurement['id']; ?>')"
                onClick="showEditMeasurement(this);">
                <?php echo $measurement['value']; ?></td>
            <input type="hidden" name="measurement_value[]" value="<?php echo $measurement['value']; ?>">
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