<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <?php if(isset($rights[0]['rights'])):
                        $permissions = explode(',',$rights[0]['rights']);
                        if (in_array("create_new_profile-1", $permissions)): ?>
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label>New Profession</label>
                                        <input type="text" class="form-control" name="profession_add" id="profession_add">
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 20px;">
                                    <button class="btn btn-primary btn-sm" id="profes_add">Add</button>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
                <div class="card-body" style="overflow-y:auto; height:400px">
                    <div id="profession_table">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
