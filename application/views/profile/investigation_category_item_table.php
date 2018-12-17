<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" style="width: 5%;">Action</th>
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
            <td class="investigation_item"
                onClick="addInvestigationItem(this,'<?php echo $item['name']; ?>','<?php echo $name;  ?>');">
                <?php echo $item['name']; ?>     
            </td>
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
                        <label id="investigation_item_name"></label>
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
    var rowarray = [];
    function addInvestigationItem(editableObj,text,name) {
        $('td.investigation_item').css('background', '#FFF');
        $('td.investigation_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        if(name == 'Echo'){
            if(rowarray.length === 0){
                var date = 'Echo[<?php echo date("d-M-Y")?>]:';
            }else{
                var date = '\n'+'Echo[<?php echo date("d-M-Y")?>]:';
            }
            var echo = date.replace(/\n|\r/g, '');
            if(rowarray.includes(echo) === false){
                rowarray.push(echo);
               var newrow = '<tr><td><input class="form-control bg-transparent border-0 shadow-none investi_item_val" readonly="true" type="text" name="investigation_item[]" value="'+echo+'" ></tr></td>';
               $('#investigation_item_tb').append(newrow);
            }
        }else{
            if(rowarray.includes(name) === false){
                rowarray.push(name);
                var cname = name+':';
                var newrow = '<tr><td><input class="form-control bg-transparent border-0 shadow-none investi_item_val" readonly="true" type="text" name="investigation_item[]" value="'+cname+'" ></tr></td>';
                $('#investigation_item_tb').append(newrow);
             
            }
        }
        if(rowarray.includes(text) === false){
            rowarray.push(text);
            var newrow = '<tr><td><input class="form-control bg-transparent border-0 shadow-none investi_item_val" readonly="true" type="text" name="investigation_item[]" value="'+text+'" ></tr></td>';
            $('#investigation_item_tb').append(newrow);
        }

        $(document).ready(function(){
            $( ".investi_item_val" ).dblclick(function() {
                $(this).removeAttr('readonly');
            });
            $( ".investi_item_val" ).on( "focusout", function(){
                $('.investi_item_val').attr('readonly', true);
            } );
            $("#investi_item_tb tbody tr").click(function (e) {
                $('#investi_item_tb tbody tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
            });
            var input = $('.investi_item_val');
                var coderun = false;
                input.on('keydown', function() {
                var item = $(this).val();
                var key = event.keyCode || event.charCode;
                var tr = $(this).closest('tr');
                if (key == 46 || key == 8) {
                    if (coderun != true) {
                        rowarray.splice($.inArray(item, rowarray), 1);
                        coderun = true;
                        console.log(rowarray);
                    }

                }
                if(key == 46 ){
                    tr.remove();
                }
            });
        }); 
    }
</script>