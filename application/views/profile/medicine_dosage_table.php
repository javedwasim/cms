<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 5%"></th>
        <th class="table-header">Dosages</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($dosages as $dosage):?>
        <tr class="table-row">
            <td>&nbsp;</td>
            <td contenteditable="true" class="medicine_category"
                onClick="editDosageCategory(this,'<?php echo $dosage['dosage_name']; ?>','<?php echo $dosage['dosage_id']; ?>');">
                <?php echo $dosage['dosage_name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function editDosageCategory(editableObj,name,id) {
        $('td.medicine_category').css('background', '#FFF');
        $('td.medicine_category').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        var newRowContent = '<tr><td><input class="form-control" type="text" name="dosage_value[]" value="'+name+'" ></td></tr>';
        $("#dosage_item").append(newRowContent);

    }

</script>