<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 5%;"></th>
        <th class="table-header">Item</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr class="table-row">
            <td>
                <a class="edit-investigation-item-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-investigation-item-id="<?php echo $item['id']; ?>">
                    <i class="far fa-question-circle"></i></a>
            </td>
            <td contenteditable="true" class="investigation_item"
                onClick="addInvestigationItem(this,'<?php echo $item['name']; ?>');">
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

            </div>
        </form>
    </div>
</div>
<script>
    var rowarray = [];
    function addInvestigationItem(editableObj,text) {
        $('td.investigation_item').css('background', '#FFF');
        $('td.investigation_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        if(rowarray.includes(text) === false){
            rowarray.push(text);
            $('#investigation_item').append(text+','); 
        } 
        
    }

</script>