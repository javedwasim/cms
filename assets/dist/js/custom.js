var oTable = "";
$(document).ready(function() {
    //////////////////////////////initilize datepicker///////////////////////
    $('.app_date').datepicker({
            format: 'd-M-yyyy'
    });
    $('#limiter_date').datepicker({
            format: 'd-M-yyyy'
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
////////////////////////////// initilize categories datatables ///////////////////////
    var btable = $('.booking_tables').DataTable({
        "scrollX": true,
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
            }if (data[7] == "7") {
            $(row).addClass('round-white');
            }
        },
      
    });

    $('.dataTables_filter input[type="search"]').css(
        {'width':'100px !important','display':'inline-block'}
    );
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

    $("#sidebar").mCustomScrollbar({
    theme: "minimal"
    });
    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });
    // $('#sidebarCollapse').on('click', function () {
    //     $("#full_name").focus();
    //     $('#sidebar').addClass('active');
    //     $('.overlay').addClass('active');
    //     $('.collapse.in').toggleClass('in');
    //     $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    // });

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
    $("#editable-datatable tbody tr").click(function(e) {
        if ($(this).hasClass('row_selected')) {
        $(this).removeClass('row_selected');
        }
        else {
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
        "createdRow": function(row, data, dataIndex) {
            if (data[17] == "1") {
            $(row).addClass('round-green');
            }if(data[17] == "2"){
            $(row).addClass('round-blue');
            }
            if (data[17] == "3") {
            $(row).addClass('round-red');
            }if(data[17] == "4"){
            $(row).addClass('round-yellow');
            }
            if (data[17] == "5") {
            $(row).addClass('round-orange');
            }if(data[17] == "6"){
            $(row).addClass('round-lightGray');
            }if (data[17] == "7") {
            $(row).addClass('round-white');
            }
        },
                select: {
                style: 'single'
                },
                "scrollX": true,
                columnDefs: [
                               { "type": "html-input", "targets": [3, 6, 7, 8] }
                            ]
    });
    $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
        return $(value).val();
    };
      

    
});

    ///////////////////////////////* Add a click handler for the row *////////////////////
    /////////////////////////////////////////////////////////////////////////////////////

    $(document.body).on('click', '.feepaid', function(){
        var tr = $('tr.row_selected');
        var odata = $.trim(tr.find('.appointment_booking_id').text());
        if(odata != ""){
            var bookingflag = $('#booking_flag').val();
            var tabledate = $('.pat_search').val();
            $.ajax({
                url : '/cms/user/update_fee',
                    type: 'post',
                    data: {
                        bkId: odata,
                        fee_status: '1',
                        flag: bookingflag,
                        tabledate: tabledate
                    },
                    cache: false,
                    success: function(response){
                    if (response.status_row != '') {
                        $('.status_row').remove();
                        $('#status_row').append(response.status_row);
                        $('.table-responsive').remove();
                        $('#table-booking').append(response.booking_table);
                        $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function(e) {
                        if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                        }
                        else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                                $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "createdRow": function(row, data, dataIndex) {
                            if (data[17] == "1") {
                            $(row).addClass('round-green');
                            }if(data[17] == "2"){
                            $(row).addClass('round-blue');
                            }
                            if (data[17] == "3") {
                            $(row).addClass('round-red');
                            }if(data[17] == "4"){
                            $(row).addClass('round-yellow');
                            }
                            if (data[17] == "5") {
                            $(row).addClass('round-orange');
                            }if(data[17] == "6"){
                            $(row).addClass('round-lightGray');
                            }if (data[17] == "7") {
                            $(row).addClass('round-white');
                            }
                        },
                                select: {
                                style: 'single'
                                },
                                "scrollX": true,
                                columnDefs: [
                                               { "type": "html-input", "targets": [3, 6, 7, 8] }
                                            ]
                    });
                    $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
                        return $(value).val();
                    };
                     toastr["success"]('Status Update');
                    
                    } else{
                        console.log('not working');
                    }
                    }
            });
        }else{
             toastr["warning"]('Please select the row.');
        }
    });
    
    $(document.body).on('click', '.wecg', function(){
        var tr = $('tr.row_selected');
        var odata = $.trim(tr.find('.appointment_booking_id').text());
        if(odata != ""){
            var bookingflag = $('#booking_flag').val();
            var tabledate = $('.pat_search').val();
            $.ajax({
                url : '/cms/user/update_fee',
                type: 'post',
                data: {
                    bkId: odata,
                    fee_status: '2',
                    flag: bookingflag,
                    tabledate: tabledate
                },
                cache: false,
                success: function(response){
                if (response.status_row != '') {
                    $('.status_row').remove();
                    $('#status_row').append(response.status_row);
                    $('.table-responsive').remove();
                    $('#table-booking').append(response.booking_table);
                    $("#full_name").focus();
                $("#editable-datatable tbody tr").click(function(e) {
                    if ($(this).hasClass('row_selected')) {
                    $(this).removeClass('row_selected');
                    }
                    else {
                    oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                    }
                });
                $('.pat_search').datepicker({
                    format: 'd-M-yyyy'
                });
                //////// initilize datatable///////////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "createdRow": function(row, data, dataIndex) {
                        if (data[17] == "1") {
                        $(row).addClass('round-green');
                        }if(data[17] == "2"){
                        $(row).addClass('round-blue');
                        }
                        if (data[17] == "3") {
                        $(row).addClass('round-red');
                        }if(data[17] == "4"){
                        $(row).addClass('round-yellow');
                        }
                        if (data[17] == "5") {
                        $(row).addClass('round-orange');
                        }if(data[17] == "6"){
                        $(row).addClass('round-lightGray');
                        }if (data[17] == "7") {
                        $(row).addClass('round-white');
                        }
                    },
                            select: {
                            style: 'single'
                            },
                            "scrollX": true,
                            columnDefs: [
                                           { "type": "html-input", "targets": [3, 6, 7, 8] }
                                        ]
                    });
                    $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
                        return $(value).val();
                    };
                    toastr["success"]("Status Updated");
                
                } else{
                    console.log('not working');
                }
                }
            });
        }else{
            toastr["warning"]('Please select the row.');
        }
        
    });

    $(document.body).on('click', '.wett', function(){
        var tr = $('tr.row_selected');
        var odata = $.trim(tr.find('.appointment_booking_id').text());
        if(odata != ""){
            var bookingflag = $('#booking_flag').val();
            var tabledate = $('.pat_search').val();
            $.ajax({
            url : '/cms/user/update_fee',
                    type: 'post',
                    data: {
                        bkId: odata,
                        fee_status: '3',
                        flag: bookingflag,
                        tabledate: tabledate
                    },
                    cache: false,
                    success: function(response){
                    if (response.status_row != '') {
                        $('.status_row').remove();
                        $('#status_row').append(response.status_row);
                        $('.table-responsive').remove();
                        $('#table-booking').append(response.booking_table);
                        $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function(e) {
                        if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                        }
                        else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                                $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "createdRow": function(row, data, dataIndex) {
                            if (data[17] == "1") {
                            $(row).addClass('round-green');
                            }if(data[17] == "2"){
                            $(row).addClass('round-blue');
                            }
                            if (data[17] == "3") {
                            $(row).addClass('round-red');
                            }if(data[17] == "4"){
                            $(row).addClass('round-yellow');
                            }
                            if (data[17] == "5") {
                            $(row).addClass('round-orange');
                            }if(data[17] == "6"){
                            $(row).addClass('round-lightGray');
                            }if (data[17] == "7") {
                            $(row).addClass('round-white');
                            }
                        },
                        select: {
                        style: 'single'
                        },
                        "scrollX": true,
                        columnDefs: [
                                       { "type": "html-input", "targets": [3, 6, 7, 8] }
                                    ]
                        });
                        $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
                            return $(value).val();
                        };
                        toastr["success"]("Status Updated");
                    } else{
                        console.log('not working');
                    }
                    }
            });
        }else{
            toastr["warning"]('Please select the row.');
        }
    });
    
    $(document.body).on('click', '.wecho', function(){
        var tr = $('tr.row_selected');
        var odata = $.trim(tr.find('.appointment_booking_id').text());
        if (odata != "") {
            var bookingflag = $('#booking_flag').val();
            var tabledate = $('.pat_search').val();
            $.ajax({
            url : '/cms/user/update_fee',
                    type: 'post',
                    data: {
                        bkId: odata,
                        fee_status: '4',
                        flag: bookingflag,
                        tabledate: tabledate
                    },
                    cache: false,
                    success: function(response){
                    if (response.status_row != '') {
                        $('.status_row').remove();
                        $('#status_row').append(response.status_row);
                        $('.table-responsive').remove();
                        $('#table-booking').append(response.booking_table);
                        $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function(e) {
                        if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                        }
                        else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                                $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "createdRow": function(row, data, dataIndex) {
                            if (data[17] == "1") {
                            $(row).addClass('round-green');
                            }if(data[17] == "2"){
                            $(row).addClass('round-blue');
                            }
                            if (data[17] == "3") {
                            $(row).addClass('round-red');
                            }if(data[17] == "4"){
                            $(row).addClass('round-yellow');
                            }
                            if (data[17] == "5") {
                            $(row).addClass('round-orange');
                            }if(data[17] == "6"){
                            $(row).addClass('round-lightGray');
                            }if (data[17] == "7") {
                            $(row).addClass('round-white');
                            }
                        },
                                select: {
                                style: 'single'
                                },
                                "scrollX": true,
                                columnDefs: [
                                               { "type": "html-input", "targets": [3, 6, 7, 8] }
                                            ]
                        });
                        $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
                            return $(value).val();
                        };
                        toastr["success"]("Status Updated");
                    }else{
                        console.log('not working');
                    }
                }
            });
        }else{
            toastr["warning"]('Please select the row.');
        }
    });

    
    $(document.body).on('click', '.investigation', function(){
        var tr = $('tr.row_selected');
        var odata = $.trim(tr.find('.appointment_booking_id').text());
        if (odata != "") {
            var bookingflag = $('#booking_flag').val();
            var tabledate = $('.pat_search').val();
            $.ajax({
            url : '/cms/user/update_fee',
                    type: 'post',
                    data: {
                        bkId: odata,
                        fee_status: '5',
                        flag: bookingflag,
                        tabledate: tabledate
                    },
                    cache: false,
                    success: function(response){
                    if (response.status_row != '') {
                        $('.status_row').remove();
                        $('#status_row').append(response.status_row);
                        $('.table-responsive').remove();
                        $('#table-booking').append(response.booking_table);
                        $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function(e) {
                        if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                        }
                        else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                                $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "createdRow": function(row, data, dataIndex) {
                            if (data[17] == "1") {
                            $(row).addClass('round-green');
                            }if(data[17] == "2"){
                            $(row).addClass('round-blue');
                            }
                            if (data[17] == "3") {
                            $(row).addClass('round-red');
                            }if(data[17] == "4"){
                            $(row).addClass('round-yellow');
                            }
                            if (data[17] == "5") {
                            $(row).addClass('round-orange');
                            }if(data[17] == "6"){
                            $(row).addClass('round-lightGray');
                            }if (data[17] == "7") {
                            $(row).addClass('round-white');
                            }
                        },
                                select: {
                                style: 'single'
                                },
                                "scrollX": true,
                                columnDefs: [
                                               { "type": "html-input", "targets": [3, 6, 7, 8] }
                                            ]
                        });
                        $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
                            return $(value).val();
                        };
                        toastr["success"]("Status Updated");
                    } else{
                        console.log('not working');
                    }
                    }
            });
        }else{
            toastr["warning"]('Please select the row.');
        }
    });

    $(document.body).on('click', '.checkup', function(){
        var tr = $('tr.row_selected');
        var odata = $.trim(tr.find('.appointment_booking_id').text());
        if (odata != "") {
            var bookingflag = $('#booking_flag').val();
            var tabledate = $('.pat_search').val();
            $.ajax({
            url : '/cms/user/update_fee',
                    type: 'post',
                    data: {
                        bkId: odata,
                        fee_status: '6',
                        flag: bookingflag,
                        tabledate: tabledate
                    },
                    cache: false,
                    success: function(response){
                    if (response.status_row != '') {
                        $('.status_row').remove();
                        $('#status_row').append(response.status_row);
                        $('.table-responsive').remove();
                        $('#table-booking').append(response.booking_table);
                        $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function(e) {
                        if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                        }
                        else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                                $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "createdRow": function(row, data, dataIndex) {
                            if (data[17] == "1") {
                            $(row).addClass('round-green');
                            }if(data[17] == "2"){
                            $(row).addClass('round-blue');
                            }
                            if (data[17] == "3") {
                            $(row).addClass('round-red');
                            }if(data[17] == "4"){
                            $(row).addClass('round-yellow');
                            }
                            if (data[17] == "5") {
                            $(row).addClass('round-orange');
                            }if(data[17] == "6"){
                            $(row).addClass('round-lightGray');
                            }if (data[17] == "7") {
                            $(row).addClass('round-white');
                            }
                        },
                                select: {
                                style: 'single'
                                },
                                "scrollX": true,
                                columnDefs: [
                                               { "type": "html-input", "targets": [3, 6, 7, 8] }
                                            ]
                        });
                        $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
                            return $(value).val();
                        };
                        toastr["success"]("Status Updated");
                    } else{
                        console.log('not working');
                    }
                }
            });
        }else{
            toastr["warning"]('Please select the row.');
        }
        
    });
    
    $(document.body).on('click', '.complete', function(){
        var tr = $('tr.row_selected');
        var odata = $.trim(tr.find('.appointment_booking_id').text());
        if (odata != "") {
            var bookingflag = $('#booking_flag').val();
            var tabledate = $('.pat_search').val();
            $.ajax({
            url : '/cms/user/update_fee',
                    type: 'post',
                    data: {
                        bkId: odata,
                        fee_status: '7',
                        flag: bookingflag,
                        tabledate: tabledate
                    },
                    cache: false,
                    success: function(response){
                    if (response.status_row != '') {
                        $('.status_row').remove();
                        $('#status_row').append(response.status_row);
                        $('.table-responsive').remove();
                        $('#table-booking').append(response.booking_table);
                        $("#full_name").focus();
                    $("#editable-datatable tbody tr").click(function(e) {
                        if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                        }
                        else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                                $(this).addClass('row_selected');
                        }
                    });
                    $('.pat_search').datepicker({
                        format: 'd-M-yyyy'
                    });
                    //////// initilize datatable///////////////////
                    var oTable = $('#editable-datatable').DataTable({
                        "info": false,
                        "paging": false,
                        "searching": false,
                        "createdRow": function(row, data, dataIndex) {
                            if (data[17] == "1") {
                            $(row).addClass('round-green');
                            }if(data[17] == "2"){
                            $(row).addClass('round-blue');
                            }
                            if (data[17] == "3") {
                            $(row).addClass('round-red');
                            }if(data[17] == "4"){
                            $(row).addClass('round-yellow');
                            }
                            if (data[17] == "5") {
                            $(row).addClass('round-orange');
                            }if(data[17] == "6"){
                            $(row).addClass('round-lightGray');
                            }if (data[17] == "7") {
                            $(row).addClass('round-white');
                            }
                        },
                                select: {
                                style: 'single'
                                },
                                "scrollX": true,
                                columnDefs: [
                                               { "type": "html-input", "targets": [3, 6, 7, 8] }
                                            ]
                        });
                        $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
                            return $(value).val();
                        };
                        toastr["success"]("Status Updated");
                    } else{
                        console.log('not working');
                    }
                }
            });
        }else{
            toastr["warning"]('Please select the row.');
        }
        
    });



