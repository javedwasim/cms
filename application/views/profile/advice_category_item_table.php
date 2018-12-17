<table class="table table-bordered nowrap responsive tbl-qa"
       cellspacing="0" id="" width="100%">
    <thead>
    <tr>
       <!--  <th class="table-header" style="width: 5%">Action</th> -->
        <th class="table-header">Item Name</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item): ?>
            <tr class="table-row">
                <!-- <td style="width: 5%">
                    &nbsp;
                </td> -->
                <td class="advice_item"
                    onClick="addAdviceItem(this,'<?php echo $item['name']; ?>','<?php echo trim($name); ?>');">
                    <?php echo $item['name']; ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    var textarray = [];
    function addAdviceItem(editableObj,text,name) {
        var patient_id = $('#label_patient_id').text();
        $('td.advice_item').css('background', '#FFF');
        $('td.advice_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        
       
        if(textarray.includes(name) === false){
            var setHisVal = name+':';
            var newrow = '<tr><td><input class="form-control advice_val bg-transparent border-0 shadow-none" readonly="true" type="text" name="advice_item[]" value="'+setHisVal+'" ></td></tr>';
            $('#advice_tb').append(newrow);
            textarray.push(name);
        }
        if(textarray.includes(text) === false){
            var newrow = '<tr><td><input class="form-control advice_val bg-transparent border-0 shadow-none" readonly="true" type="text" name="advice_item[]" value="'+text+'" ></td></tr>';
            $('#advice_tb').append(newrow);
            textarray.push(text);
        }

        $(document).ready(function(){
            $( ".advice_val" ).dblclick(function() {
                $(this).removeAttr('readonly');
            });
            $( ".advice_val" ).on( "focusout", function(){
                $('.advice_val').attr('readonly', true);
            } );
            $("#advice_item_tb tbody tr").click(function (e) {
                $('#advice_item_tb tbody tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
            });
            var input = $('.advice_val');
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