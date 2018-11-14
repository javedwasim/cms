<input type="hidden" name="disease_id" id="disease_id" value="<?php echo isset($findings[0]['disease_id'])?$findings[0]['disease_id']:''; ?>"/>
<table class="table table-bordered nowrap responsive category-measurement-table tbl_header_fix_350" cellspacing="0" id="finding_tbl" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Findings by disease /Structure</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($findings as $finding):  ?>
        <tr class="table-row" id="<?php echo $finding['finding_id']; ?>">
            <td contenteditable="true" class=disease_cate">
                <input type="text" name="disease_finding_value[]" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" class="form-control border-0 bg-transparent shadow-none" value="<?php echo $finding['finding_name']; ?>">
                <input type="hidden" name="disease_finding_id[]" id="disease_finding_id" value="<?php echo $finding['finding_id']; ?>">
                <input type="hidden" name="finding_structure_id[]" id="finding_structure_id" value="<?php echo $finding['structure_id']; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
$(document).ready(function () {
    // Sortable rows
    table = $("#finding_tbl");
    table.tableDnD();
});
</script>
