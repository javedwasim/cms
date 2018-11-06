<?php $i=0; foreach($files as $file){
            $filename = $file['file_name'];
            $exp = explode(".", $filename);
            $ext = end($exp);
            if ($ext == 'txt' || $ext == 'TXT') {
        ?>
	<div style="position: relative;">
		<object width="100%" height="100%"  type="text/plain" data="<?php echo base_url();?>assets/uploads/itemfiles/<?php echo $filename; ?>" border="1" ></object>
		<div class="context-menu-one" style="position:absolute;top:62px;left:12px;bottom:6px;right:30px;color: transparent;"><?php echo $file['id']; ?></div>	
	</div>
<?php }else{ echo  "";} }?>