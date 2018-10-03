<input type="hidden" name="disease_id" id="disease_id" value="<?php echo isset($diagnosis[0]['disease_id'])?$diagnosis[0]['disease_id']:''; ?>"/>
<table class="table table-bordered nowrap responsive category-measurement-table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Diagnosis</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($diagnosis as $diagnose):  ?>
        <tr class="table-row">
            <td contenteditable="true" class=disease_cate"
                onClick="showEditDisease(this,'<?php echo $diagnose['diagnosis_id']; ?>');">
                <?php echo $diagnose['name']; ?>
                <input type="hidden" name="disease_diagnosis_id[]" id="disease_diagnosis_id" value="<?php echo $diagnose['diagnosis_id']; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
