<table class="table table-bordered nowrap responsive tbl_header_fix_350" cellspacing="0" id="proto_details_tabl" width="100%" >
   <thead>
        <tr>
            <th style="width: 21%">Stage Name</th>
            <th style="width: 20%">Speed mph</th>
            <th style="width: 20%">Grade %</th>
            <th style="width: 20%">Stage Time</th>
            <th style="width: 19%">Mets</th>
        </tr>
    </thead>
    <tbody style="height: 61vh;">
        <?php foreach($protocol_details as $key){?>
        <tr>
            <td style="width: 20%" class="exam_cate word_break">
                    <input type="text" value="<?php echo $key['stage_name']; ?>" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" onClick="showExamination(this);" 
                        onchange="saveToDatabase(this,'stage_name','<?php echo $key['id']; ?>')"
                        class="form-control border-0 shadow-none bg-transparent">
                </td>
            <td style="width: 20%"  class="exam_cate word_break">
                <input type="text" readonly="true" ondblclick="this.readOnly='';" 
                    onfocusout="this.readOnly='readonly';" onClick="showExamination(this);" 
                    value="<?php echo $key['speed_mph']; ?>"
                    onchange="saveToDatabase(this,'speed_mph','<?php echo $key['id']; ?>')" 
                    class="form-control border-0 shadow-none bg-transparent">        
            </td>
            <td style="width: 20%" class="exam_cate word_break" >
                <input type="text" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';"  onchange="saveToDatabase(this,'grade','<?php echo $key['id']; ?>')" onClick="showExamination(this);" value="<?php echo $key['grade']; ?>"
                    class="form-control border-0 shadow-none bg-transparent">        
            </td>
            <td style="width: 20%" class="exam_cate word_break">
                <input type="text" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo date('h:i', strtotime($key['stage_time'])) ?>" class="form-control border-0 shadow-none bg-transparent"
                onchange="saveToDatabase(this,'stage_time','<?php echo $key['id']; ?>')"
                onClick="showExamination(this);">    
            </td>
            <td style="width: 20%" class="exam_cate word_break">
                <input type="text" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo $key['mets']; ?>"
                onchange="saveToDatabase(this,'mets','<?php echo $key['id']; ?>')"
                onClick="showExamination(this);" class="form-control border-0 shadow-none bg-transparent">        
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>
<script type="text/javascript">
    $("#proto_details_tabl tbody tr").click(function () {
            $('#proto_details_tabl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
    });
    function saveToDatabase(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'ett/update_protocol_details' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + val + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success == true) {
                    toastr["success"](response.message);
                }else{
                    document.execCommand('undo');
                    toastr["error"](response.message);
                }
            }
        });
        $(editableObj).css("color", "#212529");
    }
</script>