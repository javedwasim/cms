<input type="hidden" name="disease_id" id="disease_id" value="<?php echo isset($diagnosis[0]['disease_id'])?$diagnosis[0]['disease_id']:''; ?>"/>
<table class="table table-bordered nowrap responsive category-measurement-table" cellspacing="0" id="diagnosis_tbl" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Diagnosis by Disease/Structure</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($diagnosis as $diagnose):  ?>
        <tr class="table-row" id="<?php echo $diagnose['diagnosis_id']; ?>">
            <td contenteditable="true" class=disease_cate">
                <input type="text" name="disease_diagnosis_value[]" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" class="form-control border-0 bg-transparent shadow-none" value="<?php echo $diagnose['diagnosis_name']; ?>">
                <input type="hidden" name="disease_diagnosis_id[]" id="disease_diagnosis_id" value="<?php echo $diagnose['diagnosis_id']; ?>">
                <input type="hidden" name="diagnose_structure_id[]" id="diagnose_structure_id" value="<?php echo $diagnose['structure_id']; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
$(document).ready(function () {
    // Sortable rows
    table = $("#diagnosis_tbl");
    table.tableDnD();
});
</script>
