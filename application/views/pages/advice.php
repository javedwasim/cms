<script type="text/javascript">
  $('#import_csv_advice').submit(function(event){
        event.preventDefault();
        var itemfile = new FormData($('#import_csv_advice')[0]);
        var catid = $('#advice_id option:selected').val();
        $.confirm({
            title: 'Confirm!',
            content: 'Replace all or Add new <br> Yes: Replace <br> No: Add with previous',
            buttons: {
                Yes: function () {
                    $.ajax({
                       url:"<?php echo base_url(); ?>setting/import_advice_items/"+catid,
                       method:"POST",
                       data: itemfile,
                       contentType:false,
                       cache:false,
                       processData:false,
                       success:function(response)
                       {
                          document.getElementById("csv_advice_file").value = "";
                            if (response.success==true) {
                              toastr["success"](response.message);
                            }else{
                              toastr["error"](response.message);
                            }
                       }
                    });
                },
                No: function (){
                    $.ajax({
                       url:"<?php echo base_url(); ?>setting/import_advice_items/"+catid,
                       method:"POST",
                       data: itemfile,
                       contentType:false,
                       cache:false,
                       processData:false,
                       success:function(response)
                       {
                          document.getElementById("csv_advice_file").value = "";
                            if (response.success==true) {
                              toastr["success"](response.message);
                            }else{
                              toastr["error"](response.message);
                            }
                       }
                    });
                }
            }
        });
    });
