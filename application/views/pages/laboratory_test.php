<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Patient's Examination Settings
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link <?php echo isset($active_tab) && ($active_tab == 'category') ? 'active' : ''; ?>"
                               data-toggle="tab" href="#category" role="tab">
                                <span class="hidden-sm-up"><i class="ti-home"></i></span>
                                <span class="hidden-xs-down">Category</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo isset($active_tab) && ($active_tab == 'tests') ? 'active' : ''; ?>"
                               data-toggle="tab" href="#tests" role="tab">
                                <span class="hidden-sm-up"><i class="ti-user"></i></span>
                                <span class="hidden-xs-down">Tests</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo isset($active_tab) && ($active_tab == 'items') ? 'active' : ''; ?>"
                               data-toggle="tab" href="#tests-items" role="tab">
                                <span class="hidden-sm-up"><i class="ti-user"></i></span>
                                <span class="hidden-xs-down">Test Items</span></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <?php $this->load->view('laboratory/laboratory_category'); ?>
                        <?php $this->load->view('laboratory/laboratory_test'); ?>
                        <?php $this->load->view('laboratory/laboratory_test_item'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div id="lab_category_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <form id="lab_category_form" method="post" role="form"
                  data-action="<?php echo site_url('setting/save_lab_category_description') ?>"
                  enctype="multipart/form-data">
                <input type="hidden" name="lab_category_id" id="lab_category_id">
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
                        <button type="submit" class="btn btn-danger waves-effect waves-light"
                                id="save_lab_category_description">Update
                        </button>
                    </div>
                </div>
            </form>
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
                            <label>Risk Factor and Cardiac Problems</label>
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
        $(document).ready(function () {
            $('.datatables').DataTable();
        });
        function showEdit(editableObj) {
            $(editableObj).css("background", "#FFF");
        }
        function saveToDatabase(editableObj, column, id) {
            $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
            $.ajax({
                url: "<?php echo base_url() . 'setting/save_lab_category' ?>",
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

        function saveTestDescription(editableObj, column, id) {
            $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
            $.ajax({
                url: "<?php echo base_url() . 'setting/save_lab_test' ?>",
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