<input type="hidden" name="item_category_id" id="item_category_id" value="<?php echo isset($measurements[0]['category_id'])?$measurements[0]['category_id']:''; ?>"/>
<table class="table table-bordered nowrap responsive category-measurement-table" cellspacing="0" id="structure_diagnosis_table" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Select Structure</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($structures as $structure):  ?>
        <tr class="table-row">
            <td  class=disease_cate">
                <?php echo $structure['name']; ?>
                <input type="hidden" name="structure_diagnosis_id" id="structure_diagnosis_id" value="<?php echo $structure['id']; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function showStructureDisease(editableObj,disease_id) {
        $('td.structure_cate').css('background', '#FFF');
        $('td.structure_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        $.ajax({
            url: window.location.origin+window.location.pathname+'profile/get_disease_findings_diagnosis/'+disease_id,
            type: 'get',
            cache: false,
            success: function(response) {
                $('#disease_findings').empty();
                $('#disease_findings').append(response.result_html);
                $('#disease_diagnosis').empty();
                $('#disease_diagnosis').append(response.diagnosis_html);
            }
        });
        return false;
    }
</script>