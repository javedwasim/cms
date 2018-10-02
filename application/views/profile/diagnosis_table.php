<input type="hidden" name="item_category_id" id="item_category_id" value="<?php echo isset($measurements[0]['category_id'])?$measurements[0]['category_id']:''; ?>"/>
<table class="table table-bordered nowrap responsive category-measurement-table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Select Disease</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach ($diseases as $disease):  ?>
        <tr class="table-row">
            <td contenteditable="true" class=disease_cate"
                onClick="showEditDisease(this,'<?php echo $disease['id']; ?>');">
                <?php echo $disease['name']; ?>
                <input type="hidden" name="disease_id" id="disease_id" value="<?php echo $disease['id']; ?>">
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
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
        return false;
    }
</script>