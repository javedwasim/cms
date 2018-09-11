<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
            	<div class="card-header">
            		<div class="row">
    					<div class="col-md-6">
	    					<label>Research Name</label>
	    					<input type="text" class="form-control col-md-6" name="name" id="research_name" >
                            <button class="btn btn-primary add-research">Add</button>
    					</div>
    				</div>
            	</div>
                <div class="card-body" id="advice_item_table_container">
                    <table class="table table-bordered nowrap responsive tbl-qa datatables" cellspacing="0" width="100%" >
                       <thead>
                            <tr>
                                <th style="width: 10%"></th>
                                <th>Research Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($researches as $research): ?>
                                <tr>
                                    <td style="width: 5%" data-toggle="modal" data-target="#history-modal">
                                        <a class="delete-research btn btn-danger btn-xs"
                                           href="javascript:void(0)" title="delete"
                                           data-href="<?php echo site_url('setting/delete_research/') . $research['id'] ?>">
                                           <i class="fa fa-trash" title="Delete"></i></a>
                                        <a class="edit-research-btn btn btn-info btn-xs" href="javascript:void(0)"
                                           data-research-id="<?php echo $research['id']; ?>"><i class="far fa-question-circle"></i></a>

                                    </td>
                                    <td contenteditable="true"
                                        onBlur="saveToDatabase(this,'research_name','<?php echo $research['id']; ?>')"
                                        onClick="showEdit(this);">
                                        <?php echo $research['name']; ?></td>
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
                            <label>Risk Factor and Cardiac Problems</label>
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
    <style>
        body {
            width: 100%;
        }

        .current-row {
            background-color: #B24926;
            color: #FFF;
        }

        .current-col {
            background-color: #1b1b1b;
            color: #FFF;
        }

        .tbl-qa {
            width: 100%;
            font-size: 0.9em;
            background-color: #FFFFFF;
        }

        .tbl-qa th.table-header {
            padding: 5px;
            text-align: left;
            padding: 10px;
        }

        .tbl-qa .table-row td {
            padding: 10px;
            background-color: #FDFDFD;
        }
    </style>
</div>



<script>
    $(document).ready(function () {
        $('.datatables').DataTable();
    });
    function showEdit(editableObj) {
        $(editableObj).css("background", "#FFF");
    }
    function saveToDatabase(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $.ajax({
            url: "<?php echo base_url() . 'setting/save_research' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["success"](response.message);
                }
            }
        });
    }
</script>