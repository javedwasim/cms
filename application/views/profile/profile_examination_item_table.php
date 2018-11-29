<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th style="width:30px;">Action</th>
        <th class="table-header">Item</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr class="table-row">
                <td style="width: 30px;">
                    <a class="edit-examination-item-btn btn btn-info btn-xs"
                       href="javascript:void(0)"
                       data-examination-item-id="<?php echo $item['id']; ?>">
                        <i class="far fa-question-circle"></i></a>
                </td>
                <td class="exam_item"
                    onClick="addExaminationItem(this,'<?php echo $item['name']; ?>');">
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
                        <label id="exam_item_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="examination_item_description"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var textarray = [];
    function addExaminationItem(editableObj,text) {
        var patient_id = $('#label_patient_id').text();
        $('td.exam_item').css('background', '#FFF');
        $('td.exam_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        if(textarray.includes(text) === false){
            textarray.push(text);
            $('#examination_item').append(text+',  '); 
        } 
    }

</script>
