<?php if(isset($files)){?>
    <?php $i=0; foreach($files as $file){
        $imagename = $file['file_name'];
        $exp = explode(".", $imagename);
        $ext = end($exp);
        if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {
    ?>  
    <div style="width: 100%">
            <img  src="<?php echo base_url(); ?>/assets/uploads/itemfiles/<?php echo $imagename; ?>"
            width="80%" height="98%" style="display: block; margin: 0 auto;" alt="Image">
    </div>
    <?php $i++; }else{ echo  "";} }?>
 <?php } ?>