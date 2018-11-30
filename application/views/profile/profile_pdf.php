<?php foreach($files as $file){
	$filename = $file['file_name'];
    $exp = explode(".", $filename);
    $ext = end($exp);
    if ($ext == 'pdf' || $ext == 'PDF') {
?>
	<object width="100%" height="98%" type="application/pdf" trusted="yes" application="yes" title="Assembly" data="<?php echo base_url(); ?>assets/uploads/itemfiles/<?php echo $filename; ?>?#zoom=60&scrollbar=1&toolbar=1&navpanes=1"></object>
<?php }
}?>