<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
            	<div class="card-header">
            		Patient's History Settings
            	</div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#category" role="tab">
                                <span class="hidden-sm-up"><i class="ti-home"></i></span>
                                <span class="hidden-xs-down">Category</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo  isset($active_tab)&&($active_tab=='history_items_content')?'active':''; ?>" data-toggle="tab" href="#history_items_content" role="tab" id="history_item_tab" >
                                <span class="hidden-sm-up"><i class="ti-user"></i></span>
                                <span class="hidden-xs-down">Items</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <?php $this->load->view('history/history'); ?>
                        <div class="tab-pane" id="history_items_content" role="tabpanel">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>