<div class="status_row">
<?php
    if(isset($rights[0]['user_rights']))://print_r($rights[0]['rights']);
        $permissions = explode(',',$rights[0]['user_rights']);
    endif;
    $user_info = ($this->session->userdata('user_data_logged_in'));
?>
    <div class="row m-r-5" style="margin-left: 0px;">
        <div class="col-md-12" id="operations_panel">
            <div class="card p-t-20" style="box-shadow: none; margin-bottom: 0px !important;">
                <div class="card-body p-b-0">
                    <div class="row">
                        <div class="col-lg-1 col-md-3 col-sm-4 col-4">
                            <button type="button" id="sidebarCollapse" class=" round round-sm round-theme m-b-5">
                                <i class="fas fa-arrow-left arro"></i>
                            </button>
                        
                            <div class="round round-sm align-self-center green m-b-10 <?php echo in_array("appointments-view_wallet-0", $permissions)?"op-hide":''; ?>" data-toggle="modal" data-target="#wallet-modal" style="cursor: pointer;">
                                <i class="fa fa-wallet"></i>
                            </div>
                       
                        </div>
                        <!-- Column -->
                        <?php  if($user_info['is_admin'] == 1): ?>
                        <div class="col-lg-1 col-md-3 col-sm-4 col-4 text-center m-b-5 p-0" style="max-width: 100%;">
                            <a href="javascript:void(0)" class="appoint_revert">
                                <div class="round round-sm round-appointment align-self-center m-b-10"><i class="fa fa-user"></i>
                                </div>
                            </a>
                            <div class="m-l-10 align-self-center">
                                <a href="#" class="appoint_revert">
                                    <b class="m-b-0 font-lgiht">Appointment</b>
                                    <p class="m-b-0 text-muted">(<?php echo $total_appointment; ?>)</p>
                                </a>
                            </div>      
                        </div>
                        <?php endif; ?>
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 col-sm-4 col-4 text-center m-b-5 p-0" style="max-width: 100%;">
                            <a href="javascript:void(0)" class="feepaid">
                                <div class="round round-sm align-self-center green m-b-10"><i class="ti-money"></i>
                                </div>
                            </a>
                            <div class="m-l-10 align-self-center">
                                <a href="#" class="feepaid">
                                    <b class="m-b-0 font-lgiht">Fee Paid</b>
                                    <p class="m-b-0 text-muted">(<?php echo $fee_paid; ?>)</p>
                                </a>
                            </div>      
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 col-sm-4 col-4 text-center m-b-5 p-0" style="max-width: 100%;">
                            <a href="javascript:void(0)" class="wecg">
                                <div class="round round-sm align-self-center round-blue m-b-10"><i class="ti-pulse"></i>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="wecg">
                                <div class="m-l-10 align-self-center">
                                    <b class="font-lgiht m-b-5"> ECG</b>
                                    <p class="m-b-0 text-muted">Waiting(<?php echo $ecg_count; ?>)</p>
                                </div>
                            </a>     
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 col-sm-4 col-4 text-center m-b-5 p-0" style="max-width: 100%;">
                            <a href="javascript:void(0)" class="wett">
                                <div class="round round-sm align-self-center round-red m-b-10"><i class="mdi mdi-bullseye"></i>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="wett">
                                <div class="m-l-10 align-self-center">
                                    <b class="font-lgiht m-b-5">ETT</b>
                                    <p class="m-b-0 text-muted ">Waiting(<?php echo $ett_count; ?>)</p>
                                </div>
                            </a>     
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 col-sm-4 col-4 text-center m-b-5 p-0" style="max-width: 100%;">
                            <a href="javascript:void(0)" class="wecho">
                                <div class="round round-sm align-self-center round-yellow m-b-10"><i class="ti-heart-broken"></i></div>
                            </a>
                            <a href="javascript:void(0)" class="wecho">
                                <div class="m-l-10 align-self-center">
                                    <b class=" font-lgiht m-b-5">Echo</b>
                                    <p class="m-b-0 text-muted">Waiting(<?php echo $echo_count; ?>)</p>
                                </div>
                            </a>      
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 col-sm-4 col-4 text-center m-b-5 p-0" style="    max-width: 100%;">
                            <a href="javascript:void(0)" class="investigation">
                                <div class="round round-sm align-self-center round-orange m-b-10"><i class="ti-alarm-clock"></i></div>
                            </a>
                            <a href="javascript:void(0)" class="investigation">
                                <div class="m-l-10 align-self-center">
                                    <b class=" font-lgiht m-b-5">Investigation</b>
                                    <p class="m-b-0 text-muted">Waiting(<?php echo $investigation_count; ?>)</p>    
                                </div>
                            </a>       
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 col-sm-4 col-4 text-center m-b-5 p-0" style="max-width: 100%;">
                            <a href="javascript:void(0)" class="checkup">
                                <div class="round round-sm align-self-center round-lightGray m-b-10"><i class="ti-timer"></i></div>
                            </a>
                            <a href="javascript:void(0)" class="checkup">
                                <div class="m-l-10 align-self-center">
                                    <b class="font-lgiht m-b-5">CheckUp</b>
                                    <p class="m-b-0 text-muted ">Waiting(<?php echo $checkup_count; ?>)</p>
                                </div>
                            </a>      
                        </div>
                        <!-- Column -->
                        <!-- Column -->

                        <?php  if(!in_array("appointments-can_complete-0", $permissions)): ?>
                            <div class="col-lg-1 col-md-3 col-sm-4 col-4 text-center m-b-5 p-0" style="max-width: 100%;">
                                <a href="javascript:void(0)" class="complete">
                                    <div class="round round-sm align-self-center m-b-10" style="border:1px solid #006400; background: none;"><i class="ti-thumb-up" style="color: #006400;"></i></div>
                                </a>
                                <a href="javascript:void(0)" class="complete">
                                    <div class="m-l-10 align-self-center">
                                        <b class="m-b-0 font-lgiht">Complete</b>
                                        <p class="m-b-0 text-muted ">(<?php echo $count_complete; ?>)</p>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-3 col-md-5 ">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if($booking_flag == 'vip'){?>
                                        <strong>Time by Consultant</strong>
                                        <button type="button" name="book_appointment pull-right" id="time_consultant" class="btn btn-primary btn-sm">Refresh</button>
                                    <?php }else if($booking_flag == 'on_walk'){?>
                                        <strong>Time on walk</strong>
                                        <button type="button" name="book_appointment pull-right" id="time_on_walk" class="btn btn-primary btn-sm">Refresh</button>
                                    <?php }else{?>
                                        <strong>Time on call</strong>
                                        <button type="button" name="book_appointment pull-right" id="time_on_call" class="btn btn-primary btn-sm">Refresh</button>
                                    <?php }?>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-md-8">
                                    <input type='text' placeholder="View Patient" onchange="searchpatient(this)" class="form-control pat_search" value="<?php
                                        if(isset($search_date)){
                                            echo date('d-M-Y',strtotime($search_date));
                                        }else{
                                            echo date('d-M-Y') ;
                                        }
                                    ?>" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row --> 
                </div>
            </div> 
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.pat_search').datepicker({
            format: 'd-M-yyyy',
            autoclose: true
        });
    });
</script>