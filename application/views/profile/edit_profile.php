<div class="edit_modal">
    <div id="update_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                                    <input type="text" class="form-control" id="updat_pat_profile_name" placeholder="Enter Name" autocomplete="off" value="<?php echo $profile_data->pat_name; ?>" style="text-transform: capitalize;" maxlength="40" required="required">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Father/Wife Name:</label>
                                    <input type="text" class="form-control" id="updat_pat_profile_relative_name" placeholder="Enter Name" autocomplete="off" value="<?php echo $profile_data->pat_relative ; ?>" style="text-transform: capitalize;" maxlength="40" required="required">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Age</label>
                                <div style="display: inline-flex;">
                                    <?php $age = (int) filter_var($profile_data->pat_age, FILTER_SANITIZE_NUMBER_INT); ?>
                                    <input type="text" name="" value="<?php echo $age ; ?>" class="form-control" id="updat_pat_profile_age_digit" required="required">
                                    <select class="form-control" id="updat_pat_profile_age">
                                        <option>Years</option>
                                        <option>Months</option>
                                        <option>Days</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Profession</label>
                                    <select class="form-control" id="updat_pat_profile_profession" required="required" style="text-transform: capitalize;" >
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
                                    <?php if($profile_data->pat_sex=='male'){ ; ?>
                                    <label class="radio-inline"><input type="radio" name="pat_sex"  value="male" class="pat_profile_sex" checked="checked">Male</label>
                                    <label class="radio-inline"><input type="radio" name="pat_sex"  value="female" class="pat_profile_sex">Female</label>
                                    <label class="radio-inline"><input type="radio" name="pat_sex"  value="other" class="pat_profile_sex">Other</label>
                                <?php }?>
                                <?php if($profile_data->pat_sex=='female'){ ; ?>
                                    <label class="radio-inline"><input type="radio" name="pat_sex"  value="male" class="pat_profile_sex" >Male</label>
                                    <label class="radio-inline"><input type="radio" name="pat_sex"  value="female" class="pat_profile_sex" checked="checked">Female</label>
                                    <label class="radio-inline"><input type="radio" name="pat_sex"  value="other" class="pat_profile_sex">Other</label>
                                <?php }?>
                                <?php if($profile_data->pat_sex=='other'){ ; ?>
                                    <label class="radio-inline"><input type="radio" name="pat_sex"  value="male" class="pat_profile_sex" >Male</label>
                                    <label class="radio-inline"><input type="radio" name="pat_sex"  value="female" class="pat_profile_sex">Female</label>
                                    <label class="radio-inline"><input type="radio" name="pat_sex"  value="other" class="pat_profile_sex" checked="checked">Other</label>
                                <?php }?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="number" name="" id="updat_pat_profile_contact" value="<?php echo $profile_data->pat_contact ; ?>" required="required" maxlength="11" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Height:</label>
                                    <input type="number" class="form-control" id="updat_pat_profile_height" value="<?php echo $profile_data->pat_height ; ?>" placeholder="cm" required="required" maxlength="5">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="m-l-10">BMI:</label>
                                    <input type="text" value="<?php echo $profile_data->pat_bmi ; ?>"  id="updat_pat_profile_bmi" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Weight:</label>
                                    <input type="text" class="form-control" value="<?php echo $profile_data->pat_weight ; ?>" id="updat_pat_profile_weight" placeholder="Kg" required="required" maxlength="5">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="m-l-10">BSA:</label>
                                    <input type="text" value="<?php echo $profile_data->pat_bsa ; ?>" id="updat_pat_profile_bsa" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pat_profile_email" >Email</label>
                                    <input type="email" value="<?php echo $profile_data->pat_email ; ?>" id="updat_pat_profile_email" class="form-control" required="required" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>District</label>
                                    <select class="form-control" id="updat_pat_profile_district" style="text-transform: capitalize;">
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
                                    <textarea class="form-control" id="updat_pat_profile_address" required="required" rows="2"><?php echo $profile_data->pat_address ; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" id="update_profile">update</button>
                </div>
            </div>
        </div>
    </div>
</div>
    