<div class="diary_sidebar">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Select User:</label>
                <select class="form-control">
                    <option>Select...</option>
                    <option value="admin">admin</option>
                    <option value="test">test</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <h5>Double Click to Edit</h5>
            <table class="table table-bordered responsive">
                <thead>
                    <tr>
                        <th style="width:20px;"></th>
                        <th>Note Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($note_details as $details){?>
                    <tr>
                        <td>
                            <a class="delete-notes btn btn-danger btn-xs" href="javascript:void(0)" title="delete" data-href="<?php echo site_url('profile/delete_note/') . $details['id'] ?>">
                               <i class="fa fa-trash" title="Delete"></i>
                            </a>                            
                        </td>
                        <td><?php echo  date('d-m-Y h:i a', strtotime($details['updated_at'])); ?>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    