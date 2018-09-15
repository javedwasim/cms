<div class="tab-pane active" id="tb1" role="tabpanel">
    <div class="card">
        <div class="card-header" style="display: inline-flex;">
            <div class="row">
                <div class="col-md-12">
                    <label>New Disease</label>
                    <input type="text" class="form-control col-md-6" name="disease" id="disease">
                    <button class="btn btn-primary add-disease-category">Add</button>
                </div>
            </div>
        </div>
        <div class="card-body disease_category_container">
            <?php $this->load->view('echo/disease_table'); ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.datatables').DataTable({
            "info": true,
            "paging": false,
            "searching": false,
            "sort": false,
            columnDefs: [
                { width: 1, targets: 0 }
            ],
            fixedColumns: true
        });
    });
</script>