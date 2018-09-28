<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    Delete patient
                </div>
                <div class="card-body">
                   <form id="delete_patient_form">
                        <div class="form-group">
                            <div class="input-daterange input-group" id="date-range">
                                <input type="text" class="form-control pat_search_from" name="start" placeholder="From date" required/>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-info b-0 text-white">TO</span>
                                </div>
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#delete_patient").on("click", function () {
            var validate = $('#delete_patient_form').validate();
            if (validate.form()) {
                var datefrom = $(".pat_search_from").val();
                var dateto = $(".pat_search_to").val();
                $.ajax({
                    type: "post",
                    url: '/cms/user/delete_patient',
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
            }else{
                return false;
            }
            
        });
    });
</script>