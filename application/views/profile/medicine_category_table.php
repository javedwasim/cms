<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Medicines</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($medicines as $category): ?>
        <tr class="table-row">
            <td class="medicine_category"
                onClick="editMedicineCategory(this,'<?php echo $category['id']; ?>');">
                <?php echo $category['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function editMedicineCategory(editableObj,id) {
        $('td.medicine_category').css('background', '#FFF');
        $('td.medicine_category').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");

        $.ajax({
            url: '/cms/profile/get_medicine_item/'+id,
            type: 'get',
            cache: false,
            success: function (response) {
                $('#medicine_category_item_container').empty();
                $('#medicine_category_item_container').append(response.result_html);
            }
        });
        return false;
    }

</script>