<div class="profession_table">
    <table class="table table-bordered nowrap responsive" id="prof_table" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th style="width:30px;"></th>
                <th>Profession</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($professions as $key) {
            ?>
            <tr>
                <td >
                    <a class="delete_profession btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('setting/delete_profession/') . $key['profession_id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i>
                    </a>
                </td>
                <td style="text-transform: capitalize;"
                    contenteditable="true"
                    onBlur="saveToDatabase(this,'profession_name','<?php echo $key['profession_id']; ?>')"
                    onClick="showEdit(this);"
                ><?php echo $key['profession_name']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    function showEdit(editableObj) {
        $(editableObj).css("background", "#FFF");
    }
    function saveToDatabase(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $.ajax({
            url: "<?php echo base_url() . 'setting/update_profession' ?>",
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
    