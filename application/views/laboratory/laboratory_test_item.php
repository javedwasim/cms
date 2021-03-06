<div class="tab-pane <?php echo isset($active_tab) && ($active_tab == 'items') ? 'active' : ''; ?>"
     id="tests-items" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="lab_test_item_form" method="post" role="form"
                  data-action="<?php echo site_url('setting/add_lab_test_item') ?>"
                  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label>Item Name:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label>Units:</label>
                            <input type="text" class="form-control" name="units">
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-4 col-sm-9 col-9">
                        <div class="form-group">
                            <label>Test:</label>
                            <select class="form-control" name="lab_test_id">
                                <option value="">Select</option>
                                <?php foreach ($labtests as $test): ?>
                                    <option value="<?php echo $test['id']; ?>"
                                        <?php echo isset($selected_category)&&($selected_category==$test['id'])?'selected':'' ?>>
                                        <?php echo $test['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 p-0 col-sm-3 col-3">
                        <div class="form-group m-t-25" style="display: inline-flex;">
                            <button type= "submit" class="btn btn-sm btn-primary" id="lab_test_item_btn">Add</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="form-group ">
                        <label>Select Category:</label>
                        <select class="form-control" name="filter_test_id" onchange="filter_tests_item(this.value)">
                            <option value="0">Select</option>
                            <?php foreach ($labtests as $test): ?>
                                <option value="<?php echo $test['id']; ?>"
                                    <?php echo isset($selected_test_id)&&($selected_test_id==$test['id'])?'selected':'' ?>>
                                    <?php echo $test['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body" >
            <table class="table table-bordered responsive tbl_header_fix_history" cellspacing="0" id="lab_test_item_tbl"
                   width="100%">
                <thead>
                <tr>
                    <th style="width:100px;">Action</th>
                    <th>Item Name</th>
                    <th>Units</th>
                </tr>
                </thead>
                <tbody style="height: 50vh;">
                    <?php foreach ($items as $item): ?>
                        <tr id="<?php echo $item['id']; ?>">
                            <td style="width:95px; word-break: break-all;" data-toggle="modal" data-target="#history-modal">
                                <a class="delete-lab-test btn btn-danger btn-xs"
                                       href="javascript:void(0)" title="delete"
                                       data-href="<?php echo site_url('setting/delete_lab_test_item/') . $item['id'].'/'.$item['lab_test_id'] ?>">
                                        <i class="fa fa-trash" title="Delete"></i>
                                </a>
                                <a class="edit-lab-test-item-btn btn btn-info btn-xs"
                                       href="javascript:void(0)"
                                       data-lab-test-item-id="<?php echo $item['id']; ?>">
                                       <i class="far fa-question-circle"></i>
                                </a>
                            </td>
                            <td style="word-break: break-all; width: 42%;"class="exam_cate" >
                                <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo $item['name']; ?>" name="lab_test_item" onchange="saveTestItemDescription(this,'name','<?php echo $item['id']; ?>')">
                            </td>
                            <td style="word-break: break-all;width: 50%;"class="exam_cate">
                                <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="lab_test_unit" value="<?php echo $item['units']; ?>" onchange="saveTestItemDescription(this,'unit','<?php echo $item['id']; ?>')">        
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="lab_test_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="lab_test_item_form_modal" method="post" role="form"
              data-action="<?php echo site_url('setting/save_lab_test_item_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="lab_test_item_id" id="lab_test_item_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="lab_test_item_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="test_item_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_lab_test_item_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
  
    $("#lab_test_item_tbl tbody tr").click(function (e) {
        $('#lab_test_item_tbl tbody tr.row_selected').removeClass('row_selected');
        $(this).addClass('row_selected');
    });

    function saveTestItemDescription(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'setting/save_lab_test_item' ?>",
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
$(document).ready(function () {
    // Sortable rows
    table = $("#lab_test_item_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'lab_test_item';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_lab_test_item_tbl/"+tblname+"/"+tblid,
                type: 'post',
                data: tabledata,
                cache: false,
                success: function(response){
                   
                }
           });
        }
    });
});
</script>