<?php if(isset($files)){?>
<div class="carousel-inner" role="listbox">
    <?php $i=0; foreach($files as $file){
        $imagename = $file['file_name'];
        $exp = explode(".", $imagename);
        $ext = end($exp);
        if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {
    ?>  <div style="text-align: center; font-weight: bold;"><?php echo date('d-M-Y',strtotime($file['created_at']))?></div>
        <div class=" context-menu-two <?php if($i==0){?>active<?php } ?>" data-id="<?php echo $file['id']?>">
        	<img class="d-block img-responsive" src="<?php echo base_url(); ?>/assets/uploads/itemfiles/<?php echo $imagename; ?>" alt="First slide">
        </div>
    <?php $i++; }else{ echo  "";} }?>
</div>
 <?php } ?>
<?php
    if(isset($files)){ 
    foreach($files as $file){
    $filename = $file['file_name'];
    $exp = explode(".", $filename);
    $ext = end($exp);
    if ($ext == 'pdf' || $ext == 'PDF') {
?>
    <div style="text-align: center; font-weight: bold;"><?php echo date('d-M-Y',strtotime($file['created_at']))?></div>
    <div style="position: relative;">
        <object width="100%" height="300px" type="application/pdf" trusted="yes" application="yes" title="Assembly" data="<?php echo base_url(); ?>assets/uploads/itemfiles/<?php echo $filename; ?>?#zoom=60&scrollbar=1&toolbar=1&navpanes=1"></object>
        <div class="context-menu-three" style="position:absolute;top:62px;left:12px;bottom:6px;right:30px;color: transparent;"><?php echo $file['id']; ?></div>
    </div>
<?php }
    }
}
?>
<?php $i=0; 
if(isset($files)){ 
    foreach($files as $file){
        $filename = $file['file_name'];
        $exp = explode(".", $filename);
        $ext = end($exp);
        if ($ext == 'txt' || $ext == 'TXT') {
?>
    <div style="text-align: center; font-weight: bold;"><?php echo date('d-M-Y',strtotime($file['created_at']))?></div>
    <div style="position: relative;">
        <object width="100%" height="100%"  type="text/plain" data="<?php echo base_url();?>assets/uploads/itemfiles/<?php echo $filename; ?>" border="1" ></object>
        <div class="context-menu-one" style="position:absolute;top:62px;left:12px;bottom:6px;right:30px;color: transparent;"><?php echo $file['id']; ?></div>   
    </div>
<?php }else{ echo  "";} } }?>
