<?php
    if(isset($rights[0]['user_rights'])):
        $permissions = explode(',',$rights[0]['user_rights']);
    endif;
    $user_info = ($this->session->userdata('user_data_logged_in'));
?>
<div class="all_status_row">
    <div class="row" style="margin-right: 0px;">
        <div class="col-md-12 p-r-0" id="operations_panel">
            <div class="card p-t-10" style="box-shadow: none; margin-bottom: 0px !important;">
                <div class="card-body p-b-0">
                    <div class="row">
                        <div class="col-lg-1 col-md-3 ">
                            <div class="round round-sm align-self-center green <?php echo in_array("appointments-view_wallet-0", $permissions)?"op-hide":''; ?>" data-toggle="modal" data-target="#wallet-modal" style="cursor: pointer;">
                                <i class="fa fa-wallet"></i>
                            </div>
                        </div>
                        <!-- Column -->
                        <?php  if($user_info['is_admin'] == 1): ?>
                        <div class="col-lg-1 col-md-3 text-center m-b-5 p-0" style="max-width: 100%;">
                            <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_appoint_revert">
                                <div class="round round-sm round-appointment align-self-center"><i class="fa fa-user"></i>
                                </div>
                            </a>
                            <div class="m-l-10 align-self-center">
                                <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_appoint_revert">
                                    <b class="m-b-0 font-lgiht">Appointment</b>
                                    <p class="m-b-0 text-muted">(<?php echo $total_appointment; ?>)</p>
                                </a>
                            </div>      
                        </div>
                        <?php endif; ?>
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-5 p-0" style="max-width: 100%;">
                            <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_feepaid">
                                <div class="round round-sm align-self-center green"><i class="ti-money"></i>
                                </div>
                            </a>
                            <div class="m-l-10 align-self-center">
                                <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_feepaid">
                                    <b class="m-b-0 font-lgiht">Fee Paid</b>
                                    <p class="m-b-0 text-muted">(<?php echo $fee_paid; ?>)</p>
                                </a>
                            </div>      
                        </div>
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-5 p-0" style="max-width: 100%;">
                            <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_wecg">
                                <div class="round round-sm align-self-center round-blue"><i class="ti-pulse"></i>
                                </div>
                            </a>
                            <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_wecg">
                                <div class="m-l-10 align-self-center">
                                    <b class="font-lgiht m-b-5"> ECG</b>
                                    <p class="m-b-0 text-muted">Waiting(<?php echo $ecg_count; ?>)</p>
                                </div>
                            </a>     
                        </div>
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-5 p-0" style="max-width: 100%;">
                            <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_wett">
                                <div class="round round-sm align-self-center round-red"><i class="mdi mdi-bullseye"></i>
                                </div>
                            </a>
                            <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_wett">
                                <div class="m-l-10 align-self-center">
                                    <b class="font-lgiht m-b-5">ETT</b>
                                    <p class="m-b-0 text-muted ">Waiting(<?php echo $ett_count; ?>)</p>
                                </div>
                            </a>     
                        </div>
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-5 p-0" style="max-width: 100%;">
                            <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_wecho">
                                <div class="round round-sm align-self-center round-yellow"><i class="ti-heart-broken"></i></div>
                            </a>
                            <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_wecho">
                                <div class="m-l-10 align-self-center">
                                    <b class=" font-lgiht m-b-5">Echo</b>
                                    <p class="m-b-0 text-muted">Waiting(<?php echo $echo_count; ?>)</p>
                                </div>
                            </a>      
                        </div>
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-5 p-0" style="    max-width: 100%;">
                            <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_investigation">
                                <div class="round round-sm align-self-center round-orange"><i class="ti-alarm-clock"></i></div>
                            </a>
                            <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_investigation">
                                <div class="m-l-10 align-self-center">
                                    <b class=" font-lgiht m-b-5">Investigation</b>
                                    <p class="m-b-0 text-muted">Waiting(<?php echo $investigation_count; ?>)</p>    
                                </div>
                            </a>       
                        </div>
                        <!-- Column -->
                        <div class="col-lg-1 col-md-3 text-center m-b-5 p-0" style="max-width: 100%;">
                            <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_checkup">
                                <div class="round round-sm align-self-center round-lightGray"><i class="ti-timer"></i></div>
                            </a>
                            <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_checkup">
                                <div class="m-l-10 align-self-center">
                                    <b class="font-lgiht m-b-5">CheckUp</b>
                                    <p class="m-b-0 text-muted ">Waiting(<?php echo $checkup_count; ?>)</p>
                                </div>
                            </a>
                        </div>
                        <!-- Column -->
                        <?php  if(!in_array("appointments-can_complete-0", $permissions)): ?>
                            <div class="col-lg-1 col-md-3 text-center m-b-5 p-0" style="max-width: 100%;">
                                <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_complete">
                                    <div class="round round-sm align-self-center" style="border:1px solid #006400; background: none;"><i class="ti-thumb-up" style="color: #006400;"></i></div>
                                </a>
                                <a href="javascript:void(0)" onclick="change_patient_status(this)" class="pat_complete">
                                    <div class="m-l-10 align-self-center">
                                        <b class="m-b-0 font-lgiht">Complete</b>
                                        <p class="m-b-0 text-muted ">(<?php echo $count_complete; ?>)</p>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-3 col-md-5">
                            <div class="row">
                                <div class="col-md-8 p-r-0" style="display:inline-flex;">
                                    <label class="m-t-10 m-r-5">Search</label>
                                    <input type="text" name="" value="<?php
                                    if(isset($searchdate)){
                                        echo date('d-M-Y',strtotime($searchdate));
                                    }else{
                                        echo date('d-M-Y');
                                    }
                                     ?>" class="form-control m-t-5" id="search-all-cat" style="height:35px;">        
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="bookings();" aria-expanded="false"> Refresh</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-1 p-r-0 <?php echo in_array("appointments-print-0", $permissions)?"op-hide":''; ?>">
                                    <input type="text" name="" value="<?php echo date('d-M-Y') ?>" class="print_date form-control m-t-5" style="height:35px;" id="print_all">        
                                </div>
                                <div class="col-md-4 p-0 <?php echo in_array("appointments-print-0", $permissions)?"op-hide":''; ?>">
                                    <button class="btn btn-default btn-sm" id="print_all_list">Print all</button> 
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
<script type="text/javascript">
    $(document).ready(function(){
        $('.print_date').datepicker({
            format: 'd-M-yyyy',
            autoclose: true
        });
        $('#search-all-cat').datepicker({
            format: 'd-M-yyyy',
            autoclose: true
        });
    });
