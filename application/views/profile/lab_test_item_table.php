<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id=""
       width="100%">
    <thead>
    <tr>
        <th style="width: 10%"></th>
        <th>Item Name</th>
        <th>Value</th>
        <th>Units</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td style="width: 5%" data-toggle="modal" data-target="#history-modal">
                <a class="edit-lab-test-item-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-lab-test-item-id="<?php echo $item['id']; ?>"><i
                   class="far fa-question-circle"></i></a>

            </td>
            <td contenteditable="true"
                onBlur="saveTestItemDescription(this,'name','<?php echo $item['id']; ?>')"
                onClick="showEdit(this);">
                <?php echo $item['name']; ?>
                <input type="hidden" name="item_id[]" value="<?php echo $item['id']; ?>">
            </td>
            <td><input type="text" name="item_value[]" value="" style="width: 100%;"></td>
            <td contenteditable="true"
                onBlur="saveTestItemDescription(this,'unit','<?php echo $item['id']; ?>')"
                onClick="showEdit(this);">
                <?php echo $item['units']; ?>
                <input type="hidden" name="item_units[]" value="<?php echo $item['units']; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>