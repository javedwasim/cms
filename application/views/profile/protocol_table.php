<?php if(isset($details)){
    foreach ($details as $key) {?>
        <tr class="profile_protocol_table">
        <td>
            <input type="text" name="stage_name[]" value="<?php echo $key['stage_name']; ?>" autocomplete="off">
        </td>
        <td class="ett_speed" >
            <input type="text" name="stage_speed[]" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" value="<?php echo $key['speed']; ?>" autocomplete="off" />        
        </td>
        <td  class="ett_grade" >
            <input type="text" name="stage_grade[]" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" value="<?php echo $key['grade']; ?>" autocomplete="off">        
        </td>
        <td  class="ett_stage_time" >
            <input type="text" name="stage_time[]" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" value="<?php echo date('h:i', strtotime($key['stage_time'])); ?>" autocomplete="off">
        </td>
        <td class="ett_mets" >
            <input type="text" name="stage_mets[]" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" value="<?php echo $key['mets']; ?>" autocomplete="off">
        </td>
        <td class="ett_hr" ><input type="text" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="stage_hr[]" value="<?php echo $key['hr']; ?>" autocomplete="off"></td>
        <td class="ett_sbp" ><input type="text" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="stage_sbp[]" value="<?php echo $key['sbp']; ?>" autocomplete="off"></td>
        <td class="ett_dbp" ><input type="text" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="stage_dbp[]" value="<?php echo $key['dbp']; ?>"></td>
        <td class="ett_protocol_condition" ><input type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" name="stage_condition[]" value="<?php echo $key['protocol_condition']; ?>" autocomplete="off"></td>
    </tr>
<?php        
    }
}else{ foreach($protocol_details as $key){?>    
    <tr class="profile_protocol_table">
    	<td>
            <input type="text" name="stage_name[]" value="<?php echo $key['stage_name']; ?>" autocomplete="off" />
        </td>
    	<td class="ett_speed" >
            <input type="text" name="stage_speed[]" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" value="<?php echo $key['speed_mph']; ?>" autocomplete="off" />        
        </td>
    	<td  class="ett_grade" >
            <input type="text" name="stage_grade[]" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" value="<?php echo $key['grade']; ?>" autocomplete="off" />        
        </td>
        <td  class="ett_stage_time" >
            <input type="text" name="stage_time[]" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" value="<?php echo date('h:i', strtotime($key['stage_time'])); ?>" autocomplete="off" />
        </td>
    	<td class="ett_mets" >
            <input type="text" name="stage_mets[]" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" value="<?php echo $key['mets']; ?>" autocomplete="off" />
        </td>
    	<td class="ett_hr" ><input type="text" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="stage_hr[]" value="" autocomplete="off" /></td>
    	<td class="ett_sbp" ><input type="text" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="stage_sbp[]" value="" autocomplete="off" /></td>
    	<td class="ett_dbp" ><input type="text" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" name="stage_dbp[]" value="" autocomplete="off" /></td>
    	<td class="ett_protocol_condition" ><input type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" name="stage_condition[]" value="" autocomplete="off" /></td>
    </tr>
<?php 
    }
}?>