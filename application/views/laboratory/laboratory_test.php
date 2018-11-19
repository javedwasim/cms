<div class="tab-pane <?php echo isset($active_tab) && ($active_tab == 'tests') ? 'active' : ''; ?>"
     id="tests" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <form id="lab_test_form" method="post" role="form"
                  data-action="<?php echo site_url('setting/add_lab_test') ?>"
                  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label>Test Name:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-4">
                        <div class="form-group">
                            <label>Category:</label>
                            <select class="form-control" name="lab_category_id">
                                <option value="">Select</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 p-0">
                        <div class="form-group m-t-25" style="display: inline-flex;">
                            <button type= "submit" class="btn btn-sm btn-primary" id="lab_test_item">Add</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="form-group ">
                        <label>Select Category:</label>
                        <select class="form-control " name="filter_category_id" onchange="filter_tests(this.value)">
                            <option value="0">Select</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>"
                                    <?php echo isset($selected_category)&&($selected_category==$category['id'])?'selected':'' ?>>
                                    <?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body" >
            <table class="table table-bordered nowrap responsive tbl_header_fix_history" cellspacing="0" id="lab_test_tbl"
                   width="100%">
                <thead>
                <tr>
                    <th style="width:100px">Action</th>
                    <th>Item Name</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tests as $test): ?>
                    <tr id="<?php echo $test['id']; ?>">
                        <td style="width:95px; word-break: break-all;" data-toggle="modal" data-target="#history-modal">
                            <a class="delete-lab-test btn btn-danger btn-xs"
                               href="javascript:void(0)" title="delete"
                               data-href="<?php echo site_url('setting/delete_lab_test/').$test['id'].'/'.$test['lab_category_id'] ?>">
                                <i class="fa fa-trash" title="Delete"></i>
                            </a>
                            <a class="edit-lab-test-btn btn btn-info btn-xs"
                               href="javascript:void(0)"
                               data-lab-test-id="<?php echo $test['id']; ?>"><i
                               class="far fa-question-circle"></i>
                            </a>
                        </td>
                        <td style="word-break: break-all;"class="exam_cate">
                            <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="lab-cat" value="<?php echo $test['name']; ?>" onchange="saveTestDescription(this,'test_name','<?php echo $test['id']; ?>')">        
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="lab_test_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="lab_test_form_modal" method="post" role="form"
              data-action="<?php echo site_url('setting/save_lab_test_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="lab_test_id" id="lab_test_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="lab_test_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="test_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_lab_test_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
  
    $("#lab_test_tbl tbody tr").click(function (e) {
        $('#lab_test_tbl tbody tr.row_selected').removeClass('row_selected');
        $(this).addClass('row_selected');
    });

    function saveTestDescription(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'setting/save_lab_test' ?>",
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
    table = $("#lab_test_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'lab_test';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_lab_test_tbl/"+tblname+"/"+tblid,
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