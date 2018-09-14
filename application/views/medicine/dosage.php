<div class="tab-pane <?php echo  isset($active_tab)&&($active_tab=='dosage')?'active':''; ?>" id="dosage" role="tabpanel">
    <div class="card">
        <div class="card-header" style="display: inline-flex;">
            <div class="row">
                <div class="col-md-12">
                    <label>New Category</label>
                    <input type="text" class="form-control col-md-6" name="name" id="dosage_name">
                    <button class="btn btn-primary add-dosage-category">Add</button>
                </div>
            </div>
        </div>
        <div class="card-body dosage_category_container">
            <?php $this->load->view('medicine/dosage_table'); ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.dosage-table').DataTable({
            "info": true,
            "paging": false,
            "searching": false,
            "sort": false,
            autoWidth: false, //step 1
            columnDefs: [
                { width: '10%', targets: 0 }, //step 2, column 1 out of 4
            ]
        });


    });
</script>