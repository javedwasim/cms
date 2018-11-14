<input type="hidden" name="item_category_id" id="item_category_id" value="<?php echo isset($measurements[0]['category_id'])?$measurements[0]['category_id']:''; ?>"/>
<table class="table table-bordered nowrap responsive category-measurement-table tbl_header_fix_history" cellspacing="0" id="" width="100%" >
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
            <td contenteditable="true" class="measurement_care"
                onBlur="saveItemMeasurement(this,'item','<?php echo $measurement['item_id']; ?>')"
                onClick="showEdit(this);">
                <?php echo $measurement['item']; ?></td>
            <input type="hidden" name="item_id[]" value="<?php echo $measurement['item_id']; ?>">
            <td style="text-align: center">
                <input type="text" name="item_value[]" value="<?php echo isset($measurement['item_value'])?$measurement['item_value']:''; ?>"  class="form-control">
            </td>
            <td contenteditable="true" class="measurement_care"
                onClick="showEditMeasurement(this);">
                <?php echo $measurement['measurement_value']; ?></td>
            <input type="hidden" name="measurement_value[]" value="<?php echo $measurement['measurement_value']; ?>">
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
</script>