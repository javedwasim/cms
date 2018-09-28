<div class="district_content">
    <table class="table table-bordered nowrap responsive" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th style="width:30px;"></th>
                <th>Districts</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($districts as $key) {
            ?>
            <tr>
                <td >
                    <a class="delete_district btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('setting/delete_district/') . $key['district_id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i>
                    </a>
                </td>
                <td
                    style="text-transform: capitalize;"
                    contenteditable="true" class="exam_cate"
                    onBlur="updatedistrict(this,'district_name','<?php echo $key['district_id']; ?>')"
                    onClick="showExamination(this);"
                ><?php echo $key['district_name']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    function showExamination(editableObj) {
        $('td.exam_cate').css('background', '#FFF');
        $('td.exam_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function updatedistrict(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'setting/update_district' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success == true) {
                    toastr["success"](response.message);
                }
            }
        });
        $(editableObj).css("color", "#212529");
    }
</script>