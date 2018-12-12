<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card card-top-margin">
            	<div class="card-header">
            		ETT Settings
            	</div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#ett1" role="tab"><span class="hidden-sm-up">Test Reasons</span> <span class="hidden-xs-down">Test Reasons</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ett2" role="tab"><span class="hidden-sm-up">Ending Reasons</span> <span class="hidden-xs-down">Ending Reasons</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ett3" role="tab"><span class="hidden-sm-up">Description</span> <span class="hidden-xs-down">Description</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ett4" role="tab"><span class="hidden-sm-up">Conclusion</span> <span class="hidden-xs-down">Conclusion</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ett5" role="tab"><span class="hidden-sm-up">Protocols</span> <span class="hidden-xs-down">Protocols</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ett6" id="ett-details-pro" role="tab"><span class="hidden-sm-up">Protocols Details</span> <span class="hidden-xs-down">Protocols Details</span></a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <?php $this->load->view('ett/test_reason'); ?>
                        <?php $this->load->view('ett/ending_reason'); ?>
                        <?php $this->load->view('ett/description'); ?>
                        <?php $this->load->view('ett/conclusion'); ?>
                        <?php $this->load->view('ett/protocol'); ?>
                        <div class="tab-pane" id="ett6" role="tabpanel">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->