
<div class="card">
	<div class="card-header" >
		<div class="row">
			<div class="col-md-12" style="display: inline-flex;">
				<label class="m-r-10 m-t-5">Protocol</label>
				<select class="form-control col-md-4" onchange="filter_protocol_details(this.value)">
						<option>Select</option>
                        <?php foreach($protocols as $key){?>
                            <option value="<?php echo $key['id']; ?>"><?php echo $key['protocol']; ?></option>
                        <?php }?>
				</select>
			</div>
		</div>
	</div>
	<div class="card-body protocol_container">
    </div>
</div>
<script type="text/javascript">
    function filter_protocol_details(protocol_id){
        $.ajax({
            url: window.location.origin+window.location.pathname+'ETT/get_protocol_details/'+protocol_id,
            type: 'get',
            cache: false,
            success: function(response) {
                $('.protocol_container').empty();
                $('.protocol_container').append(response.result_html);
            }
        });
        return false;
    }
</script>