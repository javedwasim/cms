<div class="profession_table">
    
        <table class="table table-bordered nowrap responsive" id="prof_table" cellspacing="0" width="100%" >
            <thead>
                <tr>
                    <th style="width:30px;"></th>
                    <th>Profession</th>
                </tr>
            </thead>
            <form id="professions_form">
            <tbody>
                <?php
                    foreach ($professions as $key) {
                ?>
                <tr id ="<?php echo $key['profession_id']; ?>" data-table="profession_table">
                    <td >
                        <a class="delete_profession btn btn-danger btn-xs"
                           href="javascript:void(0)" title="delete"
                           data-href="<?php echo site_url('setting/delete_profession/') . $key['profession_id'] ?>">
                            <i class="fa fa-trash" title="Delete"></i>
                        </a>
                    </td>
                    <td style="text-transform: capitalize;" class="exam_cate">
                    <input type="text" class="form-control border-0" value="<?php echo $key['profession_name']; ?>" onBlur="saveToDatabase(this,'profession_name','<?php echo $key['profession_id']; ?>')" onClick="showExamination(this);" name='row_name[]' /> 
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            </form>
        </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        // Sortable rows
        table = $("#prof_table");
        table.tableDnD({
            onDrop: function(table, row) {
                var rows = table.tBodies[0].rows;
                var tabledata = $.tableDnD.serialize();
                var tblname = 'profession_tbl';
                var tblid = 'profession_id';
               $.ajax({
                    url: "<?php echo base_url().'setting/sort_table/' ?>"+tblname+"/"+tblid,
                    type: 'post',
                    data: tabledata,
                    cache: false,
                    success: function(response){
                        if (response.success==true) {
                            toastr["success"](response.message);
                        }else{
                            toastr["error"](response.message);
                        }
                    }

               });
            }
        });
    });
    function showExamination(editableObj) {
        $('td.exam_cate').css('background', '#FFF');
        $('td.exam_cate').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
    }
    function saveToDatabase(editableObj, column, id) {
        $.ajax({
            url: "<?php echo base_url() . 'setting/update_profession' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success==true) {
                    toastr["success"](response.message);
                }else{
                    toastr["error"](response.message);
                }
            }
        });
        $(editableObj).css("color", "#212529");
    }
</script>
    