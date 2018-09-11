<div class="status_row">
    <div class="row m-r-5">
        <div class="col-md-12" id="operations_panel">
            <div class="card" style="box-shadow: none; margin-bottom: 0px;">
                <div class="card-body p-b-0">
                    <div class="row">
                        <div class="col-lg-1">
                            <button type="button" id="sidebarCollapse" class=" round round-sm round-theme m-b-5">
                                <i class="fas fa-arrow-left"></i>
                            </button>
                        <?php if($this->session->userdata('is_admin') == 1){?>
                            <div class="round round-sm align-self-center green m-b-10" data-toggle="modal" data-target="#wallet-modal" style="cursor: pointer;">
                                <i class="fa fa-wallet"></i>
                            </div>
                        <?php }else{
                                echo "";
                            }
                            ?>
                        </div>
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-5" style="max-width: 100%;">
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
                        <div class="col-lg-1 col-md-3 text-center m-b-5" style="max-width: 100%;">
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
                        <div class="col-lg-1 col-md-3 text-center m-b-5" style="max-width: 100%;">
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
                        <div class="col-lg-1 col-md-3 text-center m-b-5" style="max-width: 100%;">
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
                        <div class="col-lg-1 col-md-3 text-center m-b-5" style="    max-width: 100%;">
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
                        <div class="col-lg-1 col-md-3 text-center m-b-5" style="max-width: 100%;">
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
                        <div class="col-lg-1 col-md-3 text-center m-b-5" style="max-width: 100%;">
                            <a href="javascript:void(0)" class="complete" >
                                <div class="round round-sm align-self-center m-b-10" style="border:1px solid #006400; background: none;"><i class="ti-thumb-up" style="color: #006400;"></i></div>
                            </a>
                            <a href="javascript:void(0)" class="complete">
                                <div class="m-l-10 align-self-center">
                                    <b class="m-b-0 font-lgiht">Complete</b>
                                    <p class="m-b-0 text-muted ">(<?php echo $count_complete; ?>)</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 ">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if($booking_flag == 'vip'){?>
                                        <h2>Time by Consultant</h2>
                                    <?php }else if($booking_flag == 'on_walk'){?>
                                        <h2>Time on walk</h2>
                                    <?php }else{?>
                                        <h2>Time on call</h2>
                                    <?php }?>
                                </div>
                            </div>
                            <div class='input-group mb-3'>
                                <input type='text' placeholder="View Patient" class="form-control pat_search" value="<?php echo date('d-M-Y') ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <span class="ti-calendar"></span>
                                    </span>
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