///////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// call appointment booking view ///////////////////////
    function appointments(){
        $.ajax({
            url: '/cms/user/',
            cache: false,
            success: function(response) {
            if (response.result_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.table-responsive').remove();
                $('#table-booking').append(response.booking_table);
                $('.status_row').remove();
                $('#status_row').append(response.status_row);
                /////////////// focus script ///////////////////
                $("#full_name").focus();
                $("#editable-datatable tbody tr").click(function(e) {
                    if ($(this).hasClass('row_selected')) {
                    $(this).removeClass('row_selected');
                    }
                    else {
                    oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                    }
                });

                //////// initilize datatable///////////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "createdRow": function(row, data, dataIndex) {
                        if (data[17] == "1") {
                        $(row).addClass('round-green');
                        }if(data[17] == "2"){
                        $(row).addClass('round-blue');
                        }
                        if (data[17] == "3") {
                        $(row).addClass('round-red');
                        }if(data[17] == "4"){
                        $(row).addClass('round-yellow');
                        }
                        if (data[17] == "5") {
                        $(row).addClass('round-orange');
                        }if(data[17] == "6"){
                        $(row).addClass('round-lightGray');
                        }if (data[17] == "7") {
                        $(row).addClass('round-white');
                        }
                    },
                            select: {
                            style: 'single'
                            },
                            "scrollX": true,
                            columnDefs: [
                                           { "type": "html-input", "targets": [3, 6, 7, 8] }
                                        ]
                });
                $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
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
                        startDate: date
                });
                }
            }
        });
    }