//////////////////////////////////////////////// search all categories ///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
    $('#search-all-cat').on("change",function(){
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
                    $('.wallet-modal-box').remove();
                    $('#wallet-modal-box').append(response.wallet_count);
                    ///////////// reinitilizing the datatable///////////
                    $('.booking_tables').DataTable({
                        "info": false,
                        "paging": false,
                        "scrollX": true,
                        "scrollY": "66vh",
                        "scrollCollapse": true,
                        "searching": false,
                        'aoColumnDefs': [{
                           'bSortable': false,
                           'aTargets': 0
                        }],
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
                        },
                        "fnDrawCallback": function ( oSettings ) {
                            /* Need to redo the counters if filtered or sorted */
                            if ( oSettings.bSorted || oSettings.bFiltered )
                            {
                                for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                                {
                                    $('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                                }
                            }
                        },
                        "aoColumnDefs": [
                            { "bSortable": false, "aTargets": [ 0 ] }
                        ],
                        "aaSorting": [[ 1, 'asc' ]]
                    });
                    $(".booking_tables tbody tr").click(function (e) {
                        if ($(this).hasClass('row_selected')) {
                            $(this).removeClass('row_selected');
                        } else {
                            $('.booking_tables tbody tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        }
                    });
                }
            }
        });
    });
</script>