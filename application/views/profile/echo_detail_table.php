<?php
    if(isset($rights[0]['user_rights'])){//print_r($rights[0]['rights']);
        $permissions = explode(',',$rights[0]['user_rights']);
    }else{
        $permissions = array();
    }
    $user_info = ($this->session->userdata('user_data_logged_in'));
?>
<table class="table table-bordered nowrap responsive" cellspacing="0" id="echo_details_table" width="100%" >
    <thead>
    <tr>
        <th style="width: 20px" class="<?php echo in_array("echos-can_delete-0", $permissions)?"op-hide":''; ?>" ></th>
        <th style="width: 20px" class="<?php echo in_array("echos-can_edit-0", $permissions)?"op-hide":''; ?>"></th>
        <th style="width: 20px"></th>
        <th style="width: 100px;">Echo Date</th>
    </tr>
    </thead>
        <tbody>
            <?php foreach ($details as $detail): ?>
                <tr>
                    <td style="width: 20px" class="<?php echo in_array("echos-can_delete-0", $permissions)?"op-hide":''; ?>"><a href="javascript:void(0)" class="btn btn-danger btn-xs" onClick="echotestDelete(this,'<?php echo $detail['id']; ?>','<?php echo $detail['patient_id']; ?>');"><i class="fa fa-trash"></i></a></td>
                    <td class="<?php echo in_array("echos-can_edit-0", $permissions)?"op-hide":''; ?>">
                        <a href="javascript:void(0)" class="btn btn-info btn-xs" onClick="showEditEchoDetail(this,'<?php echo $detail['id']; ?>','<?php echo $detail['patient_id']; ?>');" ><i class="fa fa-edit" id="echo_detail_btn"></i>
                    </td>
                    <td style="width: 20px"><a href="javascript:void(0)" class="btn btn-success btn-xs" onClick="printechotest(this,'<?php echo $detail['id']; ?>','<?php echo $detail['patient_id']; ?>')"><i class="fa fa-print"></i></a></td>
                    <td style="width: 50px; cursor: pointer;"><?php echo date('Y-m-d',strtotime($detail['created_at'])) ?></td>
                    <td class="hide echotestid"><?php echo $detail['id']; ?></td>
                    <td class="hide echopatid"><?php echo $detail['patient_id']; ?></td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>