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
                    onBlur="saveAdviceItem(this,'item_name','<?php echo $item['id']; ?>')"
                    onClick="showEdit(this);">
                    <?php echo $item['name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>