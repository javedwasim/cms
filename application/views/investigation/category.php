<div class="tab-pane active" id="category" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="investigation_category_form">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <label>New Category</label>
                        <input type="text" class="form-control" name="instruction_name" id="instruction_name" maxlength="50" required>
                    </div>
                    <div class="col-md-2 col-lg-1 m-t-25">
                        <button class="btn btn-primary btn-sm add-investigation-category">Add</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body investigation_category_container" style="height: 400px; overflow-y: scroll;">
            <?php $this->load->view('investigation/category_table'); ?>
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