<table class="table table-bordered nowrap responsive item_table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width:100px;" >Action</th>
        <th class="table-header">Items</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr class="table-row">
            <td style="width: 5%;">
                <a class="edit-history-item-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-history-item-id="<?php echo $item['id']; ?>">
                    <i class="far fa-question-circle"></i></a>
            </td>
            <td class="history_item"
                onClick="addHistoryItem(this,'<?php echo $item['name']; ?>');">
                <?php echo $item['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="history_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="history_item_form_modal" method="post" role="form"
              data-action="<?php echo site_url('Profile_history/save_history_item_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="history_item_id" id="history_item_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label id="history_item_name"></label>
                        <textarea class="form-control" rows="3" name="description" id="history_item_description"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var textarray = [];
    function addHistoryItem(editableObj,text) {
        var patient_id = $('#label_patient_id').text();
        $('td.history_item').css('background', '#FFF');
        $('td.history_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        var val = $('#history_item').val();
        if(textarray.length>0 && val == ''){
            textarray.length = 0;
        }
        if(textarray.includes(text) === false){
            textarray.push(text);
            setTimeout(function(){
                var hisVal = $('#history_item').val();
                var setHisVal = hisVal+text+', ';
                $('#history_item').val(setHisVal.replace(/^,|,$/g,''));
            },500);
        }
        
    }

</script>