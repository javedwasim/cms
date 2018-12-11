<div class="row" style="margin-top: 50px;">
    <div class="col-md-12">
        <h1 style="text-align: center;">Transthoracic Echocardiography Report</h1>
    </div>
</div>
<br>
<div class="row" style="width: 100%; background: #90addd; border-top: 2px solid #000; border-bottom: 2px solid #000; border-left: 2px dotted #000; border-right: 2px dotted #000; padding-top: 10px;">
    <div class="col-md-6">
        <strong>Ref.ID</strong>
        <i><?php echo $patient_info->id ?></i>
        <strong style="margin-left: 10px"><?php echo $patient_info->pat_name ?></strong>
    </div>
    <div class="col-md-4">
        <strong>
            <?php $age = preg_split('#(?<=\d)(?=[a-z])#i', $patient_info->pat_age); echo $age[0]; 
                echo " ";
            ?>
        </strong>
        <label><?php echo $age[1]; ?></label>
        <label style="margin-right: 20px; text-transform: capitalize;"><?php echo $patient_info->pat_sex ?></label>
    </div>
    <div class="col-md-2">
        <label><?php echo date('d-M-Y');?></label>
    </div>
</div>
<br>
<div class="row" style="width: 100%;">
    <div class="col-md-5">
        <table class="table table-bordered">
            <thead style="background: #90addd;">
                <tr>
                    <th colspan="3">2D / M-MODE Measurements</th>
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
    <div class="col-md-5">
        <table class="table table-bordered">
            <thead style="background: #90addd;">
                <tr>
                    <th colspan="3">Doppler Measurements</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($measurements)): ?>
                    <?php  foreach ($measurements as $measurement): if($measurement['main_category']=='dopplers'): ?>
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
    <div class="col-md-2">
        <ul class="list-group">
            <li class="list-group-item" style="background: #90addd;">
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
</div>
<br>
<div class="row" style="width: 100%;">
    <div class="col-md-12">
        <h3><i>Echocardiography Findings:</i></h3>
        <?php if(isset($findings)): ?>
            <?php foreach ($findings as $finding): ?>
            <div class="row" style="margin-left: 10px;">
                <div class="col-md-4"><?php echo $finding['name']; ?></div>
                <div class="col-md-8"><?php echo $finding['finding_value']; ?></div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="col-md-12" style="margin-top: 20px;">
        <h3><i>Conclution:</i></h3>
        <?php if(isset($diagnosis)): ?>
            <?php foreach ($diagnosis as $diagnose): ?>
                <strong style="margin-left: 10px;"><?php echo $diagnose['diagnosis_value']; ?></strong>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>