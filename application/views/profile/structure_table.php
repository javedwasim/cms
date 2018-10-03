<input type="hidden" name="item_category_id" id="item_category_id" value="<?php echo isset($measurements[0]['category_id'])?$measurements[0]['category_id']:''; ?>"/>
<table class="table table-bordered nowrap responsive category-measurement-table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Select Disease</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($structures as $structure):  ?>
        <tr class="table-row">
            <td contenteditable="true" class=disease_cate"
                onClick="showEditDisease(this,'<?php echo $structure['id']; ?>');">
                <?php echo $structure['name']; ?>
                <input type="hidden" name="disease_id" id="disease_id" value="<?php echo $structure['id']; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function showEditDisease(editableObj,disease_id) {
        $('td.disease_cate').css('background', '#FFF');
        $('td.disease_cate').css('color', '#212529');
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