////////////////// Save appointment booking scritp//////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

        $(document.body).on('click', '#book_appointment', function(e){
            e.preventDefault();
            var patname = $('#full_name').val();
            var cellnum = $('#cell_num').val();
            var appdate = $('#app_date').val();
            var consultantfee = $('#consultant_fee').val();
            var bookingflag = $('#booking_flag').val();
            var tabledate = $('.pat_search').val();
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
                        tabledate: tabledate
                    },
                    success: function(data) {
                    $('#book_appointment').attr("disabled", false);
                    document.getElementById('appointment_booking_form').reset();
                    if (data.booking_table != ''){
                        $('.table-responsive').remove();
                        $('#table-booking').append(data.booking_table);
                        $('.wallet-modal-box').remove();
                        $('#wallet-modal-box').append(response.wallet_count);
                        /////////////// focus script ///////////////////
                        $("#full_name").focus();
                        //////////////// datatable initilization//////////////
                        var oTable = $('#editable-datatable').DataTable({
                            "info": false,
                            "paging": false,
                            "searching": false,
                            "createdRow": function(row, data, dataIndex) {
                                if (data[17] == "1") {
                                $(row).addClass('round-green');
                                }if(data[17] == "2"){
                                $(row).addClass('round-blue');
                                }
                                if (data[17] == "3") {
                                $(row).addClass('round-red');
                                }if(data[17] == "4"){
                                $(row).addClass('round-yellow');
                                }
                                if (data[17] == "5") {
                                $(row).addClass('round-orange');
                                }if(data[17] == "6"){
                                $(row).addClass('round-lightGray');
                                }if (data[17] == "7") {
                                $(row).addClass('round-white');
                                }
                            },
                            select: {
                            style: 'single'
                            },
                            "scrollX": true,
                            columnDefs: [
                                           { "type": "html-input", "targets": [3, 6, 7, 8] }
                                        ]
                        });
                            $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
                                return $(value).val();
                            };

                        $("#editable-datatable tbody tr").click(function(e) {
                            if ($(this).hasClass('row_selected')) {
                            $(this).removeClass('row_selected');
                            }
                            else {
                            oTable.$('tr.row_selected').removeClass('row_selected');
                                    $(this).addClass('row_selected');
                            }
                        });
                        $('.app_date').datepicker({
                                format: 'd-M-yyyy'
                        });

                        if(data.message == "Name and contact Number cannot be null."){
                            toastr["warning"](data.message);
                        }else if(data.message == "Limit reached for bookings."){
                            toastr["warning"](data.message);
                        }else if(data.message == "Please fill all the fields ."){
                            toastr["warning"](data.message);
                        }else{
                            toastr["success"](data.message);
                        }

                        } else {
                            toastr["warning"]("Seems to an error while booking an appointment.");
                    }

                }
            });
        return false;
    });

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////// update value in appointment booking table///////////////

    function valupdate(val){
        var dataToupdate =  val.name;
        var Toupdate = $(val).parent().parent().find('.appointment_booking_id').text();
        var whereToupdate = $.trim(Toupdate);
        var apfee = val.value;
        var bookingflag = $('#booking_flag').val();
        var tabledate = $('.pat_search').val();
        $.ajax({
            type: "post",
            url: '/cms/user/update_appointment_values',
            data: {
                appValue: apfee,
                valToUpdate: dataToupdate,
                whereToupdate: whereToupdate,
                flag: bookingflag,
                tabledate: tabledate
            }, success: function(response) {
                if (response.booking_table != ''){
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
                    "createdRow": function(row, data, dataIndex) {
                        if (data[17] == "1") {
                        $(row).addClass('round-green');
                        }if(data[17] == "2"){
                        $(row).addClass('round-blue');
                        }
                        if (data[17] == "3") {
                        $(row).addClass('round-red');
                        }if(data[17] == "4"){
                        $(row).addClass('round-yellow');
                        }
                        if (data[17] == "5") {
                        $(row).addClass('round-orange');
                        }if(data[17] == "6"){
                        $(row).addClass('round-lightGray');
                        }if (data[17] == "7") {
                        $(row).addClass('round-white');
                        }
                    },
                    select: {
                    style: 'single'
                    },
                    "scrollX": true,
                    columnDefs: [
                                   { "type": "html-input", "targets": [3, 6, 7, 8] }
                                ]
                });
                $("#editable-datatable tbody tr").click(function(e) {
                    if ($(this).hasClass('row_selected')) {
                    $(this).removeClass('row_selected');
                    }
                    else {
                    oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                    }
                });
                $('.app_date').datepicker({
                        format: 'd-M-yyyy'
                });
                toastr["success"]('Status Update');
                }
             
            }
        });
    }


