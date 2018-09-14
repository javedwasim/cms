<div class="tab-pane active" id="category" role="tabpanel">
    <div class="card">
        <div class="card-header" style="display: inline-flex;">
            <div class="row">
                <div class="col-md-12">
                    <label>New Category</label>
                    <input type="text" class="form-control col-md-6" name="medicine_name" id="medicine_name">
                    <button class="btn btn-primary add-medicine-category">Add</button>
                </div>
            </div>
        </div>
        <div class="card-body medicine_category_container">
            <?php $this->load->view('medicine/category_table'); ?>
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