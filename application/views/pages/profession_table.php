<div class="profession_table">
    <table class="table table-bordered nowrap responsive tbl_header_fix" id="profession_tbl" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th style="width:50px;">Action</th>
                <th>Profession</th>
            </tr>
        </thead>
        <form id="professions_form">
            <tbody style="height: 69vh">
                <?php
                    foreach ($professions as $key) {
                ?>
                <tr>
                    <td style="width:50px;">
                        <a class="delete_profession btn btn-danger btn-xs"
                           href="javascript:void(0)" title="delete"
                           data-href="<?php echo site_url('setting/delete_profession/') . $key['profession_id'] ?>">
                            <i class="fa fa-trash" title="Delete"></i>
                        </a>
                    </td>
                    <td class="exam_cate" onClick="showExamination(this);">
                    <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo $key['profession_name']; ?>" onchange="updateprofession(this,'profession_name','<?php echo $key['profession_id']; ?>')" style="text-transform: capitalize;" /> 
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </form>
    </table>
</div>
<script type="text/javascript">
    function showExamination(editableObj) {
        $("#profession_tbl tbody tr").click(function (e) {
            $('#profession_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function updateprofession(editableObj, column, id) {
        var editableObj = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'setting/update_profession' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj + '&id=' + id,
            success: function (response) {
                if (response.success==true) {
                    toastr["success"](response.message);
                }else{
                    document.execCommand('undo');
                    toastr["error"](response.message);
                }
            }
        });
    }
    // $(document).ready(function () {
    //     // $('input.dbedit').attr('readonly','readonly');
    //     $('input.dbedit').on('blur',function(){
    //         $(this).attr('readonly','readonly'); //or use readonly
    //     });
    //     $('input.dbedit').dblclick(function(){
    //         $(this).removeAttr('readonly'); //or use readonly attribute
    //     });
    // });
</script>
    