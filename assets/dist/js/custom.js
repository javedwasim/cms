var oTable = "";
$(document).ready(function () {
    //////////////////////////////initilize datepicker///////////////////////
    $('.app_date').datepicker({
        format: 'd-M-yyyy',
        autoclose: true
    });
    $('#clinic_time').timepicker();

    $('.pat_search_to').datepicker({
        format: 'd-M-yyyy'
    });
    $('.pat_search_from').datepicker({
        format: 'd-M-yyyy'
    });
    $('.pat_search').datepicker({
        format: 'd-M-yyyy'
    });
    $('.navbar-collapse a').click(function (e) {
        $('.navbar-collapse').collapse('toggle');
    });
////////////////////////////// initilize categories datatables //////////////////////
    $('.booking_tables').DataTable({
        "info": false,
        "paging": false,
        "scrollX": true,
        "scrollY": "66vh",
        "scrollCollapse": true,
        "searching":false,
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

    $('.dataTables_filter input[type="search"]').css(
            {'width': '100px !important', 'display': 'inline-block'}
    );

    $(".booking_tables tbody tr").click(function (e) {
        if ($(this).hasClass('row_selected')) {
            $(this).removeClass('row_selected');
        } else {
            $('.booking_tables tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        }
    });
    /////////////////// toastr alert settings //////////////
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "300",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    ///////////////////////////////////////////////////

    /////////////// sidebar toggle code///////////////
    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#dashboardsidebarCollapse').on('click', function () {
        $('#dashboar-sidebar').toggleClass('active');
    });

    /////////////////////////////////////////////////
    $('#sidebarCollapse').on('click', function () {
        var icon = $('#sidebarCollapse > .fas');
        icon.toggleClass('fa-arrow-left fa-arrow-right');
        $("#full_name").focus();
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('actv');

    });

    /////////////// focus script ///////////////////

    $("#full_name").focus();
    $("#editable-datatable tbody tr").click(function (e) {
        if ($(this).hasClass('row_selected')) {
            $(this).removeClass('row_selected');
        } else {
            oTable.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        }
    });
    /////////////////// initilize booking datatable///////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////

    var oTable = $('#editable-datatable').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        fixedHeader: {
                        header: true,
                        headerOffset: 100
                    },
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
            {"type": "html-input", "targets": [3, 6, 7, 8]}
        ],
        "fnDrawCallback": function ( oSettings ) {
            /* Need to redo the counters if filtered or sorted */
            if ( oSettings.bSorted || oSettings.bFiltered )
            {
                for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                {
                    $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                }
            }
        },
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 1 ] }
        ],
        "aaSorting": [[ 1, 'asc' ]]
    });
    $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
        return $(value).val();
    };

});

///////////////////////////////* Add a click handler for the row *////////////////////
/////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '.feepaid', function () {
    var tr = $('tr.row_selected');
    var odata = $.trim(tr.find('.appointment_booking_id').text());
    var status_id = $.trim(tr.find('.booking_status_id').text());
    if (odata != "") {
        var bookingflag = $('#booking_flag').val();
        var tabledate = $('.pat_search').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'User/update_fee',
            type: 'post',
            data: {
                bkId: odata,
                fee_status: '1',
                flag: bookingflag,
                tabledate: tabledate,
                statusId: status_id
            },
            cache: false,
            success: function (response) {
                if (response.status_row != '') {
                    $('.status_row').remove();
                    $('#status_row').append(response.status_row);
                    $('.table-responsive').remove();
                    $('#table-booking').append(response.booking_table);
                    $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function (e) {
                        if ($(this).hasClass('row_selected')) {
                            $(this).removeClass('row_selected');
                        } else {
                            oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    $('#sidebarCollapse').on('click', function () {
                        var icon = $('#sidebarCollapse > .fas');
                        icon.toggleClass('fa-arrow-left fa-arrow-right');
                        $("#full_name").focus();
                        $('#sidebar').toggleClass('active');
                        $('#content').toggleClass('actv');
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "scrollY": "67vh",
                        "scrollCollapse": true,
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
                            {"type": "html-input", "targets": [3, 6, 7, 8]}
                        ],
                        "fnDrawCallback": function ( oSettings ) {
                            /* Need to redo the counters if filtered or sorted */
                            if ( oSettings.bSorted || oSettings.bFiltered )
                            {
                                for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                                {
                                    $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                                }
                            }
                        },
                        "aoColumnDefs": [
                            { "bSortable": false, "aTargets": [ 1 ] }
                        ],
                        "aaSorting": [[ 1, 'asc' ]]
                    });
                    $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                        return $(value).val();
                    };
                    if (response.success == true) {
                        toastr["success"](response.message);    
                    }else{
                        toastr["error"](response.message);    
                    }

                } else {
                    console.log('not working');
                }
            }
        });
    } else {
        toastr["warning"]('Please select the row.');
    }
});

$(document.body).on('click', '.wecg', function () {
    var tr = $('tr.row_selected');
    var odata = $.trim(tr.find('.appointment_booking_id').text());
    var status_id = $.trim(tr.find('.booking_status_id').text());
    if (odata != "") {
        var bookingflag = $('#booking_flag').val();
        var tabledate = $('.pat_search').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'User/update_fee',
            type: 'post',
            data: {
                bkId: odata,
                fee_status: '2',
                flag: bookingflag,
                tabledate: tabledate,
                statusId: status_id
            },
            cache: false,
            success: function (response) {
                if (response.status_row != '') {
                    $('.status_row').remove();
                    $('#status_row').append(response.status_row);
                    $('.table-responsive').remove();
                    $('#table-booking').append(response.booking_table);
                    $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function (e) {
                        if ($(this).hasClass('row_selected')) {
                            $(this).removeClass('row_selected');
                        } else {
                            oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    $('#sidebarCollapse').on('click', function () {
                        var icon = $('#sidebarCollapse > .fas');
                        icon.toggleClass('fa-arrow-left fa-arrow-right');
                        $("#full_name").focus();
                        $('#sidebar').toggleClass('active');
                        $('#content').toggleClass('actv');
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "scrollY": "67vh",
                        "scrollCollapse": true,
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
                            {"type": "html-input", "targets": [3, 6, 7, 8]}
                        ],
                        "fnDrawCallback": function ( oSettings ) {
                            /* Need to redo the counters if filtered or sorted */
                            if ( oSettings.bSorted || oSettings.bFiltered )
                            {
                                for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                                {
                                    $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                                }
                            }
                        },
                        "aoColumnDefs": [
                            { "bSortable": false, "aTargets": [ 1 ] }
                        ],
                        "aaSorting": [[ 1, 'asc' ]]
                    });
                    $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                        return $(value).val();
                    };
                    if (response.success == true) {
                        toastr["success"](response.message);    
                    }else{
                        toastr["error"](response.message);    
                    }

                } else {
                    console.log('not working');
                }
            }
        });
    } else {
        toastr["warning"]('Please select the row.');
    }

});

$(document.body).on('click', '.wett', function () {
    var tr = $('tr.row_selected');
    var odata = $.trim(tr.find('.appointment_booking_id').text());
    var status_id = $.trim(tr.find('.booking_status_id').text());
    if (odata != "") {
        var bookingflag = $('#booking_flag').val();
        var tabledate = $('.pat_search').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'User/update_fee',
            type: 'post',
            data: {
                bkId: odata,
                fee_status: '3',
                flag: bookingflag,
                tabledate: tabledate,
                statusId: status_id
            },
            cache: false,
            success: function (response) {
                if (response.status_row != '') {
                    $('.status_row').remove();
                    $('#status_row').append(response.status_row);
                    $('.table-responsive').remove();
                    $('#table-booking').append(response.booking_table);
                    $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function (e) {
                        if ($(this).hasClass('row_selected')) {
                            $(this).removeClass('row_selected');
                        } else {
                            oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    $('#sidebarCollapse').on('click', function () {
                        var icon = $('#sidebarCollapse > .fas');
                        icon.toggleClass('fa-arrow-left fa-arrow-right');
                        $("#full_name").focus();
                        $('#sidebar').toggleClass('active');
                        $('#content').toggleClass('actv');
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "scrollY": "67vh",
                        "scrollCollapse": true,
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
                            {"type": "html-input", "targets": [3, 6, 7, 8]}
                        ],
                        "fnDrawCallback": function ( oSettings ) {
                            /* Need to redo the counters if filtered or sorted */
                            if ( oSettings.bSorted || oSettings.bFiltered )
                            {
                                for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                                {
                                    $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                                }
                            }
                        },
                        "aoColumnDefs": [
                            { "bSortable": false, "aTargets": [ 1 ] }
                        ],
                        "aaSorting": [[ 1, 'asc' ]]
                    });
                    $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                        return $(value).val();
                    };
                    if (response.success == true) {
                        toastr["success"](response.message);    
                    }else{
                        toastr["error"](response.message);    
                    }
                } else {
                    console.log('not working');
                }
            }
        });
    } else {
        toastr["warning"]('Please select the row.');
    }
});

$(document.body).on('click', '.wecho', function () {
    var tr = $('tr.row_selected');
    var odata = $.trim(tr.find('.appointment_booking_id').text());
    var status_id = $.trim(tr.find('.booking_status_id').text());
    if (odata != "") {
        var bookingflag = $('#booking_flag').val();
        var tabledate = $('.pat_search').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'User/update_fee',
            type: 'post',
            data: {
                bkId: odata,
                fee_status: '4',
                flag: bookingflag,
                tabledate: tabledate,
                statusId: status_id
            },
            cache: false,
            success: function (response) {
                if (response.status_row != '') {
                    $('.status_row').remove();
                    $('#status_row').append(response.status_row);
                    $('.table-responsive').remove();
                    $('#table-booking').append(response.booking_table);
                    $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function (e) {
                        if ($(this).hasClass('row_selected')) {
                            $(this).removeClass('row_selected');
                        } else {
                            oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    $('#sidebarCollapse').on('click', function () {
                        var icon = $('#sidebarCollapse > .fas');
                        icon.toggleClass('fa-arrow-left fa-arrow-right');
                        $("#full_name").focus();
                        $('#sidebar').toggleClass('active');
                        $('#content').toggleClass('actv');
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "scrollY": "67vh",
                        "scrollCollapse": true,
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
                            {"type": "html-input", "targets": [3, 6, 7, 8]}
                        ],
                        "fnDrawCallback": function ( oSettings ) {
                            /* Need to redo the counters if filtered or sorted */
                            if ( oSettings.bSorted || oSettings.bFiltered )
                            {
                                for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                                {
                                    $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                                }
                            }
                        },
                        "aoColumnDefs": [
                            { "bSortable": false, "aTargets": [ 1 ] }
                        ],
                        "aaSorting": [[ 1, 'asc' ]]
                    });
                    $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                        return $(value).val();
                    };
                    if (response.success == true) {
                        toastr["success"](response.message);    
                    }else{
                        toastr["error"](response.message);    
                    }
                } else {
                    console.log('not working');
                }
            }
        });
    } else {
        toastr["warning"]('Please select the row.');
    }
});


