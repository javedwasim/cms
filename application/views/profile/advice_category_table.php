<table class="table table-bordered nowrap responsive tbl-qa" cellspacing="0" id=""
       width="100%">
    <thead>
    <tr>
        <th class="table-header" style="width: 5%">Action</th>
        <th class="table-header">Advices</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($advices as $advice): ?>
        <tr class="table-row">
            <td>
                &nbsp;
            </td>
            <td contenteditable="true" class="advice_cate"
                onClick="loadAdviceCategory(this,'<?php echo $advice['id']; ?>');">
                <?php echo $advice['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
    function loadAdviceCategory(editableObj,id) {
        $('td.advice_cate').css('background', '#FFF');
        $('td.advice_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");

        $.ajax({
            url: '/cms/profile/get_advice_item/'+id,
            type: 'get',
            cache: false,
            success: function (response) {
                $('#advice_category_item_container').empty();
                $('#advice_category_item_container').append(response.result_html);
            }
        });
        return false;

    }
</script>