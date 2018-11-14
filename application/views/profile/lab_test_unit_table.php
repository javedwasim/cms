<table class="table table-bordered nowrap responsive datatables tbl_header_fix_history" cellspacing="0" id=""
       width="100%">
    <thead>
    <tr>
        <th>Item Name</th>
        <th>Value</th>
        <th>Units</th>
    </tr>
    </thead>
    <tbody style="height: 450px;">
    <?php foreach ($items as $item): ?>
        <tr>
            <td onBlur="saveTestItemDescription(this,'name','<?php echo $item['id']; ?>')"">
                <?php echo $item['name']; ?>
            </td>
            <td>
                <input type="text" name="" value="<?php echo $item['item_value']; ?>" 
                    class="form-control border-0 bg-transparent shadow-none" 
                    readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';"
                    onchange="updatelabtest(this,'item_value','<?php echo $item['id']; ?>')">
            </td>
            <td onBlur="saveTestItemDescription(this,'unit','<?php echo $item['id']; ?>')">
                <?php echo $item['item_units']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    function updatelabtest(obj, column, id) {
        var val = obj.value;
        $.ajax({
            url: "<?php echo base_url() . 'profile/update_lab_item_test' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + val + '&id=' + id,
            success: function (response) {
                if (response.success==true) {
                    toastr["success"](response.message);
                }else{
                    document.execCommand('undo');
                    toastr["error"](response.message);
                }
            }
        });
    }
</script>