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
            $('#instruction_item').append(text+','); 
        } 
        
    }

</script>