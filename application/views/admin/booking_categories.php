<?php
    $user_info = ($this->session->userdata('user_data_logged_in'));
    if($user_info['is_admin']==1){
?>
<div class="booking_category_tables">
    <div class="row" style="margin:0px;">
        <div class="col-lg-4 p-0">
            <div class="card p-0">
                <div class="card-header myHeader" style="display: inline-flex;">
                    <button class="btn btn-block btn-success col-md-6" id="time_consultant">Time by Consultant</button>
                    <button class="btn btn-block btn-info col-md-6" id="print_vip">Print List</button>
                </div>
                <div class="card-body p-t-0">
                    <table class="table table-bordered nowrap responsive booking_tables" cellspacing="0" id="" width="100%" >
                       <thead>
                        <tr>
                            <th>Sr</th>
                            <th class="hide">Order</th>
                            <th style="width: 150px;">Name</th>
                            <th>Contact</th>
                            <th>Appointment Taken</th>
                            <th>Shift</th>
                            <th class="hide"></th>
                            <th class="hide"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
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
                        }
                            

                        for($i=1; $i<=5; $i++){
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td class="hide"><?php echo $i?></td>
                        <td style="width:150px;text-transform: capitalize;">
                            <?php 
                                if(isset($bkarray[$i]['full_name'])){
                                    echo $bkarray[$i]['full_name'];
                                }else{
                                    echo "";
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                if(isset($bkarray[$i]['contact_number'])){
                                    echo $bkarray[$i]['contact_number'];
                                }else{
                                    echo "";
                                }
                            ?>
                        </td>
                        <td>
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
                        <td>
                            <div class="form-group" >
                                <select class="form-control transfer_patient">
                                    <option>Select</option>
                                    <option value="on_walk">On Walk IN</option>
                                    <option value="on_call">On Call</option>
                                </select>
                            </div>
                        </td>
                        <td class="hide vip_trans">
                            <?php 
                                if(isset($bkarray[$i]['appointment_booking_id'])){
                                    echo $bkarray[$i]['appointment_booking_id'];
                                }else{
                                    echo "";
                                }
                            ?>
                        </td>
                        <td class="hide">
                            <?php 
                                if(isset($bkarray[$i]['fee_paid_status'])){
                                    echo $bkarray[$i]['fee_paid_status'];
                                }else{
                                    echo "";
                                }
                            ?>
                        </td>
                    </tr>
                        <?php
                    }
                        $order = 5;
                        foreach ($booking_vip as $details) {
                            $order+=1;
                            ?>
                            <tr class="gradeX colorchnage">
                                <td><?php echo $order; ?></td>
                                <td class="hide">
                                    <?php echo $details['order_number'];?>
                                </td>
                                <td style="width:150px; text-transform: capitalize;">
                                    <?php echo $details['full_name'] ?>
                                </td>
                                <td>
                                    <?php echo $details['contact_number'] ?>
                                </td>
                                <?php $datetime = date(' d-m-Y h:i a', strtotime($details['appointment_date'])); ?>
                                <td class="center">
                                    <?php echo $datetime ?>
                                </td>
                                <td>
                                    <div class="form-group" >
                                        <select class="form-control transfer_patient">
                                            <option>Select</option>
                                            <option value="on_walk">On Walk IN</option>
                                            <option value="on_call">On Call</option>
                                        </select>
                                    </div>
                                </td>
                                <td class="hide vip_trans">
                                    <?php echo $details['appointment_booking_id']?>
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
        <div class="col-lg-4 p-0">
            <div class="card p-0">
                <div class="card-header myHeader" style="display: inline-flex;">
                    <button class="btn btn-block btn-info col-md-6" id="time_on_walk">Time on walk in</button>
                    <button class="btn btn-block btn-info col-md-6" id="print_onwalk">Print List</button>
                </div>
                <div class="card-body p-t-0">
                    <table class="table table-bordered nowrap responsive booking_tables" cellspacing="0" id="" width="100%" >
                       <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Order</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Appointment Taken</th>
                            <th>Shift</th>
                            <th class="hide"></th>
                            <th class="hide"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $order = 0;
                        foreach ($booking_onwalk as $details){
                            $order+=1;
                            ?>
                            <tr class="gradeX colorchnage">
                                <td><?php echo $order; ?></td>
                                <td>
                                    <?php echo $details['order_number'];?>
                                </td>
                                <td style="width:150px; text-transform: capitalize;">
                                    <?php echo $details['full_name'] ?>
                                </td>
                                <td>
                                    <?php echo $details['contact_number'] ?>
                                </td>
                                <?php $datetime = date(' d-m-Y h:i a', strtotime($details['creation_time'])); ?>
                                <td class="center">
                                    <?php echo $datetime; ?>
                                </td>
                                <td>
                                    <div class="form-group" >
                                        <select class="form-control transfer_patient">
                                            <option>Select</option>
                                            <option value="vip">By Consultant</option>
                                            <option value="on_call">On Call</option>
                                        </select>
                                    </div>
                                </td>
                                <td class="hide vip_trans">
                                    <?php echo $details['appointment_booking_id']?>
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
        <div class="col-lg-4 p-0">
            <div class="card p-0">
                <div class="card-header myHeader" style="display: inline-flex;">
                    <button class="btn btn-block btn-warning col-md-6" id="time_on_call">Time on call</button>
                    <button class="btn btn-block btn-info col-md-6" id="print_oncall">Print List</button>
                </div>
                <div class="card-body p-t-0">
                    <table class="table table-bordered responsive booking_tables" cellspacing="0" width="100%" >
                       <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Order</th>
                            <th style="width:150px;">Name</th>
                            <th>Contact</th>
                            <th>Appointment Taken</th>
                            <th>Shift</th>
                            <th class="hide"></th>
                            <th class="hide"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $order = 0;
                        foreach ($booking_oncall as $details) {
                            $order+=1;
                            ?>
                            <tr class="gradeX colorchnage">
                                <td><?php echo $order; ?></td>
                                <td>
                                    <?php echo $details['order_number'];?>
                                </td>
                                <td style="width:150px; text-transform: capitalize;">
                                    <?php echo $details['full_name'] ?>
                                </td>
                                <td>
                                    <?php echo $details['contact_number'] ?>
                                </td>
                                <?php $datetime = date(' d-m-Y h:i a', strtotime($details['creation_time'])); ?>
                                <td class="center">
                                    <?php echo $datetime ?>
                                </td>
                                <td>
                                    <div class="form-group" >
                                        <select class="form-control transfer_patient">
                                            <option>Select</option>
                                            <option value="on_walk">On Walk IN</option>
                                            <option value="vip">By Consultant</option>
                                        </select>
                                    </div>
                                </td>
                                <td class="hide vip_trans">
                                    <?php echo $details['appointment_booking_id']?>
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
<?php }else{ ?>
    <div class="booking_category_tables">
        <div class="row p-0 m-0">
            <div class="col-lg-4 p-0">
                <div class="card p-0">
                    <div class="card-header myHeader">
                        <button class="btn btn-block btn-success" id="time_consultant">Time by Consultant</button>
                    </div>
                    <div class="card-body p-t-0">
                        <table class="table table-bordered nowrap responsive booking_tables" cellspacing="0" id="" width="100%" >
                            <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th class="hide">Order</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Appointment Taken</th>
                                        <th class="hide">Shift</th>
                                        <th class="hide"></th>
                                        <th class="hide"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $bkarray = array();
                                    foreach ($consultant_booking as $key) {
                                        $bkarray[$key['order_number']]['appointment_booking_id'] = $key['appointment_booking_id'];
                                        $bkarray[$key['order_number']]['full_name'] = $key['full_name'];
                                        $bkarray[$key['order_number']]['contact_number'] = $key['contact_number'];
                                        $bkarray[$key['order_number']]['appointment_date'] = $key['appointment_date'];
                                        $bkarray[$key['order_number']]['consultant_fee'] = $key['consultant_fee'];
                                        $bkarray[$key['order_number']]['booked_by'] = $key['booked_by'];
                                        $bkarray[$key['order_number']]['fee_paid_at'] = $key['fee_paid_at'];
                                        $bkarray[$key['order_number']]['fee_collected_by'] = $key['fee_collected_by'];
                                        $bkarray[$key['order_number']]['ett_fee'] = $key['ett_fee'];
                                        $bkarray[$key['order_number']]['ett_fee_paid_at'] = $key['ett_fee_paid_at'];
                                        $bkarray[$key['order_number']]['ett_fee_collected_by'] = $key['ett_fee_collected_by'];
                                        $bkarray[$key['order_number']]['echo_fee'] = $key['echo_fee'];
                                        $bkarray[$key['order_number']]['echo_fee_paid_at'] = $key['echo_fee_paid_at'];
                                        $bkarray[$key['order_number']]['echo_fee_collected_by'] = $key['echo_fee_collected_by'];
                                        $bkarray[$key['order_number']]['refund'] = $key['refund'];
                                        $bkarray[$key['order_number']]['fee_paid_status'] = $key['fee_paid_status'];
                                    }


                                    for ($i = 1; $i <= 5; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="hide"><?php echo $i ?></td>
                                            <td style="width:150px;text-transform: capitalize;">
                                                <?php
                                                if (isset($bkarray[$i]['full_name'])) {
                                                    echo $bkarray[$i]['full_name'];
                                                } else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (isset($bkarray[$i]['contact_number'])) {
                                                    echo $bkarray[$i]['contact_number'];
                                                } else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (isset($bkarray[$i]['appointment_date'])) {
                                                    if ($bkarray[$i]['appointment_date'] == '0000-00-00 00:00:00') {
                                                        echo "";
                                                    } else {
                                                        echo date(' d-m-Y h:i a', strtotime($bkarray[$i]['appointment_date']));
                                                    }
                                                } else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <td class="hide">
                                                <div class="form-group" >
                                                    <select class="form-control transfer_patient">
                                                        <option>Select</option>
                                                        <option value="on_walk">On Walk IN</option>
                                                        <option value="on_call">On Call</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="hide">
                                                <?php
                                                if (isset($bkarray[$i]['appointment_booking_id'])) {
                                                    echo $bkarray[$i]['appointment_booking_id'];
                                                } else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <td class="hide">
                                                <?php
                                                if (isset($bkarray[$i]['fee_paid_status'])) {
                                                    echo $bkarray[$i]['fee_paid_status'];
                                                } else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    $order = 5;
                                    foreach ($booking_vip as $details) {
                                        $order += 1;
                                        ?>
                                        <tr class="gradeX colorchnage">
                                            <td><?php echo $order; ?></td>
                                            <td class="hide">
                                                <?php echo $details['order_number']; ?>
                                            </td>
                                            <td style="width:150px;text-transform: capitalize;">
                                                <?php echo $details['full_name'] ?>
                                            </td>
                                            <td>
                                                <?php echo $details['contact_number'] ?>
                                            </td>
                                            <?php $datetime = date(' d-m-Y h:i a', strtotime($details['appointment_date'])); ?>
                                            <td class="center">
                                                <?php echo $datetime ?>
                                            </td>
                                            <td>
                                                <div class="form-group" >
                                                    <select class="form-control transfer_patient">
                                                        <option>Select</option>
                                                        <option value="on_walk">On Walk IN</option>
                                                        <option value="on_call">On Call</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="hide vip_trans">
                                                <?php echo $details['appointment_booking_id'] ?>
                                            </td>
                                            <td class="hide">
                                                <?php echo $details['fee_paid_status'] ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                </div>      
            </div>
        </div>
        <div class="col-lg-4 p-0">
            <div class="card p-0">
                <div class="card-header myHeader">
                    <button class="btn btn-block btn-info" id="time_on_walk">Time on walk in</button>
                </div>
                <div class="card-body p-t-0">
                    <table class="table table-bordered nowrap responsive booking_tables" cellspacing="0" id="" width="100%" >
                       <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Order</th>
                            <th style="width:150px;">Name</th>
                            <th>Contact</th>
                            <th>Appointment Taken</th>
                            <th class="hide">Shift</th>
                            <th class="hide"></th>
                            <th class="hide"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $order = 0;
                        foreach ($booking_onwalk as $details){
                            $order+=1;
                            ?>
                            <tr class="gradeX colorchnage">
                                <td><?php echo $order; ?></td>
                                <td>
                                    <?php echo $details['order_number'];?>
                                </td>
                                <td style="width:150px;text-transform: capitalize;">
                                    <?php echo $details['full_name'] ?>
                                </td>
                                <td>
                                    <?php echo $details['contact_number'] ?>
                                </td>
                                <?php $datetime = date(' d-m-Y h:i a', strtotime($details['appointment_date'])); ?>
                                <td class="center">
                                    <?php echo $datetime; ?>
                                </td>
                                <td class="hide">
                                    <div class="form-group" >
                                        <select class="form-control transfer_patient">
                                            <option>Select</option>
                                            <option value="on_call">On Call</option>
                                        </select>
                                    </div>
                                </td>
                                <td class="hide vip_trans">
                                    <?php echo $details['appointment_booking_id']?>
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
        <div class="col-lg-4 p-0">
            <div class="card p-0">
                <div class="card-header myHeader">
                    <button class="btn btn-block btn-warning" id="time_on_call">Time on call</button>
                </div>
                <div class="card-body p-t-0">
                    <table class="table table-bordered responsive booking_tables" cellspacing="0" width="100%" >
                       <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Order</th>
                            <th style="width:150px;">Name</th>
                            <th>Contact</th>
                            <th>Appointment Taken</th>
                            <th class="hide">Shift</th>
                            <th class="hide"></th>
                            <th class="hide"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $order = 0;
                        foreach ($booking_oncall as $details) {
                            $order+=1;
                            ?>
                            <tr class="gradeX colorchnage">
                                <td><?php echo $order; ?></td>
                                <td>
                                    <?php echo $details['order_number'];?>
                                </td>
                                <td style="width:150px;text-transform: capitalize;">
                                    <?php echo $details['full_name'] ?>
                                </td>
                                <td>
                                    <?php echo $details['contact_number'] ?>
                                </td>
                                <?php $datetime = date(' d-m-Y h:i a', strtotime($details['appointment_date'])); ?>
                                <td class="center">
                                    <?php echo $datetime ?>
                                </td>
                                <td class="hide">
                                    <div class="form-group" >
                                        <select class="form-control transfer_patient">
                                            <option>Select</option>
                                            <option value="on_walk">On Walk IN</option>
                                        </select>
                                    </div>
                                </td>
                                <td class="hide vip_trans">
                                    <?php echo $details['appointment_booking_id']?>
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
    <?php }?>
<script type="text/javascript">
$(document).ready(function(){
       $(".transfer_patient").change(function(){
          var transferTo = $(this).val();
          var transferId = $.trim($(this).closest('tr').find('.vip_trans').text());
          // alert(transferTo);
          $.ajax({
            url: '/cms/dashboard/transfer',
            type: 'post',
            data: {
                transferto: transferTo,
                transferid: transferId
            },
            cache: false,
            success: function(response){
                if(response.booking_cate != ''){
                    $('.booking_category_tables').remove();
                    $('#booking_category_tables').append(response.booking_cate);
                    ///////////// reinitilizing the datatable///////////
                    $('.booking_tables').DataTable({
                        "info": false,
                        "paging": false,
                        "scrollX": true,
                        "scrollY": "450px",
                        "scrollCollapse": true,
                        "createdRow": function(row, data, dataIndex) {
                            if (data[7] == "1") {
                            $(row).addClass('round-green');
                            }if(data[7] == "2"){
                            $(row).addClass('round-blue');
                            }
                            if (data[7] == "3") {
                            $(row).addClass('round-red');
                            }if(data[7] == "4"){
                            $(row).addClass('round-yellow');
                            }
                            if (data[7] == "5") {
                            $(row).addClass('round-orange');
                            }if(data[7] == "6"){
                            $(row).addClass('round-lightGray');
                            }if (data[7 ] == "7") {
                            $(row).addClass('round-white');
                            }
                        }
                    });
                    if (response.success==true) {
                        toastr["success"](response.message);
                    }else{
                        toastr["error"](response.message);
                    }
                    
                }else{
                    toastr["warning"](response.message);
                }
            } 
          });
        });
    });
    $(window).scroll(function() {    // this will work when your window scrolled.
        var height = $(window).scrollTop();  //getting the scrolling height of window
        if(height  > 140) {
            $('.card-header').addClass('sticky');
        } else{
            $('.card-header').removeClass('sticky');
        }
    });

</script>