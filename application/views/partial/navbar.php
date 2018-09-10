<!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <nav class="navbar navbar-expand-lg topbar">
            <a class="navbar-brand" href="<?php echo base_url(); ?>" ><h2 style="color: #fff;">Clinic Management System</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars" style="color: #fff;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php
                if($this->session->userdata('username')=='test'){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="bookings();" aria-expanded="false"><i class="mdi mdi-bullseye"></i> Appointment</a>
                    </li>
                <?php }else{ ?>
                <li class="nav-item active_nav">
                    <a class="nav-link" href="<?php echo base_url(); ?>" ><i class="mdi mdi-gauge"></i> Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" onclick="bookings();" aria-expanded="false"><i class="mdi mdi-bullseye"></i> Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" id="pat_profile" aria-expanded="false"><i class="fas fa-portrait"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" aria-expanded="false"><i class="ti-book"></i> Diary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)"  aria-expanded="false"><i class="ti-info-alt"></i> About us</a>
                </li>
              <!--   <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" onclick="appointments();" aria-expanded="false"><i class="mdi mdi-bullseye"></i> Appointments</a>
                </li> -->
                

            <?php }?>
        </ul>
        <ul class="navbar-nav my-lg-0">
            <!-- ============================================================== -->
            <!-- Profile -->
            <!-- ============================================================== -->
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/dist/images/dr_shahadat.jpg" alt="user" class="profile-pic" /></a>
                <div class="dropdown-menu dropdown-menu-right scale-up">
                    <ul class="dropdown-user">
                        <li>
                            <div class="dw-user-box">
                                <div class="u-img"><img src="<?php echo base_url(); ?>/assets/dist/images/dr_shahadat.jpg" alt="user"></div>
                                <div class="u-text">
                                    <h4><?php echo $this->session->userdata('username')?></h4>
                                    <p class="text-muted"><?php echo $this->session->userdata('username')?>@gmail.com</p><a href="#" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url('dashboard/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- Language -->
                <!-- ============================================================== -->
                        <!-- <li class="nav-item">
                            <a class="nav-link text-muted waves-effect waves-dark" href="#" >
                                <i class="flag-icon flag-icon-us"></i>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
            <!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div>
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div id="content-wrapper">