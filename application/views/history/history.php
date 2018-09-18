<div class="tab-pane active" id="category" role="tabpanel">
    <div class="card">
        <div class="card-header" style="display: inline-flex;">
            <div class="row">
                <div class="col-md-12">
                    <label>New Category</label>
                    <input type="text" class="form-control col-md-6" name="profile_history" id="profile_history">
                    <button class="btn btn-primary add-profile-history">Add</button>
                </div>
            </div>
        </div>
        <div class="card-body history_category_container">
            <?php $this->load->view('history/history_table'); ?>
        </div>
    </div>
</div>
<style>
    body {
        width: 100%;
    }

    .current-row {
        background-color: #B24926;
        color: #FFF;
    }

    .current-col {
        background-color: #1b1b1b;
        color: #FFF;
    }

    .tbl-qa {
        width: 100%;
        font-size: 0.9em;
        background-color: #f5f5f5;
    }

    .tbl-qa th.table-header {
        padding: 5px;
        text-align: left;
        padding: 10px;
    }

    .tbl-qa .table-row td {
        padding: 10px;
        background-color: #FDFDFD;
    }
</style>
<script>
    $(document).ready(function () {
        $('.history_table').DataTable({
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