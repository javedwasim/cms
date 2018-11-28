<div class="tab-pane" id="tb3" role="tabpanel">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-header">Disease</div>
                        <div class="card-body disease_category_container" >
                            <?php $this->load->view('echo/default_disease_table'); ?>
                            <input type="hidden" id="assign_disease_id" value="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card-header ">Structure</div>
                    <div class="card">
                        <div class="card-body structure_category_container" id="dfd_structure" >
                            <?php $this->load->view('echo/default_structure_table'); ?>
                            <input type="hidden" id="assign_structure_id" value="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-header">Finding</div>
                        <div class="card-body default_finding_container" id="default_finding_container">
                            <?php $this->load->view('echo/default_finding_table'); ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 col-md-8">
                    <div class="card">
                        <div class="card-header">Diagnosis</div>
                        <div class="card-body default_diagnosis_container">
                            <?php $this->load->view('echo/default_diagnosis_table'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    $(document).ready(function () {
        $('.structure_table').DataTable({
            "info": false,
            "paging": false,
            "searching": false,
            "sort": false,
            columnDefs: [
                { width: 1, targets: 0 }
            ],
            fixedColumns: true,
        });

        $('.datatables').DataTable({
            "info": false,
            "paging": false,
            "searching": false,
            "sort": false,
            autoWidth: false, //step 1
            columnDefs: [
                { width: '5%', targets: 0 }, //step 2, column 1 out of 4
            ]
        });

        $('.finding_table').DataTable({
            "info": false,
            "paging": false,
            "searching": false,
            "sort": false,
            autoWidth: false, //step 1
            columnDefs: [
                { width: '5%', targets: 0 }, //step 2, column 1 out of 4
            ]
        });

        $('.diagnosis_table').DataTable({
            "info": false,
            "paging": false,
            "searching": false,
            "sort": false,
            autoWidth: false, //step 1
            columnDefs: [
                { width: '5%', targets: 0 }, //step 2, column 1 out of 4
            ]
        });

        $('.default_structure_table').DataTable({
            "info": false,
            "paging": false,
            "searching": false,
            "sort": false,
            autoWidth: false, //step 1
            columnDefs: [
                { width: '5%', targets: 0 }, //step 2, column 1 out of 4
            ]
        });

        $('.main-category-table').DataTable({
            "info": false,
            "paging": false,
            "searching": false,
            "sort": false,
            autoWidth: false, //step 1
            columnDefs: [
                { width: '5%', targets: 0 }, //step 2, column 1 out of 4
            ]
        });

        $(".structure_category_container table tbody tr:first td:nth-child(2)").trigger("click");
        $("#dfd_structure table tbody tr:first td:nth-child(2)").trigger("click");

    });
</script> -->