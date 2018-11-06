<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
            	<div class="card-header">
                    Echocardiography
            	</div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tb1" role="tab">
                                <span class="hidden-sm-up"><i class="ti-home"></i></span>
                                <span class="hidden-xs-down">Disease</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo  isset($active_tab)&&($active_tab=='structure')?'active':''; ?>" data-toggle="tab" href="#tb2" role="tab">
                                <span class="hidden-sm-up"><i class="ti-user"></i></span>
                                <span class="hidden-xs-down">Structures</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo  isset($active_tab)&&($active_tab=='dfd')?'active':''; ?>" data-toggle="tab" href="#tb3" role="tab">
                                <span class="hidden-sm-up"><i class="ti-user"></i></span>
                                <span class="hidden-xs-down">Default Finding/Diagnosis</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo  isset($active_tab)&&($active_tab=='category')?'active':''; ?>" data-toggle="tab" href="#tb4" role="tab">
                                <span class="hidden-sm-up"><i class="ti-user"></i></span>
                                <span class="hidden-xs-down">2D Echo Category</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo  isset($active_tab)&&($active_tab=='measurement')?'active':''; ?>" data-toggle="tab" href="#tb5" role="tab">
                                <span class="hidden-sm-up"><i class="ti-user"></i></span>
                                <span class="hidden-xs-down">Measurement</span></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <?php $this->load->view('echo/disease'); ?>
                        <?php $this->load->view('echo/structure'); ?>
                        <?php $this->load->view('echo/dfd'); ?>
                        <?php $this->load->view('echo/category'); ?>
                        <?php $this->load->view('echo/measurement'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>