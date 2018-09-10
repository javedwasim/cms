 
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" cellspacing="0" id="editable-datatable" width="100%">
                                    <thead class="tb-bg white-text">
                                        <tr>
                                            <th>Sr. no</th>
                                            <th>Order</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Appointment Taken</th>
                                            <th>Fee</th>
                                            <th>ETT Fee</th>
                                            <th>Echo Fee</th>
                                            <th>Fee Paid at</th>
                                            <th>Fee Collected By</th>
                                            <th>ETT Fee Paid at</th>
                                            <th>ETT Collected By</th>
                                            <th>Echo Fee Paid at</th>
                                            <th>Echo Collected By</th>
                                            <th>Refund</th>
                                            <th class="hide"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($booking_details as $details) { ?>
                                            <tr class="gradeX colorchnage">
                                                <td class="appointment_booking_id" >
                                                    <?php echo $details['appointment_booking_id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $details['order_number'];?>
                                                </td>
                                                <td>
                                                    <input type="text" name="full_name" id="input-name" onfocusout="valupdate(this)" autocomplete="off" maxlength="60" class="dt-input" value="<?php echo $details['full_name'] ?>">
                                                </td>
                                                <td>
                                                    <?php echo $details['contact_number'] ?>
                                                </td>
                                                <?php $datetime = date(' d-m-Y h:i a', strtotime($details['appointment_date'])); ?>
                                                <td class="center">
                                                    <?php echo $datetime ?>
                                                </td>
                                                <td>
                                                    <input type="text" name="consultant_fee" onfocusout="valupdate(this)" autocomplete="off" class="dt-input" value="<?php echo $details['consultant_fee'] ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="ett_fee" onfocusout="valupdate(this)" autocomplete="off" class="dt-input" value="<?php echo $details['ett_fee'] ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="echo_fee" onfocusout="valupdate(this)" autocomplete="off" class="dt-input" value="<?php echo $details['echo_fee'] ?>">
                                                </td>
                                                <td>
                                                    <?php 
                                                    if($details['fee_paid_at']=='0000-00-00 00:00:00' ){
                                                        echo "";
                                                    }else{
                                                        echo date(' d-m-Y h:i a', strtotime($details['fee_paid_at']));
                                                    }
                                                             
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $details['fee_collected_by'] ?>
                                                </td>
                                                
                                                <td>
                                                    <?php 
                                                    if($details['ett_fee_paid_at']=='0000-00-00 00:00:00' ){
                                                        echo "";
                                                    }else{
                                                        echo date(' d-m-Y h:i a', strtotime($details['ett_fee_paid_at']));
                                                    }        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $details['ett_fee_collected_by'] ?>
                                                </td>
                                                
                                                <td>
                                                    <?php 
                                                    if($details['echo_fee_paid_at']=='0000-00-00 00:00:00' ){
                                                        echo "";
                                                    }else{
                                                        echo date(' d-m-Y h:i a', strtotime($details['echo_fee_paid_at']));
                                                    }        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $details['echo_fee_collected_by'] ?>
                                                </td>
                                                <td>
                                                    <input type="text" name="refund" onfocusout="valupdate(this)"  autocomplete="off" class="dt-input" value="<?php echo $details['refund'] ?>">
                                                </td>
                                                <td class="hide">
                                                    <?php echo $details['fee_paid_status']?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>