///////////////////// active manu tabs //////////////////////////
    
    $(function() {
       $(".topbar li").click(function() {
          // remove classes from all
          $("li").removeClass("active_nav");
          // add class to the one we clicked
          $(this).addClass("active_nav");
       });
    });

    
    $( '.components li a' ).on( 'click', function () {
        $( '.components li' ).find( 'a.active' ).removeClass( 'active' );
        $( this ).addClass( 'active' );
    });

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });
////////////////////////////// load bookings page/////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////



    function bookings(){
        $.ajax({
            url: '/cms/dashboard/bookings',
            cache: false,
            success: function(response) {
                if (response.result_html != ''){
                    $('.content-wrapper').remove();
                    $('#content-wrapper').append(response.result_html);
                    $('.booking_category_tables').remove();
                    $('#booking_category_tables').append(response.booking_cate);
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
                    $('.app_date').datepicker({
                            format: 'd-M-yyyy'
                    });
                }
            }
        });
    }

///////////////////////////////// time by consultant////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

    $(document.body).on('click', '#time_consultant', function(){
        $.ajax({
            url: '/cms/user/',
            type: 'post',
            data:{
                flag:'vip'
            },
            cache: false,
            success: function(response) {
            if (response.result_html != ''){
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
                $("#editable-datatable tbody tr").click(function(e) {
                    if ($(this).hasClass('row_selected')) {
                    $(this).removeClass('row_selected');
                    }
                    else {
                    oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                    }
                });

                //////// initilize datatable///////////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "createdRow": function(row, data, dataIndex) {
                        if (data[17] == "1") {
                        $(row).addClass('round-green');
                        }if(data[17] == "2"){
                        $(row).addClass('round-blue');
                        }
                        if (data[17] == "3") {
                        $(row).addClass('round-red');
                        }if(data[17] == "4"){
                        $(row).addClass('round-yellow');
                        }
                        if (data[17] == "5") {
                        $(row).addClass('round-orange');
                        }if(data[17] == "6"){
                        $(row).addClass('round-lightGray');
                        }if (data[17] == "7") {
                        $(row).addClass('round-white');
                        }
                    },
                            select: {
                            style: 'single'
                            },
                            "scrollX": true,
                            columnDefs: [
                                           { "type": "html-input", "targets": [3, 6, 7, 8] }
                                        ]
                });
                $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
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
                        startDate: 'date'
                });
                $("#divCollapse").click(function(){
                    $("#full_name").focus();
                    $(".op-hide").toggle(1000);
                });
                }
            }
        });
    
    });

