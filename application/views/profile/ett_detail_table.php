<?php
    if(isset($rights[0]['user_rights'])){//print_r($rights[0]['rights']);
        $permissions = explode(',',$rights[0]['user_rights']);
    }else{
        $permissions = array();
    }
    $user_info = ($this->session->userdata('user_data_logged_in'));
?>
<table class="table table-bordered nowrap responsive" cellspacing="0" id="ett_details_table" width="100%" >
    <thead>
    <tr>
        <th style="width: 20px" class="<?php echo in_array("ett-can_delete-0", $permissions)?"op-hide":''; ?>"></th>
        <th style="width: 20px" class="<?php echo in_array("ett-can_edit-0", $permissions)?"op-hide":''; ?>"></th>
        <th style="width: 20px"></th>
        <th style="width: 50px;">ETT Date</th>
    </tr>
    </thead>
        <tbody>
            <?php foreach ($details as $detail): ?>
                <tr style="cursor: pointer;">
                    <td style="width: 20px" class="<?php echo in_array("ett-can_delete-0", $permissions)?"op-hide":''; ?>"><a href="javascript:void(0)" class="btn btn-danger btn-xs"  onClick="deleteEttDetail(this,'<?php echo $detail['id']; ?>','<?php echo $detail['patient_id']; ?>');"><i class="fa fa-trash"></i></a></td>
                    <td style="padding: 0px;" class="<?php echo in_array("ett-can_edit-0", $permissions)?"op-hide":''; ?>">
                        <button class="btn btn-info btn-xs" onClick="showEditEttDetail(this,'<?php echo $detail['id']; ?>','<?php echo $detail['patient_id']; ?>');" style="margin: 0px;"><i class="fa fa-edit" id="echo_detail_btn"></i></button>
                    </td>
                    <td style="width: 20px"><a class="btn btn-success btn-xs" onClick="printEtt(this,'<?php echo $detail['id']; ?>','<?php echo $detail['patient_id']; ?>');" style="margin: 0px;" href="javascript:void(0)"><i class="fa fa-print"></i></a></td>
                    <td style="width: 100px;"><?php echo date('Y-m-d',strtotime($detail['created_at'])) ?></td>
                    <td class="hide etttestid"><?php echo $detail['id']; ?></td>
                    <td class="hide patid"><?php echo $detail['patient_id']; ?></td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>