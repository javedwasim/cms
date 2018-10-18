<div class="table-responsive">
    <?php
        if(isset($rights[0]['rights']))://print_r($rights[0]['rights']);
            $permissions = explode(',',$rights[0]['rights']);
        endif;
        $user_info = ($this->session->userdata('user_data_logged_in'));
    ?>
    <table class="table table-bordered" cellspacing="0" id="editable-datatable" width="100%">
        <thead class="tb-bg white-text">
            <tr>
                <th class="<?php echo !in_array("appointments-can_delete-0", $permissions)&&($user_info['is_admin']!=1)?"hide":''; ?>" >Action</th>
                <th>Sr</th>
                <th>Order</th>
                <th style="width:150px;">Name</th>
                <th>Contact</th>
                <th>Appointment Taken</th>
                <th>Fee</th>
                <th>ETT Fee</th>
                <th>Echo Fee</th>
                <th>Fee Paid at</th>
                <th class="hide">Fee Collected By</th>
                <th>ETT Fee Paid at</th>
                <th class="hide">ETT Collected By</th>
                <th>Echo Fee Paid at</th>
                <th class="hide">Echo Collected By</th>
                <th>Refund</th>
                <th class="hide"></th>
                <th class="hide"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($booking_flag == 'vip') {
                $bkarray=array();
                foreach ($consultant_booking as $key) {
                    $bkarray[$key['order_number']]['appointment_booking_id'] = $key['appointment_booking_id'] ;
                    $bkarray[$key['order_number']]['full_name'] = $key['full_name'] ;
                    $bkarray[$key['order_number']]['contact_number'] = $key['contact_number'] ;
                    $bkarray[$key['order_number']]['appointment_date'] = $key['appointment_date'] ;
                    $bkarray[$key['order_number']]['consultant_fee'] = $key['consultant_fee'] ;
                    $bkarray[$key['order_number']]['booked_by'] = $key['booked_by'] ;
                    $bkarray[$key['order_number']]['fee_paid_at'] = $key['fee_paid_at'] ;
                    $bkarray[$key['order_number']]['fee_collected_by'] = $key['fee_collected_by'] ;
                    $bkarray[$key['order_number']]['ett_fee'] = $key['ett_fee'] ;
                    $bkarray[$key['order_number']]['ett_fee_paid_at'] = $key['ett_fee_paid_at'] ;
                    $bkarray[$key['order_number']]['ett_fee_collected_by'] = $key['ett_fee_collected_by'] ;
                    $bkarray[$key['order_number']]['echo_fee'] = $key['echo_fee'] ;
                    $bkarray[$key['order_number']]['echo_fee_paid_at'] = $key['echo_fee_paid_at'] ;
                    $bkarray[$key['order_number']]['echo_fee_collected_by'] = $key['echo_fee_collected_by'] ;
                    $bkarray[$key['order_number']]['refund'] = $key['refund'] ;
                    $bkarray[$key['order_number']]['fee_paid_status'] = $key['fee_paid_status'] ;
                    $bkarray[$key['order_number']]['creation_time'] = $key['creation_time'] ;
                    $bkarray[$key['order_number']]['name_updated_by'] = $key['name_updated_by'] ;
                    $bkarray[$key['order_number']]['contact_updated_by'] = $key['contact_updated_by'] ;
                }
                for($i=1; $i<=5; $i++){
                    ?>
                <tr class="gradeX colorchnage">

                    <td class="<?php echo !in_array("appointments-can_delete-0", $permissions)&&($user_info['is_admin']!=1)?"hide":''; ?>">
                        <a href="javascript:void(0)" id="delete_single_patient" class="btn btn-danger btn-block btn-xs">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>

                    <td ><?php echo $i?></td>
                    <td class="order-number" ><?php echo $i?></td>
                    <td
                        data-toggle="tooltip" data-placement="top" data-trigger="hover" 
                        title="<?php 
                        if(isset($bkarray[$i]['name_updated_by']) && $user_info['is_admin']==1){
                            echo $bkarray[$i]['name_updated_by'];
                        }else{
                            echo "";
                        }?>"
                    >
                        <input type="text" name="full_name" style="text-transform: capitalize;width:150px;" id="patient-name" onchange="consultant_booking(this)" autocomplete="off" class="dt-input" value="<?php 
                        if(isset($bkarray[$i]['full_name']) && $user_info['is_admin']==1){
                            echo $bkarray[$i]['full_name'];
                        }else{
                            echo "";
                        }?>"
                        <?php  echo ($user_info['is_admin']!=1)&&($booking_flag == 'vip')?'readonly':''; ?>
                        >
                    </td>
                    <td
                        data-toggle="tooltip" data-placement="top" data-trigger="hover" 
                        title="<?php 
                        if(isset($bkarray[$i]['contact_updated_by']) && $user_info['is_admin']==1){
                            echo $bkarray[$i]['contact_updated_by'];
                        }else{
                            echo "";
                        }?>"
                    >
                       <input type="text" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" onchange="consultant_booking(this)" autocomplete="off" class="dt-input" value="<?php 
                        if(isset($bkarray[$i]['contact_number'])){
                            echo $bkarray[$i]['contact_number'];
                        }else{
                            echo "";
                        }?>">
                    </td>
                    <td class="center">
                        <?php
                            if(isset($bkarray[$i]['creation_time'])){
                                    if ($bkarray[$i]['creation_time'] == '0000-00-00 00:00:00') {
                                        echo "";
                                    } else {
                                        echo date(' d-m-Y h:i a', strtotime($bkarray[$i]['creation_time']));
                                    }
                            }else{
                                echo "";
                            }
                        ?>
                    </td>

                    <td data-toggle="tooltip" data-placement="top" data-trigger="hover" 
                        title="<?php 
                        if(isset($bkarray[$i]['fee_collected_by']) && $user_info['is_admin']==1){
                            echo $bkarray[$i]['fee_collected_by'];
                        }else{
                            echo "";
                        }?>">
                        <input type="text" name="consultant_fee" onchange="consultant_booking(this)" autocomplete="off" class="dt-input" value="<?php 
                        if(isset($bkarray[$i]['consultant_fee'])){
                            echo $bkarray[$i]['consultant_fee'];
                        }else{
                            echo "";
                        }?>">
                    </td>
                    <td
                            data-toggle="tooltip" data-placement="top"
                            title="<?php
                            if(isset($bkarray[$i]['ett_fee_collected_by']) && $user_info['is_admin']==1){
                                echo $bkarray[$i]['ett_fee_collected_by'];
                            }else{
                                echo "";
                            }?>"
                    >
                        <input type="text" name="ett_fee" onchange="consultant_booking(this)"  autocomplete="off" class="dt-input" value="<?php
                        if(isset($bkarray[$i]['ett_fee'])){
                            echo $bkarray[$i]['ett_fee'];
                        }else{
                            echo "";
                        }?>">
                    </td>
                    <td
                        data-toggle="tooltip" data-placement="top"
                        title="<?php
                        if(isset($bkarray[$i]['echo_fee_collected_by']) && $user_info['is_admin']==1){
                            echo $bkarray[$i]['echo_fee_collected_by'];
                        }else{
                            echo "";
                        }?>"
                    >
                        <input type="text" name="echo_fee" onchange="consultant_booking(this)" autocomplete="off" class="dt-input" value="<?php
                        if(isset($bkarray[$i]['echo_fee'])){
                            echo $bkarray[$i]['echo_fee'];
                        }else{
                            echo "";
                        }?>">
                    </td>
                    <td>
                        <?php
                            if(isset($bkarray[$i]['fee_paid_at'])){
                                    if ($bkarray[$i]['fee_paid_at'] == '0000-00-00 00:00:00') {
                                        echo "";
                                    } else {
                                        echo date(' d-m-Y h:i a', strtotime($bkarray[$i]['fee_paid_at']));
                                    }
                            }else{
                                echo "";
                            }
                        ?>
                    </td>
                    <td class="hide">
                        
                    </td>
                    <td>
                        <?php
                            if(isset($bkarray[$i]['ett_fee_paid_at'])){
                                    if ($bkarray[$i]['ett_fee_paid_at'] == '0000-00-00 00:00:00') {
                                        echo "";
                                    } else {
                                        echo date(' d-m-Y h:i a', strtotime($bkarray[$i]['ett_fee_paid_at']));
                                    }
                            }else{
                                echo "";
                            }
                        ?>
                    </td>
                    <td class="hide">
                        <?php 
                        if(isset($bkarray[$i]['ett_fee_collected_by'])){
                            echo $bkarray[$i]['ett_fee_collected_by'];
                        }else{
                            echo "";
                        }?>
                    </td>
                    <td>
                        <?php
                            if(isset($bkarray[$i]['echo_fee_paid_at'])){
                                    if ($bkarray[$i]['echo_fee_paid_at'] == '0000-00-00 00:00:00') {
                                        echo "";
                                    } else {
                                        echo date(' d-m-Y h:i a', strtotime($bkarray[$i]['echo_fee_paid_at']));
                                    }
                            }else{
                                echo "";
                            }
                        ?>
                    </td>
                    <td class="hide">
                        <?php 
                        if(isset($bkarray[$i]['echo_fee_collected_by'])){
                            echo $bkarray[$i]['echo_fee_collected_by'];
                        }else{
                            echo "";
                        }?>
                    </td>
                    <td>
                        <input type="text" name="refund" onchange="consultant_booking(this)" autocomplete="off" class="dt-input" value="<?php 
                        if(isset($bkarray[$i]['refund'])){
                            echo $bkarray[$i]['refund'];
                        }else{
                            echo "";
                        }?>">
                    </td>
                    
                    <td class="appointment_booking_id hide" >
                        <?php 
                        if(isset($bkarray[$i]['appointment_booking_id'])){
                            echo $bkarray[$i]['appointment_booking_id'];
                        }else{
                            echo "";
                        }?>
                    </td>
                    <td class="hide booking_status_id">
                        <?php 
                        if(isset($bkarray[$i]['fee_paid_status'])){
                            echo $bkarray[$i]['fee_paid_status'];
                        }else{
                            echo "";
                        }?>
                    </td>
                </tr>
            <?php 
        }
            $order = 5;
            foreach ($booking_details as $details) { 
                $order +=1;
                ?>

                <tr class="gradeX colorchnage">
                    <td class="<?php echo !in_array("appointments-can_delete-0", $permissions)&&($user_info['is_admin']!=1)?"hide":''; ?>">
                        <a href="javascript:void(0)" id="delete_single_patient" class="btn btn-danger btn-block btn-xs">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                    <td ><?php echo $order; ?></td>
                    <td>
                        <?php echo $details['order_number']; ?>
                    </td>
                    <td
                        data-toggle="tooltip" data-placement="top" data-trigger="hover" 
                        title="<?php 
                        if(isset($details['name_updated_by'])){
                            echo $details['name_updated_by'];
                        }else{
                            echo "";
                        }?>"
                    >
                        <input type="text" name="full_name" style="text-transform: capitalize;width:150px;" id="input-name" onchange="valupdate(this)" autocomplete="off" class="dt-input" value="<?php echo $details['full_name'] ?>" <?php  echo ($user_info['is_admin']!=1)&&($booking_flag == 'vip')?'readonly':''; ?>>
                    </td>
                    <td>
                        <?php echo $details['contact_number'] ?>
                    </td>
                    <?php $datetime = date(' d-m-Y h:i a', strtotime($details['creation_time'])); ?>
                    <td class="center">
                        <?php echo $datetime ?>
                    </td>
                    <td
                        data-toggle="tooltip" data-placement="top" data-trigger="hover" 
                        title="<?php 
                        if(isset($details['fee_collected_by']) && $user_info['is_admin']==1){
                            echo $details['fee_collected_by'];
                        }else{
                            echo "";
                        }?>"
                        >
                        <input type="text" name="consultant_fee" <?php  echo (in_array("edit_profile-0", $permissions))&&($details['consultant_fee']>0)?'readonly':''; ?>
                               onchange="valupdate(this)" autocomplete="off" class="dt-input" value="<?php echo $details['consultant_fee'] ?>">
                    </td>
                    <td
                        data-toggle="tooltip" data-placement="top" data-trigger="hover" 
                        title="<?php 
                        if(isset($details['ett_fee_collected_by']) && $user_info['is_admin']==1){
                            echo $details['ett_fee_collected_by'];
                        }else{
                            echo "";
                        }?>"
                        >
                        <input type="text" name="ett_fee" onchange="valupdate(this)" <?php  echo (in_array("edit_profile-0", $permissions))&&($details['ett_fee']>0)?'readonly':''; ?>
                               autocomplete="off" class="dt-input" value="<?php echo $details['ett_fee'] ?>">
                    </td>
                    <td
                        data-toggle="tooltip" data-placement="top" data-trigger="hover" 
                        title="<?php 
                        if(isset($details['echo_fee_collected_by']) && $user_info['is_admin']==1){
                            echo $details['echo_fee_collected_by'];
                        }else{
                            echo "";
                        }?>"
                        >
                        <input type="text" name="echo_fee" onchange="valupdate(this)" <?php  echo (in_array("edit_profile-0", $permissions))&&($details['echo_fee']>0)?'readonly':''; ?>
                               autocomplete="off" class="dt-input" value="<?php echo $details['echo_fee'] ?>">
                    </td>
                    <td>
                        <?php
                        if ($details['fee_paid_at'] == '0000-00-00 00:00:00') {
                            echo "";
                        } else {
                            echo date(' d-m-Y h:i a', strtotime($details['fee_paid_at']));
                        }
                        ?>
                    </td>
                    <td class="hide">
                        <?php echo $details['fee_collected_by'] ?>
                    </td>
                    <td>
                        <?php
                        if ($details['ett_fee_paid_at'] == '0000-00-00 00:00:00') {
                            echo "";
                        } else {
                            echo date(' d-m-Y h:i a', strtotime($details['ett_fee_paid_at']));
                        }
                        ?>
                    </td>
                    <td class="hide">
                        <?php echo $details['ett_fee_collected_by'] ?>
                    </td>
                    <td>
                        <?php
                        if ($details['echo_fee_paid_at'] == '0000-00-00 00:00:00') {
                            echo "";
                        } else {
                            echo date(' d-m-Y h:i a', strtotime($details['echo_fee_paid_at']));
                        }
                        ?>
                    </td>
                    <td class="hide">
                        <?php echo $details['echo_fee_collected_by'] ?>
                    </td>
                    <td>
                        <input type="text" name="refund" onchange="valupdate(this)"  <?php  echo (in_array("edit_profile-0", $permissions))&&($details['refund']>0)?'readonly':''; ?>
                               autocomplete="off" class="dt-input" value="<?php echo $details['refund'] ?>">
                    </td>
                    <td class="appointment_booking_id hide" >
                        <?php echo $details['appointment_booking_id'] ?>
                    </td>
                    <td class="hide booking_status_id">
                        <?php echo $details['fee_paid_status'] ?>
                    </td>
                </tr>
            <?php }
            }else{ 
            $order = 0;
            foreach ($booking_details as $details) { 
                $order +=1;
                ?>

                <tr class="gradeX colorchnage">
                    <td class="<?php echo !in_array("appointments-can_delete-0", $permissions)&&($user_info['is_admin']!=1)?"hide":''; ?>">
                        <a href="javascript:void(0)" id="delete_single_patient" class="btn btn-danger btn-block btn-xs">
                            <i class="fa fa-trash"></i>
                        </a>
                     </td>
                    <td ><?php echo $order; ?></td>
                    <td>
                        <?php echo $details['order_number']; ?>
                    </td>
                    <td data-toggle="tooltip" data-placement="top" data-trigger="hover" 
                        title="<?php 
                        if(isset($details['name_updated_by']) && $user_info['is_admin']==1){
                            echo $details['name_updated_by'];
                        }else{
                            echo "";
                        }?>">
                        <input type="text" name="full_name" style="text-transform: capitalize;width:150px;" id="input-name" onchange="valupdate(this)" autocomplete="off" class="dt-input" value="<?php echo $details['full_name'] ?>">
                    </td>
                    <td data-toggle="tooltip" data-placement="top" data-trigger="hover" 
                        title="<?php 
                        if(isset($details['contact_updated_by']) && $user_info['is_admin']==1){
                            echo $details['contact_updated_by'];
                        }else{
                            echo "";
                        }?>">
                        <?php echo $details['contact_number'] ?>
                    </td>
                    <?php $datetime = date(' d-m-Y h:i a', strtotime($details['creation_time'])); ?>
                    <td class="center">
                        <?php echo $datetime ?>
                    </td>
                    <td
                    data-toggle="tooltip" data-placement="top" data-trigger="hover"
                    title="<?php
                    if(isset($details['fee_collected_by']) && $user_info['is_admin']==1){
                        echo $details['fee_collected_by'];
                    }else{
                        echo "";
                    }?>"
                    >
                        <input type="text" name="consultant_fee" onchange="valupdate(this)"  <?php  echo (in_array("edit_profile-0", $permissions))&&($details['consultant_fee']>0)?'readonly':''; ?>
                               autocomplete="off" class="dt-input" value="<?php echo $details['consultant_fee'] ?>">
                    </td>
                    <td data-toggle="tooltip" data-placement="top" data-trigger="hover"
                        title="<?php
                        if(isset($details['ett_fee_collected_by']) && $user_info['is_admin']==1){
                            echo $details['ett_fee_collected_by'];
                        }else{
                            echo "";
                        }?>">
                        <input type="text" name="ett_fee" onchange="valupdate(this)" <?php  echo (in_array("edit_profile-0", $permissions))&&($details['ett_fee']>0)?'readonly':''; ?>
                               autocomplete="off" class="dt-input" value="<?php echo $details['ett_fee'] ?>">
                    </td>
                    <td
                        data-toggle="tooltip" data-placement="top" data-trigger="hover"
                        title="<?php
                        if(isset($details['echo_fee_collected_by']) && $user_info['is_admin']==1){
                            echo $details['echo_fee_collected_by'];
                        }else{
                            echo "";
                        }?>"
                    >
                        <input type="text" name="echo_fee" onchange="valupdate(this)" <?php  echo (in_array("edit_profile-0", $permissions))&&($details['echo_fee']>0)?'readonly':''; ?>
                               autocomplete="off" class="dt-input" value="<?php echo $details['echo_fee'] ?>">
                    </td>
                    <td>
                        <?php
                        if ($details['fee_paid_at'] == '0000-00-00 00:00:00') {
                            echo "";
                        } else {
                            echo date(' d-m-Y h:i a', strtotime($details['fee_paid_at']));
                        }
                        ?>
                    </td>
                    <td class="hide">
                        <?php echo $details['fee_collected_by'] ?>
                    </td>

                    <td>
                        <?php
                        if ($details['ett_fee_paid_at'] == '0000-00-00 00:00:00') {
                            echo "";
                        } else {
                            echo date(' d-m-Y h:i a', strtotime($details['ett_fee_paid_at']));
                        }
                        ?>
                    </td>
                    <td class="hide">
                        <?php echo $details['ett_fee_collected_by'] ?>
                    </td>

                    <td>
                        <?php
                        if ($details['echo_fee_paid_at'] == '0000-00-00 00:00:00') {
                            echo "";
                        } else {
                            echo date(' d-m-Y h:i a', strtotime($details['echo_fee_paid_at']));
                        }
                        ?>
                    </td>
                    <td class="hide">
                        <?php echo $details['echo_fee_collected_by'] ?>
                    </td>
                    <td>
                        <input type="text" name="refund" onchange="valupdate(this)"  <?php  echo (in_array("edit_profile-0", $permissions))&&($details['refund']>0)?'readonly':''; ?>
                               autocomplete="off" class="dt-input" value="<?php echo $details['refund'] ?>">
                    </td>
                    
                    <td class="appointment_booking_id hide" >
                        <?php echo $details['appointment_booking_id'] ?>
                    </td>
                    <td class="hide booking_status_id">
                        <?php echo $details['fee_paid_status'] ?>
                    </td>
                </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</div>