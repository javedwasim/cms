<div class="row" style="margin-top: 50px; font-family: Arial;">
    <div class="col-md-12">
        <h1 style="text-align: center;">Exercise Tolerance Test</h1>
    </div>
</div>
<div class="row" style="width: 99%; background: #90addd; border-top: 2px solid #000; border-bottom: 2px solid #000; border-left: 2px dotted #000; border-right: 2px dotted #000; padding-top: 10px; padding-left: 10px; padding-bottom: 10px;">
    <div class="col-md-6">
        <strong>Ref.ID</strong>
        <i><?php echo $patient_info->id ?></i>
        <strong style="margin-left: 10px"><?php echo $patient_info->pat_name ?></strong>
    </div>
    <div class="col-md-4">
        <strong style="margin-right:5px;">
            <?php $age = preg_split('#(?<=\d)(?=[a-z])#i', $patient_info->pat_age); echo $age[0]; 
                echo " ";
            ?>
        </strong>
        <label><?php echo $age[1]; ?></label>
        <label style="margin-left: 15px; text-transform: capitalize;"><?php echo $patient_info->pat_sex ?></label>
    </div>
    <div class="col-md-2">
        <label><?php echo date('d-M-Y');?></label>
    </div>
</div>
<br>
<div class="row" style="width: 100%; font-family: Arial;">
    <div class="col-md-6">
        <div style="height: 100px;">
            <div style="width: 98%; margin-bottom: 5px; border-bottom: 1px solid #000;">
                <h3 style="margin: 0px;">Indication of Exercise:</h3>
            </div>
            <?php if(isset($testreason)){?>
                <strong><?php echo $testreason; ?></strong>
            <?php }?>
        </div>
        <div style="height: 100px;">
            <div style="width: 98%; margin-bottom: 5px; border-bottom: 1px solid #000;">
                <h3 style="margin: 0px;">Medication</h3>
            </div>
            <?php foreach($test_details as $key){?>
                <strong><?php echo $key['medication']; ?></strong>
            <?php }?>
        </div>
        <div style="height: 100px;">
            <div style="width: 98%; margin-bottom: 5px; border-bottom: 1px solid #000;">
                <h3 style="margin: 0px;">Reason for Ending Test</h3>
            </div>
            <?php if(isset($endingtestreason)){?>
                <strong><?php echo $endingtestreason; ?></strong>
            <?php }?>
        </div>
        <div style="height: 100px;">
            <div style="width: 98%; margin-bottom: 5px; border-bottom: 1px solid #000;">
                <h3 style="margin: 0px;">Protocol:</h3>
            </div>
            <?php if(isset($protocol)){?>
                <strong><?php echo $protocol; ?></strong>
            <?php }?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row" style="margin: 0px; font-family: Arial;">
            <div class="col-md-6">
                <div class="border border-dark p-0" style="width: 100%; margin: 0 auto;">
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">Resting HR:</div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">Resting BP:</div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">Max Predicted Target HR:</div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">Max HR:</div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">Max Predicted HR Achived:</div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">Max BP:</div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">HR x BP:</div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">Total Exercise Time:</div>
                    <div class="padding" style="padding: 10px 3px;">Mets:</div>
                </div>
            </div>
            <div class="col-md-6" style="font-family: Arial;">
                <div class="border border-dark p-0" style="width: 100%; margin: 0 auto;">
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['resting_hr']; ?></strong>
                        <?php }?>(bpm)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['resting_bp']; ?></strong>
                        <?php }?>(mmHg)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['max_pre_tar']; ?></strong>
                        <?php }?>(bpm)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['max_hr']; ?></strong>
                        <?php }?>(bpm)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['max_pre_hr']; ?></strong>
                        <?php }?>(%)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['max_bp']; ?></strong>
                        <?php }?>(mmHg)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['hr_bp']; ?></strong>
                        <?php }?>(bpm x mmHg)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding" style="padding: 10px 3px;">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['exercise_time']; ?></strong>
                        <?php }?>(minuts)
                    </div>
                    <div class="padding" style="padding: 10px 3px;">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['mets']; ?></strong>
                        <?php }?>(ml O2/kg/min)

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="width: 100%; font-family: Arial;">
    <div class="col-md-12 p-0">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="font-size: 12px;">Stage Name</th>
                    <th style="font-size: 12px;">Speed(mph)</th>
                    <th style="font-size: 12px;">Grade</th>
                    <th style="font-size: 12px;">Stage Time</th>
                    <th style="font-size: 12px;">Mets</th>
                    <th style="font-size: 12px;">HR</th>
                    <th style="font-size: 12px;">SBP/DBP</th>
                    <th style="font-size: 12px;">HR x BP</th>
                    <th style="font-size: 12px;">Condition</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($protocol_details as $key){?>
                <tr>
                    <td><?php echo $key['stage_name']; ?></td>
                    <td><?php echo $key['speed']; ?></td>
                    <td><?php echo $key['grade']; ?></td>
                    <td><?php echo date('h:i', strtotime($key['stage_time'])); ?></td>
                    <td><?php echo $key['mets']; ?></td>
                    <td><?php echo $key['hr']; ?></td>
                    <td><?php $sbp = $key['sbp']; $dbp = $key['dbp']; echo $result = $sbp/$dbp ?></td>
                    <td><?php $sbp = $key['sbp']; $dbp = $key['dbp']; echo $result = $sbp*$dbp ?></td>
                    <td><?php echo $key['protocol_condition']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row" style="width: 100%;font-family: Arial;">
    <div class="col-md-12">
        <h3>Description:</h3>
        <p>
            <?php foreach($test_details as $key){
                 echo $key['description'];
             }?>
        </p>
    </div>
    <div class="col-md-12">
        <h3>Conclution:</h3>
        <p>
           <?php foreach($test_details as $key){
                 echo $key['conclusion'];
            }?> 
        </p>
    </div>
</div>