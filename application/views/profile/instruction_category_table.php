<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Category Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($instructions as $category): ?>
        <tr class="table-row">
            <td class="inst_cate"
                onClick="editInstructionCategory(this,'<?php echo $category['id']; ?>','<?php echo $category['name']; ?>');">
                <?php echo $category['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function editInstructionCategory(editableObj,id,name) {
        $('td.inst_cate').css('background', '#FFF');
        $('td.inst_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");

        $.ajax({
            url: window.location.origin+window.location.pathname+'Profile/get_instruction_item/'+id+'/'+name,
            type: 'get',
            cache: false,
            success: function (response) {
                $('#instruction_category_item_container').empty();
                $('#instruction_category_item_container').append(response.result_html);
            }
        });
        return false;
    }
</script>