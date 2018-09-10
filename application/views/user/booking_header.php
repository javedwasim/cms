<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#general" role="tab">
                    <span class="hidden-sm-up">
                        <i class="ti-home"></i>
                    </span>
                    <span class="hidden-xs-down">General Booking</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#vip" role="tab">
                    <span class="hidden-sm-up">
                        <i class="ti-user"></i>
                    </span>
                    <span class="hidden-xs-down">Walk in</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#walkin" role="tab">
                    <span class="hidden-sm-up">
                        <i class="ti-email"></i>
                    </span>
                    <span class="hidden-xs-down">On Call</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#oncall" role="tab">
                    <span class="hidden-sm-up">
                        <i class="ti-email"></i>
                    </span>
                    <span class="hidden-xs-down">Booked By Consultant</span>
                </a>
            </li>
        </ul>
        <div class="row page-titles" style="margin-bottom: 0px;">
            <div class="col-md-9 col-sm-12 col-xs-12  align-self-center">
                <button type="button" id="sidebarCollapse" class="btn btn-info btn-md">
                    <i class="fas fa-align-left"></i>
                    <span>Book Appointment</span>
                </button>
                <button type="button" id="divCollapse" class="btn btn-info btn-md">
                    <i class="fas fa-align-left"></i>
                    <span>Operation</span>
                </button>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 ">
                <ol class="breadcrumb pull-right m-l-10">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">appointment booking</li>
                </ol>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row op-hide" style="margin: 0px;">
            <div class="col-md-12" id="operations_panel">
                <div class="card m-b-0">
                    <div class="card-body">
                     <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <div class='input-group mb-3'>
                                    <input type='text' placeholder="View Patient" class="form-control pat_search" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <span class="ti-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 5px;">
                                <div class="input-daterange input-group" id="date-range">
                                    <input type="text" class="form-control pat_search_from" name="start" />
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info b-0 text-white">TO</span>
                                    </div>
                                    <input type="text" class="form-control pat_search_to" name="end" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button id="delete_patient" class="btn btn-block btn-outline-danger">Delete Multiple Appointments</button>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-30">
                            <a href="javascript:void(0)" class="feepaid">
                                <div class="round round-lg align-self-center green m-b-10"><i class="ti-money"></i>
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
                        <div class="col-lg-1 col-md-3 text-center m-b-30">
                            <a href="javascript:void(0)" class="wecg">
                                <div class="round round-lg align-self-center round-blue m-b-10"><i class="ti-heart-broken"></i>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="wecg">
                                <div class="m-l-10 align-self-center">
                                    <b class="font-lgiht m-b-5"> ECG</b>
                                    <p class="m-b-0 text-muted">Waiting (<?php echo $ecg_count; ?>)</p>
                                </div>
                            </a>     
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-30">
                            <a href="javascript:void(0)" class="wett">
                                <div class="round round-lg align-self-center round-red m-b-10"><i class="mdi mdi-bullseye"></i>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="wett">
                                <div class="m-l-10 align-self-center">
                                    <b class="font-lgiht m-b-5">ETT</b>
                                    <p class="m-b-0 text-muted ">Waiting (<?php echo $ett_count; ?>)</p>
                                </div>
                            </a>     
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-30">
                            <a href="javascript:void(0)" class="wecho">
                                <div class="round round-lg align-self-center round-yellow m-b-10"><i class="ti-pulse"></i></div>
                            </a>
                            <a href="javascript:void(0)" class="wecho">
                                <div class="m-l-10 align-self-center">
                                    <b class=" font-lgiht m-b-5">Echo</b>
                                    <p class="m-b-0 text-muted">Waiting (<?php echo $echo_count; ?>)</p>
                                </div>
                            </a>      
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-30" style="    max-width: 100%;">
                            <a href="javascript:void(0)" class="investigation">
                                <div class="round round-lg align-self-center round-orange m-b-10"><i class="ti-alarm-clock"></i></div>
                            </a>
                            <a href="javascript:void(0)" class="investigation">
                                <div class="m-l-10 align-self-center">
                                    <b class=" font-lgiht m-b-5">Investigation</b>
                                    <p class="m-b-0 text-muted">Waiting (<?php echo $investigation_count; ?>)</p>    
                                </div>
                            </a>       
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-30">
                            <a href="javascript:void(0)" class="checkup">
                                <div class="round round-lg align-self-center round-lightGray m-b-10"><i class="ti-timer"></i></div>
                            </a>
                            <a href="javascript:void(0)" class="checkup">
                                <div class="m-l-10 align-self-center">
                                    <b class="font-lgiht m-b-5">Check Up</b>
                                    <p class="m-b-0 text-muted ">Waiting (<?php echo $checkup_count; ?>)</p>
                                </div>
                            </a>      
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-30 " style="    max-width: 100%;">
                            <a href="javascript:void(0)" class="complete" >
                                <div class="round round-lg align-self-center round-green m-b-10"><i class="ti-thumb-up"></i></div>
                            </a>
                            <a href="javascript:void(0)" class="complete">
                                <div class="m-l-10 align-self-center">
                                    <b class="m-b-0 font-lgiht">Complete</b>
                                    <p class="m-b-0 text-muted ">(<?php echo $count_complete; ?>)</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Row --> 
                </div>
            </div> 
        </div>
    </div>
    