$(document.body).on('click', '.investigation', function () {
    var tr = $('tr.row_selected');
    var odata = $.trim(tr.find('.appointment_booking_id').text());
    var status_id = $.trim(tr.find('.booking_status_id').text());
    if (odata != "") {
        var bookingflag = $('#booking_flag').val();
        var tabledate = $('.pat_search').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'User/update_fee',
            type: 'post',
            data: {
                bkId: odata,
                fee_status: '5',
                flag: bookingflag,
                tabledate: tabledate,
                statusId: status_id
            },
            cache: false,
            success: function (response) {
                if (response.status_row != '') {
                    $('.status_row').remove();
                    $('#status_row').append(response.status_row);
                    $('.table-responsive').remove();
                    $('#table-booking').append(response.booking_table);
                    $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function (e) {
                        if ($(this).hasClass('row_selected')) {
                            $(this).removeClass('row_selected');
                        } else {
                            oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    $('#sidebarCollapse').on('click', function () {
                        var icon = $('#sidebarCollapse > .fas');
                        icon.toggleClass('fa-arrow-left fa-arrow-right');
                        $("#full_name").focus();
                        $('#sidebar').toggleClass('active');
                        $('#content').toggleClass('actv');
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "scrollY": "67vh",
                        "scrollCollapse": true,
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
                            {"type": "html-input", "targets": [3, 6, 7, 8]}
                        ],
                        "fnDrawCallback": function ( oSettings ) {
                            /* Need to redo the counters if filtered or sorted */
                            if ( oSettings.bSorted || oSettings.bFiltered )
                            {
                                for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                                {
                                    $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                                }
                            }
                        },
                        "aoColumnDefs": [
                            { "bSortable": false, "aTargets": [ 1 ] }
                        ],
                        "aaSorting": [[ 1, 'asc' ]]
                    });
                    $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                        return $(value).val();
                    };
                    if (response.success == true) {
                        toastr["success"](response.message);    
                    }else{
                        toastr["error"](response.message);    
                    }
                } else {
                    console.log('not working');
                }
            }
        });
    } else {
        toastr["warning"]('Please select the row.');
    }
});

$(document.body).on('click', '.checkup', function () {
    var tr = $('tr.row_selected');
    var odata = $.trim(tr.find('.appointment_booking_id').text());
    var status_id = $.trim(tr.find('.booking_status_id').text());
    if (odata != "") {
        var bookingflag = $('#booking_flag').val();
        var tabledate = $('.pat_search').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'User/update_fee',
            type: 'post',
            data: {
                bkId: odata,
                fee_status: '6',
                flag: bookingflag,
                tabledate: tabledate,
                statusId: status_id
            },
            cache: false,
            success: function (response) {
                if (response.status_row != '') {
                    $('.status_row').remove();
                    $('#status_row').append(response.status_row);
                    $('.table-responsive').remove();
                    $('#table-booking').append(response.booking_table);
                    $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function (e) {
                        if ($(this).hasClass('row_selected')) {
                            $(this).removeClass('row_selected');
                        } else {
                            oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    $('#sidebarCollapse').on('click', function () {
                        var icon = $('#sidebarCollapse > .fas');
                        icon.toggleClass('fa-arrow-left fa-arrow-right');
                        $("#full_name").focus();
                        $('#sidebar').toggleClass('active');
                        $('#content').toggleClass('actv');
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "scrollY": "67vh",
                        "scrollCollapse": true,
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
                            {"type": "html-input", "targets": [3, 6, 7, 8]}
                        ],
                        "fnDrawCallback": function ( oSettings ) {
                            /* Need to redo the counters if filtered or sorted */
                            if ( oSettings.bSorted || oSettings.bFiltered )
                            {
                                for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                                {
                                    $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                                }
                            }
                        },
                        "aoColumnDefs": [
                            { "bSortable": false, "aTargets": [ 1 ] }
                        ],
                        "aaSorting": [[ 1, 'asc' ]]
                    });
                    $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                        return $(value).val();
                    };
                    if (response.success == true) {
                        toastr["success"](response.message);    
                    }else{
                        toastr["error"](response.message);    
                    }
                } else {
                    console.log('not working');
                }
            }
        });
    } else {
        toastr["warning"]('Please select the row.');
    }

});

$(document.body).on('click', '.complete', function () {
    var tr = $('tr.row_selected');
    var odata = $.trim(tr.find('.appointment_booking_id').text());
    var status_id = $.trim(tr.find('.booking_status_id').text());
    if (odata != "") {
        var bookingflag = $('#booking_flag').val();
        var tabledate = $('.pat_search').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'User/update_fee',
            type: 'post',
            data: {
                bkId: odata,
                fee_status: '7',
                flag: bookingflag,
                tabledate: tabledate,
                statusId: status_id
            },
            cache: false,
            success: function (response) {
                if (response.status_row != '') {
                    $('.status_row').remove();
                    $('#status_row').append(response.status_row);
                    $('.table-responsive').remove();
                    $('#table-booking').append(response.booking_table);
                    $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function (e) {
                        if ($(this).hasClass('row_selected')) {
                            $(this).removeClass('row_selected');
                        } else {
                            oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    $('#sidebarCollapse').on('click', function () {
                        var icon = $('#sidebarCollapse > .fas');
                        icon.toggleClass('fa-arrow-left fa-arrow-right');
                        $("#full_name").focus();
                        $('#sidebar').toggleClass('active');
                        $('#content').toggleClass('actv');
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "scrollY": "67vh",
                        "scrollCollapse": true,
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
                            {"type": "html-input", "targets": [3, 6, 7, 8]}
                        ],
                        "fnDrawCallback": function ( oSettings ) {
                            /* Need to redo the counters if filtered or sorted */
                            if ( oSettings.bSorted || oSettings.bFiltered )
                            {
                                for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                                {
                                    $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                                }
                            }
                        },
                        "aoColumnDefs": [
                            { "bSortable": false, "aTargets": [ 1 ] }
                        ],
                        "aaSorting": [[ 1, 'asc' ]]
                    });
                    $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                        return $(value).val();
                    };
                    if (response.success == true) {
                        toastr["success"](response.message);    
                    }else{
                        toastr["error"](response.message);    
                    }
                } else {
                    console.log('not working');
                }
            }
        });
    } else {
        toastr["warning"]('Please select the row.');
    }

});

$(document.body).on('click', '.appoint_revert', function () {
    var tr = $('tr.row_selected');
    var odata = $.trim(tr.find('.appointment_booking_id').text());
    var status_id = $.trim(tr.find('.booking_status_id').text());
    if (odata != "") {
        var bookingflag = $('#booking_flag').val();
        var tabledate = $('.pat_search').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'User/update_fee',
            type: 'post',
            data: {
                bkId: odata,
                fee_status: '0',
                flag: bookingflag,
                tabledate: tabledate,
                statusId: status_id
            },
            cache: false,
            success: function (response) {
                if (response.status_row != '') {
                    $('.status_row').remove();
                    $('#status_row').append(response.status_row);
                    $('.table-responsive').remove();
                    $('#table-booking').append(response.booking_table);
                    $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function (e) {
                        if ($(this).hasClass('row_selected')) {
                            $(this).removeClass('row_selected');
                        } else {
                            oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    $('#sidebarCollapse').on('click', function () {
                        var icon = $('#sidebarCollapse > .fas');
                        icon.toggleClass('fa-arrow-left fa-arrow-right');
                        $("#full_name").focus();
                        $('#sidebar').toggleClass('active');
                        $('#content').toggleClass('actv');
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "scrollY": "67vh",
                        "scrollCollapse": true,
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
                            {"type": "html-input", "targets": [3, 6, 7, 8]}
                        ],
                        "fnDrawCallback": function ( oSettings ) {
                            /* Need to redo the counters if filtered or sorted */
                            if ( oSettings.bSorted || oSettings.bFiltered )
                            {
                                for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                                {
                                    $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                                }
                            }
                        },
                        "aoColumnDefs": [
                            { "bSortable": false, "aTargets": [ 1 ] }
                        ],
                        "aaSorting": [[ 1, 'asc' ]]
                    });
                    $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                        return $(value).val();
                    };
                    if (response.success == true) {
                        toastr["success"](response.message);    
                    }else{
                        toastr["error"](response.message);    
                    }

                } else {
                    console.log('not working');
                }
            }
        });
    } else {
        toastr["warning"]('Please select the row.');
    }
});

/////////////////////////////////////////// Status change for all categories //////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 function change_patient_status(val) {
    var tr = $('.booking_tables tbody tr.row_selected');
    var odata = $.trim(tr.find('.vip_trans').text());
    var status_id = $.trim(tr.find('.pat_status').text());
    var status_class = $(val).attr('class');
    var fee_status =  '';
    if(status_class == 'pat_appoint_revert'){
        fee_status = '0';
    }else if(status_class == 'pat_feepaid'){
        fee_status = '1';
    }else if(status_class == 'pat_wecg'){
        fee_status = '2';
    }else if(status_class == 'pat_wett'){
        fee_status = '3';
    }else if(status_class == 'pat_wecho'){
        fee_status = '4';
    }else if(status_class == 'pat_investigation'){
        fee_status = '5';
    }else if(status_class == 'pat_checkup'){
        fee_status = '6';
    }else if(status_class == 'pat_complete'){
        fee_status = '7';
    }
    if (odata != "") {
        var bookingflag = "";
        var tabledate = $('#search-all-cat').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'User/update_fee',
            type: 'post',
            data: {
                bkId: odata,
                fee_status: fee_status,
                flag: bookingflag,
                tabledate: tabledate,
                statusId: status_id
            },
            cache: false,
            success: function (response) {
                if (response.status_row != '') {
                    $('.booking_category_tables').remove();
                    $('#booking_category_tables').append(response.booking_cate);
                    $('.all_status_row').remove();
                    $('#all_status_row').append(response.status_row);
                    $('.wallet-modal-box').remove();
                    $('#wallet-modal-box').append(response.wallet_count);   
                    $(".booking_tables tbody tr").click(function (e) {
                        if ($(this).hasClass('row_selected')) {
                            $(this).removeClass('row_selected');
                        } else {
                            $('.booking_tables tbody tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        }
                    });
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
                    if (response.success == true) {
                        toastr["success"](response.message);    
                    }else{
                        toastr["error"](response.message);    
                    }

                } else {
                    console.log('not working');
                }
            }
        });
    } else {
        toastr["warning"]('Please select the row.');
    }
}

///////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// call appointment booking view ///////////////////////
function appointments() {
    $.ajax({
        url: window.location.origin+window.location.pathname+'User/',
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.table-responsive').remove();
                $('#table-booking').append(response.booking_table);
                $('.status_row').remove();
                $('#status_row').append(response.status_row);
                /////////////// focus script ///////////////////
                $("#full_name").focus();
                $("#editable-datatable tbody tr").click(function (e) {
                    if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                    } else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                        $(this).addClass('row_selected');
                    }
                });

                //////// initilize datatable///////////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "scrollY": "67vh",
                    "scrollCollapse": true,
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
                        {"type": "html-input", "targets": [3, 6, 7, 8]}
                    ],
                    "fnDrawCallback": function ( oSettings ) {
                        /* Need to redo the counters if filtered or sorted */
                        if ( oSettings.bSorted || oSettings.bFiltered )
                        {
                            for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                            {
                                $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                            }
                        }
                    },
                    "aoColumnDefs": [
                        { "bSortable": false, "aTargets": [ 1 ] }
                    ],
                    "aaSorting": [[ 1, 'asc' ]]
                });
                $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                    return $(value).val();
                };

                //// sidebar toggle code///////////////
                $('#sidebarCollapse').on('click', function () {
                    var icon = $('#sidebarCollapse > .fas');
                    icon.toggleClass('fa-arrow-left fa-arrow-right');
                    $("#full_name").focus();
                    $('#sidebar').toggleClass('active');
                    $('#content').toggleClass('actv');

                });
                $('.app_date').datepicker({
                    format: 'd-M-yyyy',
                    startDate: date,
                    autoclose: true
                });
            }
        }
    });
}

