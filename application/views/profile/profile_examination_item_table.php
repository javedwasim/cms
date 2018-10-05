<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Item</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr class="table-row">
                <td contenteditable="true" class="exam_item"
                    onClick="showEdit(this,'<?php echo $item['id']; ?>');">
                    <a class="edit-examination-item-btn btn btn-info btn-xs"
                       href="javascript:void(0)"
                       data-examination-item-id="<?php echo $item['id']; ?>">
                        <i class="far fa-question-circle"></i></a>
                    <?php echo $item['name']; ?>
                </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="examination_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="examination_item_form_modal" method="post" role="form"
              data-action="<?php echo site_url('examination/save_examination_item_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="examination_item_id" id="examination_item_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Risk Factor and Cardiac Problems</label>
                        <textarea class="form-control" rows="3" name="description" id="examination_item_description"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>