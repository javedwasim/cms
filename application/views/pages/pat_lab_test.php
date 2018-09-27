<div class="content-wrapper" style="margin: 0% 0.5%;">
    <div class="row p-t-10 m-0">
    	<div class="card" style="margin-bottom:0px !important; ">
    		<div class="card-body">
    			<div class="row">
                    <div class="col-md-12 col-lg-12 pt-info" id="pat_sp_information"></div>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-4 p-r-0 p-l-0">
    		<div class="card">
    			<div class="card-body" style="height: 80vh;">
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
                                            <a class="profile-lab-cat-btn btn btn-info btn-xs"
                                               href="javascript:void(0)"
                                               data-lab-category-id="<?php echo $category['id']; ?>"><i
                                               class="far fa-question-circle"></i></a></td>
                                        <td contenteditable="true" class="p_category"
                                            onClick="editLaboratoryTest(this,<?php echo $category['id']; ?>);">
                                            <?php echo $category['name']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
		    			</div>
		    			<div class="col-md-6 p-l-0 laboratory-test-content">
		    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
		                       <thead>
		                        <tr>
		                            <th style="width: 10%"></th>
		                            <th>Test Name</th>
		                        </tr>
			                    </thead>
			                    <tbody>
                                    <tr>
                                        <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
                                        <td></td>
                                    </tr>
			                    </tbody>
			                </table>
		    			</div>
		    		</div>	
    			</div>
    		</div>
    	</div>
    	<div class="col-md-3 p-l-0 p-r-0">
            <form id="profile_inst_form_modal" method="post" role="form"
                  data-action="<?php echo site_url('profile/patient_special_instruction') ?>"
                  enctype="multipart/form-data">
                <input type="hidden" name="patient_id" id="patient_id" value="">
                <input type="hidden" name="test_id" id="test_id" value="">
                <input type="hidden" name="category_id" id="category_id" value="">
                <div class="card" style="height: 80vh;">
                    <div class="card-header" style="display: inline-flex;">
                        <div class="form-group">
                            <label class="m-t-10">Test Date</label>
                            <input type="text"  class="form-control lab-date col-md-7" name="test_date">
                        </div>
                        <button class="btn btn-primary btn-sm" id="save_profile_instruction">Save</button>
                    </div>
                    <div class="card-body laboratory-test-item-content">
                        <table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
                            <thead>
                            <tr>
                                <th></th>
                                <th> Items</th>
                                <th> Value</th>
                                <th> Noramal Value</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
    	</div>
    	<div class="col-md-5 p-r-0 p-l-0">
    		<div class="card" style="height: 80vh;">
    			<div class="card-header">
    				<label>Double click to Print</label>
    				<label class="pull-right">Double click to Edit</label>
    			</div>
    			<div class="card-body">
    				<div class="row">
    					<div class="col-md-4 p-r-0 ">
    						<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
		                       <thead>
		                        <tr>
		                            <th>Test Name</th>
		                            <th>Test Date</th>
		                        </tr>
			                    </thead>
			                    <tbody>
		                            <tr>
		                                <td >RFT</td>
		                                <td>9/11/2018</td>
		                            </tr>
			                    </tbody>
			                </table>
    					</div>
    					<div class="col-md-8 p-l-0">
    						<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
		                       	<thead>
		                        <tr>
		                        	<th></th>
		                            <th> Items</th>
		                            <th> Value</th>
		                            <th> Noramal Value</th>
		                        </tr>
			                    </thead>
			                    <tbody>
		                            <tr>
		                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
		                                <td>Urea</td>
		                                <td></td>
		                                <td>mg/dl</td>
		                            </tr>
		                            <tr>
		                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
		                                <td>Urea</td>
		                                <td></td>
		                                <td>mg/dl</td>
		                            </tr>
		                            <tr>
		                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
		                                <td>Urea</td>
		                                <td></td>
		                                <td>mg/dl</td>
		                            </tr>
		                            <tr>
		                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
		                                <td>Urea</td>
		                                <td></td>
		                                <td>mg/dl</td>
		                            </tr>
		                            <tr>
		                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
		                                <td>Urea</td>
		                                <td></td>
		                                <td>mg/dl</td>
		                            </tr>
			                    </tbody>
			                </table>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

<script>
    function editLaboratoryTest(editableObj, id) {
        $('td.p_category').css('background', '#FFF');
        $('td.p_category').css('color', '#212529');
        $(editableObj).css("background", "#1e88e5");
        $(editableObj).css("color", "#FFF");
        var category = 'clinical';
        var patient_id = $('#label_patient_id').text();
        $('#patient_id').val(patient_id);

        $.ajax({
            url: '/cms/profile/get_lab_test',
            type: 'post',
            data: {lab_id: id, category: category},
            cache: false,
            success: function (response) {
                $('.laboratory-test-content').empty();
                $('.laboratory-test-content').append(response.result_html);
            }
        });
        return false;

    }
    $(document.body).on('click', '.profile-lab-cat-btn', function(){
        $('#lab_category_form')[0].reset();
        var cat_id = $(this).attr('data-lab-category-id');
        $('#lab_category_id').val($(this).attr('data-lab-category-id'));
        $.ajax({
            url: '/cms/setting/get_lab_category_description',
            type: 'post',
            data: {id:cat_id},
            cache: false,
            success: function(response) {
                console.log(response);
                if (response.success) {
                    $('#description').val(response.description);
                    $('#lab_category_modal').modal('show');
                } else {
                    toastr["error"](response.message);
                }
            }
        });

        return false;

    });
</script>

<div id="lab_category_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="lab_category_form" method="post" role="form"
              data-action="<?php echo site_url('setting/save_lab_category_description') ?>"
              enctype="multipart/form-data">
            <input type="hidden" name="lab_category_id" id="lab_category_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Risk Factor and Cardiac Problems</label>
                        <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>