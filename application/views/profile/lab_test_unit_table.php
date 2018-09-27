<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id=""
       width="100%">
    <thead>
    <tr>

        <th>Item Name</th>
        <th>Value</th>
        <th>Units</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td contenteditable="true"
                onBlur="saveTestItemDescription(this,'name','<?php echo $item['id']; ?>')"
                onClick="showEdit(this);">
                <?php echo $item['name']; ?>
            </td>
            <td><?php echo $item['item_value']; ?></td>
            <td contenteditable="true"
                onBlur="saveTestItemDescription(this,'unit','<?php echo $item['id']; ?>')"
                onClick="showEdit(this);">
                <?php echo $item['item_units']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>