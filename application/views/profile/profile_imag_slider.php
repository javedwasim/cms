<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <?php $i=0; foreach($files as $file){
            $imagename = $file['file_name'];
            $exp = explode(".", $imagename);
            $ext = end($exp);
            if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {
        ?>
            <div class="carousel-item context-menu-two <?php if($i==0){?>active<?php } ?>" data-id="<?php echo $file['id']?>">
            	<img class="d-block img-responsive" src="<?php echo base_url(); ?>/assets/uploads/itemfiles/<?php echo $imagename; ?>" alt="First slide">
            </div>
        <?php $i++; }else{ echo  "";} }?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    	<span aria-hidden="true">
    		<i class="fas fa-angle-left" style="color: #000;"></i>
    	</span>
    	<span class="sr-only">Previous</span> 
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    	<span aria-hidden="true">
    		<i class="fas fa-angle-right" style="color: #000;"></i>
    	</span>
    	<span class="sr-only">Next</span>
    </a>
</div>
