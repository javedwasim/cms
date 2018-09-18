<table class="table table-bordered nowrap responsive default_finding_table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 10%"></th>
        <th class="table-header">Structure</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($findings as $finding): ?>
        <tr class="table-row">
            <td>
                <label class="btn btn-xs btn-primary active" style="padding: 10px 5px 5px 10px;">
                    <input type="radio" name="finding_radio" class="finding_radio" data-finding-id="<?php echo $finding['id']; ?>"
                           value="<?php echo $finding['id']; ?>" autocomplete="off"  <?php echo $finding['disease_id']>0?'checked':''; ?>>
                </label>
            </td>
            <td><?php echo $finding['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>