<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>New Profession</label>
                                <input type="text" class="form-control" name="">
                            </div>
                        </div>
                        <div class="col-md-2" style="margin-top: 26px;">
                            <button class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="overflow-y:auto; height:400px">
                    <h6 class="text-muted">Click to edit</h6>
                    <table class="table table-bordered nowrap responsive" cellspacing="0" width="100%" >
                         <thead>
                            <tr>
                                <th style="width: 10%"></th>
                                <th>Profession</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($professions as $key) {
                            ?>
                            <tr>
                                <td><i class="fa fa-trash"></i></td>
                                <td><?php echo $key['profession_name']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
