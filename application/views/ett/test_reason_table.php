<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id="" width="100%" >
   <thead>
    <tr>
        <th style="width: 10%">Delete</th>
        <th>Reason</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($test_reasons as $reason){?>
        <tr>
            <td style="width: 10%">
                <a class="delete-test-reason btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('ett/delete_ett_test_reason/') . $reason['id'] ?>">
                   <i class="fa fa-trash" title="Delete"></i>
                </a>
            </td>
            <td><?php echo $reason['test_reason']; ?></td>
        </tr>
    <?php }?>
    </tbody>
</table>
<script type="text/javascript">
     $(document).ready(function () {
        $('.datatables').DataTable({
            "info": true,
            "paging": false,
            "searching": false
        });
    });
</script>