<div class="row m-0">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <strong style="text-align: center;">Transthoracic Echocardiography Report</strong>
            </div>
        </div>
        <br>
        <div class="row border border-dark">
            <div class="col-md-5">
                <label class="report-font">Ref.ID</label>
                <strong class="report-font"><?php echo $patient_info->id ?></strong>
                <strong class="report-font"><?php echo $patient_info->pat_name ?></strong>
            </div>
            <div class="col-md-4">
                <label class="report-font"><?php echo $patient_info->pat_age ?></label>
                <label class="report-font"><?php echo $patient_info->pat_sex ?></label>
            </div>
            <div class="col-md-3">
                <label class="report-font"><?php echo date('d-M-Y');?></label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3" class="report-font">2D / M-MODE Measurements</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($measurements)): ?>
                            <?php foreach ($measurements as $measurement): if($measurement['main_category']=='mmode'): ?>
                                <tr>
                                    <td>
                                        <?php echo $measurement['item'] ?>
                                        
                                    </td>
                                    <td>
                                        <?php echo $measurement['item_value'] ?>
                                        
                                    </td>
                                    <td>
                                        <?php echo $measurement['measurement_value'] ?>
                                        
                                    </td>
                                </tr>
                            <?php endif; endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3" class="report-font">Doppler Measurements</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($measurements)): ?>
                            <?php  foreach ($measurements as $measurement): if($measurement['main_category']=='dooplers'): ?>
                                <tr>
                                    <td>
                                        <?php echo $measurement['item'] ?>
                                    </td>
                                    <td>
                                        <?php echo $measurement['item_value'] ?>
                                    </td>
                                    <td>
                                        <?php echo $measurement['measurement_value'] ?>
                                    </td>
                                </tr>
                            <?php endif; endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8">
                <strong>Echocardiography Findings:</strong>
                <?php if(isset($findings)): ?>
                    <?php foreach ($findings as $finding): ?>
                    <div class="row">
                        <div class="col-md-4"><?php echo $finding['name']; ?></div>
                        <div class="col-md-8"><?php echo $finding['finding_value']; ?></div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>Color Doppler</strong>
                    </li>
                    <?php if(isset($color_doppler)){
                            foreach ($color_doppler as $dop) {
                    ?>
                    <li class="list-group-item">
                        <?php echo $dop['doopler_mr']; ?>
                    </li>
                    <li class="list-group-item">
                        <?php echo $dop['doopler_ar']; ?>
                    </li>
                    <li class="list-group-item">
                        <?php echo $dop['doopler_pr']; ?>
                    </li>
                    <li class="list-group-item">
                        <?php echo $dop['doopler_tr']; ?>
                    </li>
                    <?php } }?>
                </ul>   
            </div>
            <div class="col-md-12">
                <h3>Conclution:</h3>
                <?php if(isset($diagnosis)): ?>
                    <?php foreach ($diagnosis as $diagnose): ?>
                        <p><?php echo $diagnose['diagnosis_value']; ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div style="width: 100%;">
            <div class="row">
                <div class="col-md-12 ">
                    <div style="float: right;">
                        <h3><i>Dr.Shahadat Hussain Ch.</i></h3>
                        <label>MBBS, FCPS(Cardiology)</label><br>
                        <label><i>Asst. Professor Cardiology/CCU</i></label><br>
                        <label>QAMC/BVH Bahawalpur</label>
                    </div>
                </div>
            </div>
            <hr size="10">
            <div class="row">
                <div class="col-md-12">
                    <p style="text-align: center;">Shahadat Clinic: 14-B Medical Colony Bahawalpur. Phone: 0322-6526467</p>
                </div>
            </div>
        </div>
    </div>
</div>