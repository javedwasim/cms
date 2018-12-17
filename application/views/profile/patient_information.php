<div class="patient_info" style="font-size: 14px;">
      <strong>ID:</strong>
      <label id="label_patient_id"><?php echo $patient_info->id ?></label>
      <strong>Name:</strong>
      <label><?php echo $patient_info->pat_name ?></label>
      <strong>S/W/o:</strong>
      <label><?php echo $patient_info->pat_relative ?></label>
      <strong>Age:</strong>
      <label><?php echo $patient_info->pat_age ?></label>
      <strong>Sex:</strong>
      <label><?php echo $patient_info->pat_sex ?></label>
      <strong>Profession:</strong>
      <label><?php echo $patient_info->pat_profession ?></label>
      <strong>Contact:</strong>
      <label><?php echo $patient_info->pat_contact ?></label>
      <strong>Email:</strong>
      <label><?php echo $patient_info->pat_email ?></label>
      <strong>Address:</strong>
      <label><?php echo $patient_info->pat_address ?></label>
      <strong>District:</strong>
      <label><?php echo $patient_info->pat_district ?></label>
      <br>
      <?php if(isset($patient_vitals)){?>
      <strong>HT:</strong>
      <label><?php echo $patient_vitals->vital_height ?></label>
      <strong>WT:</strong>
      <label><?php echo $patient_vitals->vital_weight ?></label>
      <strong>BMI:</strong>
      <label><?php echo $patient_vitals->vital_bmi ?></label>
      <strong>BSA:</strong>
      <label><?php echo $patient_vitals->vital_bsa ?></label>
      <strong>BP:</strong>
      <label><?php echo $patient_vitals->vital_bp ?></label>
      <strong>Pulse:</strong>
      <label><?php echo $patient_vitals->vital_pulse ?></label>
      <strong>Temprature:</strong>
      <label><?php echo $patient_vitals->vital_temp ?></label>
      <strong>PT(Patient/Control):</strong>
      <label><?php echo $patient_vitals->vital_pt ?></label>
      <strong>INR:</strong>
      <label><?php echo $patient_vitals->vital_inr ?></label>
      <strong>Resp. Rate:</strong>
      <label><?php echo $patient_vitals->vital_rr ?></label>
      <?php }?>
</div>