<?php $i=0; foreach($files as $file){
            $filename = $file['file_name'];
            $exp = explode(".", $filename);
            $ext = end($exp);
            if ($ext == 'txt' || $ext == 'TXT') {
        ?>
	
		<object width="100%" height="97%"  type="text/plain" data="<?php echo base_url();?>assets/uploads/itemfiles/<?php echo $filename; ?>" border="1" ></object>

<?php }else{ echo  "";} }?>