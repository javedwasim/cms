<div class="district_content">
    <table class="table table-bordered nowrap responsive" id="districts_tbl" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th style="width:30px;">Action</th>
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
                <td class="exam_cate" onClick="showExamination(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" value="<?php echo $key['district_name']; ?>"  onchange="updatedistrict(this,'district_name','<?php echo $key['district_id']; ?>')" style="text-transform: capitalize;" />
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    function showExamination(editableObj) {
        $("#districts_tbl tbody tr").click(function (e) {
            $('#districts_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function updatedistrict(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'setting/update_district' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + val + '&id=' + id,
            success: function (response) {
                if (response.success == true) {
                    toastr["success"](response.message);
                }else{
                     document.execCommand('undo');
                    toastr["error"](response.message);
                }
            }
        });
    }
</script>