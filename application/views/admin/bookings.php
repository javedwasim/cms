<div class="content-wrapper" style="margin:0 .5%">
	<div class="row page-titles" style="margin-bottom: 0px;">
        <div class="col-xs-12 col-md-4 col-sm-12" style="display: inline-flex;">
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
        <div class="col-md-5 col-xs-12 col-sm-12">
            <div class="row">
                <div class="col-md-5 offset-1 p-r-0">
                <input type="text" name="" value="<?php echo date('d-M-Y') ?>" class="form-control m-t-5" id="search-all-cat" style="height:35px;">        
            </div>
            <div class="col-md-4 p-0">
                <button class="btn btn-default" id="search_all_list">Search</button> 
            </div>
            </div>
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
    <div id="booking_category_tables">
        
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.print_date').datepicker({
            format: 'd-M-yyyy'
        });
        $('#search-all-cat').datepicker({
            format: 'd-M-yyyy'
        });
    });
    //////////////////////////////////////////////// search all categories ///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $(document.body).on('click','#search_all_list', function(){
        var searchDate = $('#search-all-cat').val();
        $.ajax({
            type: "post",
            url: '/cms/user/search_all_categories',
            data: {
                searchdate: searchDate
            }, success: function (response) {
                if (response.result_html != '') {
                    $('.booking_category_tables').remove();
                    $('#booking_category_tables').append(response.result_html);
                    ///////////// reinitilizing the datatable///////////
                    $('.booking_tables').DataTable({
                        "info": false,
                        "paging": false,
                        "scrollX": true,
                        "searching": false,
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
                }
            }
        });
    });
</script>