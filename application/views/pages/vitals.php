<div class="dashboard-content" style="margin: 0 .5%;">
    <div class="row page-titles">
        <div class="col-md-5" style="display: inline-flex;">
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)" id="vitals_to_profile">profile</a></li>
                <li class="breadcrumb-item active">vitals</li>
            </ol>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">Vitals Chart</h3>
                    </div>
                    <div class="col-md-2 offset-5" style="margin-right:5px;">
                        <button type="button" class="btn btn-block btn-primary " id="btn-print-vital">Print Sheet</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered" id="vitaltabl" width="100%">
                            <thead>
                                <tr role="row">
                                    <th class="hide">
                                        Vital ID
                                    </th>
                                    <th>
                                        Date &amp; Time
                                    </th>
                                    <th>
                                        B.P 120/80
                                    </th>
                                    <th>
                                        Pulse
                                    </th>
                                    <th>Volume</th>
                                    <th>
                                        Temperature
                                    </th>
                                    <th>
                                        Resp. Rate
                                    </th>
                                    <th>Height (cm)</th>
                                    <th>Weight (Kg)</th>
                                    <th>BMI (kg/m<sup>2</sup>)</th>
                                    <th>BSA (m<sup>2</sup>)</th>
                                    <th>
                                        PT(Patient/Control)
                                    </th>
                                    <th>
                                        INR
                                    </th>
                                    <th>
                                        Vitals Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="vital_rows">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

