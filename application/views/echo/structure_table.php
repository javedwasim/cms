<table class="table table-bordered nowrap responsive structure_table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 10%">Delete</th>
        <th class="table-header">Structure</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($structures as $structure): ?>
        <tr class="table-row">
            <td>
                <a class="delete-structure btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('Echo_controller/delete_structure_category/') . $structure['id'] ?>">
                    <i class="fa fa-trash" title="Delete"></i></a>
            </td>
            <td contenteditable="true"
                onBlur="saveToDatabase(this,'cate_name','<?php echo $structure['id']; ?>')"
                onClick="showEdit(this,'<?php echo $structure['id']; ?>');">
                <?php echo $structure['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<input type="hidden" name="structure_id" id="structure_id">
<script>
    $(document).ready(function () {
        $('.structure_table').DataTable({
            "info": true,
            "paging": false,
            "searching": false,
            "sort": false,
            columnDefs: [
                { width: 1, targets: 0 }
            ],
            fixedColumns: true,
        });

        $(".structure_category_container table tbody tr:first td:nth-child(2)").trigger("click");

    });
    function showEdit(editableObj,id) {
        $('#structure_id').val(id);
        console.log(id);
        $(".structure_category_container table tbody tr:first td:nth-child(2)").css("background", "#FFF");
        $(".structure_category_container table tbody tr:first td:nth-child(2)").css("color", "#1b1a1a");
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function saveToDatabase(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $(editableObj).css("color", "#1b1a1a");
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_structure_category' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                }else{
                    toastr["success"](response.message);
                }
            }
        });
    }

</script>