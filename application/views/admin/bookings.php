<div class="content-wrapper" style="margin:0 .5%">
	<div class="row page-titles" style="margin-bottom: 0px;">
        <div class="col-xs-12 col-md-6 col-sm-12" style="display: inline-flex;">
            <div class="row">
                <div class="col-md-2">
                    <a class="btn btn-info" href="javascript:void(0)" onclick="bookings();" aria-expanded="false"> Refresh</a>
                </div>
                <div class="col-md-5 offset-1 p-r-0">
                    <input type="text" name="" value="<?php echo date('d-M-Y') ?>" class="print_date form-control m-t-5" style="height:35px;" id="print_all">        
                </div>
                <div class="col-md-4 p-0">
                    <button class="btn btn-default" id="print_all_list">Print all</button> 
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 ">
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
    <div id="booking_category_tables">
        
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.print_date').datepicker({
            format: 'd-M-yyyy'
        });
    });
</script>