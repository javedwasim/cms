<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($history_category as $category): ?>
        <tr>
            <td contenteditable="true" class="profile_history_info"
                onClick="loadHistoryItem(this,'<?php echo $category['id']; ?>');">
                <?php echo $category['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function loadHistoryItem(editableObj, id) {
        $('td.profile_history_info').css('background', '#FFF');
        $('td.profile_history_info').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");

        $.ajax({
            url: '/cms/profile/get_examination_category_item/'+id,
            type: 'get',
            cache: false,
            success: function (response) {
                $('#patient_history_item_container').empty();
                $('#patient_history_item_container').append(response.result_html);
            }
        });
        return false;
    }
</script>