////////////////// Save appointment booking script //////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#book_appointment', function (e) {
    e.preventDefault();
    var patname = $('#full_name').val();
    var cellnum = $('#cell_num').val();
    var appdate = $('#app_date').val();
    var consultantfee = $('#consultant_fee').val();
    var bookingflag = $('#booking_flag').val();
    var tabledate = $('.pat_search').val();
    var feetype = $('#booking_fee_type option:selected').val();
    $(this).attr("disabled", true);
    $.ajax({
        url: $('#appointment_booking_form').attr('data-action'),
        type: 'post',
        data: {
            patName: patname,
            cellNo: cellnum,
            appointmentDate: appdate,
            fee: consultantfee,
            bookingflag: bookingflag,
            searchdate: tabledate,
            feetype: feetype
        },
        success: function (data) {
            if (data.success == true) {
                $('.table-responsive').remove();
                $('#table-booking').append(data.booking_table);
                $('.wallet-modal-box').remove();
                $('#wallet-modal-box').append(data.wallet_count);
                /////////////// focus script ///////////////////
                $("#full_name").focus();
                //////////////// datatable initilization//////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "scrollY": "67vh",
                    "scrollCollapse": true,
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
                        {"type": "html-input", "targets": [3, 6, 7, 8]}
                    ],
                    "fnDrawCallback": function ( oSettings ) {
                        /* Need to redo the counters if filtered or sorted */
                        if ( oSettings.bSorted || oSettings.bFiltered )
                        {
                            for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                            {
                                $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                            }
                        }
                    },
                    "aoColumnDefs": [
                        { "bSortable": false, "aTargets": [ 1 ] }
                    ],
                    "aaSorting": [[ 1, 'asc' ]]
                });
                $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                    return $(value).val();
                };

                $("#editable-datatable tbody tr").click(function (e) {
                    if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                    } else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                        $(this).addClass('row_selected');
                    }
                });
                $('.app_date').datepicker({
                    format: 'd-M-yyyy',
                    autoclose: true
                });

                if (data.message == "Name and contact Number cannot be null.") {
                    toastr["warning"](data.message);
                } else if (data.message == "Limit reached for bookings.") {
                    toastr["warning"](data.message);
                } else if (data.message == "Please fill all fields.") {
                    toastr["warning"](data.message);
                } else {
                    toastr["success"](data.message);
                }
                $('#book_appointment').attr("disabled", false);
                document.getElementById('appointment_booking_form').reset();

            } else {
                $('#book_appointment').attr("disabled", false);
                if (data.limit_error) {
                    toastr["warning"](data.message);    
                }else{
                    toastr["warning"]("Fill all fields.");
                }
                
            }

        }
    });
    return false;
});

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////// update value in appointment booking table///////////////

function valupdate(val) {
    var dataToupdate = val.name;
    var Toupdate = $(val).parent().parent().find('.appointment_booking_id').text();
    var status_id = $(val).parent().parent().find('.booking_status_id').text();
    var statusid = $.trim(status_id);
    var whereToupdate = $.trim(Toupdate);
    var apfee = val.value;
    var bookingflag = $('#booking_flag').val();
    var tabledate = $('.pat_search').val();
    $.ajax({
        type: "post",
        url: window.location.origin+window.location.pathname+'User/update_appointment_values',
        data: {
            appValue: apfee,
            valToUpdate: dataToupdate,
            whereToupdate: whereToupdate,
            flag: bookingflag,
            tabledate: tabledate,
            statusid: statusid
        }, success: function (response) {
            if (response.booking_table != '') {
                $('.table-responsive').remove();
                $('#table-booking').append(response.booking_table);
                $('.wallet-modal-box').remove();
                $('#wallet-modal-box').append(response.wallet_count);
                $('.status_row').remove();
                $('#status_row').append(response.status_row);
                $("#full_name").focus();
                //////////////// datatable initilization//////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "scrollY": "67vh",
                    "scrollCollapse": true,
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
                        {"type": "html-input", "targets": [3, 6, 7, 8]}
                    ],
                    "fnDrawCallback": function ( oSettings ) {
                        /* Need to redo the counters if filtered or sorted */
                        if ( oSettings.bSorted || oSettings.bFiltered )
                        {
                            for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                            {
                                $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                            }
                        }
                    },
                    "aoColumnDefs": [
                        { "bSortable": false, "aTargets": [ 1 ] }
                    ],
                    "aaSorting": [[ 1, 'asc' ]]
                });
                $("#editable-datatable tbody tr").click(function (e) {
                    if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                    } else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                        $(this).addClass('row_selected');
                    }
                });
                $('#sidebarCollapse').on('click', function () {
                    var icon = $('#sidebarCollapse > .fas');
                    icon.toggleClass('fa-arrow-left fa-arrow-right');
                    $("#full_name").focus();
                    $('#sidebar').toggleClass('active');
                    $('#content').toggleClass('actv');
                });
                $('.app_date').datepicker({
                    format: 'd-M-yyyy',
                    autoclose: true
                });
                $('.pat_search').datepicker({
                    format: 'd-M-yyyy',
                    autoclose: true
                });
                toastr["success"]('Status Update');
            }

        }
    });
}


///////////////////// active manu tabs //////////////////////////

$(function () {
    $(".topbar li").click(function () {
        // remove classes from all
        $("li").removeClass("active_nav");
        // add class to the one we clicked
        $(this).addClass("active_nav");
    });
});


$('.components li a').on('click', function () {
    $('.components li').find('a.active').removeClass('active');
    $(this).addClass('active');
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

////////////////////////////// load bookings page/////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////



function bookings() {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Dashboard/bookings',
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('.dashboard-content').remove();
                $('#content-wrapper').append(response.result_html);
                $('.booking_category_tables').remove();
                $('#booking_category_tables').append(response.booking_cate);
                $('.all_status_row').remove();
                $('#all_status_row').append(response.status_row);
                $('.wallet-modal-box').remove();
                $('#wallet-modal-box').append(response.wallet_count);
                $('#site-title').html('Appointment');
                ///////////// reinitilizing the datatable///////////
                $('.booking_tables').DataTable({
                    "info": false,
                    "paging": false,
                    "scrollX": true,
                    "searching": false,
                    "scrollY": "66vh",
                    "scrollCollapse": true,
                    "createdRow": function (row, data, dataIndex) {
                        if (data[7] == "1") {
                            $(row).addClass('round-green');
                        }
                        if (data[7] == "2") {
                            $(row).addClass('round-blue');
                        }
                        if (data[7] == "3") {
                            $(row).addClass('round-red');
                        }
                        if (data[7] == "4") {
                            $(row).addClass('round-yellow');
                        }
                        if (data[7] == "5") {
                            $(row).addClass('round-orange');
                        }
                        if (data[7] == "6") {
                            $(row).addClass('round-lightGray');
                        }
                        if (data[7 ] == "7") {
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
                $('.app_date').datepicker({
                    format: 'd-M-yyyy',
                    autoclose: true
                });
            }
        }
    });
}

///////////////////////////////// time by consultant////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#time_consultant', function () {
    $.ajax({
        url: window.location.origin+window.location.pathname+'User/',
        type: 'post',
        data: {
            flag: 'vip'
        },
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.table-responsive').remove();
                $('#table-booking').append(response.booking_table);
                $('.status_row').remove();
                $('#status_row').append(response.status_row);
                $('.wallet-modal-box').remove();
                $('#wallet-modal-box').append(response.wallet_count);
                /////////////// focus script ///////////////////
                $("#full_name").focus();
                $("#editable-datatable tbody tr").click(function (e) {
                    if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                    } else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                        $(this).addClass('row_selected');
                    }
                });

                //////// initilize datatable///////////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "scrollY": "67vh",
                    "scrollCollapse": true,
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
                        {"type": "html-input", "targets": [3, 6, 7, 8]}
                    ],
                    "fnDrawCallback": function ( oSettings ) {
                        /* Need to redo the counters if filtered or sorted */
                        if ( oSettings.bSorted || oSettings.bFiltered )
                        {
                            for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                            {
                                $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                            }
                        }
                    },
                    "aoColumnDefs": [
                        { "bSortable": false, "aTargets": [ 1 ] }
                    ],
                    "aaSorting": [[ 1, 'asc' ]]
                });
                $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                    return $(value).val();
                };

                //// sidebar toggle code///////////////
                $('#sidebarCollapse').on('click', function () {
                    var icon = $('#sidebarCollapse > .fas');
                    icon.toggleClass('fa-arrow-left fa-arrow-right');
                    $("#full_name").focus();
                    $('#sidebar').toggleClass('active');
                    $('#content').toggleClass('actv');

                });
                $('.app_date').datepicker({
                    format: 'd-M-yyyy',
                    startDate: 'date',
                    autoclose: true
                });
                $("#divCollapse").click(function () {
                    $("#full_name").focus();
                    $(".op-hide").toggle(1000);
                });
            }
        }
    });

});

/////////////////////////////////////// time on walk //////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#time_on_walk', function () {
    $.ajax({
        url: window.location.origin+window.location.pathname+'User/',
        type: 'post',
        data: {
            flag: 'on_walk'
        },
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.table-responsive').remove();
                $('#table-booking').append(response.booking_table);
                $('.status_row').remove();
                $('#status_row').append(response.status_row);
                $('.wallet-modal-box').remove();
                $('#wallet-modal-box').append(response.wallet_count);
                /////////////// focus script ///////////////////
                $("#full_name").focus();
                $("#editable-datatable tbody tr").click(function (e) {
                    if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                    } else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                        $(this).addClass('row_selected');
                    }
                });

                //////// initilize datatable///////////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "scrollY": "67vh",
                    "scrollCollapse": true,
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
                        {"type": "html-input", "targets": [3, 6, 7, 8]}
                    ],
                    "fnDrawCallback": function ( oSettings ) {
                        /* Need to redo the counters if filtered or sorted */
                        if ( oSettings.bSorted || oSettings.bFiltered )
                        {
                            for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                            {
                                $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                            }
                        }
                    },
                    "aoColumnDefs": [
                        { "bSortable": false, "aTargets": [ 1 ] }
                    ],
                    "aaSorting": [[ 1, 'asc' ]]
                });
                $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                    return $(value).val();
                };

                //// sidebar toggle code///////////////
                $('#sidebarCollapse').on('click', function () {
                    var icon = $('#sidebarCollapse > .fas');
                    icon.toggleClass('fa-arrow-left fa-arrow-right');
                    $("#full_name").focus();
                    $('#sidebar').toggleClass('active');
                    $('#content').toggleClass('actv');

                });
                $('.app_date').datepicker({
                    format: 'd-M-yyyy',
                    autoclose: true
                });
                $("#divCollapse").click(function () {
                    $("#full_name").focus();
                    $(".op-hide").toggle(1000);
                });
            }
        }
    });

});

