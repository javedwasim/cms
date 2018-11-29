<input type="hidden" id="examination_clone_val" value="1" />
<div class="row m-0">
    <div class="col-md-12">
        <div class="row border border-dark">
            <div class="col-md-6">
                <label class="report-font">Ref.ID</label>
                <strong class="report-font"><?php echo $patient_info->id ?></strong>
                <strong class="report-font"><?php echo $patient_info->pat_name ?></strong>
            </div>
            <div class="col-md-4">
                <label class="report-font"><?php echo $patient_info->pat_age ?></label>
                <label class="report-font"><?php echo $patient_info->pat_sex ?></label>
            </div>
            <div class="col-md-2 p-0 report-font">
                <label><?php echo date('d-M-Y');?></label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6" >
                        <?php foreach($medicine_details as $med){?>
                            <div class=" report-font"><?php echo $med['medicine_value']?></div>
                        <?php }?>
                    </div>
                    <div class="col-md-6">
                        <?php foreach($dosage_details as $dos){?>
                            <div class=" report-font"><?php echo $dos['dosage_value']?></div>
                        <?php }?>
                    </div>  
                </div>
            </div>
            <div class="col-md-6">
                <?php foreach($history_details as $history){?>
                    <div class=" report-font" style="width: 100%; word-break: break-all;"><?php echo $history['history_value']; ?></div>
                <?php }?>
                <?php foreach($measurement_details as $measurment){?>
                    <div class=" report-font" style="width: 100%; word-break: break-all;">Pulse:<?php echo $measurment['pulse']; ?>&nbsp;<?php echo $measurment['volume']; ?></div>
                    <div class=" report-font" style="width: 100%; word-break: break-all;">BP.<?php echo $measurment['bp_a']; ?>/<?php echo $measurment['bp_b']; ?></div>
                    <div class=" report-font" style="width: 100%; word-break: break-all;">Resp. Rate:<?php echo $measurment['rr']; ?>&nbsp;&nbsp;&nbsp;Temprature:<?php echo $measurment['temprature']; ?></div>
                <?php }?>
                <?php foreach($examination_details as $examination){?>
                    <div class=" report-font" style="width: 100%; word-break: break-all;"><?php echo $examination['examination_value']; ?></div>
                <?php }?>
                <?php foreach($investigation_details as $investigation){?>
                    <div class=" report-font" style="width: 100%; word-break: break-all;"><?php echo $investigation['investigation_value']; ?></div>
                <?php }?>
                <?php foreach($advice_details as $advice){?>
                    <div class=" report-font" style="width: 100%; word-break: break-all;"><?php echo $advice['advice_value']; ?></div>
                <?php }?>
            </div>
        </div>
        <br>
        <?php foreach($instruction_details as $instruction){?>
            <div class="report-font" style="width: 100%; word-break: break-all;"><?php echo $instruction['instruction_value']; ?></div>
        <?php }?>
        <div class="row" style="border-top:1px solid #ddd;">
            <div class="col-md-12">
                <br> 
                <p style="text-align: center; font-size: 14px; font-weight: bold;">پھر مورخہ <?php foreach($visit_date as $visit){echo " ";echo date('Y-m-d',strtotime($visit['next_visit_date']));echo " ";}?>کو چیک کرایں۔ چیک نہ ہونے کی صورت میں ادوایات جاری رکہیں۔ آنے سے ایک روز ‍قبل فون پر نام لیں۔</p>
            </div>
        </div>
    </div>
</div>
