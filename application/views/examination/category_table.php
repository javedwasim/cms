<?php
if(isset($rights[0]['user_rights']))
{
    $appointment_rights = explode(',',$rights[0]['user_rights']);
    //print_r($appointment_rights);
    $loggedin_user = $this->session->userdata('userdata');
}
?>
<table class="table table-bordered nowrap responsive datatables" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 10%">Delete</th>
        <th class="table-header">Category Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr class="table-row">
            <td>
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-examination btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('examination/delete_examination_category/') . $category['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } elseif(in_array("examinations-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-examination btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('examination/delete_examination_category/') . $category['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } ?>

            </td>

            <?php if($loggedin_user['is_admin']==1){ ?>
                <td contenteditable="true"
                    onBlur="saveExamination(this,'cate_name','<?php echo $category['id']; ?>')"
                    onClick="showExamination(this);">
                    <?php echo $category['name']; ?></td>
            <?php } elseif(in_array("examinations-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td contenteditable="true"
                    onBlur="saveExamination(this,'cate_name','<?php echo $category['id']; ?>')"
                    onClick="showExamination(this);">
                    <?php echo $category['name']; ?></td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $category['name']; ?></td>
            <?php } ?>


        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    function showError() {
        toastr["error"]('You are not authorised for this action.');
    }
    function showExamination(editableObj) {
        $(editableObj).css("background", "#FFF");
    }
    function saveExamination(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $.ajax({
            url: "<?php echo base_url() . 'examination/save_examination_category' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                }
            }
        });
    }

</script>