//////////////////////////////////////// time on call ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#time_on_call', function () {
    $.ajax({
        url: window.location.origin+window.location.pathname+'User/',
        type: 'post',
        data: {
            flag: 'on_call'
        },
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.table-responsive').remove();
                $('#table-booking').append(response.booking_table);
                $('.status_row').remove();
                $('#status_row').append(response.status_row);
                $('.wallet-modal-box').remove();
                $('#wallet-modal-box').append(response.wallet_count);
                /////////////// focus script ///////////////////
                $("#full_name").focus();
                $("#editable-datatable tbody tr").click(function (e) {
                    if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                    } else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                        $(this).addClass('row_selected');
                    }
                });

                //////// initilize datatable///////////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "scrollY": "67vh",
                    "scrollCollapse": true,
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
                        {"type": "html-input", "targets": [3, 6, 7, 8]}
                    ],
                    "fnDrawCallback": function ( oSettings ) {
                        /* Need to redo the counters if filtered or sorted */
                        if ( oSettings.bSorted || oSettings.bFiltered )
                        {
                            for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                            {
                                $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                            }
                        }
                    },
                    "aoColumnDefs": [
                        { "bSortable": false, "aTargets": [ 1 ] }
                    ],
                    "aaSorting": [[ 1, 'asc' ]]
                });
                $.fn.dataTableExt.ofnSearch['html-input'] = function (value) {
                    return $(value).val();
                };

                //// sidebar toggle code///////////////
                $('#sidebarCollapse').on('click', function () {
                    var icon = $('#sidebarCollapse > .fas');
                    icon.toggleClass('fa-arrow-left fa-arrow-right');
                    $("#full_name").focus();
                    $('#sidebar').toggleClass('active');
                    $('#content').toggleClass('actv');

                });
                $('.app_date').datepicker({
                    format: 'd-M-yyyy',
                    startDate: 'date',
                    autoclose: true
                });
                $("#divCollapse").click(function () {
                    $("#full_name").focus();
                    $(".op-hide").toggle(1000);
                });
            }
        }
    });

});

////////////////////////////////// save limiter settings ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
$(document.body).on('click', '#save_limiter', function () {
    var validate = $('#limiter_form').validate();
    if (validate.form()) {
        var limiter = $('#limiter').val();
        var limiterdate = $('#limiter_date').val();
        var clinictime = $('#example-time-input').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'Dashboard/insert_limiter',
            type: 'post',
            data: {
                limiter: limiter,
                limiterDate: limiterdate,
                clinicTime: clinictime
            },
            cache: false,
            success: function (response) {
                $('.limiter_table').remove();
                $('#limiter_table').append(response.result_html);
                if (response.success == true) {
                    $('#limiter').val('');
                    $('#limiter_date').val('');
                    $('#example-time-input').val('');
                    $('#limiter_date').datepicker({
                        format: 'd-M-yyyy',
                        startDate: 'date',
                        autoclose: true
                    });
                    toastr["success"](response.message);
                }else{
                    toastr["warning"](response.message);
                }
            }
        });
    }
    return false;
});

////////////////////////////////////// Delete Single Patient ////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#delete_single_patient', function () {
    var bookingid = $.trim($(this).closest('tr').find('.appointment_booking_id').text());
    var bookingflag = $('#booking_flag').val();
    var tabledate = $('.pat_search').val();
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
               $.ajax({
                    url: window.location.origin+window.location.pathname+'Dashboard/delete_single_patient',
                    type: 'post',
                    data: {
                        bkId: bookingid,
                        flag: bookingflag,
                        tabledate: tabledate
                    },
                    cache: false,
                    success: function (response) {
                        if (response.booking_table != "") {
                            $('.table-responsive').remove();
                            $('#table-booking').append(response.booking_table);
                            //////// initilize datatable///////////////////
                            var oTable = $('#editable-datatable').DataTable({
                                "info": false,
                                "paging": false,
                                "searching": false,
                                "scrollY": "62vh",
                                "scrollCollapse": true,
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
                                    {"type": "html-input", "targets": [3, 6, 7, 8]}
                                ],
                                "fnDrawCallback": function ( oSettings ) {
                                    /* Need to redo the counters if filtered or sorted */
                                    if ( oSettings.bSorted || oSettings.bFiltered )
                                    {
                                        for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                                        {
                                            $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                                        }
                                    }
                                },
                                "aoColumnDefs": [
                                    { "bSortable": false, "aTargets": [ 1 ] }
                                ],
                                "aaSorting": [[ 1, 'asc' ]]
                            });
                            //// sidebar toggle code///////////////
                            $('#sidebarCollapse').on('click', function () {
                                var icon = $('#sidebarCollapse > .fas');
                                icon.toggleClass('fa-arrow-left fa-arrow-right');
                                $("#full_name").focus();
                                $('#sidebar').toggleClass('active');
                                $('#content').toggleClass('actv');

                            });
                            $("#editable-datatable tbody tr").click(function (e) {
                                if ($(this).hasClass('row_selected')) {
                                    $(this).removeClass('row_selected');
                                } else {
                                    oTable.$('tr.row_selected').removeClass('row_selected');
                                    $(this).addClass('row_selected');
                                }
                            });
                            if (response.message == "Deleted successfully") {
                                toastr["error"](response.message);
                            } else {
                                toastr["warning"](response.message);
                            }

                        }
                    }
                }); 
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});

/////////////////////////////////// load profile page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_profile', function () {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/',
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('.dashboard-content').remove();
                $('#dashboard-content').remove();
                $('#content-wrapper').append(response.result_html);
                $('.profile-table').remove();
                $('#profile_table').append(response.profile_table);
                $('#site-title').html('Profile');
                ///////////////// initilize datatable //////////////
                $('#profiletable').DataTable({
                    "info": false,
                    "searching": false,
                    "bLengthChange": false,
                    "scrollY": "56vh",
                    "scrollX": true,
                    "scrollCollapse": true,
                    "pageLength": 250,
                    // "initComplete": function (settings, json) {
                    //     $("#profiletable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                    // },
                    select: {
                        style: 'single'
                    },
                });
                $("#toggleresize1").click(function () {
                    var icon = $('#toggleresize1 > .arro');
                    icon.toggleClass('fa-arrow-left fa-arrow-right');
                    $('.resize1').toggleClass("active_resize1");
                    $('.resize2').toggleClass("inactive_resize2");

                });
                $("#toggleresize2").click(function () {
                    var icon = $('#toggleresize2 > .arro');
                    icon.toggleClass('fa-arrow-left fa-arrow-right');
                    $('.resize2').toggleClass("active_resize2");
                    $('.resize1').toggleClass("inactive_resize1");
                });
                // $('#profiletable tbody tr:first').addClass('row_selected');
                $("#profiletable tbody tr").click(function (e) {
                    $('#profiletable tbody tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                });
            }
        }
    });
});

function profile_filter(){
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/profile_filters',
        data: $('#profile_filter').serialize(),
        type: 'post',
        cache: false,
        success: function(response) {
            if(response.profile_table != ''){
                $('.profile-table').remove();
                $('#profile_table').append(response.profile_table);
                ///////////////// initilize datatable //////////////
                $('#profiletable').DataTable({
                    "info": false,
                    "searching": false,
                    "bLengthChange": false,
                    "scrollY": "56vh",
                    "scrollCollapse": true,
                    "pageLength": 250,
                    // "initComplete": function (settings, json) {
                    //     $(".profiletable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                    // }
                    "scrollX": true,
                });
                $('#profiletable tbody tr:first').addClass('row_selected');
                $("#profiletable tbody tr").click(function (e) {
                    $('#profiletable tbody tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                });
            }
        }
    });
}
/////////////////////////////////// load history page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_history', function () {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile_history/history',
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
            }
        }
    });
});

$(document.body).on('click', '#add_history_category', function () {
    var category = $('#history_category').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'Setting/add_history_category',
        type: 'post',
        data: {category: category},
        cache: false,
        success: function (response) {
            if (response.category_table != '') {
                $('.history_category_content').empty();
                $('.history_category_content').append(response.category_table);
            }
        }
    });
});
/////////////////////////////////// load profession page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#profes_add', function (e) {
    e.preventDefault();
    professionvalidate = $('#profession_form').validate();
    if (professionvalidate.form()) {
        var profession = $('#profession_add').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'Setting/insert_profession',
            type: 'post',
            data: {profession: profession},
            cache: false,
            success: function (response) {
                $('.profession_table').remove();
                $('#profession_table').append(response.profession_table);
                $('#profession_add').val('');
                $('.prof_his_id').prop('selectedIndex',0);
                $('#history_items').prop('selectedIndex',0);
                if (response.success == true) {
                    toastr["success"](response.message);
                } else {
                    toastr["warning"](response.message);
                }
            }
        });
    }else{
        return false;
    }
});
$(document.body).on('click', '.delete_profession', function () {
    var action_url = $(this).attr('data-href');
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: action_url,
                    cache: false,
                    success: function (response) {
                        $('.profession_table').remove();
                        $('#profession_table').append(response.profession_table);
                        if (response.success== true) {
                            toastr["error"](response.message);
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});



/////////////////////////////////// load district page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#add_district', function () {
    var district = $('#district_add').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'Setting/insert_district',
        type: 'post',
        data: {district: district},
        cache: false,
        success: function (response) {
            if (response.district_table != '') {
                $('.district_content').remove();
                $('#district_content').append(response.district_table);
                $('#district_add').val('');
                if (response.success == true) {
                    toastr["success"](response.message);
                } else {
                    toastr["warning"](response.message);
                }
            }
        }
    });
});
///////////////////////////////////////////////////////ett setting page ///////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document.body).on('click', '#add_ett_test_reason', function () {
    var validatetest = $('#test_reason_form').validate();
    if(validatetest.form()){
        var testreason = $('#ett_test_reason').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'ETT/add_ett_testreason',
            type: 'post',
            data: {testreason: testreason},
            cache: false,
            success: function (response) {
                $('#ett_test_reason').val('');
                $('.ins_category_container').empty();
                $('.ins_category_container').append(response.result_html);
                if (response.message == "Added successfully!") {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
        return false;
    }
});