/////////////////////////////////////// time on walk //////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////

    $(document.body).on('click', '#time_on_walk', function(){
        $.ajax({
            url: '/cms/user/',
            type: 'post',
            data:{
                flag:'on_walk'
            },
            success: function(response) {
            if (response.result_html != ''){
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
                $("#editable-datatable tbody tr").click(function(e) {
                    if ($(this).hasClass('row_selected')) {
                    $(this).removeClass('row_selected');
                    }
                    else {
                    oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                    }
                });

                //////// initilize datatable///////////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "createdRow": function(row, data, dataIndex) {
                        if (data[17] == "1") {
                        $(row).addClass('round-green');
                        }if(data[17] == "2"){
                        $(row).addClass('round-blue');
                        }
                        if (data[17] == "3") {
                        $(row).addClass('round-red');
                        }if(data[17] == "4"){
                        $(row).addClass('round-yellow');
                        }
                        if (data[17] == "5") {
                        $(row).addClass('round-orange');
                        }if(data[17] == "6"){
                        $(row).addClass('round-lightGray');
                        }if (data[17] == "7") {
                        $(row).addClass('round-white');
                        }
                    },
                            select: {
                            style: 'single'
                            },
                            "scrollX": true,
                            columnDefs: [
                                           { "type": "html-input", "targets": [3, 6, 7, 8] }
                                        ]
                });
                $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
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
                        format: 'd-M-yyyy'
                });
                $("#divCollapse").click(function(){
                    $("#full_name").focus();
                    $(".op-hide").toggle(1000);
                });
                }
            }
        });
    
    });

 //////////////////////////////////////// time on call ///////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////

    $(document.body).on('click', '#time_on_call', function(){
        $.ajax({
            url: '/cms/user/',
            type: 'post',
            data:{
                flag:'on_call'
            },
            success: function(response) {
            if (response.result_html != ''){
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
                $("#editable-datatable tbody tr").click(function(e) {
                    if ($(this).hasClass('row_selected')) {
                    $(this).removeClass('row_selected');
                    }
                    else {
                    oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                    }
                });

                //////// initilize datatable///////////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "createdRow": function(row, data, dataIndex) {
                        if (data[17] == "1") {
                        $(row).addClass('round-green');
                        }if(data[17] == "2"){
                        $(row).addClass('round-blue');
                        }
                        if (data[17] == "3") {
                        $(row).addClass('round-red');
                        }if(data[17] == "4"){
                        $(row).addClass('round-yellow');
                        }
                        if (data[17] == "5") {
                        $(row).addClass('round-orange');
                        }if(data[17] == "6"){
                        $(row).addClass('round-lightGray');
                        }if (data[17] == "7") {
                        $(row).addClass('round-white');
                        }
                    },
                            select: {
                            style: 'single'
                            },
                            "scrollX": true,
                            columnDefs: [
                                           { "type": "html-input", "targets": [3, 6, 7, 8] }
                                        ]
                });
                $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
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
                        startDate: 'date'
                });
                $("#divCollapse").click(function(){
                    $("#full_name").focus();
                    $(".op-hide").toggle(1000);
                });
                }
            }
        });
    
    });

////////////////////////////////// save limiter settings ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////

    $(document.body).on('click', '#save_limiter', function(){
        var limiter = $('#limiter').val();
        var limiterdate = $('#limiter_date').val();
        var  clinictime= $('#example-time-input').val();
        $.ajax({
            url: '/cms/dashboard/update_limiter',
            type: 'post',
            data:{
                limiter:limiter,
                limiterDate:limiterdate,
                clinicTime:clinictime
            },
            cache: false,
            success:function(response){
                toastr["success"]("Successfully updated.");
            }
        });
    });

