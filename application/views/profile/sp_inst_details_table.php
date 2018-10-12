<table class="table table-bordered nowrap responsive" cellspacing="0" id="ett_details_table" width="100%" >
    <thead>
    <tr>
        <th style="width: 20px"></th>
        <th style="width: 20px"></th>
        <th style="width: 20px"></th>
        <th style="width: 50px;">Test Date</th>
    </tr>
    </thead>
        <tbody>
            <?php foreach ($details as $detail): ?>
                <tr style="cursor: pointer;">
                    <td style="width: 20px"><i class="fa fa-trash"></i></td>
                    <td style="padding: 0px;">
                        <a class="btn btn-info btn-xs" href="javascript:void(0)" style="margin: 0px;"><i class="fa fa-edit" id="echo_detail_btn"></i></a>
                    </td>
                    <td style="width: 20px"><a class="btn btn-success btn-xs" onClick="printsp(this,'<?php echo $detail['id']; ?>','<?php echo $detail['patient_id']; ?>');" style="margin: 0px;" href="javascript:void(0)"><i class="fa fa-print"></i></a></td>
                    <td style="width: 100px;"><?php echo date('Y-m-d',strtotime($detail['created_at'])) ?></td>
                    <td class="hide etttestid"><?php echo $detail['id']; ?></td>
                    <td class="hide patid"><?php echo $detail['patient_id']; ?></td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- <script type="text/javascript">
    $(document.body).on('click', '#ett_details_table tbody tr', function () {
        $('#ett_details_table tbody tr.row_selected').removeClass('row_selected');
        $(this).addClass('row_selected');
        var etttestid = $('#ett_details_table tbody tr.row_selected').find('.etttestid').text();
        var patid = $('#ett_details_table tbody tr.row_selected').find('.patid').text();
        $.ajax({
            url: '/cms/print_profiles/get_ett_details',
            type: 'post',
            data: {
                testid:etttestid,
                patid:patid
            },
            success: function(response){
                $('.b-all').empty();
                $('.b-all').append(response.ett_print_html);
            }
        });
    });
</script> -->