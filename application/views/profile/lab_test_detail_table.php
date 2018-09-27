<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th>Test Name</th>
        <th>Test Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($tests as $test):?>
        <tr>
            <td contenteditable="true" class="lab_test_info"
                onClick="loadLabtestUnit(this,'<?php echo $test['info_key']; ?>');">
                <?php echo $test['name']; ?></td>
            <td><?php echo date('Y-m-d', strtotime($test['test_date'])) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function loadLabtestUnit(editableObj, key) {
        $('td.lab_test_info').css('background', '#FFF');
        $('td.lab_test_info').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");

        $.ajax({
            url: '/cms/profile/get_lab_test_unit/'+key,
            type: 'get',
            cache: false,
            success: function (response) {
                $('.laboratory-test-unit-content').empty();
                $('.laboratory-test-unit-content').append(response.result_html);
            }
        });
        return false;
    }
</script>