////////////////////////////////////// Delete Single Patient ////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#delete_single_patient', function(){
    var bookingid = $.trim($(this).closest('tr').find('.appointment_booking_id').text());
    var bookingflag = $('#booking_flag').val();
    var tabledate = $('.pat_search').val();
    if(confirm('Are you sure you want to delete.')){
    $.ajax({
        url: '/cms/dashboard/delete_single_patient',
        type: 'post',
        data: {
            bkId: bookingid,
            flag: bookingflag,
            tabledate: tabledate
        },
        cache: false,
        success:function(response){
            if(response.booking_table != ""){
                $('.table-responsive').remove();
                $('#table-booking').append(response.booking_table);
                //////// initilize datatable///////////////////
                var oTable = $('#editable-datatable').DataTable({
                    "info": false,
                    "paging": false,
                    "searching": false,
                    "createdRow": function(row, data, dataIndex) {
                        if (data[17] == "1") {
                        $(row).addClass('round-green');
                        }if(data[17] == "2"){
                        $(row).addClass('round-blue');
                        }
                        if (data[17] == "3") {
                        $(row).addClass('round-red');
                        }if(data[17] == "4"){
                        $(row).addClass('round-yellow');
                        }
                        if (data[17] == "5") {
                        $(row).addClass('round-orange');
                        }if(data[17] == "6"){
                        $(row).addClass('round-lightGray');
                        }if (data[17] == "7") {
                        $(row).addClass('round-white');
                        }
                    },
                    select: {
                    style: 'single'
                    },
                    "scrollX": true,
                    columnDefs: [
                                   { "type": "html-input", "targets": [3, 6, 7, 8] }
                                ]
                });
                //// sidebar toggle code///////////////
                $('#sidebarCollapse').on('click', function () {
                    var icon = $('#sidebarCollapse > .fas');
                    icon.toggleClass('fa-arrow-left fa-arrow-right');
                    $("#full_name").focus();
                    $('#sidebar').toggleClass('active');
                    $('#content').toggleClass('actv');
                        
                });
                $("#editable-datatable tbody tr").click(function(e) {
                        if ($(this).hasClass('row_selected')) {
                        $(this).removeClass('row_selected');
                        }
                        else {
                        oTable.$('tr.row_selected').removeClass('row_selected');
                                $(this).addClass('row_selected');
                        }
                });
                if(response.message=="Deleted successfully"){
                    toastr["success"](response.message);
                }else{
                    toastr["warning"](response.message);
                }

            }
        }
    });
}else{
    return false;
}
});

/////////////////////////////////// load profile page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_profile', function(){
    $.ajax({
        url: '/cms/profile/',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.profile-table').remove();
                $('#profile_table').append(response.profile_table);
                ///////////////// initilize datatable //////////////
                $('.profiletable').DataTable({
                    // "scrollX": true,
                    "initComplete": function (settings, json) {  
                    $(".profiletable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                }
                });
                $("#toggleresize1").click(function(){
                    $('.resize1').toggleClass("active_resize1");
                    $('.resize2').toggleClass("inactive_resize2");

                });
                $("#toggleresize2").click(function(){
                    $('.resize2').toggleClass("active_resize2");
                    $('.resize1').toggleClass("inactive_resize1");
                   

                });
            }
        }
    });
});

/////////////////////////////////// load history page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_history', function(){
    $.ajax({
        url: '/cms/setting/history',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('.profiletable').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});

/////////////////////////////////// load examination page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_examination', function(){
    $.ajax({
        url: '/cms/examination/examination',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('.profiletable').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});

/////////////////////////////////// load investigation page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_investigation', function(){
    $.ajax({
        url: '/cms/investigation/investigation',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('.profiletable').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});

/////////////////////////////////// load recommendation page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#angio_recommendation', function(){
    $.ajax({
        url: '/cms/angio_recommendation/angio_recommendation',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('.profiletable').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});

/////////////////////////////////// load instruction page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_instruction', function(){
    $.ajax({
        url: '/cms/Instruction/instruction',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('.profiletable').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});

/////////////////////////////////// load medicine page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_medicine', function(){
    $.ajax({
        url: '/cms/medicine/medicine',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('.profiletable').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});

/////////////////////////////////// load advice page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_advice', function(){
    $.ajax({
        url: '/cms/setting/advice',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('.profiletable').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});

/////////////////////////////////// load add research page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_research', function(){
    $.ajax({
        url: '/cms/setting/research',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('.profiletable').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});

/////////////////////////////////// load manage research page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#manage_research', function(){
    $.ajax({
        url: '/cms/setting/manage_research',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('#research-table').DataTable({
                    "scrollX": true,
                    "scrollY": '50vh',
                    "scrollCollapse": true,
                    "paging": false,
                    "info": false
                });
            }
        }
    });
});

/////////////////////////////////// load manage research page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#register-user', function(){
    $.ajax({
        url: '/cms/setting/register_user',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('#research-table').DataTable({
                    "scrollX": true,
                    "scrollY": '50vh',
                    "scrollCollapse": true,
                    "paging": false,
                    "info": false
                });
            }
        }
    });
});


/////////////////////////////////// load manage research page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#special_instruction', function(){
    $.ajax({
        url: '/cms/instruction/special_instruction',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
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
});

/////////////////////////////////// load profession page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_profession', function(){
    $.ajax({
        url: '/cms/setting/pat_profession',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
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
});

