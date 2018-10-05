<table class="table table-bordered nowrap responsive tbl-qa"
       cellspacing="0" id="" width="100%">
    <thead>
    <tr>
        <th class="table-header" style="width: 5%">Delete</th>
        <th class="table-header">Item Name</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item): ?>
            <tr class="table-row">
                <td style="width: 5%">
                    &nbsp;
                </td>
                <td contenteditable="true" class="advice_item"
                    onClick="addAdviceItem(this,'<?php echo $item['name']; ?>');">
                    <?php echo $item['name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    function addAdviceItem(editableObj,text) {
        var patient_id = $('#label_patient_id').text();
        $('td.advice_item').css('background', '#FFF');
        $('td.advice_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");

        $('#advice_item').append(text+'\n');
    }

</script>