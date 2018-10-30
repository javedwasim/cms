<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']);  $loggedin_user = $this->session->userdata('userdata');}?>
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
                            <?php if($loggedin_user['is_admin']==1){ ?>
                                <button type= "submit" class="btn btn-sm btn-primary" id="lab_test_item">Add</button>
                            <?php } elseif(in_array("lab_tests-can_add-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                                <button type= "submit" class="btn btn-sm btn-primary" id="lab_test_item">Add</button>
                            <?php } else{ ?>
                                <button type= "button" class="btn btn-sm btn-primary"  style="opacity: 0.5;" onclick="showError()">Add</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="form-group ">
                        <label>Select Category:</label>
                        <select class="form-control " name="filter_category_id" onchange="filter_tests(this.value)">
                            <option value="">Select</option>
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
        <div class="card-body">
            <table class="table table-bordered nowrap responsive" cellspacing="0" id=""
                   width="100%">
                <thead>
                <tr>
                    <th style="width:95px"></th>
                    <th>Item Name</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tests as $test): ?>
                    <tr>
                        <td style="width:95px; word-break: break-all;" data-toggle="modal" data-target="#history-modal">
                            <?php if(($loggedin_user['is_admin']==1) || (in_array("lab_tests-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0))) { ?>
                                <a class="delete-lab-test btn btn-danger btn-xs"
                                   href="javascript:void(0)" title="delete"
                                   data-href="<?php echo site_url('setting/delete_lab_test/') . $test['id'] ?>">
                                    <i class="fa fa-trash" title="Delete"></i></a>
                                <a class="edit-lab-test-btn btn btn-info btn-xs"
                                   href="javascript:void(0)"
                                   data-lab-test-id="<?php echo $test['id']; ?>"><i
                                   class="far fa-question-circle"></i></a>
                            <?php } else{ ?>
                                <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                                    <i class="fa fa-trash" title="Delete"></i></a>
                                <a class="btn btn-info btn-xs" style="opacity: 0.5;" onclick="showError()">
                                    <i class="far fa-question-circle" title="Delete"></i></a>
                            <?php } ?>
                        </td>
                        <?php if(($loggedin_user['is_admin']==1) || (in_array("lab_tests-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0))){ ?>
                            <td contenteditable="true" style="word-break: break-all;"class="exam_cate"
                                onBlur="saveTestDescription(this,'test_name','<?php echo $test['id']; ?>')"
                                onClick="showEdit(this);">
                                <?php echo $test['name']; ?></td>
                        <?php } else{ ?>
                            <td onClick="showError(this);">
                                <?php echo $test['name']; ?></td>
                        <?php } ?>
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
    function showEdit(editableObj) {
        $('td.exam_cate').css('background', '#FFF');
        $('td.exam_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function saveTestDescription(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'setting/save_lab_test' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                }
            }
        });
        $(editableObj).css("color", "#212529");
    }
</script>