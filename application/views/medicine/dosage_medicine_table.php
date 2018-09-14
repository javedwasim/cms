<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%">
    <thead>
    <tr>
        <th>Select Dosage</th>
        <th style="width: 10%"></th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($dosages as $dosage): ?>
        <tr>
            <td><?php echo $dosage['name']; ?></td>
            <td style="width: 10%">
                <input type="checkbox" name="dosage[]" value="<?php echo $dosage['id']; ?>"
                    <?php echo isset($dosage['medicine_category_id'])&&($dosage['medicine_category_id'] == $dosage['medicine_id'])?'checked':''; ?>>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>