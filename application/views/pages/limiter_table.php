<div class="limiter_table">
	<table class="responsive table table-bordered">
		<thead>
			<th>Action</th>
			<th>Date</th>
			<th>MaxAllowd</th>
		</thead>
		<tbody>
			<?php foreach($limiter_details as $row){?>
				<tr>
					<td>
						<a class="delete-limiter btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('dashboard/limiter_delete/') . $row->limiter_id ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
					</td>
					<td><?php  echo date('d-M-Y',strtotime($row->limiter_date)); ?></td>
					<td contenteditable="true" class="exam_cate"
                    onBlur="updatelimiter(this,'limiter','<?php echo $row->limiter_id; ?>')"
                    onClick="showrow(this);" ><?php echo $row->limiter ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
    function showrow(editableObj) {
        $('td.exam_cate').css('background', '#FFF');
        $('td.exam_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function updatelimiter(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'dashboard/update_limiter' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success == true) {
                    toastr["success"](response.message);
                }
            }
        });
        $(editableObj).css("color", "#212529");
    }
</script>