$(document.body).on('click', '.delete-test-reason', function () {
    var action_url = $(this).attr('data-href'); 
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: action_url,
                    cache: false,
                    success: function (response) {
                        $('.ins_category_container').empty();
                        $('.ins_category_container').append(response.result_html);
                        if (response.success) {
                            toastr["error"](response.message);
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});

$(document.body).on('click', '#add_ending_reason', function () {
    var validate = $('#ending_reason_form').validate();
    if (validate.form()) {
        var endingreason = $('#ending_reason').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'ETT/add_ett_endingreason',
            type: 'post',
            data: {endingreason: endingreason},
            cache: false,
            success: function (response) {
                $('#ett_test_reason').val('');
                $('.ending_reason_table').empty();
                $('.ending_reason_table').append(response.result_html);
                $('#ending_reason').val('');
                if (response.message == "Added successfully!") {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
        return false;
    }
});

$(document.body).on('click', '.delete-ending-reason', function () {
    var action_url = $(this).attr('data-href');
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: action_url,
                    cache: false,
                    success: function (response) {
                        $('.ending_reason_table').empty();
                        $('.ending_reason_table').append(response.result_html);
                        if (response.message == "Updated successfully!") {
                            toastr["error"](response.message);
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});

$(document.body).on('click', '#add_ett_discription', function () {
    var validate = $('#ett_discription_form').validate();
    if (validate.form()) {
        var description = $('#ett_discription').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'ETT/add_ett_discription',
            type: 'post',
            data: {description: description},
            cache: false,
            success: function (response) {
                $('#ett_discription').val('');
                $('.discription-table').empty();
                $('.discription-table').append(response.result_html);
                if (response.message == "Added successfully!") {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
        return false;
    }
});

$(document.body).on('click', '.delete-description', function () {
    var action_url = $(this).attr('data-href');
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: action_url,
                    cache: false,
                    success: function (response) {
                        $('.discription-table').empty();
                        $('.discription-table').append(response.result_html);
                        if (response.message == "Deleted Successfully.") {
                            toastr["error"](response.message);
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});

$(document.body).on('click', '#add_conclusion', function () {
    var validate = $('#ett_conclusion_form').validate();
    if(validate.form()){
        var conclusion = $('#ett_conclusion').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'ETT/add_conclusion',
            type: 'post',
            data: {conclusion: conclusion},
            cache: false,
            success: function (response) {
                $('#ett_conclusion').val('');
                $('.conclusion_table_content').empty();
                $('.conclusion_table_content').append(response.result_html);
                if (response.message == "Added successfully!") {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
        return false;
    }
});

$(document.body).on('click', '.delete-conclusion', function () {
    var action_url = $(this).attr('data-href');
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: action_url,
                    cache: false,
                    success: function (response) {
                        $('.conclusion_table_content').empty();
                        $('.conclusion_table_content').append(response.result_html);
                        if (response.message == "Deleted Successfully.") {
                            toastr["error"](response.message);
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});

$(document.body).on('click', '#add_protocol', function () {
    var validate = $('#ett_protocol_form').validate();
    if (validate.form()) {
        var protocol = $('#new_protocol').val();
        var stages = $('#protocol_stages').val();
        var recovery = $('#protocol_recovery').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'ETT/protocol',
            type: 'post',
            data: {
                protocol: protocol,
                stages: stages,
                recovery: recovery
            },
            cache: false,
            success: function (response) {
                $('#new_protocol').val('');
                $('#protocol_stages').val('');
                $('#protocol_recovery').val('');
                $('.protocol_table_content').empty();
                $('.protocol_table_content').append(response.result_html);
                if (response.message == "Added successfully!") {
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
        return false;
    }
});

$(document.body).on('click', '.delete-protocol', function () {
    var action_url = $(this).attr('data-href');
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: action_url,
                    cache: false,
                    success: function (response) {
                        $('.protocol_table_content').empty();
                        $('.protocol_table_content').append(response.result_html);
                        if (response.message == "Deleted Successfully.") {
                            toastr["error"](response.message);
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});

/////////////////////////////////// load patient exemination page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat-exemination', function () {
    var cval = $('#examination_clone_val').val();
    var testid = $('#examination_details_table tbody tr td:nth-child(4).row_selected').siblings('.testid').text();
    var patid = $.trim($('#profiletable tbody tr.row_selected').find('.profile_id').text());
    var patname = $.trim($('#profiletable tbody tr.row_selected').find('.patient-name').text());
    var sitetitle = 'Examination-'+patname;
    $('#site-title').html(sitetitle);
    if (patid=='') {
         toastr["warning"]('Please select a patient first.');
    }else{
        if(cval != ''){
            showEditexaminationDetail(cval,testid,patid);
        }else{
            $.ajax({
                url: window.location.origin+window.location.pathname+'Setting/patient_exemination/'+patid,
                cache: false,
                success: function (response) {
                    if (response.result_html != '') {
                        $('.content-wrapper').remove();
                        $('#content-wrapper').append(response.result_html);
                        $('#permissions-table').DataTable({
                            "scrollX": true
                        });
                        $('.app_date').datepicker({
                            format: 'd-M-yyyy',
                            autoclose: true
                        });

                        $('#profile_examination_container').empty();
                        $('#profile_examination_container').append(response.examination_table);

                        $('#profile_history_container').empty();
                        $('#profile_history_container').append(response.history_table);

                        $('#investigation_category_container').empty();
                        $('#investigation_category_container').append(response.investigation_html);

                        $('#advice_category_container').empty();
                        $('#advice_category_container').append(response.advice_html);

                        $('#instruction_category_container').empty();
                        $('#instruction_category_container').append(response.instruction_html);

                        $('#medicine_category_container').empty();
                        $('#medicine_category_container').append(response.medicine_html);

                        $('#pat_ett_information').empty();
                        $('#pat_ett_information').append(response.patient_information);

                        $('#clone_val_examination').val(cval);
                    }
                }
            });
        }
    }
});

/////////////////////////////////// load patient special instructions page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
$(document.body).on('click', '.pat-spInstructions', function () {
    var patid = $.trim($('#profiletable tbody tr.row_selected').find('.profile_id').text());
    var patname = $.trim($('#profiletable tbody tr.row_selected').find('.patient-name').text());
    var sitetitle = 'Sp Instruction-'+patname;
    if (patid=='') {
         toastr["warning"]('Please select a patient first.');
    }else{
        $.ajax({
            url: window.location.origin+window.location.pathname+'Profile/patient_special_instructions',
            type: 'post',
            data: {patid:patid},
            cache: false,
            success: function (response) {
                if (response.result_html != '') {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.result_html);
                    $('#site-title').html(sitetitle);
                    $('.patient_info').remove();
                    $('#pat_sp_information').append(response.patient_information);
                    $('.sp_data_table').remove();
                    $('#sp_data_table').append(response.sp_table);
                    $("#sp-ins-table tbody tr").click(function (e) {
                        $('#sp-ins-table tbody tr.row_selected').removeClass('row_selected');
                        $(this).addClass('row_selected');
                    });
                }
            }
        });
    }
});

$(document.body).on('click', '.exa-pat-spInstructions', function () {
    var patid = $('#label_patient_id').text();
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/patient_special_instructions',
        type: 'post',
        data: {patid:patid},
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.patient_info').remove();
                $('#pat_sp_information').append(response.patient_information);
                $('.sp_data_table').remove();
                $('#sp_data_table').append(response.sp_table);
                $("#sp-ins-table tbody tr").click(function (e) {
                    $('#sp-ins-table tbody tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                });
                
            }
        }
    });
});

/////////////////////////////////// load patient lab test page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '.pat-labtest', function () {
    var patid = $.trim($('#profiletable tbody tr.row_selected').find('.profile_id').text());
    var patname = $.trim($('#profiletable tbody tr.row_selected').find('.patient-name').text());
    var sitetitle = 'Lab Test-'+patname;
    if (patid=='') {
         toastr["warning"]('Please select a patient first.');
    }else{
        $.ajax({
            url: window.location.origin+window.location.pathname+'Profile/patient_lab_test',
            type: 'post',
            data: {patid:patid},
            cache: false,
            success: function (response) {
                if (response.result_html != '') {
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.result_html);
                    $('#site-title').html(sitetitle);
                    $('.patient_info').remove();
                    $('#pat_sp_information').append(response.patient_information);
                    $('.lab-date').datepicker({
                        format: 'd-M-yyyy'
                    });
                    $('#lab_test_data_table').empty();
                    $('#lab_test_data_table').append(response.test_table);
                }
            }
        });
    }
});

$(document.body).on('click', '.exa-pat-labtest', function () {
   var patid = $('#label_patient_id').text();
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/patient_lab_test',
        type: 'post',
        data: {patid:patid},
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.patient_info').remove();
                $('#pat_sp_information').append(response.patient_information);
                $('.lab-date').datepicker({
                    format: 'd-M-yyyy'
                });
                $('#lab_test_data_table').empty();
                $('#lab_test_data_table').append(response.test_table);
            }
        }
    });
});
/////////////////////////////////// load patient ett test page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#diary', function () {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Dashboard/diary',
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('.dashboard-content').remove();
                $('#content-wrapper').append(response.result_html);
                $('#site-title').html('Diary');
                $('.lab-date').datepicker({
                    format: 'd-M-yyyy'
                });
            }
        }
    });
});

///////////////////////////////// consultant booking //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

function consultant_booking(val) {
    var dataToupdate = val.name;
    // var Toupdate = $(val).parent().parent().find('.appointment_booking_id').text();
    // var whereToupdate = $.trim(Toupdate);
    var appdate = $('#app_date').val();
    var orderno = $.trim($(val).parent().parent().find('.order-number').text());
    var valuetoinsert = val.value;
    var bookingflag = $('#booking_flag').val();
    var tabledate = $('.pat_search').val();
    $.ajax({
        type: "post",
        url: window.location.origin+window.location.pathname+'User/consultant_bookings',
        data: {
            appValue: valuetoinsert,
            valToUpdate: dataToupdate,
            flag: bookingflag,
            orderno: orderno,
            tabledate: tabledate,
            appdate:appdate
        }, success: function (response) {
            if (response.booking_table != '') {
                $('.table-responsive').remove();
                $('#table-booking').append(response.booking_table);
                $('.wallet-modal-box').remove();
                $('#wallet-modal-box').append(response.wallet_count);
                $("#full_name").focus();
                //////////////// datatable initilization//////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "scrollY": "62vh",
                    "scrollCollapse": true,
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
                        {"type": "html-input", "targets": [3, 6, 7, 8]}
                    ],
                    "fnDrawCallback": function ( oSettings ) {
                        /* Need to redo the counters if filtered or sorted */
                        if ( oSettings.bSorted || oSettings.bFiltered )
                        {
                            for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                            {
                                $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                            }
                        }
                    },
                    "aoColumnDefs": [
                        { "bSortable": false, "aTargets": [ 1 ] }
                    ],
                    "aaSorting": [[ 1, 'asc' ]]
                });
                $("#editable-datatable tbody tr").click(function (e) {
                    if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                    } else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                        $(this).addClass('row_selected');
                    }
                });
                $('.app_date').datepicker({
                    format: 'd-M-yyyy',
                    autoclose: true
                });

                if (response.message == 'Inserted successfully') {
                    toastr["success"]('Inserted successfully');
                } else {
                    toastr["warning"]('not inserted');
                }
            }

        }
    });
}

///////////////////////////////////// print vip ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#print_vip', function () {
    var url = window.location.origin+window.location.pathname;
    var flag = 'vip';
    var win = window.open(url+'User/print_vip_list/?flag=' + flag, '_blank');
    if (win) {
        console.log("new tab opened")
        win.focus();
    } else {
        alert('Please allow popups for this website');
    }
});

///////////////////////////////////// print on walk ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#print_onwalk', function () {
    var url = window.location.origin+window.location.pathname;
    var flag = 'on_walk';
    var win = window.open(url+'User/print_onwalk_list/?flag=' + flag, '_blank');
    if (win) {
        console.log("new tab opened")
        win.focus();
    } else {
        alert('Please allow popups for this website');
    }
});

///////////////////////////////////// print on call ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#print_oncall', function () {
    var url = window.location.origin+window.location.pathname;
    var flag = 'on_call';
    var win = window.open(url+'User/print_oncall_list/?flag=' + flag, '_blank');
    if (win) {
        console.log("new tab opened")
        win.focus();
    } else {
        alert('Please allow popups for this website');
    }
});

///////////////////////////////////// print on call ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#print_all_list', function () {
    var url = window.location.origin+window.location.pathname;
    var printdate = $('#print_all').val();
    var win = window.open(url+'User/print_all_list/?date=' + printdate, '_blank');
    if (win) {
        console.log("new tab opened")
        win.focus();
    } else {
        alert('Please allow popups for this website');
    }
});

