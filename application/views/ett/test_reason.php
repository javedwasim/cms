 <script type="text/javascript">
$(document.body).on('click','#import_test_reason_btn', function(e){
        event.preventDefault();
        var itemfile = new FormData($('#import_csv_test_reason')[0]);
        $.confirm({
            title: 'Confirm!',
            content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
            buttons: {
                Yes: function () {
                    $.ajax({
                      url:"<?php echo base_url(); ?>setting/import_test_reasons/",
                      method:"POST",
                      data: itemfile,
                      contentType:false,
                      cache:false,
                      processData:false,
                      success:function(response){
                        $('.ins_category_container').empty();
                        $('.ins_category_container').append(response.test_reasons_table);
                        document.getElementById("test_reason_csv_file").value = "";
                        if (response.success==true) {
                          toastr["success"](response.message);
                        }else{
                          toastr["error"](response.message);
                        }
                    }
                  });
                },
                No: function (){
                  $.ajax({
                    url:"<?php echo base_url(); ?>setting/import_test_reasons/",
                    method:"POST",
                    data: itemfile,
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(response){
                    	$('.ins_category_container').empty();
                    	$('.ins_category_container').append(response.test_reasons_table);
                     	document.getElementById("test_reason_csv_file").value = "";
	                    if (response.success==true) {
	                        toastr["success"](response.message);
	                    }else{
	                        toastr["error"](response.message);
	                    }
                  	}
                });
              }
            }
        });
    });
</script>
<div class="tab-pane active" id="ett1" role="tabpanel">
    <div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6 col-lg-3  col-sm-9 col-9">
					<form id="test_reason_form">
						<label>New Reason</label>
						<input type="text" class="form-control" name="ett_test_reason" id="ett_test_reason" required="required">
					</form>
				</div>
				<div class="col-md-1 p-l-0  col-sm-3 col-3" style="margin-top: 25px;">
          <button class="btn btn-primary btn-sm" id="add_ett_test_reason">Add</button>
				</div>
				<div class="col-md-1 p-l-0" style="margin-top: 25px;">
          <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>setting/export_test_reasons">Export</a>
        </div>
        <div class="col-md-5">
            <form id="import_csv_test_reason" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                      <div class="form-group m-t-30">
                        <input type="file" name="csv_file" id="test_reason_csv_file" required />
                      </div>
                    </div>
                    <div  class="col-md-4">
                      <div class="form-group m-t-25">
                          <input type="submit" name="import_csv" class="btn btn-sm btn-primary" id="import_test_reason_btn" value="Add Multiple">
                      </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2 m-t-25">
          <button class="btn btn-danger btn-sm" id="delete_all_test_reason">Delete All</button>
        </div>
			</div>
		</div>
		<div class="card-body ins_category_container">
			<?php $this->load->view('ett/test_reason_table'); ?>
		</div>
	</div>
</div>