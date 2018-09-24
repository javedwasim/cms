<div class="signature_table">
    <table class="table table-bordered" cellspacing="0" >
       <thead>
        <tr>
            <th style="width: 10%">Delete</th>
            <th >Name</th>
            <th >Qualification</th>
            <th>Designation</th>
            <th>Institute</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($sig_details as $details){ ?>
            <tr>
                <td style="width: 10%">
                    <a class="delete-signature btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('doctor_signature/delete_signature/') . $details['id'] ?>">
                       <i class="fa fa-trash" title="Delete"></i>
                    </a>
                </td>
                <td
                contenteditable="true"
                onBlur="saveToDatabase(this,'name','<?php echo $details['id']; ?>')"
                onClick="showEdit(this);"
                ><?php echo $details['name']; ?></td>
                <td
                contenteditable="true"
                onBlur="saveToDatabase(this,'qualifications','<?php echo $details['id']; ?>')"
                onClick="showEdit(this);"
                ><?php echo $details['qualifications']; ?></td>
                <td
                contenteditable="true"
                onBlur="saveToDatabase(this,'institute','<?php echo $details['id']; ?>')"
                onClick="showEdit(this);"
                ><?php echo $details['institute']; ?></td>
                <td
                contenteditable="true"
                onBlur="saveToDatabase(this,'designation','<?php echo $details['id']; ?>')"
                onClick="showEdit(this);"
                ><?php echo $details['designation']; ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>