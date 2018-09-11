<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Advice Settings
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link <?php echo  isset($active_tab)&&($active_tab=='advice')?'active':''; ?>" data-toggle="tab" href="#category" role="tab">
                                <span class="hidden-sm-up"><i class="ti-home"></i></span>
                                <span class="hidden-xs-down">Category</span></a></li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo  isset($active_tab)&&($active_tab=='advice_item')?'active':''; ?>" data-toggle="tab" href="#items" role="tab">
                                <span class="hidden-sm-up"><i class="ti-user"></i></span>
                                <span class="hidden-xs-down">Items</span></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane <?php echo  isset($active_tab)&&($active_tab=='advice')?'active':''; ?>" id="category" role="tabpanel">
                            <div class="card">
                                <div class="card-header" style="display: inline-flex;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>New Category</label>
                                            <input type="text" class="form-control col-md-6" name="" id="advice_name">
                                            <button class="btn btn-primary add-advice">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" id="advice_table_div">
                                    <table class="table table-bordered nowrap responsive tbl-qa datatables" cellspacing="0" id=""
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th class="table-header" style="width: 10%">Delete</th>
                                            <th class="table-header">Category Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($advices as $advice): ?>
                                            <tr class="table-row">
                                                <td>
                                                    <a class="delete-advice btn btn-danger btn-xs"
                                                       href="javascript:void(0)" title="delete"
                                                       data-href="<?php echo site_url('setting/delete_advice/') . $advice['id'] ?>">
                                                        <i class="fa fa-trash" title="Delete"></i>
                                                    </a>
                                                </td>
                                                <td contenteditable="true"
                                                    onBlur="saveToDatabase(this,'cate_name','<?php echo $advice['id']; ?>')"
                                                    onClick="showEdit(this);">
                                                    <?php echo $advice['name']; ?></td>
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
                                    <form id="advice_item_form" method="post" role="form"
                                          data-action="<?php echo site_url('setting/add_advice_item') ?>"
                                          enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3">
                                                <div class="form-group">
                                                    <label>Item Name:</label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                            <div class=" col-lg-3 col-md-4">
                                                <div class="form-group">
                                                    <label>Category:</label>
                                                    <select class="form-control" name="advice_id">
                                                        <option>Select</option>
                                                        <?php foreach ($advices as $advice): ?>
                                                            <option value="<?php echo $advice['id']; ?>"><?php echo $advice['name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-4 p-0">
                                                <div class="form-group m-t-25" style="display: inline-flex;">
                                                    <button type= "submit" class="btn btn-sm btn-primary" id="advice_item_btn">Add</button>
                                                    <div class="custom-file">
                                                        <input type="file" typeof="button" class="custom-file-input hide">
                                                        <label class="btn btn-info btn-sm" for="inputGroupFile04">Add
                                                            Multiple</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4">
                                            <div class="form-group ">
                                                <label>Select Category:</label>
                                                <select class="form-control">
                                                    <option>Select</option>
                                                    <?php foreach ($advices as $advice): ?>
                                                        <option value="<?php echo $advice['id']; ?>"><?php echo $advice['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-3">
                                            <div class="custom-file m-t-25">
                                                <input type="file" class="custom-file-input hide"
                                                       id="inputGroupFile04">
                                                <label class="btn btn-info btn-sm" for="inputGroupFile04">Export
                                                    items</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" id="advice_item_table_container">
                                    <table class="table table-bordered nowrap responsive tbl-qa datatables"
                                           cellspacing="0" id="" width="100%">
                                        <thead>
                                        <tr>
                                            <th class="table-header" style="width: 10%">Delete</th>
                                            <th class="table-header">Item Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($items as $item): ?>
                                                <tr class="table-row">
                                                    <td style="width: 10%">
                                                        <a class="delete-advice-item btn btn-danger btn-xs"
                                                           href="javascript:void(0)" title="delete"
                                                           data-href="<?php echo site_url('setting/delete_advice_item/') . $item['id'] ?>">
                                                            <i class="fa fa-trash" title="Delete"></i></a>
                                                    </td>
                                                    <td contenteditable="true"
                                                        onBlur="saveAdviceItem(this,'item_name','<?php echo $item['id']; ?>')"
                                                        onClick="showEdit(this);">
                                                        <?php echo $item['name']; ?></td>
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
<style>
    body {
        width: 100%;
    }

    .current-row {
        background-color: #B24926;
        color: #FFF;
    }

    .current-col {
        background-color: #1b1b1b;
        color: #FFF;
    }

    .tbl-qa {
        width: 100%;
        font-size: 0.9em;
        background-color: #f5f5f5;
    }

    .tbl-qa th.table-header {
        padding: 5px;
        text-align: left;
        padding: 10px;
    }

    .tbl-qa .table-row td {
        padding: 10px;
        background-color: #FDFDFD;
    }
</style>

<script>
    $(document).ready(function () {
        $('.datatables').DataTable();
    });
    function showEdit(editableObj) {
        $(editableObj).css("background", "#FFF");
    }
    function saveToDatabase(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $.ajax({
            url: "<?php echo base_url() . 'setting/save_advice' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["success"](response.message);
                }
            }
        });
    }

    function saveAdviceItem(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(ajax-loader.gif) no-repeat right");
        $.ajax({
            url: "<?php echo base_url() . 'setting/save_advice_item' ?>",
            type: "POST",
            data: 'column=' + column + '&editval=' + editableObj.innerHTML + '&id=' + id,
            success: function (response) {
                $(editableObj).css("background", "#FDFDFD");
                if (response.success) {
                    toastr["success"](response.message);
                } else {
                    toastr["success"](response.message);
                }
            }
        });
    }
</script>