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
            var newrow = '<tr><td><input class="form-control bg-transparent border-0 shadow-none history_item_val" id="history_item" readonly="true" type="text" name="history_item[]" value="'+text+'" ></td></tr>';
            $('#history_tb_body').append(newrow);
        }

        $(document).ready(function(){
            $( ".history_item_val" ).dblclick(function() {
                $(this).removeAttr('readonly');
            });
            $( ".history_item_val" ).on( "focusout", function(){
                $('.history_item_val').attr('readonly', true);
            } );
            $("#pat_history_tbl tbody tr").click(function (e) {
                $('#pat_history_tbl tbody tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
            });
            var input = $('.history_item_val');
            var coderun = false;
            input.on('keydown', function() {
                var item = $(this).val();
                var key = event.keyCode || event.charCode;
                var tr = $(this).closest('tr');
                if (key == 46 || key == 8) {
                    if (coderun != true) {
                        textarray.splice($.inArray(item, textarray), 1);
                        coderun = true;
                    }

                }
                if(key == 46 ){
                    tr.remove();
                }
          });
        });
        
    }

</script>