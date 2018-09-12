<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
            	<div class="card-header">
            		Special Instructions
            	</div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link <?php echo  isset($active_tab)&&($active_tab=='category')?'active':''; ?>" data-toggle="tab" href="#category" role="tab">
                                <span class="hidden-sm-up"><i class="ti-home"></i></span>
                                <span class="hidden-xs-down">Category</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo  isset($active_tab)&&($active_tab=='items')?'active':''; ?>" data-toggle="tab" href="#items" role="tab">
                                <span class="hidden-sm-up"><i class="ti-user"></i></span>
                                <span class="hidden-xs-down">Items</span></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <?php $this->load->view('instruction/category'); ?>
                        <?php $this->load->view('instruction/items'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="history-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Discription</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Risk Factor and Cardiac Problems</label>
                        <textarea class="form-control" rows="3">

                        </textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger waves-effect waves-light">Update</button>
            </div>
        </div>
    </div>
</div>