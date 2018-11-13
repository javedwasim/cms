<table class="table table-bordered nowrap responsive item_table" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th class="table-header" >Action</th>
        <th class="table-header">Item Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr class="table-row">
            <td>
                <a class="edit-medicine-item-btn btn btn-info btn-xs"
                   href="javascript:void(0)"
                   data-medicine-item-id="<?php echo $item['id']; ?>">
                   <i class="far fa-question-circle"></i></a>
            </td>
            <td class="medicine_item"
                onClick="medicineItemEdit(this,'<?php echo $item['medicine_id']; ?>','<?php echo $item['name']; ?>');">
                <?php echo $item['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div id="medicine_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="medicine_item_form_modal" method="post" role="form"
              data-action="<?php echo site_url('medicine/save_medicine_item_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="medicine_item_id" id="medicine_item_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Risk Factor and Cardiac Problems</label>
                        <textarea class="form-control" rows="3" name="description" id="medicine_item_description"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    var rowarray = [];
    function medicineItemEdit(editableObj,id,name) {
        $('td.medicine_item').css('background', '#FFF');
        $('td.medicine_item').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        if(rowarray.includes(name) === false){
            rowarray.push(name);
            var newRowContent = '<tr><td><input class="form-control" type="text" name="medicine_value[]" value="'+name+'" ></td></tr>';
            $("#medicine_item").append(newRowContent); 
        } 

        $.ajax({
            url: '/cms/profile/get_medicine_dosage/'+id,
            type: 'get',
            cache: false,
            success: function (response) {
                $('#medicine_dosage_container').empty();
                $('#medicine_dosage_container').append(response.result_html);
            }
        });
        return false;
    }

</script>