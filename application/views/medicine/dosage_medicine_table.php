<table class="table table-bordered nowrap responsive tbl_header_fix_history" cellspacing="0" id="" style="height: 340px;" width="100%">
    <thead>
    <tr>
        <th align="right">Select Dosage</th>
        <th style="width: 50px; ">Action</th>
    </tr>
    </thead>
    <tbody style="height: 58vh;">

    <?php foreach ($dosages as $dosage): ?>
        <tr>
            <td align="right"><?php echo $dosage['name']; ?></td>
            <td style="width:50px;">
                <input type="checkbox" name="dosage[]" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo $dosage['id']; ?>"
                    <?php echo isset($dosage['medicine_category_id'])&&($dosage['medicine_category_id'] > 0)?'checked':''; ?>>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>