
<div class="row m-0">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <strong >Exercise Tolerance Test</strong>
            </div>
        </div>
        <br>
        <div class="row border border-dark">
            <div class="col-md-4">
                <label class="report-font">Ref.ID</label>
                <strong><?php echo $patient_info->id ?></strong>
            </div>
            <div class="col-md-4">
                <label class="report-font"><?php echo $patient_info->pat_age ?></label>
                <label class="report-font"><?php echo $patient_info->pat_sex ?></label>
            </div>
            <div class="col-md-4">
                <label class="report-font"><?php echo date('d-M-Y');?></label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div>
                    <strong><u>Indication of Exercise:</u></strong>
                    <?php if(isset($testreason)){?>
                        <p class="report-font"><?php echo $testreason; ?></p>
                    <?php }?>
                </div>
                <div class="">
                    <strong><u>Medication</u></strong>
                    <?php foreach($test_details as $key){?>
                        <p class="report-font"><?php echo $key['medication']; ?></p>
                    <?php }?>
                </div>
                <div class="">
                    <strong><u>Reason for Ending Test</u></strong>
                    <?php if(isset($endingtestreason)){?>
                        <p class="report-font"><?php echo $endingtestreason; ?></p>
                    <?php }?>
                </div>
                <div >
                    <strong><u>Protocol:</u></strong>
                    <?php if(isset($protocol)){?>
                        <p class="report-font"><?php echo $protocol; ?></p>
                    <?php }?>
                </div>
            </div>
            <div class="col-md-4 p-r-0">
                <div class="border border-dark p-0" style="width: 99.5%; margin: 0 auto;">
                    <div class="mb-1 border-bottom border-dark padding">Resting HR:</div>
                    <div class="mb-1 border-bottom border-dark padding">Resting BP:</div>
                    <div class="mb-1 border-bottom border-dark padding">Max Predicted Target HR:</div>
                    <div class="mb-1 border-bottom border-dark padding">Max HR:</div>
                    <div class="mb-1 border-bottom border-dark padding">Max Predicted HR Achived:</div>
                    <div class="mb-1 border-bottom border-dark padding">Max BP:</div>
                    <div class="mb-1 border-bottom border-dark padding">HR x BP:</div>
                    <div class="mb-1 border-bottom border-dark padding">Total Exercise Time:</div>
                    <div class="padding">Mets:</div>
                </div>
            </div>
            <div class="col-md-4 p-l-0">
                <div class="border border-dark p-0" style="width: 99.5%; margin: 0 auto;">
                    <div class="mb-1 border-bottom border-dark padding">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['resting_hr']; ?></strong>
                        <?php }?>(bpm)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['resting_bp']; ?></strong>
                        <?php }?>(ml O2/kg/min)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['max_pre_tar']; ?></strong>
                        <?php }?>(mmHg)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['max_hr']; ?></strong>
                        <?php }?>(bpm)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['max_pre_hr']; ?></strong>
                        <?php }?>(bpm)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['max_bp']; ?></strong>
                        <?php }?>(%)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['hr_bp']; ?></strong>
                        <?php }?>(mmHg)
                    </div>
                    <div class="mb-1 border-bottom border-dark padding">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['exercise_time']; ?></strong>
                        <?php }?>(bpm x mmHg)
                    </div>
                    <div class="padding">
                        <?php foreach($test_details as $key){?>
                                <strong><?php echo $key['mets']; ?></strong>
                        <?php }?>(minuts)
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row" style="width: 100%;">
            <div class="col-md-12 p-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Stage Name</th>
                            <th>Speed(mph)</th>
                            <th>Grade</th>
                            <th>Stage Time</th>
                            <th>Mets</th>
                            <th>HR</th>
                            <th>SBP/DBP</th>
                            <th>HR x BP</th>
                            <th>Condition</th>
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
        <br>
        <div class="row" style="width: 100%;">
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
        <div class="row" >
            <div class="row">
                <div class="col-md-12 ">
                    <div style="float: right;">
                        <h3><i>Dr.Shahadat Hussain Ch.</i></h3>
                        <label>MBBS, FCPS(Cardiology)</label><br>
                        <label><i>Asst. Professor Cardiology/CCU</i></label><br>
                        <label>QAMC/BVH Bahawalpur</label>
                    </div>
                    <br>
                </div>
            </div>

            <div class="row" style="border-top:1px solid #ddd;">
                <div class="col-md-12">
                    <br>
                    <p style="text-align: center;">Shahadat Clinic: 14-B Medical Colony Bahawalpur. Phone: 0322-6526467</p>
                </div>
            </div>
        </div>
    </div>
</div>

