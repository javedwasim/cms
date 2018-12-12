<?php if(isset($rights[0]['user_rights'])){$permissions = explode(',',$rights[0]['user_rights']);  $loggedin_user = $this->session->userdata('userdata');}?>
<div class="content-wrapper">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php if($loggedin_user['is_admin']!=1 && $booking_flag == 'vip'){   ?>
        <nav id="sidebar" style="display:none;">
        <?php }else{?>
        <nav id="sidebar" class="<?php echo in_array("appointments-can_add-0", $permissions)?"op-hide":''; ?>" >
        <?php  }?>
            <div class="row m-l-5" style="margin-right: 0px;">
                <div class="col-md-12" id="appointment_sidebar">
                    <div class="card p-t-20">
                        <div class="card-header">
                            <h4 class="pull-left">New Appointment</h4>
                        </div>
                        <div class="card-body">
                            <div class="container">       
                                <form id="appointment_booking_form" method="post" role="form"
                                      data-action="<?php echo site_url('user/book_appointment') ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="full_name">Patient Name</label>
                                                <input type="text" id="full_name" name="pat_name" placeholder="Full Name" style="text-transform: capitalize;" class="form-control sug_pat" maxlength="25" autofocus required="required">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cell_num">Cell Number</label>
                                                <input type="text" id="cell_num" name="contact_number" placeholder="Cell Number" class="form-control" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" maxlength="11" required="required" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="app_date">App. Date</label>
                                                <?php if ($booking_flag == 'on_walk') { ?>
                                                    <input type="text" value="<?php echo date('d-M-Y') ?>" id="app_date" class="form-control"  name="appointment_date" required="required" autocomplete="off" readonly>
                                                <?php } else { ?>
                                                    <input type="text" value="<?php echo date('d-M-Y') ?>" id="app_date" class="form-control app_date"  name="appointment_date" autocomplete="off" required="required" />
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="consultant_fee">Fee</label>
                                                <input type="text" id="consultant_fee" name="consultant_fee" placeholder="Enter Fee" class="form-control" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" maxlength="5" autocomplete="off">
                                                <input type="hidden" id="booking_flag" name="booking_flag" value="<?php echo $booking_flag; ?>"  />
                                            </div>
                                        </div>
                                        <div class="col-md-7 <?php if($booking_flag == 'on_walk'){echo '';}else{echo 'op-hide';}?>">
                                            <div class="form-group">
                                                <label>Fee Type</label>
                                                <select class="form-control" id="booking_fee_type" >
                                                    <option value="consultant">Consultant</option>
                                                    <option value="ett">ETT</option>
                                                    <option value="echo">ECHO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="book_appointment"
                                                id="book_appointment" class="btn btn-primary">Save</button>
                                    <!-- <?php if($loggedin_user['is_admin']==1){   ?>
                                        
                                    <?php } elseif(in_array("appointments-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                                        <button type="button" name="book_appointment"
                                                id="book_appointment" class="btn btn-primary">Save</button>
                                    <?php } else{ ?>
                                        <button class="btn btn-primary" style="opacity: 0.5;">
                                            <i class="fas fa-user-plus"></i>Save</button>
                                    <?php } ?> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Page Content Holder -->
        <?php if($loggedin_user['is_admin']!=1 && $booking_flag == 'vip'){   ?>
        <div id="content" style="width: 100%;">
        <?php }else{?>
        <div id="content" <?php echo in_array("appointments-can_add-0", $permissions)?"style='width:100%;'":''; ?>>
        <?php  }?>
            <div id="status_row">

            </div>
            <div class="card m-r-20">
                <div class="card-body">
                    <div id="table-booking">

                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

<!-- modal content for wallet-->
<div id="wallet-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <label>Wallet Status</label>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div id="wallet-modal-box">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $( function() {
            $("#full_name").autocomplete({  
                source:window.location.origin+window.location.pathname+'profile/get_pat_name', 
                select:function(event, ui){
                    $(this).val(ui.value);
                }
            });
        } );
</script>
