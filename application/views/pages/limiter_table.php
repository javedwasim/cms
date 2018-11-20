<div class="limiter_table">
	<table class="responsive table table-bordered tbl_header_fix_history" id="limiter_tbl">
		<thead>
			<th style="width: 35%">Action</th>
			<th style="width: 33%">Date</th>
			<th style="width: 31%">MaxAllowd</th>
		</thead>
		<tbody>
			<?php foreach($limiter_details as $row){?>
				<tr>
					<td style="width: 33%">
						<a class="delete-limiter btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('dashboard/limiter_delete/') . $row->limiter_id ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
					</td>
					<td style="width: 33%"><?php  echo date('d-M-Y',strtotime($row->limiter_date)); ?></td>
					<td style="width: 33%" class="exam_cate" >
                    <input type="text" value="<?php echo $row->limiter ?>" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" onchange="updatelimiter(this,'limiter','<?php echo $row->limiter_id; ?>')"
                    onClick="showrow(this);">
                    </td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
    function showrow(editableObj) {
        $("#limiter_tbl tbody tr").click(function (e) {
            $('#limiter_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function updatelimiter(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'dashboard/update_limiter' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + val + '&id=' + id,
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