<?php foreach($color_doppler as $dop){?>
	<li class="list-group-item">
		<?php echo $dop['mr']; ?>
		<input type="hidden" name="doopler_mr" value="<?php echo $dop['mr']; ?>">
	</li>
	<li class="list-group-item">
		<?php echo $dop['ar']; ?>
		<input type="hidden" name="doopler_ar" value="<?php echo $dop['ar']; ?>">
	</li>
	<li class="list-group-item">
		<?php echo $dop['pr']; ?>
		<input type="hidden" name="doopler_pr" value="<?php echo $dop['pr']; ?>">
	</li>
	<li class="list-group-item">
		<?php echo $dop['tr']; ?>
		<input type="hidden" name="doopler_tr" value="<?php echo $dop['tr']; ?>">
	</li>
<?php }?>