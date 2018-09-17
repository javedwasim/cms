<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id="" width="100%" >
   <thead>
        <tr>
            <th style="width: 10%">Delete</th>
            <th>Protocol</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($protocols as $key){?>
        <tr>
            <td style="width: 10%">
                <a class="delete-protocol btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('ett/delete_protocol/') . $key['id'] ?>">
                   <i class="fa fa-trash" title="Delete"></i>
                </a>
            </td>
            <td
                 contenteditable="true"
                onBlur="saveToDatabase(this,'protocol','<?php echo $key['id']; ?>')"
                onClick="showEdit(this);"
            ><?php echo $key['protocol']; ?></td>
        </tr>
    <?php }?>
    </tbody>
</table>
<script type="text/javascript">
    function showEdit(editableObj) {
        $(editableObj).css("background", "#FFF");
    }
    function saveToDatabase(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $.ajax({
            url: "<?php echo base_url() . 'ett/update_protocol' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["success"](response.message);
                }
            }
        });
    }
</script>