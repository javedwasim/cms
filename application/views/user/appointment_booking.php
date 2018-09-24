<?php
    if(isset($rights[0]['user_rights']))
    {
        $appointment_rights = explode(',',$rights[0]['user_rights']);
        //print_r($appointment_rights);
        $loggedin_user = $this->session->userdata('userdata');
    }
?>
<div class="content-wrapper">
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="row sticky-bar m-l-5 ">
                <div class="col-md-12" id="appointment_sidebar">
                    <div class="card">
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
                                                <input type="text" id="full_name" name="pat_name" placeholder="Full Name" style="text-transform: capitalize;" class="form-control" maxlength="60" autofocus required="required" autocomplete="off">

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
                                                <label for="consultant_fee"> Consultation Fee</label>
                                                <input type="text" id="consultant_fee" name="consultant_fee" placeholder="Enter Fee" class="form-control" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" maxlength="4" autocomplete="off">
                                                <input type="hidden" id="booking_flag" name="booking_flag" value="<?php echo $booking_flag; ?>"  />
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="book_appointment" <?php  echo(in_array("appointments-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0))?'':'disabled'; ?>
                                            id="book_appointment" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Page Content Holder -->
        <div id="content">
            <div id="status_row" class="sticky-bar">

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
                    <input type="text" name="wallet_status" id="wallet_date" class="form-control col-md-6" value="<?php echo date('d-M-Y') ?>" />
                    <button class="btn btn-info btn-sm" id="wallet_search">Search</button> 
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
    $(document).ready(function () {
        $('#wallet_date').datepicker({
            format: 'd-M-yyyy'
        });
        $('.pat_search').datepicker({
            format: 'd-M-yyyy'
        });
        $(".pat_search").on("change", function () {
            var searchDate = $(this).val();
            var bookingflag = $('#booking_flag').val();
            $.ajax({
                type: "post",
                url: '/cms/user/search_patient',
                data: {
                    searchdate: searchDate,
                    bookingflag: bookingflag
                }, success: function (response) {
                    if (response.booking_table != '') {
                        $('.table-responsive').remove();
                        $('#table-booking').append(response.booking_table);
                        $("#full_name").focus();
                        //////////////// datatable initilization//////////////
                        var oTable = $('#editable-datatable').DataTable({
                            "info": false,
                            "paging": false,
                            "searching": false,
                            "createdRow": function (row, data, dataIndex) {
                                if (data[17] == "1") {
                                    $(row).addClass('round-green');
                                }
                                if (data[17] == "2") {
                                    $(row).addClass('round-blue');
                                }
                                if (data[17] == "3") {
                                    $(row).addClass('round-red');
                                }
                                if (data[17] == "4") {
                                    $(row).addClass('round-yellow');
                                }
                                if (data[17] == "5") {
                                    $(row).addClass('round-orange');
                                }
                                if (data[17] == "6") {
                                    $(row).addClass('round-lightGray');
                                }
                                if (data[17] == "7") {
                                    $(row).addClass('round-white');
                                }
                            },
                            select: {
                                style: 'single'
                            },
                            "scrollX": true,
                            columnDefs: [
                                {"type": "html-input", "targets": [3, 6, 7, 8]},
                                {"targets": 1, "orderable": false}
                            ]
                        });
                        $("#full_name").focus();
                        $("#editable-datatable tbody tr").click(function (e) {
                            if ($(this).hasClass('row_selected')) {
                                $(this).removeClass('row_selected');
                            } else {
                                oTable.$('tr.row_selected').removeClass('row_selected');
                                $(this).addClass('row_selected');
                            }
                        });

                        $('.app_date').datepicker({
                            format: 'd-M-yyyy'
                        });
                    }
                }
            });
        });
    });
</script>
