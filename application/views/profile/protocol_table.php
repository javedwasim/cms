<?php foreach($protocol_details as $key){?>    
    <tr class="profile_protocol_table">
    	<td><?php echo $key['stage_name']; ?></td>
    	<td contenteditable="true" ><?php echo $key['speed_mph']; ?></td>
    	<td contenteditable="true" ><?php echo $key['grade']; ?></td>
        <td contenteditable="true" ><?php echo $key['stage_time']; ?></td>
    	<td contenteditable="true" ><?php echo $key['mets']; ?></td>
    	<td contenteditable="true" >0</td>
    	<td contenteditable="true" >0</td>
    	<td contenteditable="true" >0</td>
    	<td contenteditable="true" ></td>
    </tr>
<?php }?>
	