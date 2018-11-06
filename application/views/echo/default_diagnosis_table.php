<table class="table table-bordered nowrap responsive default_diagnosis_table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 10%"></th>
        <th class="table-header">Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($diagnosis as $diagnose): ?>
        <tr class="table-row">
            <td>
                <label class="btn btn-xs btn-primary active" style="padding: 10px 5px 5px 10px;">
                    <input type="radio" name="rs" class="diagnose_radio"
                           data-diagnose-id="<?php echo $diagnose['id']; ?>"
                           data-structure-id="<?php echo $diagnose['structure_id']; ?>"
                           value="<?php echo $diagnose['id']; ?>"
                           autocomplete="off" <?php echo $diagnose['disease_id']>0?'checked':''; ?>>
                </label>
            </td>
            <td><?php echo $diagnose['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>