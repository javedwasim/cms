<?php
if(isset($rights[0]['user_rights']))
{
    $permissions = explode(',',$rights[0]['user_rights']);
    $loggedin_user = $this->session->userdata('userdata');
}
?>
<div class="content-wrapper" style="margin: 0 .5%;">
	<div class="row page-titles" style="padding: 0px;">
		<div class="col-md-5" style="display: inline-flex;">
            <?php if($loggedin_user['is_admin']==1){ ?>
                <button class="btn btn-success" data-toggle="modal"  data-target="#add-new-patient" id="addProfile">
                    <i class="fas fa-user-plus"></i> Add New</button>
            <?php } elseif(in_array("profile-create_new_profile-1", $permissions)) { ?>
                <button class="btn btn-success" data-toggle="modal"  data-target="#add-new-patient" id="addProfile">
                    <i class="fas fa-user-plus"></i> Add New</button>
            <?php } else{ ?>
                <button class="btn btn-success" style="opacity: 0.5;" onclick="showError()">
                    <i class="fas fa-user-plus"></i> Add New</button>
            <?php } ?>
    		<button class="btn btn-info" id="pat_profile">Refresh</button>
		</div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active">profile</li>
            </ol>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper"> 
        <div class="resize1">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pro-filter p-b-0">
                            <form rol="form" style="width: 100%;" id="profile_filter">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" onchange="profile_filter()" autocomplete="off" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="pat_name" class="form-control" onchange="profile_filter()" autocomplete="off" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Profession</label>
                                            <select class="form-control" style="text-transform: capitalize;" name="pat_profession" onchange="profile_filter()">
                                                <option value="">Select...</option>
                                                <?php 
                                                foreach ($professions as $key) {
                                            ?>
                                                <option value="<?php echo $key['profession_name'] ?>" style="text-transform: capitalize;"><?php echo $key['profession_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>District</label>
                                            <select class="form-control" style="text-transform: capitalize;" name="pat_district" onchange="profile_filter()">
                                                <option value="">Select...</option>
                                                <?php 
                                                foreach ($districts as $key) {
                                            ?>
                                                <option value="<?php echo $key['district_name'] ?>" style="text-transform: capitalize;"><?php echo $key['district_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" id="toggleresize1" class="btn btn-default btn-xs">
                                            <i class="fas fa-arrow-right arro"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Registration</label>
                                            <input type="text" name="creation_date" class="form-control profile_filter" autocomplete="off" placeholder="Enter date" required="required" autocomplete="off" onchange="profile_filter()" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Last Visit</label>
                                            <input type="text" id="" placeholder="Enter date" class="form-control profile_filter" onchange="last_visit_filter(this)" autocomplete="off" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Search In:</label>
                                            <select class="form-control" onchange="profile_search_in(this);">
                                                <option value="">Select</option>
                                                <option value="ett">ETT</option>
                                                <option value="echo">ECHO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group m-t-15" style="display: inline-flex;">
                                            <button class="btn btn-info btn-sm" id="reset_profile_filter">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div id="profile_table">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="resize2">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin-bottom: 0px !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <button type="button" id="toggleresize2" class="btn btn-default btn-xs">
                                        <i class="fas fa-arrow-left arro"></i>
                                    </button>
                                </div>
                                <div class="col-md-11 col-lg-11 pt-info" id="patient_info">
                            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" style="padding-top: 0px; padding-bottom: 0px;">
                            <div class="row">
                                <div class="col-md-12 p-0">
                                    <button class="btn btn-primary btn-sm waves-effect waves-light" 
                                        id="pat-exemination" <?php echo in_array("examinations-can_add-0", $permissions)?"disabled":''; ?> style="padding: 6px 15px;" type="button">
                                        Examintation
                                    </button>
                                    <button class="btn btn-info btn-sm waves-effect waves-light pat-spInstructions"  style="padding: 6px 10px;" type="button" 
                                    <?php echo in_array("special_instructions-can_add-0", $permissions)?"disabled":''; ?>>
                                    Sp. Instructions</button>
                                    <button class="btn btn-primary btn-sm waves-effect waves-light pat-labtest" style="padding: 6px 15px;" type="button" <?php echo in_array("lab_tests-can_add-0", $permissions)?"disabled":''; ?>>
                                        Lab. Test</button>
                                    <button class="btn btn-danger btn-sm waves-effect waves-light" id="pat-echo-test" style="padding: 6px 15px;" type="button" <?php echo in_array("echos-can_add-0", $permissions)?"disabled":''; ?>>Echo</button>
                                    <button class="btn btn-danger btn-sm waves-effect waves-light" id="pat-ett-test" style="padding: 6px 15px;" type="button" <?php echo in_array("ett-can_add-0", $permissions)?"disabled":''; ?>>ETT</button>
                                    <button class="btn btn-success btn-sm waves-effect waves-light"id="list_itmes_vital" <?php echo in_array("vitals-can_add-0", $permissions)?"disabled":''; ?> data-func-call="vital" style="padding: 6px 15px;" type="button">Vitals</button>
                                    <button class="btn btn-success btn-sm waves-effect waves-light" id="profile_upload" <?php echo in_array("add_upload-can_add-0", $permissions)?"disabled":''; ?>  style="padding: 6px 15px;" type="button">Upload Files</button>
                                </div>
                            </div>
                            <div class="row m-t-5">
                                <div class="col-md-12">
                                    <label class="radio-inline m-r-10">
                                      <input type="radio" name="optradio" id="prescription_details">Prescription
                                    </label>
                                    <label class="radio-inline m-r-10">
                                      <input type="radio" name="optradio" id="echo_detail">Echo
                                    </label>
                                    <label class="radio-inline m-r-10">
                                      <input type="radio" name="optradio" id="ett_details">ETT
                                    </label>
                                    <label class="radio-inline m-r-10">
                                      <input type="radio" name="optradio" id="sp_inst_details">Special Instructions
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="optradio" id="lab_test_detail">Lab Test
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="height:59vh;">
                            <div class="row">
                                <div id="re1">
                                    <div class="col-md-12 p-r-0" style="height: 150px; overflow-y: scroll;">
                                        <h4 class="text-center"> Click to edit</h4>
                                        <div id="echo_detail_container">

                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body" id="files_content" style="height:300px; overflow-y: scroll;">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="re2" class="b-all" style="height:500px; overflow-y: scroll; ">
                                    <div class="col-md-12 p-l-0">
                                    <h4 class="text-center">Report</h4>
                                    <div class="report_view">  
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

   <!-- Modal -->
    <div class="modal fade" id="profile_upload_modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select File</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" id="file_upload_category">
                            <option value="CXR">CXR</option>
                            <option value="ECG">ECG</option>
                            <option value="ETT">ETT</option>
                            <option value="Coronary Angio">Coronary Angio</option>
                        </select>
                    </div>
                    <form id="upload_profile_files_form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="profile_upload">Choose File</label>
                            <input type="file" class="form-control-file" name="profile_upload" id="profile_upload" required="required">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" id="upload_profile_files" value="upload" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
 <!-- sample modal content -->
<div id="add-new-patient" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <form id="profile_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Patient</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body ui-front">
                    	<div class="row">
                    		<div class="col-md-4">
		                        <div class="form-group">
		                            <label for="recipient-name" class="control-label">Name</label>
		                            <input type="text" name="patient_name" class="form-control required" id="pat_profile_name" placeholder="Enter Name"  style="text-transform: capitalize;" minlength="3" maxlength="25" required />
		                        </div>
	                        </div>
	                        <div class="col-md-4">
		                        <div class="form-group">
		                            <label for="recipient-name" class="control-label">Father/Wife Name:</label>
		                            <input type="text" name="pat_profile_relative_name" class="form-control required" id="pat_profile_relative_name" placeholder="Enter Name" autocomplete="off" style="text-transform: capitalize;" maxlength="25" required>
		                        </div>
	                        </div>
	                        <div class="col-md-4">
	                        	<label>Age</label>
	                        	<div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="pat_profile_age_digit" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" class="form-control required" id="pat_profile_age_digit" maxlength="3" required="required">    
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control required" name="pat_profile_age" id="pat_profile_age">
                                            <option value="Years">Years</option>
                                            <option value="Months">Months</option>
                                            <option value="Days">Days</option>
                                        </select>
                                    </div>
                        		</div>
	                        </div>
	                        <div class="col-md-4">
                        		<div class="form-group">
                        			<label>Profession</label>
                        			<select class="form-control required" name="pat_profile_profession" id="pat_profile_profession" required="required" style="text-transform: capitalize;" >
                        				<option value="">Select</option>
                        				<?php 
                                            foreach ($professions as $key) {
                                        ?>
                                        <option value="<?php echo $key['profession_name'] ?>" style="text-transform: capitalize;"><?php echo $key['profession_name'] ?></option>
                                        <?php } ?>
                        			</select>
                        		</div>
                        	</div>
                        	<div class="col-md-4 m-b-20">
	                        	<label>Sex</label>
                                <div class="form-group">
                                    <label class="radio-inline"><input type="radio" name="pat_sex"  value="male" class="pat_profile_sex" checked="checked">Male</label>
                                    <label class="radio-inline"><input type="radio" name="pat_sex"  value="female" class="pat_profile_sex">Female</label>
                                    <label class="radio-inline"><input type="radio" name="pat_sex"  value="other" class="pat_profile_sex">Other</label>   
                                </div>
	                        </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="pat_profile_contact" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" id="pat_profile_contact" required="required" maxlength="11" class="form-control required" />
                                </div>
                            </div>
                        	<div class="col-md-6">
                        		<div class="form-group">
	                        		<label>Height:</label>
	                        		<input type="text" name="pat_profile_height" class="form-control pat_profile_height required" onchange="calculateBmiBsa(this)" id="pat_profile_height" placeholder="cm" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" required="required" maxlength="5">
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="form-group">
	                        		<label class="m-l-10">BMI:</label>
	                        		<input type="text" name="pat_profile_bmi"  id="pat_profile_bmi" class="form-control pat_profile_bmi" readonly>
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="form-group">
	                        		<label>Weight:</label>
	                        		<input type="text" class="form-control pat_profile_weight required" onchange="calculateBsaBmi(this)" name="pat_profile_weight" id="pat_profile_weight" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" placeholder="Kg" required="required" maxlength="5">
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="form-group">
	                        		<label class="m-l-10">BSA:</label>
	                        		<input type="text" name="pat_profile_bsa" id="pat_profile_bsa" class="form-control pat_profile_bsa" readonly>
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label for="pat_profile_email" >Email</label>
                        			<input type="email" name="pat_profile_email" id="pat_profile_email" class="form-control" />
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label>District</label>
                        			<select class="form-control required" name="pat_profile_district" id="pat_profile_district" style="text-transform: capitalize;">
                        				<option value="">Select</option>
                        				<?php 
                                            foreach ($districts as $key) {
                                        ?>
                                        <option value="<?php echo $key['district_name'] ?>" style="text-transform: capitalize;"><?php echo $key['district_name'] ?></option>
                                        <?php } ?>
                        			</select>
                        		</div>
                        	</div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control required" name="pat_profile_address" id="pat_profile_address" required="required" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" id="save_new_profile">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="edit_modal">
        
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
        $( function() {
            $("#pat_profile_name").autocomplete({  
                source:window.location.origin+window.location.pathname+'profile/get_pat_name', 
                select:function(event, ui){
                    $(this).val(ui.value);
                }
            });
        } );
    //////////////////////////////initilize datepicker///////////////////////
	    $('.profile_filter').datepicker({
	            format: 'd-M-yyyy'
	    });
        $('#list_itmes_vital').click(function(){
            var patid = $.trim($('#profiletable tbody tr.row_selected').find('.profile_id').text());
            var patname = $.trim($('#profiletable tbody tr.row_selected').find('.patient-name').text());
            if (patid=='') {
                 toastr["warning"]('Please select a patient first.');
            }else{
                var fun_call = $(this).attr('data-func-call');
                get_patient_vitals(patid,fun_call,patname);
            }
        });
        $('.resize1').resizable({
          handles: 'e',
          alsoResizeReverse: '#form',
          minWidth: 500
        });
        $('.resize2').resizable({
          handles: 'e',
          alsoResizeReverse: '#form',
          minWidth: 600
        });
        $('#re1').resizable({
          handles: 'e',
          alsoResizeReverse: '#form',
          minWidth: 200
        });
        $('#re2').resizable({
          handles: 'e',
          alsoResizeReverse: '#form',
          minWidth: 200
        });
        $.ui.plugin.add("resizable", "alsoResizeReverse", {
            start: function (event, ui) {
                var self = $(this).data("ui-resizable"), o = self.options,
                    _store = function (exp) {
                        $(exp).each(function () {
                            $(this).data("ui-resizable-alsoresize-reverse", {
                                width:  parseInt($(this).width(), 10),
                                height: parseInt($(this).height(), 10),
                                left:   parseInt($(this).css('left'), 10),
                                top:    parseInt($(this).css('top'), 10)
                            });
                        });
                    };
                if (typeof (o.alsoResizeReverse) == 'object' && !o.alsoResizeReverse.parentNode) {
                    if (o.alsoResizeReverse.length) {
                        o.alsoResize = o.alsoResizeReverse[0];
                        _store(o.alsoResizeReverse);
                    } else {
                        $.each(o.alsoResizeReverse, function (exp, c) {
                            _store(exp);
                        });
                    }
                } else {
                    _store(o.alsoResizeReverse);
                }
            },
            resize: function (event, ui) {
                var self = $(this).data("ui-resizable"), o = self.options, os = self.originalSize, op = self.originalPosition,
                    delta = {
                        height: (self.size.height - os.height) || 0,
                        width:  (self.size.width - os.width)   || 0,
                        top:    (self.position.top - op.top)   || 0,
                        left:   (self.position.left - op.left) || 0
                    },
                    _alsoResizeReverse = function (exp, c) {
                        $(exp).each(function () {
                            var el    = $(this),
                                start = $(this).data("ui-resizable-alsoresize-reverse"),
                                style = {},
                                css   = c && c.length ? c : ['width', 'height', 'top', 'left'];

                            $.each(css || ['width', 'height', 'top', 'left'], function (i, prop) {
                                var sum = (start[prop] || 0) - (delta[prop] || 0), // subtracting instead of adding
                                    corr = 0;

                                if (prop === 'width') {
                                    // correct for some divs having broad right border
                                    if (self.element.context.id === 'map') {
                                        corr = 5;
                                    } else {
                                        corr = 10;
                                    }
                                }

                                if (sum && sum >= 0) {
                                    style[prop] = sum + corr || null;
                                }
                            });

                            el.css(style);
                        });
                    };

                if (typeof (o.alsoResizeReverse) == 'object' && !o.alsoResizeReverse.nodeType) {
                    $.each(o.alsoResizeReverse, function (exp, c) {
                        _alsoResizeReverse(exp, c);
                    });
                } else {
                    _alsoResizeReverse(o.alsoResizeReverse);
                }
            },
            stop: function (event, ui) {
                var self = $(this).data("ui-resizable");

                $(this).removeData("ui-resizable-alsoresize-reverse");
            }
        });

	});
</script>