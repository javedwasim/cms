<table class="table table-bordered nowrap responsive main-category-table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Category</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($main_categories as $category): ?>
        <tr class="table-row">
            <td contenteditable="true" class="2d_echo_cate"
                onClick="showEditMainCategory(this,'<?php echo $category['id']; ?>');">
                <?php echo $category['name']; ?></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function showEditMainCategory(editableObj,category_id) {
        $('td.2d_echo_cate').css('background', '#FFF');
        $('td.2d_echo_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");

        var patient_id = $('#label_patient_id').text();
        var measurement_cate_id = $('#measurement_cate_id').val(category_id);
        var patient_id = $('#patient_id').val(patient_id);

        $.ajax({
            url: "<?php echo base_url() . 'profile/get_measurement_by_filter/' ?>"+category_id,
            type: "get",
            success: function (response) {
                $('#main_category_items').empty();
                $('#main_category_items').append(response.result_html);
                if (response.success) {
                    toastr["success"](response.message);
                }
            }
        });
    }

</script>