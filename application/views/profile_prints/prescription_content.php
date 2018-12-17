<div class="row border-dark" style="width: 96%; border-bottom:3px solid #000; margin-top:50px; ">
    <div class="col-md-6" style="font-size: 22px;">
        <strong>Ref.ID:</strong>
        <i><?php echo $patient_info->id ?></i>
        <strong style="margin-left: 15px;font-weight: bold;"><?php echo $patient_info->pat_name ?></strong>
    </div>
    <div class="col-md-3">
        <strong style="font-weight: bold; margin-right: 7px;">
            <?php $age = preg_split('#(?<=\d)(?=[a-z])#i', $patient_info->pat_age); echo $age[0]; 
                echo " ";
            ?>
        </strong>
        <label><?php echo $age[1]; ?></label>
        <label style="margin-left: 20px; text-transform: capitalize;"><?php echo $patient_info->pat_sex ?></label>
    </div>
    <div class="col-md-3">
        <label><?php echo date('l, F Y');?></label>
    </div>
</div>
<br>
<div class="row" style="width: 95%;">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-5" style="padding-left: 0px; font-weight: 500; font-size: 25px; font-family: Arial;">
                <?php 
                foreach ($history_details as $value) {
                    $history[] = $value['history_value'];
                }
                foreach($examination_details as $examination){
                    $examinations[] = $examination['examination_value'];
                }
                foreach($investigation_details as $investigation){
                    $investigations[] = $investigation['investigation_value'];
                }
                foreach($advice_details as $advice){
                    $advices[] = $advice['advice_value'];
                }
                foreach($medicine_details as $med){?>
                    <div class="mb-10"><?php echo $med['medicine_value']?></div>
                <?php }?>
            </div>
            <div class="col-md-6" style="padding-right: 0px; font-weight: 500; direction:rtl; font-size: 25px; text-align: right;">
                <?php foreach($dosage_details as $dos){?>
                    <div class="mb-10"><?php echo $dos['dosage_value']?></div>
                <?php }?>
            </div>  
        </div>
    </div>
    <div class="col-md-4" style="font-size: 20px;font-family: Arial;">
        <div class="mb-10" style="width: 100%; word-break: break-all;"><?php echo implode(',',$history); ?></div>
        <?php 
        foreach($patient_vitals as $vitals){?>
            <div style="width: 100%; word-break: break-all;">Pulse:<?php echo $vitals['vital_pulse']; ?>&nbsp;<?php echo $vitals['vital_volume']; ?></div>
            <div style="width: 100%; word-break: break-all;">BP.<?php echo $vitals['vital_bp']; ?></div>
            <div style="width: 100%; word-break: break-all;">Resp. Rate:<?php echo $vitals['vital_rr']; ?>&nbsp;&nbsp;&nbsp;Temprature:<?php echo $vitals['vital_temp']; ?></div>
        <?php }?>
        <div class="mb-10" style="width: 100%; word-break: break-all;"><?php echo implode(',',$examinations); ?></div>
        <div class="mb-10" style="width: 100%; word-break: break-all;"><?php echo implode(',',$investigations); ?></div>
        <div class="mb-10" style="width: 100%; word-break: break-all;"><?php echo implode(',', $advices) ; ?></div>
    </div>
</div>
<br>
<div class="mb-10 footer-top" style="word-break: break-all; font-weight: 500; font-size: 22px; text-align: right; width: 86%;">
    <?php foreach ($instruction_details as $value) {
        echo '<div style="text-align:left; display:inline-block; ">'.$value['instruction_value'].'</div> <br>';
    }?>
</div>
<div class="row footer-top-line" style="width: 92%;">
    <div class="col-md-12">
        <br> 
        <p style="text-align: right; font-size: 26px; font-weight: 500; direction: rtl; word-spacing: 3px;width: 95%;">
            پھر مورخہ       <?php foreach($visit_date as $visit){echo " ";echo date('Y, F d',strtotime($visit['next_visit_date']));echo " ";}?>            کو چیک کرایں۔ چیک نہ ہونے کی صورت میں ادویات جاری رکھیں۔ آنے سے قبل فون پر ٹائم لیں۔
        </p>
    </div>
</div>
    