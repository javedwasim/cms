<table class="table table-bordered nowrap responsive category-measurement-table" cellspacing="0" id="diagnosis_by_structure_table" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Diagnosis</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($diagnosis as $diagnosi):  ?>
        <tr class="table-row">
            <td>
                <?php echo $diagnosi['name']; ?>
                <input type="hidden" name="diagnosis_structure_id" id="diagnosis_structure_id" value="<?php echo $diagnosi['structure_id']; ?>">
                <input type="hidden" name="diagnosis_structure_id" id="echo_diagnosis_id" value="<?php echo $diagnosi['id']; ?>">
                <input type="hidden" name="diagnosis_structure_id" id="echo_diagnosis_name" value="<?php echo $diagnosi['name']; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
