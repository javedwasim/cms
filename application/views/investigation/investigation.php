<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card card-top-margin">
            	<div class="card-header">
            		Patient's Investigation Settings
            	</div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#category" role="tab">
                                <span class="hidden-sm-up">Category</span>
                                <span class="hidden-xs-down">Category</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo  isset($active_tab)&&($active_tab=='items')?'active':''; ?>" data-toggle="tab" href="#items" role="tab">
                                <span class="hidden-sm-up">Items</span>
                                <span class="hidden-xs-down">Items</span></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <?php $this->load->view('investigation/category'); ?>
                        <?php $this->load->view('investigation/items'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>