/////////////////////////////////////// save new profile ////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#save_new_profile', function () {
    var validate = $( "#profile_form" ).validate({
        rules:{
            pat_profile_profession:{
                required:true
            },
            pat_profile_district:{
                required:true
            }

        }
    });
    if (validate.form()) {
        var profilename = $('#pat_profile_name').val();
        var profilerelative = $('#pat_profile_relative_name').val();
        var profileagedigit = $('#pat_profile_age_digit').val();
        var profileage = $('#pat_profile_age').val();
        var profileprofession = $('#pat_profile_profession option:selected').text();
        var profilesex = $('input[name="pat_sex"]:checked').val();
        var profilecontact = $('#pat_profile_contact').val();
        var profileheight = $('#pat_profile_height').val();
        var profilebmi = $('#pat_profile_bmi').val();
        var profileweight = $('#pat_profile_weight').val();
        var profilebsa = $('#pat_profile_bsa').val();
        var profileemail = $('#pat_profile_email').val();
        var profiledistrict = $('#pat_profile_district option:selected').text();
        var profileaddress = $('#pat_profile_address').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'Profile/add_profile',
            type: 'post',
            data: {
                name: profilename,
                relatename: profilerelative,
                agedigit: profileagedigit,
                age: profileage,
                profession: profileprofession,
                sex: profilesex,
                contact: profilecontact,
                height: profileheight,
                bmi: profilebmi,
                weight: profileweight,
                bsa: profilebsa,
                email: profileemail,
                district: profiledistrict,
                address: profileaddress
            }, success: function (response) {
                if (response.success) {
                    $('#add-new-patient').modal('hide');
                    document.getElementById('profile_form').reset();
                    $('.profile-table').remove();
                    $('#profile_table').append(response.profile_table);
                    ///////////////// initilize datatable //////////////
                    $('#profiletable').DataTable({
                        "info": false,
                        "searching": false,
                        "bLengthChange": false,
                        "scrollY": "56vh",
                        "scrollCollapse": true,
                        "pageLength": 250,
                        // "initComplete": function (settings, json) {
                        //     $(".profiletable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                        // }
                        "scrollX": true,
                    });
                     $('#profiletable tbody tr:first').addClass('row_selected');
                    $("#profiletable tbody tr").click(function (e) {
                        $('#profiletable tbody tr.row_selected').removeClass('row_selected');
                        $(this).addClass('row_selected');
                    });
                    if (response.success == true ) {
                        toastr["success"](response.message);
                    }else{
                        toastr["error"](response.message);
                    }
                    
                } else {
                    toastr["error"](response.message);
                }
            }
        });
    }else{
        return false;
    }
    
});

function calculateBsaBmi(val){
    var weight = val.value;
    var height = $('.pat_profile_height').val();
    var height_m = height / 100;
    var height_m2 = Math.pow(height_m, 2);
    var bmi = weight/height_m2;
    var a = weight*height;
    var b = a/3600;
    var bsa = Math.sqrt(b);
    var value_bmi = $('.pat_profile_bmi').val(bmi.toFixed(2));
    var value_bsa = $('.pat_profile_bsa').val(bsa.toFixed(2));
}

function calculateBmiBsa(val){
    var height = val.value;
    var weight = $('.pat_profile_weight').val();
    var height_m = height / 100;
    var height_m2 = Math.pow(height_m, 2);
    var bmi = weight/height_m2;
    var a = weight*height;
    var b = a/3600;
    var bsa = Math.sqrt(b);
    var value_bmi = $('.pat_profile_bmi').val(bmi.toFixed(2));
    var value_bsa = $('.pat_profile_bsa').val(bsa.toFixed(2));
}

function calculateBsaBmiedit(val){
    var weight = val.value;
    var height = $('.pat_profile_height_edit').val();
    var height_m = height / 100;
    var height_m2 = Math.pow(height_m, 2);
    var bmi = weight/height_m2;
    var a = weight*height;
    var b = a/3600;
    var bsa = Math.sqrt(b);
    var value_bmi = $('.pat_profile_bmi_edit').val(bmi.toFixed(2));
    var value_bsa = $('.pat_profile_bsa_edit').val(bsa.toFixed(2));
}

function calculateBmiBsaedit(val){
    var height = val.value;
    var weight = $('.pat_profile_weight_edit').val();
    var height_m = height / 100;
    var height_m2 = Math.pow(height_m, 2);
    var bmi = weight/height_m2;
    var a = weight*height;
    var b = a/3600;
    var bsa = Math.sqrt(b);
    var value_bmi = $('.pat_profile_bmi_edit').val(bmi.toFixed(2));
    var value_bsa = $('.pat_profile_bsa_edit').val(bsa.toFixed(2));
}

////////////////////////////////////// Delete from profile page ////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#delete_profile', function () {
    var tr = $(this).closest('tr');
    var profileid = $.trim(tr.find('.profile_id').text());
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: window.location.origin+window.location.pathname+'Profile/delete_profile',
                    type: 'post',
                    data: {
                        id: profileid
                    },
                    cache: false,
                    success: function (response) {
                        if (response.profile_table != "") {
                            $('.profile-table').remove();
                            $('#profile_table').append(response.profile_table);
                            ///////////////// initilize datatable //////////////
                            $('#profiletable').DataTable({
                                "info": false,
                                "searching": false,
                                "bLengthChange": false,
                                "scrollY": "56vh",
                                "scrollCollapse": true,
                                "scrollX": true,
                                "pageLength": 250,
                                // "initComplete": function (settings, json) {
                                //     $(".profiletable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                                // }
                            });
                             $('#profiletable tbody tr:first').addClass('row_selected');
                            $("#profiletable tbody tr").click(function (e) {
                                $('#profiletable tbody tr.row_selected').removeClass('row_selected');
                                $(this).addClass('row_selected');
                            });
                            if (response.message == "Deleted successfully.") {
                                toastr["success"](response.message);
                            } else {
                                toastr["warning"](response.message);
                            }

                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
});

////////////////////////////////// load update profile modal //////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#profile_modal_edit', function () {
    var tr = $(this).closest('tr');
    var profileid = $.trim(tr.find('.profile_id').text());
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/update_modal',
        type: 'post',
        data: {
            id: profileid
        }, success: function (response) {
            $('.edit_modal').remove();
            $('#edit_modal').append(response.edit_modal);
            $('#update_modal').modal('show');
        }
    });
});

/////////////////////////////////////// update profile ////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#update_profile', function () {
    var validater = $('#profile_update_form').validate();
    if (validater.form()) {
        var profileid = $('.update_profile_id').val();
        var profilename = $('#updat_pat_profile_name').val();
        var profilerelative = $('#updat_pat_profile_relative_name').val();
        var profileagedigit = $('#updat_pat_profile_age_digit').val();
        var profileage = $('#updat_pat_profile_age').val();
        var profileprofession = $('#updat_pat_profile_profession option:selected').text()
        var profilesex = $('input[name="pat_sex"]:checked').val();
        var profilecontact = $('#updat_pat_profile_contact').val();
        var profileheight = $('#updat_pat_profile_height').val();
        var profilebmi = $('#updat_pat_profile_bmi').val();
        var profileweight = $('#updat_pat_profile_weight').val();
        var profilebsa = $('#updat_pat_profile_bsa').val();
        var profileemail = $('#updat_pat_profile_email').val();
        var profiledistrict = $('#updat_pat_profile_district option:selected').text();
        var profileaddress = $('#updat_pat_profile_address').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'Profile/update_profile_data',
            type: 'post',
            data: {
                id: profileid,
                name: profilename,
                relatename: profilerelative,
                agedigit: profileagedigit,
                age: profileage,
                profession: profileprofession,
                sex: profilesex,
                contact: profilecontact,
                height: profileheight,
                bmi: profilebmi,
                weight: profileweight,
                bsa: profilebsa,
                email: profileemail,
                district: profiledistrict,
                address: profileaddress
            }, success: function (response) {
                if (response.success) {
                    $('#update_modal').modal('hide');
                    document.getElementById('profile_update_form').reset();
                    $('.profile-table').remove();
                    $('#profile_table').append(response.profile_table);
                    ///////////////// initilize datatable //////////////
                    $('#profiletable').DataTable({
                        "info": false,
                        "searching": false,
                        "bLengthChange": false,
                        "scrollY": "56vh",
                        "scrollCollapse": true,
                        "scrollX": true,
                        "pageLength": 250,
                        // "initComplete": function (settings, json) {
                        //     $(".profiletable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                        // }
                    });
                    $('#profiletable tbody tr:first').addClass('row_selected');
                    $("#profiletable tbody tr").click(function (e) {
                        $('#profiletable tbody tr.row_selected').removeClass('row_selected');
                        $(this).addClass('row_selected');
                    });
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
    }
});

$(document.body).on('click', '#wallet_search', function () {
        var walletsearch = $('#wallet_date').val();
        $.ajax({
            url: window.location.origin+window.location.pathname+'User/search_wallet_status',
            type: 'post',
            data: {
                walletsearch:walletsearch
            },success:function(response){
                $('.wallet-modal-box').remove();
                $('#wallet-modal-box').append(response.wallet_count);
            }
        });
    });

function get_professions(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Setting/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('.profession_table').remove();
                $('#profession_table').append(response.profession_table);
                $('#site-title').html('Profession');
            }
        }
    });
}
function get_districts(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Setting/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('.district_content').remove();
                $('#district_content').append(response.district_table);
                $('#site-title').html('District');
            }
        }
    });
}

function get_history(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile_history/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('History');
            }
        }
    });
}

function get_examinations(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Examination/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('Examination');
            }
        }
    });
}

function get_investigations(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Investigation/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('Investigation');
            }
        }
    });
}



function get_recommendations(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Angio_recommendation/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('Angio');
            }
        }
    });
}


function get_instructions(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Instruction/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('Instruction');
            }
        }
    });
}

function get_medicine(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Medicine/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('Medicine');
            }
        }
    });

}

function get_echo(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Echo_controller/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('Echo');
            }
        }
    });

}

function get_ett(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'ETT/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('ETT');
            }
        }
    });

}

function get_advice(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Setting/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('Advice');
            }
        }
    });
}


function get_research(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Setting/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('Research');
            }
        }
    });
}


function get_register_user(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Setting/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('.user_table_content').remove();
                $('#user_table_content').append(response.user_html);
                $('#site-title').html('Register User');
            }
        }
    });
}


function get_list_permission(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Setting/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('Permissions');
                ///////////////// initilize datatable //////////////
                $('#permissions-table').DataTable({
                    "scrollX": true
                });
            }
        }
    });
}

function get_delete_patients(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Setting/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('Delete Patients');
                ///////////////// initilize datatable //////////////
                $('#research-table').DataTable({
                    "scrollX" : true,
                    "scrollY" : '50vh',
                    scrollCollapse: true,
                    paging: false,
                    info: false
                });
                $('.pat_search_to').datepicker({
                    format: 'd-M-yyyy'
                });
                $('.pat_search_from').datepicker({
                    format: 'd-M-yyyy'
                });
            }
        }
    });
}

function get_item_limiter(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Setting/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('.limiter_table').remove();
                $('#limiter_table').append(response.limiter_table);
                $('#site-title').html('Limiter');
                $('#limiter_date').datepicker({
                    format: 'd-M-yyyy',
                    startDate: 'date',
                    autoclose: true
                });

            }
        }
    });
}

