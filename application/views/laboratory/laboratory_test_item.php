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
                    <div class=" col-lg-3 col-md-4">
                        <div class="form-group">
                            <label>Test:</label>
                            <select class="form-control" name="lab_test_id">
                                <option>Select</option>
                                <?php foreach ($tests as $test): ?>
                                    <option value="<?php echo $test['id']; ?>"
                                        <?php echo isset($selected_category)&&($selected_category==$test['id'])?'selected':'' ?>>
                                        <?php echo $test['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 p-0">
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
                            <option value="">Select</option>
                            <?php foreach ($tests as $test): ?>
                                <option value="<?php echo $test['id']; ?>"
                                    <?php echo isset($selected_test_id)&&($selected_test_id==$test['id'])?'selected':'' ?>>
                                    <?php echo $test['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered nowrap responsive datatables" cellspacing="0" id=""
                   width="100%">
                <thead>
                <tr>
                    <th style="width: 10%"></th>
                    <th>Item Name</th>
                    <th>Units</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td style="width: 5%" data-toggle="modal" data-target="#history-modal">
                                <a class="delete-lab-test btn btn-danger btn-xs"
                                   href="javascript:void(0)" title="delete"
                                   data-href="<?php echo site_url('setting/delete_lab_test_item/') . $item['id'] ?>">
                                    <i class="fa fa-trash" title="Delete"></i></a>
                                <a class="edit-lab-test-item-btn btn btn-info btn-xs"
                                   href="javascript:void(0)"
                                   data-lab-test-item-id="<?php echo $item['id']; ?>"><i
                                            class="far fa-question-circle"></i></a>

                            </td>
                            <td contenteditable="true"
                                onBlur="saveTestItemDescription(this,'name','<?php echo $item['id']; ?>')"
                                onClick="showEdit(this);">
                                <?php echo $item['name']; ?></td>
                            <td contenteditable="true"
                                onBlur="saveTestItemDescription(this,'unit','<?php echo $item['id']; ?>')"
                                onClick="showEdit(this);">
                                <?php echo $item['units']; ?></td>
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
                        <label>Risk Factor and Cardiac Problems</label>
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
    function showEdit(editableObj) {
        $(editableObj).css("background", "#FFF");
    }
    function saveTestItemDescription(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $.ajax({
            url: "<?php echo base_url() . 'setting/save_lab_test_item' ?>",
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