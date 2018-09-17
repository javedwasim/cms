<table class="table table-bordered nowrap responsive finding_table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 10%">Delete</th>
        <th class="table-header">finding</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($findings as $finding): ?>
        <tr class="table-row">
            <td>
                <a class="delete-finding btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('Echo_controller/delete_structure_finding/') . $finding['id'] ?>">
                    <i class="fa fa-trash" title="Delete"></i></a>
            </td>
            <td contenteditable="true"
                onBlur="saveFinding(this,'cate_name','<?php echo $finding['id']; ?>')"
                onClick="findingEdit(this);">
                <?php echo $finding['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('.finding_table').DataTable({
            "info": true,
            "paging": false,
            "searching": false,
            "sort": false,
            columnDefs: [
                { width: 1, targets: 0 }
            ],
            fixedColumns: true,
        });
       });
    function findingEdit(editableObj) {
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        //select parent structure
        $(".structure_table td").css("background-color", "");
        var structure_id = $('#structure_id').val();
        $('#'+structure_id).css("background", "#1e88e5");
        $('#'+structure_id).css("color", "#FFF");

    }
    function saveFinding(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $(editableObj).css("color", "#1b1a1a");
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_structure_finding' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                if (response.success) {
                    toastr["success"](response.message);
                }
                $(editableObj).css('background-image', 'none');
            }
        });
    }

</script>