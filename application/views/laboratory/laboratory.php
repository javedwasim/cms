<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Laboratory Test Settings
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link <?php echo isset($active_tab) && ($active_tab == 'category') ? 'active' : ''; ?>"
                               data-toggle="tab" href="#category" role="tab">
                                <span class="hidden-sm-up"><i class="ti-home"></i></span>
                                <span class="hidden-xs-down">Category</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo isset($active_tab) && ($active_tab == 'tests') ? 'active' : ''; ?>"
                               data-toggle="tab" href="#tests" role="tab">
                                <span class="hidden-sm-up"><i class="ti-user"></i></span>
                                <span class="hidden-xs-down">Tests</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo isset($active_tab) && ($active_tab == 'items') ? 'active' : ''; ?>"
                               data-toggle="tab" href="#tests-items" role="tab">
                                <span class="hidden-sm-up"><i class="ti-user"></i></span>
                                <span class="hidden-xs-down">Test Items</span></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <?php $this->load->view('laboratory/laboratory_category'); ?>
                        <?php $this->load->view('laboratory/laboratory_test'); ?>
                        <?php $this->load->view('laboratory/laboratory_test_item'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->