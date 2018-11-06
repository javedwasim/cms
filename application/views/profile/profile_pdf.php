<?php foreach($files as $file){
	$filename = $file['file_name'];
    $exp = explode(".", $filename);
    $ext = end($exp);
    if ($ext == 'pdf' || $ext == 'PDF') {
?>
	<div style="position: relative;">
		<object width="100%" height="300px" type="application/pdf" trusted="yes" application="yes" title="Assembly" data="<?php echo base_url(); ?>assets/uploads/itemfiles/<?php echo $filename; ?>?#zoom=60&scrollbar=1&toolbar=1&navpanes=1"></object>
		<div class="context-menu-three" style="position:absolute;top:62px;left:12px;bottom:6px;right:30px;color: transparent;"><?php echo $file['id']; ?></div>
	</div>
<?php }
}?>