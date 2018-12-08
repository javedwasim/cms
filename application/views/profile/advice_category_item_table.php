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
        
        var val = $('#advice_item').val();
        if(textarray.length>0 && val == ''){
            textarray.length = 0;
        }
        if(textarray.includes(name) === false){
            var hisVal = $('#advice_item').val();
            if(hisVal == ''){
               var setHisVal = hisVal+name+': \n';
            }else{
                var setHisVal = hisVal+'\n'+name+': \n';
            }
            setTimeout(function(){
                $('#advice_item').val(setHisVal.replace(/^,|,$/g,''));
            },500);
            textarray.push(name);
        }
        if(textarray.includes(text) === false){
            textarray.push(text);
            setTimeout(function(){
                var hisVal = $('#advice_item').val();
                var setHisVal = hisVal+text+', ';
                $('#advice_item').val(setHisVal.replace(/^,|,$/g,''));
            },500);
        }
    }

</script>