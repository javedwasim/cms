<input type="hidden" name="disease_id" id="disease_id" value="<?php echo isset($findings[0]['disease_id'])?$findings[0]['disease_id']:''; ?>"/>
<table class="table table-bordered nowrap responsive category-measurement-table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Findings by disease</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($findings as $finding):  ?>
        <tr class="table-row">
            <td contenteditable="true" class=disease_cate"
                onClick="showEditDisease(this,'<?php echo $finding['finding_id']; ?>');">
                <input type="text" name="disease_finding_value[]" class="form-control" value="<?php echo $finding['name']; ?>">
                <input type="hidden" name="disease_finding_id[]" id="disease_finding_id" value="<?php echo $finding['finding_id']; ?>">
                <input type="hidden" name="finding_structure_id[]" id="finding_structure_id" value="<?php echo $finding['structure_id']; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

