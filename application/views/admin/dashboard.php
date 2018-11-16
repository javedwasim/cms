    <?php
        if(isset($rights[0]['rights'])){//print_r($rights[0]['rights']);
            $permissions = explode(',',$rights[0]['rights']);
        }else{
            $permissions = array();
        }
        $user_info = ($this->session->userdata('user_data_logged_in'));
    ?>
    <div class="content-wrapper">
        <div class="row" style="margin: 0px;">
            <div class="col-md-5 col-8 align-self-center">
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol> -->
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <!-- Sidebar  -->
            <nav id="dashboar-sidebar" class="<?php echo in_array("menu-0", $permissions)?"op-hide":''; ?>">
                <ul class="nav nav-pills nav-sidebar sidebar-menu list" data-widget="treeview" role="menu" data-accordion="false">

                </ul>
            </nav>
            <!-- Page Content  -->
            <div id="dashboard-content">
                
            </div>
        </div>
        
        <!-- Row -->

        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>