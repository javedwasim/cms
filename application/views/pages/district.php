<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>New District</label>
                                <input type="text" class="form-control" name="">
                            </div>
                        </div>
                        <div class="col-md-2" style="margin-top: 26px;">
                            <button class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="overflow-y:auto; height:400px">
                    <table class="table table-bordered nowrap responsive" cellspacing="0" width="100%" >
                        <thead>
                            <tr>
                                <th>Districts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($districts as $key) {
                            ?>
                            <tr>
                                <td><?php echo $key['district_name']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
