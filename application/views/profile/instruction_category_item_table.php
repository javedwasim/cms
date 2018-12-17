<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Item Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr class="table-row">
            <td class="inst_item"
                onClick="showEdit(this,'<?php echo $item['name']; ?>');">
                <?php echo $item['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    var rowarray = [];
    function showEdit(editableObj,text) {
        $('td.inst_item').css('background', '#FFF');
        $('td.inst_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        if(rowarray.includes(text) === false){
            rowarray.push(text);
            var newrow = '<tr><td><input class="form-control bg-transparent border-0 shadow-none instr_val" readonly="true" type="text" name="instruction_item[]" value="'+text+'" ></td></tr>';
            $('#instruction_tb').append(newrow);
        }

        $(document).ready(function(){
            $( ".instr_val" ).dblclick(function() {
                $(this).removeAttr('readonly');
            });
            $( ".instr_val" ).on( "focusout", function(){
                $('.instr_val').attr('readonly', true);
            } );
            $("#instruction_item_tb tbody tr").click(function (e) {
                $('#instruction_item_tb tbody tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
            });
            var input = $('.instr_val');
            var coderun = false;
                input.on('keydown', function() {
                var item = $(this).val();
                var key = event.keyCode || event.charCode;
                var tr = $(this).closest('tr');
                if (key == 46 || key == 8) {
                    if (coderun != true) {
                        rowarray.splice($.inArray(item, rowarray), 1);
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