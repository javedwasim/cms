<script type="text/javascript">
$(document.body).on('click','#import_ending_reason_btn', function(e){
        event.preventDefault();
        var itemfile = new FormData($('#import_csv_ending_reason')[0]);
        $.confirm({
            title: 'Confirm!',
            content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
            buttons: {
                Yes: function () {
                    $.ajax({
                      url:"<?php echo base_url(); ?>setting/import_ending_reasons/",
                      method:"POST",
                      data: itemfile,
                      contentType:false,
                      cache:false,
                      processData:false,
                      success:function(response){
                        $('.ending_reason_table').empty();
                        $('.ending_reason_table').append(response.ending_reasons_table);
                        document.getElementById("ending_reason_csv_file").value = "";
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
                    url:"<?php echo base_url(); ?>setting/import_ending_reasons/",
                    method:"POST",
                    data: itemfile,
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(response){
                    	$('.ending_reason_table').empty();
                    	$('.ending_reason_table').append(response.ending_reasons_table);
                     	document.getElementById("ending_reason_csv_file").value = "";
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
<div class="tab-pane" id="ett2" role="tabpanel">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6 col-lg-4">
					<form id="ending_reason_form">
						<label>New Reason</label>
						<input type="text" class="form-control" name="ending_reason" id="ending_reason" required="required">
					</form>
				</div>
				<div class="col-md-1 p-l-0" style="margin-top: 25px;">
                    <button class="btn btn-sm btn-primary" id="add_ending_reason">Add</button>
				</div>
				<div class="col-md-2 p-l-0" style="margin-top: 25px;">
                    <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>setting/export_ending_reasons" >Export</a>
                </div>
                <div class="col-md-5">
                    <form id="import_csv_ending_reason" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                              <div class="form-group m-t-30">
                                <input type="file" name="csv_file" id="ending_reason_csv_file" required />
                              </div>
                            </div>
                            <div  class="col-md-4">
                              <div class="form-group m-t-25">
                                  <input type="submit" name="import_csv" class="btn btn-sm btn-primary" id="import_ending_reason_btn" value="Add Multiple">
                              </div>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>
		<div class="card-body ending_reason_table">
			<?php $this->load->view('ett/ending_reason_table'); ?>
		</div>
	</div>
</div>