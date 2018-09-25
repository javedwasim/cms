<div class="diary_sidebar">
    <table class="table table-bordered responsive" id="diray_table">
        <thead>
            <tr>
                <th style="width:20px;"></th>
                <th>Note Date</th>
                <th class="hide"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($notes_record as $details){?>
            <tr>
                <td>
                    <a class="delete-notes btn btn-danger btn-xs" href="javascript:void(0)" title="delete" data-href="<?php echo site_url('profile/delete_note/') . $details['id'] ?>">
                       <i class="fa fa-trash" title="Delete"></i>
                    </a>

                </td>
                <td><?php echo  date('d-m-Y h:i a', strtotime($details['updated_at'])); ?>
                </td>
                <td class="hide note_id"><?php echo $details['id']; ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table> 
</div>
    