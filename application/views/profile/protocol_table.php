<?php foreach($protocol_details as $key){?>    
    <tr class="profile_protocol_table">
    	<td>
            <input type="text" name="stage_name[]" value="<?php echo $key['stage_name']; ?>">
        </td>
    	<td class="ett_speed" >
            <input type="text" name="stage_speed[]" value="<?php echo $key['speed_mph']; ?>" />        
        </td>
    	<td  class="ett_grade" >
            <input type="text" name="stage_grade[]" value="<?php echo $key['grade']; ?>">        
        </td>
        <td  class="ett_stage_time" >
            <input type="text" name="stage_time[]" value="<?php echo date('h:i', strtotime($key['stage_time'])); ?>">
        </td>
    	<td class="ett_mets" >
            <input type="text" name="stage_mets[]" value="<?php echo $key['mets']; ?>">
        </td>
    	<td class="ett_hr" ><input type="text" name="stage_hr[]" value=""></td>
    	<td class="ett_sbp" ><input type="text" name="stage_sbp[]" value=""></td>
    	<td class="ett_dbp" ><input type="text" name="stage_dbp[]" value=""></td>
    	<td class="ett_protocol_condition" ><input type="text" name="stage_condition[]" value=""></td>
    </tr>
<?php }?>
	