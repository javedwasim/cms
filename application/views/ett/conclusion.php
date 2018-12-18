<script type="text/javascript">
$(document.body).on('click','#import_ett_conclusion_btn', function(e){
    event.preventDefault();
    var itemfile = new FormData($('#import_csv_ett_conclusion')[0]);
    $.confirm({
        title: 'Confirm!',
        content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
        buttons: {
            Yes: function () {
                $.ajax({
                  url:"<?php echo base_url(); ?>setting/import_ett_conclusions/",
                  method:"POST",
                  data: itemfile,
                  contentType:false,
                  cache:false,
                  processData:false,
                  success:function(response){
                    $('.conclusion_table_content').empty();
                    $('.conclusion_table_content').append(response.ett_conclusions_table);
                    document.getElementById("ett_conclusion_csv_file").value = "";
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
                url:"<?php echo base_url(); ?>setting/import_ett_conclusions/",
                method:"POST",
                data: itemfile,
                contentType:false,
                cache:false,
                processData:false,
                success:function(response){
                    $('.conclusion_table_content').empty();
                    $('.conclusion_table_content').append(response.ett_conclusions_table);
                    document.getElementById("ett_conclusion_csv_file").value = "";
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
<div class="tab-pane" id="ett4" role="tabpanel">
	<div class="card">
		<div class="card-header">
			<div class="row">
        <div class="col-md-3">
            <form id="ett_conclusion_form">
                <label>New Conclusion</label>
		            <input type="text" class="form-control" name="ett_conclusion" id="ett_conclusion" required="required">
            </form>
        </div>
        <div class="col-md-1 p-l-0" style="margin-top: 25px;">
            <button class="btn btn-sm btn-primary" id="add_conclusion">Add</button>
        </div>
        <div class="col-md-1 p-l-0" style="margin-top: 25px;">
            <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>setting/export_ett_conclusions">Export</a>
        </div>
        <div class="col-md-5">
            <form id="import_csv_ett_conclusion" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                      <div class="form-group m-t-30">
                        <input type="file" name="csv_file" id="ett_conclusion_csv_file" required />
                      </div>
                    </div>
                    <div  class="col-md-4">
                      <div class="form-group m-t-25">
                          <input type="submit" name="import_csv" class="btn btn-sm btn-primary" id="import_ett_conclusion_btn" value="Add Multiple">
                      </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2 m-t-25">
            <button class="btn btn-danger btn-sm" id="delete_all_conclusions">Delete All</button>
        </div> 
      </div>
		</div>
		<div class="card-body conclusion_table_content">
			<?php $this->load->view('ett/conclusion_table'); ?>
		</div>
	</div>
</div>