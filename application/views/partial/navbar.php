<?php
    if(isset($rights[0]['user_rights'])){//print_r($rights[0]['rights']);
        $permissions = explode(',',$rights[0]['user_rights']);
    }else{
        $permissions = array();
    }
    $user_info = ($this->session->userdata('user_data_logged_in'));
?>
<!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <nav class="navbar navbar-expand-lg topbar" style="width:100% !important;">
            <a class="navbar-brand" href="<?php echo base_url(); ?>" ><h2 style="color: #fff;">Clinic Management System</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars" style="color: #fff;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active_nav <?php echo in_array("setting-menu-0", $permissions)?"op-hide":''; ?>">
                    <a class="nav-link" href="<?php echo base_url(); ?>" ><i class="mdi mdi-gauge"></i> Settings</a>
                </li>
                <li class="nav-item <?php echo in_array("appointments-parent-0", $permissions)?"op-hide":''; ?>">
                    <a class="nav-link" href="javascript:void(0)" onclick="bookings();" aria-expanded="false"><i class="mdi mdi-bullseye"></i> Appointment</a>
                </li>
                <li class="nav-item <?php echo in_array("profile-parent-0", $permissions)?"op-hide":''; ?>">
                    <a class="nav-link" href="javascript:void(0)" id="pat_profile" aria-expanded="false"><i class="fas fa-portrait"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo in_array("diary-can_view-0", $permissions)?"op-hide":''; ?>" href="javascript:void(0)" id="diary" aria-expanded="false"><i class="ti-book"></i> Diary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#aboutmodal"  aria-expanded="false"><i class="ti-info-alt"></i> About us</a>
                </li>
              <!--   <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" onclick="appointments();" aria-expanded="false"><i class="mdi mdi-bullseye"></i> Appointments</a>
                </li> -->
        </ul>
        <ul class="navbar-nav my-lg-0">
            <!-- ============================================================== -->
            <!-- Profile -->
            <!-- ============================================================== -->
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if($user_info['is_admin'] ==1 ){?>
                        <img src="<?php echo base_url(); ?>assets/dist/images/dr_shahadat.jpg" alt="admin" class="profile-pic" />
                    <?php }else{?>
                        <img src="<?php echo base_url(); ?>/assets/dist/images/avatar.png" alt="user" class="profile-pic">
                    <?php }?>
                </a>
                <div class="dropdown-menu dropdown-menu-right scale-up">
                    <ul class="dropdown-user">
                        <li>
                            <div class="dw-user-box">
                                <div class="u-img">
                                    <?php if($user_info['is_admin'] ==1 ){?>
                                    <img src="<?php echo base_url(); ?>/assets/dist/images/dr_shahadat.jpg" alt="admin">
                                    <?php }else{?>
                                    <img src="<?php echo base_url(); ?>/assets/dist/images/avatar.png" alt="user"><?php }?>
                                </div>
                                <div class="u-text">
                                    <h4><?php echo $this->session->userdata('username')?></h4>
                                    <p class="text-muted"><?php echo $this->session->userdata('username')?>@gmail.com
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" data-toggle="modal" data-target="#passwordmodal"><i class="fa fa-key"></i> Change Password</a></li>
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

          <!-- Modal -->
<div id="passwordmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
          <!-- Modal content-->
        <form id="update_user_password" method="post" role="form" data-action="<?php echo site_url('setting/update_registered_user_password') ?>" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?php echo $this->session->userdata('username')?>" />
            <input type="hidden" name="userid" value="<?php echo $this->session->userdata('login_id')?>" />
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 m-t-10">
                            <label>Old Password:</label>
                        </div>
                        <div class="col-md-8 m-t-10">
                            <input type="password" name="old_password" class="form-control col-md-10" />
                        </div>
                        <div class="col-md-4 m-t-10">
                            <label>New Password:</label>
                        </div>
                        <div class="col-md-8 m-t-10">
                            <input type="password" name="new_password" class="form-control col-md-10" />
                        </div>
                        <div class="col-md-4 m-t-10">
                            <label>Re-Type Password:</label>
                        </div>
                        <div class="col-md-8 m-t-10">
                            <input type="password" name="confirm_password" class="form-control col-md-10" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal" id="update_password">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="aboutmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-10 offset-1" style="text-align: center;">
                    <h3 style="text-align: center;"><a href="https://www.thetechsol.com">TechSol</a></h3>
                    <div class="contact-email"><span><i class="fa fa-envelope m-r-10"></i></span><a href="mailto:contact@thetechsol.com">contact@thetechsol.com</a></div>
                    <div class="site-info container">
                        <a href="https://thetechsol.com">All Rights Reserved by TechSol </a>
                        <span class="sep"> | </span>
                        <a href="https://www.thetechsol.com" rel="designer">© 2018</a>   
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
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