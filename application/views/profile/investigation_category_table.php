<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 5%"></th>
        <th class="table-header">Investigations</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($investigations as $investigation): ?>
        <tr class="table-row">
            <td>
                &nbsp;
            </td>
            <td contenteditable="true" class="invest_cate"
                onClick="editInvestigationCategory(this,'<?php echo $investigation['id']; ?>');">
                <?php echo $investigation['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function editInvestigationCategory(editableObj,id) {
        $('td.invest_cate').css('background', '#FFF');
        $('td.invest_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");

        $.ajax({
            url: '/cms/profile/get_investigation_item/'+id,
            type: 'get',
            cache: false,
            success: function (response) {
                $('#investigation_category_item_container').empty();
                $('#investigation_category_item_container').append(response.result_html);
            }
        });
        return false;

    }


</script>