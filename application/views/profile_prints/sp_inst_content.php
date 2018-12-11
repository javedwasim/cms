<div class="row border-dark" style="width: 100%; border-bottom:3px solid #000; margin-top: 100px;">
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
        <label style="margin-left: 15px; text-transform: capitalize;"><?php echo $patient_info->pat_sex ?></label>
    </div>
    <div class="col-md-2">
        <label><?php echo date('d-M-Y');?></label>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12" style="text-align: center;width: 100%; word-break: break-all;">
        <p><?php if(isset($test_details)){
            echo $test_details->description;
        }?></p>
    </div>
</div>