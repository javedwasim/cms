<?php if(isset($rights[0]['user_rights'])){ $appointment_rights = explode(',',$rights[0]['user_rights']); $loggedin_user = $this->session->userdata('userdata');}?>
<table class="table table-bordered nowrap responsive structure_table tbl_header_fix" id="echo_structure_tbl" cellspacing="0" style="width: 100%;">
    <thead>
        <tr>
            <th  style="width:50px;">Action</th>
            <th >Structure</th>
        </tr>
    </thead>
    <tbody style="height: 800px;">
    <?php foreach ($structures as $structure): ?>
        <tr class="table-row" id="<?php echo $structure['id']; ?>">
            <td style="width:50px;">
                <?php if($loggedin_user['is_admin']==1){ ?>
                    <a class="delete-structure btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_structure_category/') . $structure['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } elseif(in_array("echos-can_delete-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                    <a class="delete-structure btn btn-danger btn-xs"
                       href="javascript:void(0)" title="delete"
                       data-href="<?php echo site_url('Echo_controller/delete_structure_category/') . $structure['id'] ?>">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } else{ ?>
                    <a class="btn btn-danger btn-xs" style="opacity: 0.5;" onclick="showError()">
                        <i class="fa fa-trash" title="Delete"></i></a>
                <?php } ?>

            </td>
            <?php if($loggedin_user['is_admin']==1){ ?>
                <td onClick="structureEdit(this,'<?php echo $structure['id']; ?>');" id="<?php echo $structure['id']; ?>"><input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo $structure['name']; ?>" name="echo_structure" onchange="saveStructure(this,'cate_name','<?php echo $structure['id']; ?>')">        
                </td>
            <?php } elseif(in_array("echos-can_edit-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
                <td onClick="structureEdit(this,'<?php echo $structure['id']; ?>');" id="<?php echo $structure['id']; ?>"><input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" value="<?php echo $structure['name']; ?>" name="echo_structure" onchange="saveStructure(this,'cate_name','<?php echo $structure['id']; ?>')">        
                </td>
            <?php } else{ ?>
                <td contenteditable="true" onClick="showError(this);">
                    <?php echo $structure['name']; ?></td>
            <?php } ?>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<input type="hidden" name="structure_id" id="structure_id">
<script>

    function structureEdit(editableObj,id) {
        //remove background and color on all elements and remove color
        $(".structure_table td").css("background-color", "#FFF");
        $(".structure_table td").css("color", "#1b1a1a");


        $('#structure_id').val(id);
        $(editableObj).css("background", "#3300FF");
        $(editableObj).css("color", "#FFF");
        //load structure findings
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/get_findings_by_id/'?>"+id,
            type: "get",
            success: function (response) {
                $('.structure_finding_container').empty();
                $('.structure_finding_container').append(response.result_html);

                $('.structure_diagnosis_container').empty();
                $('.structure_diagnosis_container').append(response.diagnosis_html);

                $('.default_finding_container').empty();
                $('.default_finding_container').append(response.dfinding_html);

                $('.default_diagnosis_container').empty();
                $('.default_diagnosis_container').append(response.ddiagnose_html);
            }
        });

    }
    function saveStructure(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'Echo_controller/save_structure_category' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + val + '&id=' + id,
            success: function (response) {
                if (response.success) {
                    toastr["success"](response.message);
                }else{
                    document.execCommand('undo');
                    toastr["error"](response.message);
                }
            }
        });
    }

    $(document.body).on('click', '#structure_finding', function(){
        //remove background and color on all elements and remove color
        $(".structure_table td").css("background-color", "#FFF");
        $(".structure_table td").css("color", "#1b1a1a");

        var structure_id = $('#structure_id').val();
        $('#'+structure_id).css("background", "#3300FF");
        $('#'+structure_id).css("color", "#FFF");
        return false;
    });
$(document).ready(function () {
    // Sortable rows
    table = $("#echo_structure_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'structure';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_echo_structure_tbl/"+tblname+"/"+tblid,
                type: 'post',
                data: tabledata,
                cache: false,
                success: function(response){
                   
                }
           });
        }
    });
});
</script>