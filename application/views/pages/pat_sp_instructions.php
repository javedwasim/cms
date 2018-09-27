<div class="content-wrapper" style="margin: 0% 0.5%;">
    <div class="row p-t-10 m-0">
        <div class="card" style="margin-bottom:0px !important; ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12 pt-info" id="pat_sp_information">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 p-0">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 p-r-0">
                            <table class="table table-bordered nowrap responsive" cellspacing="0" id=""
                                   width="100%">
                                <thead>
                                <tr>
                                    <th style="width: 10%"></th>
                                    <th>Category</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <td style="width: 10%" data-toggle="modal" data-target="#history-modal">
                                            <a class="edit-inst-profile-btn btn btn-info btn-xs"
                                               href="javascript:void(0)"
                                               data-inst-id="<?php echo $category['id']; ?>"><i
                                                        class="far fa-question-circle"></i></a></td>
                                        <td contenteditable="true" class="p_category"
                                            onClick="editInstructionCategory(this,<?php echo $category['id']; ?>);">
                                            <?php echo $category['name']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 p-l-0 dashboard-content"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 p-0">
            <div class="row">
                <form id="profile_inst_form_modal" method="post" role="form"
                      data-action="<?php echo site_url('profile/patient_special_instruction') ?>"
                      enctype="multipart/form-data">
                    <input type="hidden" name="patient_id" id="patient_id" value="1">
                    <div class="col-md-12">
                        <div class="card" style="height:80vh;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="checkbox" name="">
                                        <label>To whom it may concern</label>
                                    </div>
                                    <div class="col-md-3">
                                        <button id="save_profile_instruction" type="submit"
                                                class="btn btn-primary btn-sm">Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="description" id="special_instruction" rows="20"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5 col-lg-5 p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="height:80vh;">
                        <div class="card-header">
                            Previous Instructions<br/>
                            Print size:<label class="radio-inline"><input type="radio" name="optradio"
                                                                          checked>A4</label>
                            <label class="radio-inline m-r-30"><input type="radio" name="optradio">Half
                                A4</label>
                            <label class="m-r-20">Click to View</label>
                            <label>Double Click to Edit</label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 p-r-0" id="sp_data_table">
                                    
                                </div>
                                <div class="col-md-8 p-l-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="20" readonly="readonly"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="inst_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="inst_form_modal" method="post" role="form"
              data-action="<?php echo site_url('instruction/save_inst_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="inst_id" id="inst_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Risk Factor and Cardiac Problems</label>
                        <textarea class="form-control" rows="3" name="description" id="inst_description"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function editInstructionCategory(editableObj, id) {
        $('td.p_category').css('background', '#FFF');
        $('td.p_category').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        var category = 'clinical';
        $.ajax({
            url: '/cms/profile/get_inst_item',
            type: 'post',
            data: {inst_id: id, category: category},
            cache: false,
            success: function (response) {
                $('.dashboard-content').empty();
                $('.dashboard-content').append(response.result_html);
            }
        });
        return false;

    }
    $(document.body).on('click', '.edit-inst-profile-btn', function () {
        $('#inst_form_modal')[0].reset();
        var item_id = $(this).attr('data-inst-id');
        $('#inst_id').val($(this).attr('data-inst-id'));
        $.ajax({
            url: '/cms/instruction/get_inst_description',
            type: 'post',
            data: {id: item_id},
            cache: false,
            success: function (response) {
                if (response.success) {
                    $('#inst_description').val(response.description);
                    $('#inst_modal').modal('show');
                } else {
                    toastr["error"](response.message);
                }
            }
        });
        return false;
    });
</script>