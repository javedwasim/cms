<div class="table-responsive">
    <?php
        if(isset($rights[0]['user_rights']))://print_r($rights[0]['rights']);
            $permissions = explode(',',$rights[0]['user_rights']);
        endif;
        $user_info = ($this->session->userdata('user_data_logged_in'));
    ?>
    <table class="table table-bordered nowrap" cellspacing="0" id="editable-datatable" width="100%">
        <thead class="tb-bg white-text">
            <tr>
                <th class="<?php echo in_array("appointments-can_delete-0", $permissions)?"hide":''; ?>" >Action</th>
                <th>Sr No.</th>
                <th style="width: 15px !important;">Order</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Appointment Taken</th>
                <th>Fee</th>
                <th>ETT Fee</th>
                <th>Echo Fee</th>
                <th>Fee Paid at &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th class="hide">Fee Collected By</th>
                <th>ETT Fee Paid at &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th class="hide">ETT Collected By</th>
                <th>Echo Fee Paid at &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
                    <td class="<?php echo in_array("appointments-can_delete-0", $permissions)?"hide":''; ?>">
                        <a href="javascript:void(0)" id="delete_single_patient" class="btn btn-danger btn-block btn-xs">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                    <td ><?php echo $i?></td>
                    <td class="order-number" style="width: 15px !important; " ><?php echo $i?></td>
                    <td
                        data-toggle="tooltip" data-placement="top" data-trigger="hover" 
                        title="<?php 
                        if(isset($bkarray[$i]['name_updated_by']) && $user_info['is_admin']==1){
                            echo $bkarray[$i]['name_updated_by'];
                        }else{
                            echo "";
                        }?>"
                    >
                        <input type="text" name="full_name" autocomplete="off"
                            style="text-transform: capitalize; background: transparent;border: 0;" 
                            id="patient-name" onchange="consultant_booking(this)" maxlength="25"  
                            <?php 
                            if(isset($bkarray[$i]['full_name'])){
                                echo (in_array("appointments-can_edit-0", $permissions)) || (($bkarray[$i]['full_name'] != '')&&($user_info['is_admin']!=1))?'readonly':''; 
                            ?>
                            value="<?php echo $bkarray[$i]['full_name']; ?>"   
                            <?php }else{ ?>
                                 value="<?php echo ""; ?>"
                            <?php }?>
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
                       <input type="text" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" 
                            maxlength="11"  name="contact_number" onchange="consultant_booking(this)" autocomplete="off" style="background: transparent;border: 0;"
                            <?php 
                            if(isset($bkarray[$i]['contact_number'])){
                                echo (in_array("appointments-can_edit-0", $permissions)) || (($bkarray[$i]['contact_number'] != '')&&($user_info['is_admin']!=1))?'readonly':''; 
                            ?>
                            value="<?php echo $bkarray[$i]['contact_number']; ?>"   
                            <?php }else{ ?>
                                 value="<?php echo ""; ?>"
                            <?php }?> >
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
                        <input type="text" name="consultant_fee" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" onchange="consultant_booking(this)" autocomplete="off" class="dt-input" maxlength="5" 
                        <?php 
                            if(isset($bkarray[$i]['consultant_fee'])){
                                echo (in_array("appointments-can_edit-0", $permissions)) || (($bkarray[$i]['consultant_fee'] > 0)&&($user_info['is_admin']!=1))?'readonly':''; 
                        ?>
                            value="<?php echo $bkarray[$i]['consultant_fee']; ?>"   
                        <?php }else{ ?>
                             value="<?php echo ""; ?>"
                        <?php }?>>
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
                        <input type="text" name="ett_fee" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" onchange="consultant_booking(this)"
                            autocomplete="off" class="dt-input" maxlength="5" 
                        <?php 
                            if(isset($bkarray[$i]['ett_fee'])){
                                echo (in_array("appointments-can_edit-0", $permissions)) || (($bkarray[$i]['ett_fee'] > 0)&&($user_info['is_admin']!=1))?'readonly':''; 
                        ?>
                            value="<?php echo $bkarray[$i]['ett_fee']; ?>"   
                        <?php }else{ ?>
                             value="<?php echo ""; ?>"
                        <?php }?>>
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
                        <input type="text" name="echo_fee" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" onchange="consultant_booking(this)" 
                            autocomplete="off" class="dt-input" maxlength="5"
                            <?php 
                                if(isset($bkarray[$i]['echo_fee'])){
                                    echo (in_array("appointments-can_edit-0", $permissions)) || (($bkarray[$i]['echo_fee'] > 0)&&($user_info['is_admin']!=1))?'readonly':''; 
                            ?>
                                value="<?php echo $bkarray[$i]['echo_fee']; ?>"   
                            <?php }else{ ?>
                                 value="<?php echo ""; ?>"
                            <?php }?>>
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
                        <input type="text" name="refund" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" onchange="consultant_booking(this)" autocomplete="off" <?php  echo ($user_info['is_admin']!=1)?'readonly':''; ?> class="dt-input" maxlength="5" value="<?php 
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
                    <td class="<?php echo in_array("appointments-can_delete-0", $permissions)?"hide":''; ?>">
                        <a href="javascript:void(0)" id="delete_single_patient" class="btn btn-danger btn-block btn-xs">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                    <td ><?php echo $order; ?></td>
                    <td style="width: 15px !important;">
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
                        <input type="text" name="full_name" style="text-transform: capitalize; background: transparent;border: 0;" id="input-name" onchange="valupdate(this)" maxlength="25" 
                            autocomplete="off" value="<?php echo $details['full_name'] ?>" 
                            <?php  echo (in_array("appointments-can_edit-0", $permissions)) || (($details['full_name'] != '')&&($user_info['is_admin']!=1))?'readonly':''; ?>>
                    </td>
                    <td data-toggle="tooltip" data-placement="top" data-trigger="hover" 
                        title="<?php 
                        if(isset($details['contact_updated_by']) && $user_info['is_admin']==1){
                            echo $details['contact_updated_by'];
                        }else{
                            echo "";
                        }?>">
                        <input type="text" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" style="background: transparent;border: 0;"
                            name="contact_number" onchange="valupdate(this)"
                            autocomplete="off" maxlength="11"
                            value="<?php 
                                if(isset($details['contact_number'])){
                                    echo $details['contact_number'];
                                }else{
                                    echo "";
                            }?>"
                        <?php  echo (in_array("appointments-can_edit-0", $permissions)) || (($details['contact_number'] != '')&&($user_info['is_admin']!=1))?'readonly':''; ?>
                        >
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
                        <input type="text" name="consultant_fee" maxlength="5" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" 
                            <?php  echo (in_array("appointments-can_edit-0", $permissions)) || (($details['consultant_fee']>0)&&($user_info['is_admin']!=1))?'readonly':''; ?>
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
                        <input type="text" name="ett_fee" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" maxlength="5" onchange="valupdate(this)"
                            <?php  echo (in_array("appointments-can_edit-0", $permissions)) || (($details['ett_fee']>0)&&($user_info['is_admin']!=1))?'readonly':''; ?>
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
                        <input type="text" name="echo_fee" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number"  maxlength="5" onchange="valupdate(this)" 
                            <?php  echo (in_array("appointments-can_edit-0", $permissions)) || (($details['echo_fee']>0)&&($user_info['is_admin']!=1))?'readonly':''; ?>
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
                        <input type="text" name="refund" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" maxlength="5" onchange="valupdate(this)"  
                            <?php  echo ($user_info['is_admin']!=1)?'readonly':''; ?>
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
                    <td class="<?php echo in_array("appointments-can_delete-0", $permissions)?"hide":''; ?>">
                        <a href="javascript:void(0)" id="delete_single_patient" class="btn btn-danger btn-block btn-xs">
                            <i class="fa fa-trash"></i>
                        </a>
                     </td>
                    <td style="width: 15px !important;"><?php echo $order; ?></td>
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
                        <input type="text" name="full_name" style="text-transform: capitalize; background: transparent;border: 0;" id="input-name" onchange="valupdate(this)" maxlength="25" autocomplete="off" value="<?php echo $details['full_name'] ?>"
                        <?php  echo (in_array("appointments-can_edit-0", $permissions)) || (($details['full_name'] != '')&&($user_info['is_admin']!=1))?'readonly':''; ?>>
                    </td>
                    <td data-toggle="tooltip" data-placement="top" data-trigger="hover" 
                        title="<?php 
                        if(isset($details['contact_updated_by']) && $user_info['is_admin']==1){
                            echo $details['contact_updated_by'];
                        }else{
                            echo "";
                        }?>">
                        <input type="text" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));"  style="background: transparent;border: 0;"
                            name="contact_number" onchange="valupdate(this)"
                            autocomplete="off" maxlength="11" value="<?php 
                            if(isset($details['contact_number'])){
                                echo $details['contact_number'];
                            }else{
                                echo "";
                            }?>"
                            <?php  echo (in_array("appointments-can_edit-0", $permissions)) || (($details['contact_number'] != '')&&($user_info['is_admin']!=1))?'readonly':''; ?>
                        >
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
                        <input type="text" name="consultant_fee" maxlength="5" 
                            onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" onchange="valupdate(this)" autocomplete="off" class="dt-input" value="<?php echo $details['consultant_fee'] ?>"
                            <?php  echo (in_array("appointments-can_edit-0", $permissions)) || (($details['consultant_fee'] > 0)&&($user_info['is_admin']!=1))?'readonly':''; ?>>
                    </td>
                    <td data-toggle="tooltip" data-placement="top" data-trigger="hover"
                        title="<?php
                        if(isset($details['ett_fee_collected_by']) && $user_info['is_admin']==1){
                            echo $details['ett_fee_collected_by'];
                        }else{
                            echo "";
                        }?>">
                        <input type="text" name="ett_fee" maxlength="5" class="dt-input"
                            onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" onchange="valupdate(this)" autocomplete="off" value="<?php echo $details['ett_fee'] ?>"
                        <?php  echo (in_array("appointments-can_edit-0", $permissions)) || (($details['ett_fee'] > 0)&&($user_info['is_admin']!=1))?'readonly':''; ?>>
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
                        <input type="text" name="echo_fee" maxlength="5" onchange="valupdate(this)"
                                onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" autocomplete="off" class="dt-input" value="<?php echo $details['echo_fee'] ?>"
                        <?php  echo (in_array("appointments-can_edit-0", $permissions)) || (($details['echo_fee'] > 0)&&($user_info['is_admin']!=1))?'readonly':''; ?>>
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
                        <input type="text" name="refund" maxlength="5"  
                                onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="contact_number" onchange="valupdate(this)"  <?php  echo ($user_info['is_admin']!=1)?'readonly':''; ?>
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