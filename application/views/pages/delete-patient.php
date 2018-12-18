<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-lg-6 col-md-6">
            <div class="card card-top-margin">
                <div class="card-header">
                    Delete patient
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="radio-inline"><input type="radio" name="optradio" id="card-1" checked>All</label>
                        </div>
                        <div class="col-md-4">
                            <label class="radio-inline"><input type="radio" name="optradio" id="card-2" >By ID</label>
                        </div>
                        <div class="col-md-4">
                            <label class="radio-inline"><input type="radio" name="optradio" id="card-3" >By Date</label>
                        </div>
                    </div>
                    <div class="card delete-card-1">
                        <div class="card-body">
                            <button class="btn btn-danger" id="delete_all" >Delete</button>
                        </div>
                    </div>
                    <div class="card hide delete-card-2">
                        <div class="card-body">
                            <form id="delete_profile_patient_form">
                                <div class="row">
                                    <div class="col-md-5 p-r-0">
                                        <input type="text" class="form-control"  id="from-id" name="start" placeholder="From ID" required/>
                                    </div>
                                    <div class="col-md-1 p-0">
                                        <span class="input-group-text bg-info b-0 text-white" style="padding: 4px 15px;">TO</span>
                                    </div>
                                    <div class="col-md-5 p-l-0">
                                        <input type="text" class="form-control" id="to-id" placeholder="To ID" name="end" required/>
                                    </div>
                               </div>
                                <button type="button" id="delete_patient_by_ids" class="btn btn-danger waves-effect waves-light">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="card hide delete-card-3">
                        <div class="card-body p-t-20">
                            <form id="delete_patient_form">
                                <div class="row">
                                    <div class="col-md-5 p-r-0">
                                        <input type="text" class="form-control pat_search_from" name="start" placeholder="From date" required/>
                                    </div>
                                    <div class="col-md-1 p-0">
                                        <span class="input-group-text bg-info b-0 text-white" style="padding: 4px 15px;">TO</span>
                                    </div>
                                    <div class="col-md-5 p-l-0">
                                        <input type="text" class="form-control pat_search_to" placeholder="To date" name="end" required/>
                                    </div>
                               </div>
                                <button type="button" id="delete_patient" class="btn btn-danger waves-effect waves-light">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#delete_patient").on("click", function () {
            var validate = $('#delete_patient_form').validate();
            if (validate.form()) {
                var datefrom = $(".pat_search_from").val();
                var dateto = $(".pat_search_to").val();
                $.confirm({
                    title: 'Confirm!',
                    content: 'Are you sure you want to delete?',
                    buttons: {
                        confirm: function () {
                            $.ajax({
                                type: "post",
                                url: window.location.origin+window.location.pathname+'User/delete_patient',
                                data: {
                                    fromDate: datefrom,
                                    toDate: dateto
                                },success: function (response) {
                                    if(response.message=="Deleted successfully"){
                                        toastr["error"](response.message);
                                    }else{
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
            }else{
                return false;
            }
            
        });


        $("#delete_all").on("click", function () {
            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure you want to delete?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            url: window.location.origin+window.location.pathname+'User/delete_all_patient',
                            success: function (response) {
                                if(response.success==true){
                                    toastr["error"](response.message);
                                }else{
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
        });

        $("#delete_patient_by_ids").on("click", function () {
            var validate = $('#delete_profile_patient_form').validate();
            if (validate.form()) {
                var fromid = $("#from-id").val();
                var toid = $("#to-id").val();
                $.confirm({
                    title: 'Confirm!',
                    content: 'Are you sure you want to delete? <br> Patients,Uploads,Visit History, Echo, ETT , Lab Tests and Research data will be lost.',
                    buttons: {
                        confirm: function () {
                            $.ajax({
                                type: "post",
                                url: window.location.origin+window.location.pathname+'User/delete_patient_by_ids',
                                data: {
                                    fromid: fromid,
                                    toid: toid
                                },success: function (response) {
                                    if(response.message=="Deleted successfully"){
                                        toastr["error"](response.message);
                                    }else{
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
            }else{
                return false;
            }
        });
    });
</script>