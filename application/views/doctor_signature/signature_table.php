<div class="signature_table">
    <table class="table table-bordered tbl_header_fix" id="doc_sig_tbl" cellspacing="0" >
       <thead>
        <tr>
            <th style="width: 6%">Delete</th>
            <th style="width:20%;" >Name</th>
            <th style="width:20%;">Qualification</th>
            <th style="width:20%;">Designation</th>
            <th style="width:20%;">Institute</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($sig_details as $details){ ?>
            <tr>
                <td style="width: 5%">
                    <a class="delete-signature btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('doctor_signature/delete_signature/') . $details['id'] ?>">
                       <i class="fa fa-trash" title="Delete"></i>
                    </a>
                </td>
                <td
                contenteditable="true" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';"
                onBlur="updateSignature(this,'name','<?php echo $details['id']; ?>')"
                onClick="showEdit(this);"
                ><?php echo $details['name']; ?></td>
                <td
                contenteditable="true" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';"
                onBlur="updateSignature(this,'qualifications','<?php echo $details['id']; ?>')"
                onClick="showEdit(this);"
                ><?php echo $details['qualifications']; ?></td>
                <td
                contenteditable="true" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';"
                onBlur="updateSignature(this,'institute','<?php echo $details['id']; ?>')"
                onClick="showEdit(this);"
                ><?php echo $details['institute']; ?></td>
                <td
                contenteditable="true" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';"
                onBlur="updateSignature(this,'designation','<?php echo $details['id']; ?>')"
                onClick="showEdit(this);"
                ><?php echo $details['designation']; ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $("#doc_sig_tbl tbody tr").click(function () {
        $('#doc_sig_tbl tbody tr.row_selected').removeClass('row_selected');
        $(this).addClass('row_selected');
    });
</script>