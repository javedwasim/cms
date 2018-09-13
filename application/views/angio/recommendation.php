<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Recommendation</label>
                                <textarea class="form-control" id="add_description"  name="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-2" style="margin-top: 26px;">
                            <button class="btn btn-primary" id="add_recommendation">Add</button>
                        </div>
                    </div>
                </div>
                <div class="card-body recommendation_container" >
                    <?php $this->load->view('angio/recommendation_table'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
