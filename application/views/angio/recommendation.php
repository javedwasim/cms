<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <form id="angio_form">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Recommendation</label>
                                    <textarea class="form-control" id="add_description"  name="description" rows="3" required></textarea>
                                    <button class="btn btn-sm btn-primary" id="add_recommendation">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body recommendation_container" style="height: 400px; overflow-y: scroll;">
                    <?php $this->load->view('angio/recommendation_table'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
