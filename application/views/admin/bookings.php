<?php
        if(isset($rights[0]['user_rights']))://print_r($rights[0]['rights']);
            $permissions = explode(',',$rights[0]['user_rights']);
        endif;
        $user_info = ($this->session->userdata('user_data_logged_in'));
    ?>
<div class="content-wrapper" style="margin:0 .5%">
	<div class="row page-titles" style="margin: 0px; padding: 3px 0px;">
        <div class="col-md-9 col-sm-12" style="display: inline-flex;">
            
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
    <div id="all_status_row">
        
    </div>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div id="booking_category_tables">
        
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