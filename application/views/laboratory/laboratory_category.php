<div class="tab-pane <?php echo isset($active_tab) && ($active_tab == 'category') ? 'active' : ''; ?>"
     id="category" role="tabpanel">
    <div class="card">
        <div class="card-header" style="display: inline-flex;">
            <div class="row">
                <div class="col-md-12">
                    <label>New Category</label>
                    <input type="text" class="form-control col-md-6" name="" id="lab_category">
                    <button class="btn btn-primary add-lab-category">Add</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered nowrap responsive" cellspacing="0" id=""
                   width="100%">
                <thead>
                <tr>
                    <th style="width: 10%"></th>
                    <th>Category Name</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td style="width: 5%" data-toggle="modal" data-target="#history-modal">
                            <a class="delete-lab-category btn btn-danger btn-xs"
                               href="javascript:void(0)" title="delete"
                               data-href="<?php echo site_url('setting/delete_lab_category/') . $category['id'] ?>">
                                <i class="fa fa-trash" title="Delete"></i></a>
                            <a class="edit-lab-cat-btn btn btn-info btn-xs"
                               href="javascript:void(0)"
                               data-lab-category-id="<?php echo $category['id']; ?>"><i
                                    class="far fa-question-circle"></i></a>

                        </td>
                        <td contenteditable="true"
                            onBlur="saveToDatabase(this,'cate_name','<?php echo $category['id']; ?>')"
                            onClick="showEdit(this);">
                            <?php echo $category['name']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
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
<script>
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
</script>