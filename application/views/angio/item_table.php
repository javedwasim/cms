<table class="table table-bordered nowrap responsive item_table tbl_header_fix_350" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" >Action</th>
        <th class="table-header">Item Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr class="table-row">
            <td>
                <a class="delete-investigation-item btn btn-danger btn-xs"
                   href="javascript:void(0)" title="delete"
                   data-href="<?php echo site_url('investigation/delete_investigation_item/') . $item['id'] ?>">
                    <i class="fa fa-trash" title="Delete"></i></a>
                <a class="edit-investigation-item-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-investigation-item-id="<?php echo $item['id']; ?>">
                   <i class="far fa-question-circle"></i></a>
            </td>
            <td contenteditable="true"
                onBlur="saveToDatabase(this,'item_name','<?php echo $item['id']; ?>')"
                onClick="showEdit(this);">
                <?php echo $item['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="investigation_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="investigation_item_form_modal" method="post" role="form"
              data-action="<?php echo site_url('investigation/save_investigation_item_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="investigation_item_id" id="investigation_item_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Risk Factor and Cardiac Problems</label>
                        <textarea class="form-control" rows="3" name="description" id="investigation_item_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"
                            id="save_investigation_item_description">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.item_table').DataTable({
            "info": true,
            "paging": false,
            "searching": false,
            "sort": false,
            autoWidth: false, //step 1
            columnDefs: [
                { width: '10%', targets: 0 }, //step 2, column 1 out of 4
            ]
        });


    });
</script>

<script>
    function showEdit(editableObj) {
        $(editableObj).css("background", "#FFF");
    }
    function saveToDatabase(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $.ajax({
            url: "<?php echo base_url() . 'investigation/save_investigation_item' ?>",
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