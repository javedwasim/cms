<?php
if(isset($rights[0]['user_rights']))
{
    $appointment_rights = explode(',',$rights[0]['user_rights']);
    //print_r($appointment_rights);
    $loggedin_user = $this->session->userdata('userdata');
}
?>
<div class="tab-pane active" id="category" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="exam_category_form">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>New Category</label>
                            <input type="text" class="form-control"  name="instruction_name" id="instruction_name" maxlength="50" required>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-1 m-t-25">
                        <button class="btn btn-primary btn-sm add-examination-category">Add</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body ins_category_container">
            <?php $this->load->view('examination/category_table'); ?>
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
        $('.datatables').DataTable({
            "info": true,
            "paging": false,
            "searching": false
        });
    });
</script>