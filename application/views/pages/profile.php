<?php
if(isset($rights[0]['user_rights']))
{
    $appointment_rights = explode(',',$rights[0]['user_rights']);
    $loggedin_user = $this->session->userdata('userdata');
}
?>
<div class="content-wrapper" style="margin: 0 .5%;">
	<div class="row page-titles">
		<div class="col-md-5" style="display: inline-flex;">
            <?php if($loggedin_user['is_admin']==1){ ?>
                <button class="btn btn-success" data-toggle="modal"  data-target="#add-new-patient" id="addProfile">
                    <i class="fas fa-user-plus"></i> Add New</button>
            <?php } elseif(in_array("profile-create_new_profile-1", $appointment_rights)&&($loggedin_user['is_admin']==0)) { ?>
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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
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
                                            <input type="text" name="creation_date" class="form-control profile_filter" autocomplete="off" required="required" autocomplete="off" onchange="profile_filter()" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <!-- <div class="form-group">
                                            <label>Last Visit</label>
                                            <input type="text" value="<?php echo date('d-M-Y') ?>" id="" class="form-control profile_filter" onchange="profile_filter()" autocomplete="off" required="required" />
                                        </div> -->
                                    </div><!-- 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Search In:</label>
                                            <input type="text" name="" class="form-control">
                                        </div>
                                    </div> -->
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
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12 p-0">
                                    <button class="btn btn-primary btn-md waves-effect waves-light" id="pat-exemination" style="padding: 10px 15px;" type="button">Examintation</button>
                                    <button class="btn btn-info btn-md waves-effect waves-light pat-spInstructions"  style="padding: 10px 10px;" type="button">Sp. Instructions</button>
                                    <button class="btn btn-primary btn-md waves-effect waves-light pat-labtest" style="padding: 10px 15px;" type="button">Lab. Test</button>
                                    <button class="btn btn-danger waves-effect waves-light" id="pat-echo-test" style="padding: 7px 15px;" type="button">Echo</button>
                                    <button class="btn btn-danger waves-effect waves-light" id="pat-ett-test" style="padding: 7px 15px;" type="button">ETT</button>
                                    <button class="btn btn-success btn-md waves-effect waves-light" style="padding: 10px 15px;" type="button">Upload Files</button>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-md-12">
                                    <label class="radio-inline">
                                      <input type="radio" name="optradio" id="prescription_details">Prescription
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="optradio" id="echo_detail">Echo
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="optradio" id="ett_details">ETT
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="optradio" id="sp_inst_details">Special
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="optradio" id="lab_test_detail">Lab Test
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="height:533px;">
                            <div class="row">
                                <div id="re1">
                                    <div class="col-md-12 p-r-0">
                                        <h4 class="text-center"> Click to edit</h4>
                                        <div id="echo_detail_container">

                                        </div>

                                    </div>
                                </div>
                                <div id="re2" class="b-all" style="height:450px;">
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
 <!-- sample modal content -->
    <div id="add-new-patient" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Patient</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="profile_form">
                    	<div class="row">
                    		<div class="col-md-4">
		                        <div class="form-group">
		                            <label for="recipient-name" class="control-label">Name</label>
		                            <input type="text" class="form-control" id="pat_profile_name" placeholder="Enter Name" autocomplete="off" style="text-transform: capitalize;" minlength="3" maxlength="40" required>
		                        </div>
	                        </div>
	                        <div class="col-md-4">
		                        <div class="form-group">
		                            <label for="recipient-name" class="control-label">Father/Wife Name:</label>
		                            <input type="text" class="form-control" id="pat_profile_relative_name" placeholder="Enter Name" autocomplete="off" style="text-transform: capitalize;" maxlength="40" required>
		                        </div>
	                        </div>
	                        <div class="col-md-4">
	                        	<label>Age</label>
	                        	<div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" class="form-control" id="pat_profile_age_digit" maxlength="3" required="required">    
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" id="pat_profile_age">
                                            <option>Years</option>
                                            <option>Months</option>
                                            <option>Days</option>
                                        </select>
                                    </div>
                        		</div>
	                        </div>
	                        <div class="col-md-4">
                        		<div class="form-group">
                        			<label>Profession</label>
                        			<select class="form-control" id="pat_profile_profession" required="required" style="text-transform: capitalize;" >
                        				<option>Select</option>
                        				<?php 
                                            foreach ($professions as $key) {
                                        ?>
                                        <option value="<?php $key['profession_name'] ?>" style="text-transform: capitalize;"><?php echo $key['profession_name'] ?></option>
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
                                    <input type="text" name="" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" id="pat_profile_contact" required="required" maxlength="11" class="form-control" />
                                </div>
                            </div>
                        	<div class="col-md-6">
                        		<div class="form-group">
	                        		<label>Height:</label>
	                        		<input type="text" class="form-control pat_profile_height" onchange="calculateBmiBsa(this)" id="pat_profile_height" name="" placeholder="cm" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" required="required" maxlength="5">
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="form-group">
	                        		<label class="m-l-10">BMI:</label>
	                        		<input type="text" name=""  id="pat_profile_bmi" class="form-control pat_profile_bmi" readonly>
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="form-group">
	                        		<label>Weight:</label>
	                        		<input type="text" class="form-control pat_profile_weight" onchange="calculateBsaBmi(this)" name="" id="pat_profile_weight" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" placeholder="Kg" required="required" maxlength="5">
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="form-group">
	                        		<label class="m-l-10">BSA:</label>
	                        		<input type="text" name="" id="pat_profile_bsa" class="form-control pat_profile_bsa" readonly>
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label for="pat_profile_email" >Email</label>
                        			<input type="email" name="" id="pat_profile_email" class="form-control" required="required" />
                        		</div>
                        	</div>
                        	<div class="col-md-4">
                        		<div class="form-group">
                        			<label>District</label>
                        			<select class="form-control" id="pat_profile_district" style="text-transform: capitalize;">
                        				<option>Select</option>
                        				<?php 
                                            foreach ($districts as $key) {
                                        ?>
                                        <option value="<?php $key['district_name'] ?>" style="text-transform: capitalize;"><?php echo $key['district_name'] ?></option>
                                        <?php } ?>
                        			</select>
                        		</div>
                        	</div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" id="pat_profile_address" required="required" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" id="save_new_profile">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div id="edit_modal">
        
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
    //////////////////////////////initilize datepicker///////////////////////
	    $('.profile_filter').datepicker({
	            format: 'd-M-yyyy'
	    });

        $('.resize1').resizable({
          handles: 'e',
          alsoResizeReverse: '#form'
        });
        $('.resize2').resizable({
          handles: 'e',
          alsoResizeReverse: '#form'
        });

        $('#re1').resizable({
          handles: 'e',
          alsoResizeReverse: '#form'
        });
        $('#re2').resizable({
          handles: 'e',
          alsoResizeReverse: '#form'
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