 <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>New Appointment</h3>
            </div>
            <div class="row">
                <div class="col-md-12" id="appointment_sidebar">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">       
                                <form id="appointment_booking_form" method="post" role="form"
                                      data-action="<?php echo site_url('user/book_appointment') ?>" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="full_name">Patient Name</label>
                                                    <input type="text" id="full_name" name="pat_name" placeholder="Full Name" class="form-control" maxlength="20" autofocus required="required" autocomplete="off">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cell_num">Cell Number</label>
                                                    <input type="text" id="cell_num" name="contact_number" placeholder="Cell Number" class="form-control" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" maxlength="11" required="required" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="app_date">App. Date</label>
                                                    <input type="text" value="<?php echo date('Y-m-d')?>" id="app_date" class="form-control"  name="appointment_date" required="required">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="consultant_fee"> Consultation Fee</label>
                                                    <input type="text" id="consultant_fee" name="consultant_fee" placeholder="Enter Fee" class="form-control" onkeypress="return /\d/.test(String.fromCharCode(((event || window.event).which || (event || window.event).which)));" maxlength="4" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    <button type="button" name="book_appointment" id="book_appointment" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Page Content Holder -->
        <div style="padding: 2px 18px;transition: all 0.3s;" id="content" >