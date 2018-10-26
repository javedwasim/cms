<table class="table table-bordered nowrap responsive category-measurement-table" cellspacing="0" id="finding_by_structure_table" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Findings</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($findings as $finding):  ?>
        <tr class="table-row">
            <td>
                <?php echo $finding['name']; ?>
                <input type="hidden" name="echo_finding_name" id="echo_finding_name" value="<?php echo $finding['name']; ?>">
                <input type="hidden" name="echo_finding_id" id="echo_finding_id" value="<?php echo $finding['id']; ?>">
                <input type="hidden" name="finding_structure_id" id="finding_structure_id" value="<?php echo $finding['structure_id']; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>