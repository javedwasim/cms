<?php if(isset($patient_vitals)){
        foreach ($patient_vitals as $key) {
?>
<tr >
    <td><?php echo $key['id']; ?><input type="hidden" value="<?php echo $key['id']; ?>" class="vital_id" /></td>
    <td>
        <input size="16" type="text" class="vital_date_time vaital_datetime" data-date-format="dd MM yyyy HH:ii p"  value="<?php echo date('d-F-Y h:i a',strtotime($key['vaital_datetime'])); ?>" readonly style="border: transparent; width:70%;">
    </td>
    <td contenteditable="true" class="vital_bp"><?php echo $key['vital_bp']; ?></td>
    <td contenteditable="true" class="vital_pulse"><?php echo $key['vital_pulse']; ?></td>
    <td contenteditable="true" class="vital_temp"><?php echo $key['vital_temp']; ?></td>
    <td contenteditable="true" class="vital_inr"><?php echo $key['vital_inr']; ?></td>
    <td contenteditable="true" class="vital_rr"><?php echo $key['vital_rr']; ?></td>
    <td style="display: inline-flex;">
        <a class="btn btn-sm btn-danger delete_vital" href="javascript:void(0)" data-href="<?php echo site_url('user/delete_vitals/'. $key["id"].'/'.$key["patient_id"]) ?>">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        &nbsp;
        <a class="btn btn-sm btn-info update_vital" href="javascript:void(0)" >
            <i class="fa fa-edit" aria-hidden="true"></i>
        </a>
    </td>
</tr>
<?php } 
 } ?>
<tr >
    <td class="vital_id"></td>
    <td>
        <input size="16" type="text" class="vital_date_time vaital_datetime" data-date-format="dd MM yyyy HH:ii p"  value="" placeholder="<?php echo date('d-F-Y h:i a'); ?>" readonly style="border: transparent; width:70%;">
    </td>
    <td contenteditable="true" class="vital_bp"></td>
    <td contenteditable="true" class="vital_pulse"></td>
    <td contenteditable="true" class="vital_temp"></td>
    <td contenteditable="true" class="vital_inr"></td>
    <td contenteditable="true" class="vital_rr"></td>
    <td style="display: inline-flex;">
        <a class="btn btn-default btn-sm save_vitals" href="javascript:void(0)">
            <i class="fa fa-save" aria-hidden="true"></i>
        </a>
    </td>
</tr>
<script type="text/javascript">
    $(document).ready(function () {
         $('.vaital_datetime').datetimepicker({
            //language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
    });
</script>