/////////////////////////////////// load district page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_district', function(){
    $.ajax({
        url: '/cms/setting/pat_district',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
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
});

/////////////////////////////////// load delete page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat_delete', function(){
    $.ajax({
        url: '/cms/setting/pat_delete',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('#research-table').DataTable({
                    "scrollX": true,
                    scrollY: '50vh',
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
});


/////////////////////////////////// load limiter page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#booking-limiter', function(){
    $.ajax({
        url: '/cms/setting/booking_limiter',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                $('#limiter_date').datepicker({
                    format: 'd-M-yyyy'
                });
            }
        }
    });
});

/////////////////////////////////// load laboratory test page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#lab_test', function(){
    $.ajax({
        url: '/cms/setting/laboratory_test',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('#research-table').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});

/////////////////////////////////// load doctor's signature page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#doc_sig', function(){
    $.ajax({
        url: '/cms/setting/dr_signature',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('#research-table').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});


/////////////////////////////////// load change permissions page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#permissions', function(){
    $.ajax({
        url: '/cms/setting/change_permissions',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('#permissions-table').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});


/////////////////////////////////// load echo setting page ///////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#echo-setting', function(){
    $.ajax({
        url: '/cms/setting/echo_setting',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('#permissions-table').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});

/////////////////////////////////// load ett setting page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#ett-setting', function(){
    $.ajax({
        url: '/cms/setting/ett_setting',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.dashboard-content').remove();
                $('#dashboard-content').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('#permissions-table').DataTable({
                    "scrollX": true
                });
            }
        }
    });
});

/////////////////////////////////// load patient exemination page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat-exemination', function(){
    $.ajax({
        url: '/cms/setting/patient_exemination',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                ///////////////// initilize datatable //////////////
                $('#permissions-table').DataTable({
                    "scrollX": true
                });
                $('.app_date').datepicker({
                        format: 'd-M-yyyy'
                });
            }
        }
    });
});

/////////////////////////////////// load patient special instructions page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat-spInstructions', function(){
    $.ajax({
        url: '/cms/profile/patient_special_instructions',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
            }
        }
    });
});

/////////////////////////////////// load patient lab test page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat-labtest', function(){
    $.ajax({
        url: '/cms/profile/patient_lab_test',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.lab-date').datepicker({
                    format: 'd-M-yyyy'
                });
            }
        }
    });
});

/////////////////////////////////// load patient echo test page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat-echo-test', function(){
    $.ajax({
        url: '/cms/profile/patient_echo_test',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.lab-date').datepicker({
                    format: 'd-M-yyyy'
                });
            }
        }
    });
});

/////////////////////////////////// load patient ett test page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#pat-ett-test', function(){
    $.ajax({
        url: '/cms/profile/patient_ett_test',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.lab-date').datepicker({
                    format: 'd-M-yyyy'
                });
            }
        }
    });
});


/////////////////////////////////// load patient ett test page ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

$(document.body).on('click', '#diary', function(){
    $.ajax({
        url: '/cms/dashboard/diary',
        cache: false,
        success: function(response) {
            if (response.result_html != ''){
                $('.content-wrapper').remove();
                $('#content-wrapper').append(response.result_html);
                $('.lab-date').datepicker({
                    format: 'd-M-yyyy'
                });
            }
        }
    });
});

///////////////////////////////// consultant booking //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

function consultant_booking(val){
        var dataToupdate =  val.name;
        // var Toupdate = $(val).parent().parent().find('.appointment_booking_id').text();
        // var whereToupdate = $.trim(Toupdate);
        var orderno = $.trim($(val).parent().parent().find('.order-number').text());
        var valuetoinsert = val.value;
        var bookingflag = $('#booking_flag').val();
        var tabledate = $('.pat_search').val();
        $.ajax({
            type: "post",
            url: '/cms/user/consultant_bookings',
            data: {
                appValue: valuetoinsert,
                valToUpdate: dataToupdate,
                flag: bookingflag,
                orderno: orderno,
                tabledate: tabledate
            }, success: function(response) {
                if (response.booking_table != ''){
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
                    "createdRow": function(row, data, dataIndex) {
                        if (data[17] == "1") {
                        $(row).addClass('round-green');
                        }if(data[17] == "2"){
                        $(row).addClass('round-blue');
                        }
                        if (data[17] == "3") {
                        $(row).addClass('round-red');
                        }if(data[17] == "4"){
                        $(row).addClass('round-yellow');
                        }
                        if (data[17] == "5") {
                        $(row).addClass('round-orange');
                        }if(data[17] == "6"){
                        $(row).addClass('round-lightGray');
                        }if (data[17] == "7") {
                        $(row).addClass('round-white');
                        }
                    },
                    select: {
                    style: 'single'
                    },
                    "scrollX": true,
                    columnDefs: [
                                   { "type": "html-input", "targets": [3, 6, 7, 8] }
                                ]
                });
                $("#editable-datatable tbody tr").click(function(e) {
                    if ($(this).hasClass('row_selected')) {
                    $(this).removeClass('row_selected');
                    }
                    else {
                    oTable.$('tr.row_selected').removeClass('row_selected');
                            $(this).addClass('row_selected');
                    }
                });
                $('.app_date').datepicker({
                        format: 'd-M-yyyy'
                });

                    if(response.message == 'Inserted successfully'){
                        toastr["success"]('Inserted successfully');
                    }else{
                        toastr["warning"]('not inserted');
                    }
                }
             
            }
        });
    }

///////////////////////////////////// print vip ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

   $(document.body).on('click','#print_vip', function(){
        var flag = 'vip';
        var win = window.open('/cms/user/print_vip_list/?flag=' + flag, '_blank');
        if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                alert('Please allow popups for this website');
            }
    });