function get_patient_vitals(patid,func_call,patname) {
    var sitetitle = 'Vitals-'+patname;
    $.ajax({
        url: window.location.origin+window.location.pathname+'User/'+func_call,
        type: 'post',
        data:{patid:patid},
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('#vital_rows').empty();
                $('#vital_rows').append(response.vital_rows);
                $('#site-title').html()
                $('#site-title').html(sitetitle);
                $('#vitaltabl').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "scrollY": "67vh",
                    "scrollCollapse": true,
                    "scrollX":true,
                    "ordering": false

                });
            }
        }
    });
}


function get_laboratory_test(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Setting/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('Laboratory Test');
            }
        }
    });
}

function grade_special_instruction(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'instruction/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#site-title').html('Special Instruction');
                ///////////////// initilize datatable //////////////
                $('#research-table').DataTable({
                    "scrollX": true,
                    scrollY: '50vh',
                    scrollCollapse: true,
                    paging: false,
                    info: false
                });
            }
        }
    });
}

///////////////////////////////// doctor signature module/////////////////////////////////////

function get_items_signature(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Doctor_signature/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('.signature_table').remove();
                $('#signature_table').append(response.signature_table);
                $('#site-title').html('Doctor Signature');
            }
        }
    });
}

$(document.body).on('click', '#save_signature',function(e){
    e.preventDefault();
    var validate = $('#doc_signature_form_validation').validate();
    if (validate.form()) {
        var docName = $('#doc_sig_name').val();
        var docQuali = $('#doc_sig_quali').val();
        var docDesi = $('#doc_sig_desi').val();
        var docInst = $('#doc_sig_institution').val();
        $.ajax({
            url:window.location.origin+window.location.pathname+'Doctor_signature/save_doc_signature',
            type: 'post',
            data: {
                docName: docName,
                docQuali: docQuali,
                docDesi: docDesi,
                docInst: docInst
            },
            cache: false,
            success:function(response){
                if(response.signature_table != ''){
                    $('.signature_table').remove();
                    $('#signature_table').append(response.signature_table);
                    if(response.message != ''){
                        toastr["success"](response.message);
                    }else{
                        toastr["warning"](response.error);
                    }
                    
                }
            }
        });
    }
});

function updateSignature(editableObj, column, id) {
    $.ajax({
        url: window.location.origin+window.location.pathname+"Doctor_signature/update_signature_details",
        type: "POST",
        data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
        success: function (response) {
            if (response.success) {
                toastr["success"](response.message);
            }else{
                document.execCommand('undo');
                toastr["error"](response.message);
            }
        }
    });
}

