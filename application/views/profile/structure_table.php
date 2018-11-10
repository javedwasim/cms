<input type="hidden" name="item_category_id" id="item_category_id" value="<?php echo isset($measurements[0]['category_id'])?$measurements[0]['category_id']:''; ?>"/>
<table class="table table-bordered nowrap responsive category-measurement-table tbl_header_fix_350" cellspacing="0" id="structure_finding_table" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Select Structure</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($structures as $structure):  ?>
        <tr class="table-row">
            <td class=disease_cate" style="cursor: pointer;">
                <?php echo $structure['name']; ?>
                <input type="hidden" name="structure_id" id="structure_id" value="<?php echo $structure['id']; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>