<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card card-top-margin">
            	<div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form id="research_category_form">
                        		<div class="row">
                                    <div class="col-md-8 col-sm-9 col-9">
                                        <div class="form-group">
                                            <label>Research Name</label>
                                            <input type="text" class="form-control" name="name" id="research_name" required maxlength="50">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-lg-1 m-t-25 col-sm-3 col-3">
                                        <button class="btn btn-primary btn-sm add-research">Add</button>
                                    </div>
                				</div>
                            </form>
                        </div>
                        <div class="col-md-2 m-t-25 col-sm-3 col-3">
                            <button class="btn btn-danger btn-sm" id="delete_all_research">Delete All</button>
                        </div>
                    </div>
            	</div>
                <div class="card-body" id="advice_item_table_container">
                    <table class="table table-bordered nowrap responsive tbl-qa tbl_header_fix" id="research_tbl" cellspacing="0" width="100%" >
                       <thead>
                            <tr>
                                <th style="width: 100px;">Action</th>
                                <th>Research Name</th>
                            </tr>
                        </thead>
                        <tbody style="height: 70vh;">
                            <?php foreach ($researches as $research): ?>
                                <tr>
                                    <td style="width:100px;" data-toggle="modal" data-target="#history-modal">
                                        <a class="delete-research btn btn-danger btn-xs"
                                           href="javascript:void(0)" title="delete"
                                           data-href="<?php echo site_url('setting/delete_research/') . $research['id'] ?>">
                                           <i class="fa fa-trash" title="Delete"></i></a>
                                        <a class="edit-research-btn btn btn-info btn-xs" href="javascript:void(0)"
                                           data-research-id="<?php echo $research['id']; ?>"><i class="far fa-question-circle"></i></a>

                                    </td>
                                    <td class="research_cate" onClick="showEdit(this);">
                                        <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo $research['name']; ?>" onchange="saveToDatabase(this,'research_name','<?php echo $research['id']; ?>')">        
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
      <div id="research_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <form id="research_form" method="post" role="form"
                  data-action="<?php echo site_url('setting/save_research_description') ?>"
                  enctype="multipart/form-data">
                <input type="hidden" name="research_id" id="research_id" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Description</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label id="research_description_name"></label>
                            <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light" id="save_research_description">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function showEdit(editableObj) {
        $("#research_tbl tbody tr").click(function (e) {
            $('#research_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function saveToDatabase(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'setting/save_research' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + val + '&id=' + id,
            success: function (response) {
                if (response.success) {
                    toastr["success"](response.message);
                }else{
                    document.execCommand('undo');
                    toastr["error"](response.message);
                }
            }
        });
    }
</script>