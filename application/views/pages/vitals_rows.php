<?php 
if(isset($rights[0]['user_rights']))
{
    $permissions = explode(',',$rights[0]['user_rights']);
    $loggedin_user = $this->session->userdata('userdata');
}
if(isset($patient_vitals)){
        foreach ($patient_vitals as $key) {
?>
<tr>
    <td style="white-space: nowrap; word-break: break-all;">
        <?php echo $key['id']; ?><input type="hidden" value="<?php echo $key['id']; ?>" class="vital_id" />
        <input type="hidden" name="pat_id" id="patientid" value="<?php echo $key['patient_id']; ?>">
    </td>
    <td style="white-space: nowrap; word-break: break-all;">
        <input size="16" type="text" class="vital_date_time vaital_datetime form-control bg-transparent border-0 shadow-none" data-date-format="dd-MM-yyyy HH:ii p"  value="<?php echo date('d-F-Y h:i a',strtotime($key['vaital_datetime'])); ?>" readonly style="font-size: 13px; width: 200px;">
    </td style="white-space: nowrap; word-break: break-all;">
    <td contenteditable="true" class="vital_bp" style="white-space: nowrap; word-break: break-all;"><?php echo $key['vital_bp']; ?></td>
    <td contenteditable="true" class="vital_pulse" style="white-space: nowrap; word-break: break-all;"><?php echo $key['vital_pulse']; ?></td>
    <td contenteditable="true" class="vital_temp" style="white-space: nowrap; word-break: break-all;"><?php echo $key['vital_temp']; ?></td>
    <td contenteditable="true" class="vital_pt" style="white-space: nowrap; word-break: break-all;"><?php echo $key['vital_pt']; ?></td>
    <td contenteditable="true" class="vital_inr" style="white-space: nowrap; word-break: break-all;"><?php echo $key['vital_inr']; ?></td>
    <td contenteditable="true" class="vital_rr" style="white-space: nowrap; word-break: break-all;"><?php echo $key['vital_rr']; ?></td>
    <td class="vital_volume" >
        <select class="form-control" style="font-size: 13px;">
            <option value="<?php echo $key['vital_volume']; ?>"><?php echo $key['vital_volume']; ?></option>
            <option value="Normal Volume">Normal Volume</option>
            <option value="Low Volume">Low Volume</option>
            <option value="High Volume">High Volume</option>
            <option value="Irregularly Volume">Irregularly Volume</option>
            <option value="With pauses">With pauses</option>
        </select>
    </td>
    <td style="white-space: nowrap; word-break: break-all;">
        <input type="text" class="shadow-none border-0 vital_height" onchange="vitalBmiBsa(this)" value="<?php echo $key['vital_height']; ?>" style="width: 100px;" >
    </td>
    <td style="white-space: nowrap; word-break: break-all;">
        <input type="text" class="shadow-none border-0 vital_weight" onchange="vitalBsaBmi(this)" value="<?php echo $key['vital_weight']; ?>" style="width: 100px;" >
    </td>
    <td  class="vital_bmi" style="white-space: nowrap; word-break: break-all;"><?php echo $key['vital_bmi']; ?></td>
    <td  class="vital_bsa" style="white-space: nowrap; word-break: break-all;"><?php echo $key['vital_bsa']; ?></td>
    <td style="display: inline-flex;">
        <a class="btn btn-sm btn-danger delete_vital" href="javascript:void(0)" data-href="<?php echo site_url('user/delete_vitals/'. $key["id"].'/'.$key["patient_id"]) ?>" <?php echo in_array("vitals-can_delete-0", $permissions)?"disabled":''; ?> >
            <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        &nbsp;
        <a class="btn btn-sm btn-info update_vital" <?php echo in_array("vitals-can_edit-0", $permissions)?"disabled":''; ?> href="javascript:void(0)" >
            <i class="fa fa-edit" aria-hidden="true"></i>
        </a>
    </td>
</tr>
<?php } 
 } ?>
<tr >
    <td class="vital_id" style="white-space: nowrap; word-break: break-all;"></td>
    <td style="white-space: nowrap; word-break: break-all;">
        <input size="16" type="text" class="vital_date_time vaital_datetime form-control bg-transparent shadow-none border-0" data-date-format="dd MM yyyy HH:ii p" value="<?php echo date('d-F-Y h:i a'); ?>" readonly style="font-size: 13px; width: 200px;">
        <input type="hidden" name="pat_id" id="patient_id" value="<?php if(isset($patient_id)){ echo $patient_id; }?>">
    </td>
    <td contenteditable="true" class="vital_bp" style="white-space: nowrap; word-break: break-all;"></td>
    <td contenteditable="true" class="vital_pulse" style="white-space: nowrap; word-break: break-all;"></td>
    <td contenteditable="true" class="vital_temp" style="white-space: nowrap; word-break: break-all;"></td>
    <td contenteditable="true" class="vital_pt" style="white-space: nowrap; word-break: break-all;"></td>
    <td contenteditable="true" class="vital_inr" style="white-space: nowrap; word-break: break-all;"></td>
    <td contenteditable="true" class="vital_rr" style="white-space: nowrap; word-break: break-all;"></td>
    <td class="">
        <select class="form-control vital_volume" style="font-size: 13px;">
            <option value="">Select</option>
            <option value="Normal Volume">Normal Volume</option>
            <option value="Low Volume">Low Volume</option>
            <option value="High Volume">High Volume</option>
            <option value="Irregularly Volume">Irregularly Volume</option>
            <option value="With pauses">With pauses</option>
        </select>
    </td>
    <td style="white-space: nowrap; word-break: break-all;">
        <input type="text" class="shadow-none border-0 vital_height" onchange="vitalBmiBsa(this)" value="0" style="width: 100px;" >
    </td>
    <td style="white-space: nowrap; word-break: break-all;">
        <input type="text" class="shadow-none border-0 vital_weight" onchange="vitalBsaBmi(this)" value="0" style="width: 100px;" >
    </td>
    <td class="vital_bmi" style="white-space: nowrap; word-break: break-all;">0</td>
    <td class="vital_bsa" style="white-space: nowrap; word-break: break-all;">0</td>
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