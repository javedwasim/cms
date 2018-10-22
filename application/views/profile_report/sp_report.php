<div class="row m-0">
    <div class="col-md-12">
        <br>
        <div class="row border border-dark">
            <div class="col-md-8">
                <label>Ref.ID:</label>
                <strong class="report-font"><?php echo $patient_info->id ?></strong>
                <strong class="report-font"><?php echo $patient_info->pat_name ?></strong>
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
            <div class="col-md-12" style="text-align: center;width: 100%; word-break: break-all;">
                <p><?php if(isset($test_details)){
                    echo $test_details->description;
                }?></p>
            </div>
        </div>
    </div>
</div>
