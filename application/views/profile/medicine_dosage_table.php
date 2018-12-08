<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header">Dosages</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($dosages as $dosage):?>
        <tr class="table-row">
            <td class="medicine_category"
                onClick="editDosageCategory(this,'<?php echo $dosage['dosage_name']; ?>','<?php echo $dosage['dosage_id']; ?>');">
                <?php echo $dosage['dosage_name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script>
    var textarray = [];
    function editDosageCategory(editableObj,name,id) {
        $('td.medicine_category').css('background', '#FFF');
        $('td.medicine_category').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        if(textarray.includes(name) === false){
            textarray.push(name);
            var newRowContent = '<tr><td><input class="form-control med_dosage_val bg-transparent border-0 shadow-none" type="text" name="dosage_value[]" value="'+name+'" ></td></tr>';
            $(newRowContent).insertBefore('.dos_row');
            // $("#dosage_item").append(newRowContent);
        } 
        $('.med_dosage_val').attr('readonly', true);
        $(document).ready(function(){
            $( ".med_dosage_val" ).dblclick(function() {
                $(this).removeAttr('readonly');
            });
            $( ".med_dosage_val" ).on( "focusout", function(){
                $('.med_dosage_val').attr('readonly', true);
            } );

            var input = $('.med_dosage_val');
              input.on('keydown', function() {
                var key = event.keyCode || event.charCode;
                var tr = $(this).closest('tr');
                if(key == 46 ){
                    tr.remove();
                }
              });
        });
        $("#dosage_val_tbl tbody tr").click(function (e) {
            $('#dosage_val_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
</script>