///////////////////////////////////// print on walk ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

   $(document.body).on('click','#print_onwalk', function(){
        var flag = 'on_walk';
        var win = window.open('/cms/user/print_onwalk_list/?flag=' + flag, '_blank');
        if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                alert('Please allow popups for this website');
            }
    });

///////////////////////////////////// print on call ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

   $(document.body).on('click','#print_oncall', function(){
        var flag = 'on_call';
        var win = window.open('/cms/user/print_oncall_list/?flag=' + flag, '_blank');
        if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                alert('Please allow popups for this website');
            }
    });

///////////////////////////////////// print on call ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

   $(document.body).on('click','#print_all_list', function(){
        var printdate = $('#print_all').val();
        var win = window.open('/cms/user/print_all_list/?date=' + printdate, '_blank');
        if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                alert('Please allow popups for this website');
            }
    });

/////////////////////////////////////// save new profile ////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

    $(document.body).on('click','#save_new_profile', function(){
        var profilename = $('#pat_profile_name').val();
        var profilerelative = $('#pat_profile_relative_name').val();
        var profileagedigit = $('#pat_profile_age_digit').val();
        var profileage = $('#pat_profile_age').val();
        var profileprofession = $('#pat_profile_profession option:selected').text()
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
            url: '/cms/profile/add_profile',
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
            },success: function(response){
                if (response.success) {
                    $('#add-new-patient').modal('hide');
                    document.getElementById('profile_form').reset();
                    $('.profile-table').remove();
                    $('#profile_table').append(response.profile_table);
                    ///////////////// initilize datatable //////////////
                    $('.profiletable').DataTable({
                        // "scrollX": true,
                        "initComplete": function (settings, json) {  
                        $(".profiletable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                    }
                    });
                    toastr["success"](response.message);
                } else {
                    toastr["error"](response.message);
                }
            }
        });
    });

    ////////////////////////////////////// Delete from profile page ////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

    $(document.body).on('click', '#delete_profile', function(){
        var tr = $(this).closest('tr');
        var profileid = tr.find('.profile_id').text();
        if(confirm('Are you sure you want to delete.')){
        $.ajax({
            url: '/cms/profile/delete_profile',
            type: 'post',
            data: {
                id: profileid
            },
            cache: false,
            success:function(response){
                if(response.profile_table != ""){
                    $('.profile-table').remove();
                    $('#profile_table').append(response.profile_table);
                    ///////////////// initilize datatable //////////////
                    $('.profiletable').DataTable({
                        // "scrollX": true,
                        "initComplete": function (settings, json) {  
                        $(".profiletable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
                    }
                    });
                    if(response.message=="Deleted successfully."){
                        toastr["success"](response.message);
                    }else{
                        toastr["warning"](response.message);
                    }

                }
            }
        });
    }else{
        return false;
    }
    });

////////////////////////////////// load update profile modal //////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////

    $(document.body).on('click','#profile_modal_edit',function(){
        var tr = $(this).closest('tr');
        var profileid = tr.find('.profile_id').text();
        $.ajax({
            url: '/cms/profile/update_modal',
            type: 'post',
            data:{
                id: profileid
            },success:function(response){
                $('.edit_modal').remove();
                $('#edit_modal').append(response.edit_modal);
                $('#update_modal').modal('show');
            }
        });
    });

/////////////////////////////////////// update profile ////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

    // $(document.body).on('click','#update_profile', function(){
    //     var profilename = $('#updat_pat_profile_name').val();
    //     var profilerelative = $('#updat_pat_profile_relative_name').val();
    //     var profileagedigit = $('#updat_pat_profile_age_digit').val();
    //     var profileage = $('#updat_pat_profile_age').val();
    //     var profileprofession = $('#updat_pat_profile_profession option:selected').text()
    //     var profilesex = $('input[name="pat_sex"]:checked').val();
    //     var profilecontact = $('#updat_pat_profile_contact').val();
    //     var profileheight = $('#updat_pat_profile_height').val();
    //     var profilebmi = $('#updat_pat_profile_bmi').val();
    //     var profileweight = $('#updat_pat_profile_weight').val();
    //     var profilebsa = $('#updat_pat_profile_bsa').val();
    //     var profileemail = $('#updat_pat_profile_email').val();
    //     var profiledistrict = $('#updat_pat_profile_district option:selected').text();
    //     var profileaddress = $('#updat_pat_profile_address').val();
    //     $.ajax({
    //         url: '/cms/profile/update_profile_data',
    //         type: 'post',
    //         data: {
    //             name: profilename,
    //             relatename: profilerelative,
    //             agedigit: profileagedigit,
    //             age: profileage,
    //             profession: profileprofession,
    //             sex: profilesex,
    //             contact: profilecontact,
    //             height: profileheight,
    //             bmi: profilebmi,
    //             weight: profileweight,
    //             bsa: profilebsa,
    //             email: profileemail,
    //             district: profiledistrict,
    //             address: profileaddress
    //         },success: function(response){
    //             if (response.success) {
    //                 $('#add-new-patient').modal('hide');
    //                 document.getElementById('profile_form').reset();
    //                 $('.profile-table').remove();
    //                 $('#profile_table').append(response.profile_table);
    //                 ///////////////// initilize datatable //////////////
    //                 $('.profiletable').DataTable({
    //                     // "scrollX": true,
    //                     "initComplete": function (settings, json) {  
    //                     $(".profiletable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
    //                 }
    //                 });
    //                 toastr["success"](response.message);
    //             } else {
    //                 toastr["error"](response.message);
    //             }
    //         }
    //     });
    // });