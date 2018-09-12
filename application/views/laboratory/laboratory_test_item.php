<div class="tab-pane <?php echo isset($active_tab) && ($active_tab == 'items') ? 'active' : ''; ?>"
     id="tests-items" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="form-group">
                        <label>Item Name:</label>
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="form-group">
                        <label>Units:</label>
                        <input type="text" class="form-control" name="">
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4">
                    <div class="form-group">
                        <label>Test:</label>
                        <select class="form-control">
                            <option>Select</option>
                            <option>GIT Problem</option>
                            <option>Co-Resp</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 p-0">
                    <div class="form-group m-t-25">
                        <button class="btn btn-sm btn-primary">Add</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="form-group ">
                        <label>Select Category:</label>
                        <select class="form-control">
                            <option>Select</option>
                            <option>GIT Problem</option>
                            <option>Co-Resp</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered nowrap responsive" cellspacing="0" id=""
                   width="100%">
                <thead>
                <tr>
                    <th style="width: 10%">Delete</th>
                    <th style="width: 10%">Discription</th>
                    <th>Item Name</th>
                    <th>Units</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="width: 10%"><i class="fa fa-trash"></i></td>
                    <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i
                            class="far fa-question-circle"></i></td>
                    <td>PT/Control</td>
                    <td>Sec</td>
                </tr>
                <tr>
                    <td style="width: 10%"><i class="fa fa-trash"></i></td>
                    <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i
                            class="far fa-question-circle"></i></td>
                    <td>INR</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width: 10%"><i class="fa fa-trash"></i></td>
                    <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i
                            class="far fa-question-circle"></i></td>
                    <td>Bleeding time</td>
                    <td>3-5 min</td>
                </tr>
                <tr>
                    <td style="width: 10%"><i class="fa fa-trash"></i></td>
                    <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i
                            class="far fa-question-circle"></i></td>
                    <td>Co-GIT</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>