</script>
<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card card-top-margin">
                <div class="card-header">
                    Advice Settings
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link <?php echo  isset($active_tab)&&($active_tab=='advice')?'active':''; ?>" data-toggle="tab" href="#category" role="tab">
                                <span class="hidden-sm-up">Category</span>
                                <span class="hidden-xs-down">Category</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo  isset($active_tab)&&($active_tab=='advice_item')?'active':''; ?>" data-toggle="tab" href="#items" role="tab">
                                <span class="hidden-sm-up">Items</span>
                                <span class="hidden-xs-down">Items</span></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane <?php echo  isset($active_tab)&&($active_tab=='advice')?'active':''; ?>" id="category" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <form id="advice_category_form">
                                        <div class="row">
                                            <div class="col-md-4  col-sm-9 col-9">
                                                <div class="form-group">
                                                    <label>New Category</label>
                                                    <input type="text" class="form-control" name="" id="advice_name" maxlength="50" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1 m-t-25  col-sm-3 col-3">
                                                <button class="btn btn-primary btn-sm add-advice">Add</button>
                                            </div>
                                            <div class="col-md-2 m-t-25">
                                                <button class="btn btn-danger btn-sm" id="delete_all_advices">Delete All</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body" id="advice_table_div">
                                    <table class="table table-bordered nowrap responsive tbl-qa tbl_header_fix_350" cellspacing="0" id="advice_cat_tbl" width="100%">
                                        <thead>
                                        <tr>
                                            <th class="table-header" style="width:55px;">Action</th>
                                            <th class="table-header">Category Name</th>
                                        </tr>
                                        </thead>
                                        <tbody style="height: 57vh;">
                                        <?php foreach ($advices as $advice): ?>
                                            <tr class="table-row" id="<?php echo $advice['id']; ?>">
                                                <td style="width:50px;">
                                                    <a class="delete-advice btn btn-danger btn-xs"
                                                       href="javascript:void(0)" title="delete"
                                                       data-href="<?php echo site_url('setting/delete_advice/') . $advice['id'] ?>">
                                                        <i class="fa fa-trash" title="Delete"></i>
                                                    </a>
                                                </td>
                                                <td class="advice_cate" onClick="showAdvice(this);">
                                                    <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="advice_cate" value="<?php echo $advice['name']; ?>" onchange="saveToDatabase(this,'cate_name','<?php echo $advice['id']; ?>')">        
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane <?php echo  isset($active_tab)&&($active_tab=='advice_item')?'active':''; ?>" id="items" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form id="advice_item_form" method="post" role="form" data-action="<?php echo site_url('setting/add_advice_item') ?>" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5  col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label>Item Name:</label>
                                                            <input type="text" class="form-control" name="name" maxlength="50" required>
                                                        </div>
                                                    </div>
                                                    <div class=" col-lg-5 col-md-5  col-sm-9 col-9">
                                                        <div class="form-group">
                                                            <label>Category:</label>
                                                            <select class="form-control" name="advice_id" id="advice_id" required>
                                                                <option value="">Select</option>
                                                                <?php foreach ($advices as $advice): ?>
                                                                    <option value="<?php echo $advice['id']; ?>"><?php echo $advice['name']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 p-0 col-sm-3 col-3">
                                                        <div class="form-group m-t-25" style="display: inline-flex;">
                                                            <button type= "submit" class="btn btn-sm btn-primary" id="advice_item_btn">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form id="import_csv_advice" enctype="multipart/form-data">
                                                <div class="row">
                                                  <div class="col-md-7">
                                                    <div class="form-group m-t-30">
                                                      <input type="file" name="csv_advice_file" id="csv_advice_file" required accept=".csv" />
                                                    </div>
                                                  </div>
                                                  <div  class="col-md-5">
                                                    <div class="form-group m-t-25">
                                                        <input type="submit" name="import_csv_advice" class="btn btn-sm btn-primary" id="import_csv_advice_btn" value="Add Multiple">
                                                    </div>
                                                  </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-9 col-9">
                                            <div class="form-group ">
                                                <label>Select Category:</label>
                                                <select class="form-control" name="filter_advice_category" onchange="filter_advice_item_category(this.value)">
                                                    <option value="0">Select</option>
                                                    <?php foreach ($advices as $advice): ?>
                                                        <option value="<?php echo $advice['id']; ?>"
                                                            <?php echo isset($selected_category)&&($selected_category==$advice['id'])?'selected':'' ?>><?php echo $advice['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-3">
                                            <div class="form-group m-t-25">
                                                <a class="btn btn-sm btn-primary" href="javascript:void(0)" id="export_advice_items" >Export items</a>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" id="advice_item_table_container">
                                    <table class="table table-bordered nowrap responsive tbl-qa tbl_header_fix_history"
                                           cellspacing="0" id="advice_item_tbl" width="100%">
                                        <thead>
                                        <tr>
                                            <th class="table-header" style="width: 55px;">Action</th>
                                            <th class="table-header">Item Name</th>
                                        </tr>
                                        </thead>
                                        <tbody style="height: 58vh;">
                                            <?php foreach ($items as $item): ?>
                                                <tr class="table-row" id="<?php echo $item['id']; ?>">
                                                    <td style="width: 50px;">
                                                        <a class="delete-advice-item btn btn-danger btn-xs"
                                                           href="javascript:void(0)" title="delete"
                                                           data-href="<?php echo site_url('setting/delete_advice_item/') . $item['id'] . '/' . $item['advice_id'] ?>">
                                                            <i class="fa fa-trash" title="Delete"></i></a>
                                                    </td>
                                                    <td class="advice_item" onClick="showEdit(this);">
                                                        <input type="text" class="form-control border-0 bg-transparent shadow-none"  readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="advice_item" value="<?php echo $item['name']; ?>" onchange="saveAdviceItem(this,'item_name','<?php echo $item['id']; ?>')" >
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
</div>

<script>
    function showAdvice(editableObj) {
        $("#advice_cat_tbl tbody tr").click(function (e) {
            $('#advice_cat_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function showEdit(editableObj) {
        $("#advice_item_tbl tbody tr").click(function (e) {
            $('#advice_item_tbl tbody tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        });
    }
    function saveToDatabase(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'setting/save_advice' ?>",
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

    function saveAdviceItem(editableObj, column, id) {
        var val = editableObj.value;
        $.ajax({
            url: "<?php echo base_url() . 'setting/save_advice_item' ?>",
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

$(document).ready(function () {
    // Sortable rows
    table = $("#advice_cat_tbl");
    table.tableDnD({
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'advice';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_advice_cat_tbl/"+tblname+"/"+tblid,
                type: 'post',
                data: tabledata,
                cache: false,
                success: function(response){
                   
                }
           });
        }
    });

    table1 = $("#advice_item_tbl");
    table1.tableDnD({
        onDrop: function(table1, row) {
            var rows = table1.tBodies[0].rows;
            var tabledata = $.tableDnD.serialize();
            var tblname = 'advice_item';
            var tblid = 'id';
           $.ajax({
                url: window.location.origin+window.location.pathname+"setting/sort_advice_item_tbl/"+tblname+"/"+tblid,
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