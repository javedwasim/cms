<table class="table table-bordered nowrap responsive tbl_header_fix_history" cellspacing="0" id="lab_test_details_table" width="100%" >
    <thead>
    <tr>
        <th>Test Name</th>
        <th>Test Date</th>
    </tr>
    </thead>
    <tbody style="height: 450px;">
    <?php foreach($tests as $test):?>
        <tr style="cursor: pointer;">
            <td class="lab_test_info"
                onClick="loadLabtestUnit(this,'<?php echo $test['info_key']; ?>');"
                ondblclick="printlabtest(this,'<?php echo $test['info_key']; ?>','<?php echo $test['patient_id']; ?>');"
            >
                <?php echo $test['name']; ?></td>
            <td onClick="loadLabtestUnit(this,'<?php echo $test['info_key']; ?>');"><?php echo date('Y-m-d', strtotime($test['test_date'])) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    $("#lab_test_details_table tbody tr").click(function (e) {
        $('#lab_test_details_table tbody tr.row_selected').removeClass('row_selected');
        $(this).addClass('row_selected');
    });
    function loadLabtestUnit(editableObj, key) {
        $.ajax({
            url: window.location.origin+window.location.pathname+'Profile/get_lab_test_unit/'+key,
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