<?php foreach($protocol_details as $key){?>    
    <tr class="profile_protocol_table">
    	<td 
            name="stage_name" 
        >
            <?php echo $key['stage_name']; ?>
            <input type="hidden" name="item_id[]" value="<?php echo $item['id']; ?>">
        </td>
    	<td contenteditable="true" class="ett_speed" ><?php echo $key['speed_mph']; ?></td>
    	<td contenteditable="true" class="ett_grade" ><?php echo $key['grade']; ?></td>
        <td contenteditable="true" class="ett_stage_time" ><?php echo date('i:s', strtotime($key['stage_time'])); ?></td>
    	<td contenteditable="true" class="ett_mets" ><?php echo $key['mets']; ?></td>
    	<td contenteditable="true" class="ett_hr" >0</td>
    	<td contenteditable="true" class="ett_sbp" >0</td>
    	<td contenteditable="true" class="ett_dbp" >0</td>
    	<td contenteditable="true" class="ett_protocol_condition" ></td>
    </tr>
<?php }?>
	