$(document.body).on('click', '.delete-signature', function () {
    var action_url = $(this).attr('data-href');
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: action_url,
                    cache: false,
                    success: function (response) {
                        if(response.signature_table != ''){
                            $('.signature_table').remove();
                            $('#signature_table').append(response.signature_table);
                            if(response.success == true){
                                toastr["error"](response.message);
                            }else{
                                toastr["error"](response.error);
                            }
                        
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});

/////////////////////////////// manage research module ///////////////////////////////////////////

function get_manage_reasearch(func_call) {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Manage_research/'+func_call,
        cache: false,
        success: function (response) {
            if (response.result_html != '') {
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('.manage_research_table').remove();
                $('#manage_research_table').append(response.profile_table);
                $('#site-title').html('Manage Research');
                ///////////////// initilize datatable //////////////
                $('#research-table').DataTable({
                    "scrollX": true,
                    "scrollY": "50vh",
                    "scrollCollapse": true,
                    "paging": false,
                    "info": false,
                    "searching": false
                });
                $('#research-table tbody tr:first').addClass('row_selected');
                $("#research-table tbody tr").click(function (e) {
                $('#research-table tbody tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
            });
            }
        }
    });
}

$(document.body).on('click', '.delete_research_profile', function () {
    var action_url = $(this).attr('data-href');
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: action_url,
                    cache: false,
                    success: function (response) {
                        if(response.profile_table != ''){
                            $('.manage_research_table').remove();
                            $('#manage_research_table').append(response.profile_table);
                            ///////////////// initilize datatable //////////////
                            $('#research-table').DataTable({
                                "scrollX": true,
                                "scrollY": "50vh",
                                "scrollCollapse": true,
                                "paging": false,
                                "info": false,
                                "searching": false
                            });
                            $('#research-table tbody tr:first').addClass('row_selected');
                            $("#research-table tbody tr").click(function (e) {
                                $('#research-table tbody tr.row_selected').removeClass('row_selected');
                                $(this).addClass('row_selected');
                            });
                            if(response.success == true){
                                toastr["success"](response.message);
                            }else{
                                toastr["warning"](response.error);
                            }
                        
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});

$(document.body).on('click','#assign_research',function(e){
    e.preventDefault();
    var validate = $('#manage_research_form').validate({
        rules: {
            research_option: {
              required: true
            }
        }
    });
    if (validate.form()) {
        var researchid = $('#research_option option:selected').val();
        var profileid = $('#research-table tbody tr.row_selected').find('.prof_id').text();
        $.ajax({
            url: window.location.origin+window.location.pathname+'Manage_research/assign_research',
            type: 'post',
            data: {
                rid:researchid,
                pid:profileid
            },
            cache: false,
            success:function(response){
                if(response.success == true){
                    toastr["success"]("Patient added to Research Successfully.");
                }else{
                    toastr["error"]("There is a problem while adding.");
                }
            }
        });
    }
});

/////////////////////////////////////////////// diary module ////////////////////////////////////
$(document.body).on('click', '#save_diary', function (){
    var user = $('#diary_user option:selected').text();
    var note = $.trim($('#diary_conent').text());
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/save_note',
        type: 'post',
        data: {
            username: user,
            note: note
        },
        cache:false,
        success:function(response){
            if(response.success == true){
                toastr["success"](response.message);
                $('#diary_conent').text('');
                // $('.diary_sidebar').remove();
                // $('#diary_sidebar').append(response.diary_sidebar);
                $("#diray_table tbody tr").click(function (e) {
                    $('#diray_table tbody tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                });
            }else{
                toastr["warning"](response.message);
            }
        }
    });
});

$(document.body).on('click', '.delete-notes', function () {
    var action_url = $(this).attr('data-href');
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: action_url,
                    cache: false,
                    success: function (response) {
                        $('.diary_sidebar').remove();
                        $('#diary_sidebar').append(response.diary_sidebar);
                        $("#diray_table tbody tr").click(function (e) {
                            $('#diray_table tbody tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                        });
                        if(response.success == true){
                            toastr["error"](response.message);
                            $('#note_update').text('');
                        }else{
                            toastr["error"](response.error);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});
$(document.body).on('click','#old-notes',function(){
    var username = $('#diary_user_note').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/get_notes_record',
        type: 'post',
        data: {username:username},
        cache: false,
        success: function(response){
            $('.diary_sidebar').remove();
            $('#diary_sidebar').append(response.diary_sidebar);
            $("#diray_table tbody tr").click(function (e) {
                $('#diray_table tbody tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
            });
        }
    });
});
$(document.body).on('change', '#diary_user_note', function(){
    var username = $(this).val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/get_notes_record',
        type: 'post',
        data: {username:username},
        cache: false,
        success: function(response){
            $('.diary_sidebar').remove();
            $('#diary_sidebar').append(response.diary_sidebar);
            $("#diray_table tbody tr").click(function (e) {
                $('#diray_table tbody tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
            });
        }
    });
});

$(document.body).on('click', '#diray_table tbody tr.row_selected', function(){
    var note_id = $(this).find('.note_id').text();
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/get_selected_note',
        type: 'post',
        data: {id:note_id},
        cache: false,
        success: function(response){
            $('.diary_note_update').remove();
            $('#diary_note_update').append(response.update_note);
            $('#update_note').removeClass('hide');
            $('#update_note').addClass('show');
        }
    });
});

$(document.body).on('click', '#update_note', function(){
    var note_id = $('#diray_table tbody tr.row_selected').find('.note_id').text();
    var notevalue = $.trim($('#note_update').text());
    $.ajax({ 
        url: window.location.origin+window.location.pathname+'Profile/update_note',
        type: 'post',
        data: {
            id: note_id,
            note: notevalue
        },
        cache: false,
        success: function(response){
            if (response.success == true) {
                toastr['success'](response.message);
            }else{
                toastr['error'](response.message);
            }
        }
    });
});
/////////////////////// filter research managment ///////////////////////////////////////
function research_filters(){
    $.ajax({
        url: window.location.origin+window.location.pathname+'Manage_research/research_filters',
        data: $('#research_filter').serialize(),
        type: 'post',
        cache: false,
        success: function(response) {
            if(response.profile_table != ''){
                $('.manage_research_table').remove();
                $('#manage_research_table').append(response.profile_table);
                $('#research-table').DataTable({
                    "scrollX": true,
                    "scrollY": "50vh",
                    "scrollCollapse": true,
                    "paging": false,
                    "info": false,
                    "searching": false
                });
                $('#research-table tbody tr:first').addClass('row_selected');
                $("#research-table tbody tr").click(function (e) {
                    $('#research-table tbody tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                });
            }
        }
    });
}
$(document.body).on('click', '#reset_research', function () {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Manage_research/reset_research_table',
        cache: false,
        success: function (response) {
            if(response.profile_table != ''){
                document.getElementById('research_filter').reset();
                $('.manage_research_table').remove();
                $('#manage_research_table').append(response.profile_table);
                $('#research-table').DataTable({
                    "scrollX": true,
                    "scrollY": "50vh",
                    "scrollCollapse": true,
                    "paging": false,
                    "info": false,
                    "searching": false
                });
                $('#research-table tbody tr:first').addClass('row_selected');
                $("#research-table tbody tr").click(function (e) {
                    $('#research-table tbody tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                });
            }
        }
    });
    return false;
});

$(document.body).on('change', '#research_option', function (){
    if($(this).val()!=""){
        $('#research_modal').css('visibility','visible');
        var id = $(this).val();
        $('#manage_research_id').val(id);

    }else{
        $('#research_modal').css('visibility','hidden');
    }
});

$(document.body).on('click', '#research_modal', function (){
    var researchid = $('#research_option option:selected').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'Manage_research/research_description',
        type: 'post',
        data: {id:researchid},
        cache: false,
        success: function(response){
            $('.research_modal_body').remove();
            $('#research_modal_body').append(response.description_html);
        }
    });
});

$(document.body).on('click', '#update_research_desccription', function(){
    $.ajax({
        url: $('#manageresearch_form').attr('data-action'),
        type: 'post',
        data:  $('#manageresearch_form').serialize(),
        cache: false,
        success: function(response) {
            $('#research_modal').modal('hide');
            if (response.success) {
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }

        }
    });
    return false;
});

///////////////////////////////////// load patient information /////////////////////////////////////////////////

$(document.body).on('click', '#profiletable tbody tr.row_selected', function(){
    var patid = $.trim($(this).find('.profile_id').text());
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/patient_info',
        type: 'post',
        data: {patid:patid},
        cache: false,
        success: function(response){
            $('.patient_info').remove();
            $('#patient_info').append(response.patient_information);
            $('#echo_detail_container').empty();
            $('#echo_detail_container').append(response.details);
            $("#prescription_details").prop("checked", true);
            $('#files_content').empty();
            $('#files_content').append(response.image_html);

        }
    });
});

$(document.body).on('click', '#reset_profile_filter', function () {
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/reset_profile_table',
        cache: false,
        success: function (response) {
            if(response.profile_table != ''){
                document.getElementById('profile_filter').reset();
                $('.profile-table').remove();
                $('#profile_table').append(response.profile_table);
                ///////////////// initilize datatable //////////////
                $('#profiletable').DataTable({
                    "info": false,
                    "searching": false,
                    "bLengthChange": false,
                    "scrollY": "56vh",
                    "scrollCollapse": true,
                    "scrollX": true,
                    "pageLength": 250,
                    // "initComplete": function (settings, json) {
                    //     $(".profiletable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                    // }
                });
                $('#profiletable tbody tr:first').addClass('row_selected');
                $("#profiletable tbody tr").click(function (e) {
                    $('#profiletable tbody tr.row_selected').removeClass('row_selected');
                    $(this).addClass('row_selected');
                });
            }
        }
    });
    return false;
});


function profile_protocol_details(protocol_id){
    var detailid = $('#ett_pat_detail_id').val();
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/get_profile_protocol_details/'+protocol_id,
        type: 'post',
        data: {detailid:detailid},
        cache: false,
        success: function(response) {
            $('.profile_protocol_table').remove();
            $('#profile_protocol_table').append(response.result_html);
        }
    });
    return false;
}

$(document.body).on('click', '.delete_district', function () {
    var action_url = $(this).attr('data-href');
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: action_url,
                    cache: false,
                    success: function (response) {
                        $('.district_content').remove();
                        $('#district_content').append(response.district_table);
                        if (response.success == true) {
                            toastr["error"](response.message);
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});

$(document.body).on('click', '.delete-history-item', function(){
    var action_url = $(this).attr('data-href');
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: action_url,
                    cache: false,
                    success: function(response) {
                        $('.history_item_container').empty();
                        $('.history_item_container').append(response.result_html);
                        if (response.success) {
                            toastr["error"](response.message);
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});

function filter_history_item_category(category) {
    var nurl = window.location.origin+window.location.pathname+'setting/export_history_items/'+category;
    $("#export_history_items").attr("href", nurl);
    $.ajax({
        url: window.location.origin+window.location.pathname+'profile_history/get_history_item/'+category,
        type: 'get',
        cache: false,
        success: function(response) {
            $('.history_item_container').empty();
            $('.history_item_container').append(response.result_html);
        }
    });
    return false;
}

$(document.body).on('click', '.delete-limiter', function(){
    var action_url = $(this).attr('data-href');
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: action_url,
                    cache: false,
                    success: function(response) {
                        $('.limiter_table').remove();
                        $('#limiter_table').append(response.result_html);
                        if (response.success) {
                            toastr["error"](response.message);
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
});

function printresearchData()
{
    divToPrint = $('#bodypro').html();
    newWin= window.open("");
    newWin.document.write( "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">" );
    newWin.document.write( "<html>" );
    newWin.document.write( "<head>" );
    newWin.document.write( "<meta charset='utf-8'><style rel='stylesheet'>td{text-align:center;}</style>" );
    newWin.document.write( "</head>" );
    newWin.document.write( "<body style='-webkit-print-color-adjust: exact !important;'>" );
    newWin.document.write( "<div style='width:90%; margin:0 auto;'><h2>Shahadat Clinic</h2>" );
    newWin.document.write( "<table border='1' border-collapse: collapse; width='100%' ><thead><tr><th style='border:none;background:#000;color:#fff;'></th><th style='background:#000;color:#fff;'>ProfileID</th><th style='border:none;background:#000;color:#fff;'>PatientName</th><th style='border:none;background:#000;color:#fff;'>Father/Husband Name</th><th style='border:none;background:#000;color:#fff;'>Height</th><th style='border:none;background:#000;color:#fff;'>Weight</th><th style='border:none;background:#000;color:#fff;'>BSA</th><th style='border:none;background:#000;color:#fff;'>BMI</th><th style='border:none;background:#000;color:#fff;'>Contact</th><th style='border:none;background:#000;color:#fff;'>Profession</th><th style='border:none;background:#000;color:#fff;'>District</th></tr></thead>" );
    newWin.document.write(divToPrint);
    newWin.document.write( "</table>" );
    newWin.document.write( "</div>" );
    newWin.document.write( "</body>" );
    newWin.document.write( "</html>" );
    newWin.print();
    newWin.close();
}

function printEtt(editableObj,ett_id,patient_id) {
    url = window.location.origin+window.location.pathname;
    var win = window.open(url+'Print_profiles/print_ett/?testid=' + ett_id +'&patid='+patient_id, '_blank');
    if (win) {
        console.log("new tab opened")
        win.focus();
    } else {
        alert('Please allow popups for this website');
    }
}

function printlabtest(editableObj,key,patient_id) {

    var win = window.open(url+'Print_profiles/print_lab_test/?key=' + key +'&patid='+patient_id, '_blank');
    if (win) {
        console.log("new tab opened")
        win.focus();
    } else {
        alert('Please allow popups for this website');
    }
}

$(document.body).on('click', '#prescription_details', function () {
    var patient_id = $.trim($('#profiletable tbody tr.row_selected').find('.profile_id').text());
    $.ajax({
        url: window.location.origin+window.location.pathname+'profile/get_examinations_tests',
        type: 'post',
        data:  {patient_id:patient_id},
        cache: false,
        success: function(response) {
            if (response.success) {
                $('#echo_detail_container').empty();
                $('#echo_detail_container').append(response.details);
            } else {
                toastr["error"](response.message);
            }
        }
    });

});

function print_prescription(editableObj,test_id,patient_id) {
    url = window.location.origin+window.location.pathname;
    var win = window.open(url+'Print_profiles/print_prescription/?testid=' + test_id +'&patid='+patient_id, '_blank');
    if (win) {
        console.log("new tab opened")
        win.focus();
    } else {
        alert('Please allow popups for this website');
    }
}
$(document.body).on('click', '#sp_inst_details', function () {
    var patient_id = $.trim($('#profiletable tbody tr.row_selected').find('.profile_id').text());
    $.ajax({
        url: window.location.origin+window.location.pathname+'Profile/get_sp_inst_details',
        type: 'post',
        data:  {patient_id:patient_id},
        cache: false,
        success: function(response) {
            if (response.success) {
                $('#echo_detail_container').empty();
                $('#echo_detail_container').append(response.sp_inst_details);
            } else {
                toastr["error"](response.message);
            }
        }
    });

});

function printsp(editableObj,test_id,patient_id) {
    var printsize = $('input[name=print_sp_size]:checked').val();
    url = window.location.origin+window.location.pathname;
    var win = window.open(url+'Print_profiles/print_sp_inst/?testid=' + test_id +'&patid='+patient_id+'&size='+printsize, '_blank');
    if (win) {
        console.log("new tab opened")
        win.focus();
    } else {
        alert('Please allow popups for this website');
    }
}

function deleteEttDetail(editableObj,test_id,patient_id){
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: window.location.origin+window.location.pathname+'Print_profiles/delete_ett_test_details',
                    type: 'post',
                    data: {detail_id:test_id,patid:patient_id},
                    cache: false,
                    success: function (response) {
                        if (response.success) {
                            $('#echo_detail_container').empty();
                            $('#echo_detail_container').append(response.ett_detail);
                            if (response.success == true) {
                                toastr["success"](response.message);
                            }else{
                                toastr["error"](response.message);
                            }
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
}

function deletespinstDetail(editableObj,test_id,patient_id){
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: window.location.origin+window.location.pathname+'Print_profiles/delete_sp_isnt_test_details',
                    type: 'post',
                    data: {detail_id:test_id,patid:patient_id},
                    cache: false,
                    success: function (response) {
                        if (response.success) {
                            $('#echo_detail_container').empty();
                            $('#echo_detail_container').append(response.sp_inst_details);
                            if (response.success == true) {
                                toastr["success"](response.message);
                            }else{
                                toastr["error"](response.message);
                            }
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
}

function deletelabtestDetail(editableObj,key,patient_id){
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url: window.location.origin+window.location.pathname+'print_profiles/delete_lab_test_test_details',
                    type: 'post',
                    data: {key:key,patid:patient_id},
                    cache: false,
                    success: function (response) {
                        if (response.success) {
                            $('#echo_detail_container').empty();
                            $('#echo_detail_container').append(response.lab_detail);
                            if (response.success == true) {
                                toastr["success"](response.message);
                            }else{
                                toastr["error"](response.message);
                            }
                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });
    return false;
}
$(document.body).on('click','#ett-details-pro',function(){
    $.ajax({
        url: window.location.origin+window.location.pathname+'ett/get_protocol_detail_content',
        cache: false,
        success:function(response){
            $('#ett6').empty();
            $('#ett6').append(response.result_html);

        }
    });
});

$(document.body).on('click','#echo_structure_tbl tbody tr.row_selected',function(){
    var structure_id = $.trim($('#echo_structure_tbl tbody tr.row_selected').find('#structure_selected_id').val());
    var nurl = window.location.origin+window.location.pathname+'setting/export_findings/'+structure_id;
    $("#export_findings").attr("href", nurl);
    var nurl = window.location.origin+window.location.pathname+'setting/export_diagnosis/'+structure_id;
    $("#export_diagnosis").attr("href", nurl);
});

$(document.body).on('click','#export_findings',function(){
    if ($(this).attr('href') == '#') {
        toastr['warning']('Please select structure.');
    }
});

$(document.body).on('click','#export_diagnosis',function(){
    if ($(this).attr('href') == '#') {
        toastr['warning']('Please select structure.');
    }
});

function searchpatient(d){
    var searchDate = d.value;
    var bookingflag = $('#booking_flag').val();
    $.ajax({
        type: "post",
        url: window.location.origin+window.location.pathname+'user/search_patient',
        data: {
            searchdate: searchDate,
            bookingflag: bookingflag
        }, success: function (response) {
            if (response.booking_table != '') {
                $('.table-responsive').remove();
                $('#table-booking').append(response.booking_table);
                $('.wallet-modal-box').remove();
                $('#wallet-modal-box').append(response.wallet_count);
                $("#full_name").focus();
                //////////////// datatable initilization//////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "scrollY": "67vh",
                    "scrollCollapse": true,
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
                    ],
                    "fnDrawCallback": function ( oSettings ) {
                        /* Need to redo the counters if filtered or sorted */
                        if ( oSettings.bSorted || oSettings.bFiltered )
                        {
                            for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                            {
                                $('td:eq(1)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                            }
                        }
                    },
                    "aoColumnDefs": [
                        { "bSortable": false, "aTargets": [ 1 ] }
                    ],
                    "aaSorting": [[ 1, 'asc' ]]
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
                    format: 'd-M-yyyy',
                    autoclose: true
                });
            }
        }
    });
}
$(document.body).on('click','#sidbar-toggle',function(e){
    e.preventDefault();
    // $('#dashboar-sidebar').toggle('sidebar_active');
    if ($('#dashboar-sidebar').hasClass('sidebar_active')) {
        $('#dashboar-sidebar').removeClass('sidebar_active');
        $('.sidebar-menu').removeClass('sidebar_toggle_menu');
    } else {
        $('#dashboar-sidebar').addClass('sidebar_active');
        $('.sidebar-menu').addClass('sidebar_toggle_menu');
    }
});
$(document.body).on('click','.sidebar_toggle_menu ul li ul li',function(){
    $('#dashboar-sidebar').removeClass('sidebar_active');
});