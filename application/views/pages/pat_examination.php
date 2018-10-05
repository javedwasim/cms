<div class="content-wrapper">
    <div class="row p-t-10 m-0">
    	<div class="col-md-5 col-lg-5 p-0">
    		<div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                        	<a class="nav-link active" data-toggle="tab" href="#exe1" role="tab">
                        		<span class="hidden-sm-up"><i class="ti-home"></i></span>
                        		<span class="hidden-xs-down">History</span>
                        	</a>
                        </li>
                        <li class="nav-item">
                        	<a class="nav-link" data-toggle="tab" href="#exe2" role="tab">
                        		<span class="hidden-sm-up"><i class="ti-user"></i></span>
                        		<span class="hidden-xs-down">Examination</span>
                        	</a>
                        </li>
                        <li class="nav-item">
                        	<a class="nav-link" data-toggle="tab" href="#exe3" role="tab">
                        		<span class="hidden-sm-up"><i class="ti-user"></i></span>
                        		<span class="hidden-xs-down">Investigation</span></a>
                        </li>
                        <li class="nav-item">
                        	<a class="nav-link" data-toggle="tab" href="#exe4" role="tab">
                        		<span class="hidden-sm-up"><i class="ti-user"></i></span>
                        		<span class="hidden-xs-down">Medicine</span>
                        	</a>
                        </li>
                        <li class="nav-item">
                        	<a class="nav-link" data-toggle="tab" href="#exe5" role="tab">
                        		<span class="hidden-sm-up"><i class="ti-user"></i></span>
                        		<span class="hidden-xs-down">Test Advice</span>
                        	</a>
                        </li>
                        <li class="nav-item">
                        	<a class="nav-link" data-toggle="tab" href="#exe6" role="tab">
                        		<span class="hidden-sm-up"><i class="ti-user"></i></span>
                        		<span class="hidden-xs-down">Instructions</span>
                        	</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane active pro-div" id="exe1" role="tabpanel">
                        	<div class="row m-0">
                        		<div class="col-md-5 p-0">
	                        		<div class="card">
						    			<div class="card-body" id="profile_history_container">
						    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>Category Name</th>
						                        </tr>
							                    </thead>
							                    <tbody>
                                                    <?php foreach ($history_category as $category): ?>
                                                        <tr>
                                                            <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
                                                            <td><?php echo $category['name']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
							                    </tbody>
							                </table>
						    			</div>
		    						</div>
	                        	</div>
	                        	<div class="col-md-7 p-0">
	                        		<div class="card">
	                        			<div class="card-body" id="profile_history_item_container">
	                        				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>items</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CVS</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>Chest</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>Abdomen</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CNS</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>GPE</td>
						                            </tr>
							                    </tbody>
							                </table>
	                        			</div>
	                        		</div>
	                        	</div>
                        	</div>
                        </div>
                        <div class="tab-pane pro-div" id="exe2" role="tabpanel">
                        	<div class="row m-0">
                        		<div class="col-md-12 p-0">
	                        		<div class="card">
	                        			<div class="card-header">
	                        				<div class="row">
						    					<div class="col-lg-2 col-md-4" >
						    						<div class="form-group">
							    						<label>Pluse:</label>
								    					<input type="text" class="form-control" value="0" name="" >
							    					</div>
							    				</div>
							    				<div class=" col-lg-3 col-md-4" >
						    						<div class="form-group">
							    						<label>Normal Volume:</label>
								    					<select class="form-control">
								    						<option>Select</option>
							    						</select>
							    					</div>
							    				</div>
							    				<div class="col-lg-3 col-md-4 p-0">
							    					<label>BP:</label>
								    				<div class="form-group" style="display: inline-flex;">
								    					<input type="text" class="form-control" value="0" name="" >
								    					<label>/</label>
								    					<input type="text" class="form-control" value="0" name="" >
													</div>
						    					</div>
						    					<div class="col-lg-3 col-md-3">
						    						<div class="form-group">
						    							<label>Resp. Rate:</label>
						    							<input type="text" class="form-control" value="0" name="" >
							    					</div>
						    					</div>
						    					<div class="col-lg-2 col-md-3 ">
						    						<div class="form-group">
						    							<label>Temprature:</label>
						    							<input type="text" class="form-control" value="0" name="" >
							    					</div>
						    					</div>
						    					<div class="col-lg-2 col-md-3 ">
						    						<div class="form-group">
						    							<label>height:</label>
						    							<input type="text" class="form-control" value="158" name="" >
							    					</div>
						    					</div>
						    					<div class="col-lg-2 col-md-3 ">
						    						<div class="form-group">
						    							<label>Weight:</label>
						    							<input type="text" class="form-control" value="65" name="" >
							    					</div>
						    					</div>
						    					<div class="col-lg-2 col-md-3 ">
						    						<div class="form-group">
						    							<label>BMI:</label>
						    							<input type="text" class="form-control" value="26.04" name="" readonly="readonly">
							    					</div>
						    					</div>
						    					<div class="col-lg-2 col-md-3 ">
						    						<div class="form-group">
						    							<label>BSA:</label>
						    							<input type="text" class="form-control" value="1.69" name="" readonly="readonly">
							    					</div>
						    					</div>
					    					</div>
	                        			</div>
						    			<div class="card-body">
						    				<div class="row">
						    					<div class="col-lg-3 col-md-4" id="profile_examination_container">
							    					<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
								                       <thead>
								                        <tr>
								                            <th>Category Name</th>
								                        </tr>
									                    </thead>
									                    <tbody>
								                            <tr>
								                                <td>CVS</td>
								                            </tr>

									                    </tbody>
									                </table>
							    				</div>
							    				<div class="col-lg-9 col-md-8" id="patient_examination_item_container">
							    					<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
								                       <thead>
								                        <tr>
								                            <th style="width: 10%"></th>
								                            <th>Category Name</th>
								                        </tr>
									                    </thead>
									                    <tbody>
								                            <tr>
								                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
								                                <td>CVSdddd</td>
								                            </tr>
								                            <tr>
								                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
								                                <td>Chest</td>
								                            </tr>
								                            <tr>
								                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
								                                <td>Abdomen</td>
								                            </tr>
								                            <tr>
								                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
								                                <td>CNS</td>
								                            </tr>
								                            <tr>
								                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
								                                <td>GPE</td>
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
                        <div class="tab-pane pro-div" id="exe3" role="tabpanel">
                        	<div class="row m-0">
                        		<div class="col-md-5 p-0">
	                        		<div class="card">
						    			<div class="card-body" id="investigation_category_container">
						    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>Category Name</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CVS</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>Chest</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>Abdomen</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CNS</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>GPE</td>
						                            </tr>
							                    </tbody>
							                </table>
						    			</div>
		    						</div>
	                        	</div>
	                        	<div class="col-md-7 p-0">
	                        		<div class="card">
	                        			<div class="card-body" id="investigation_category_item_container">
	                        				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>items</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CVS</td>
						                            </tr>

							                    </tbody>
							                </table>
	                        			</div>
	                        		</div>
	                        	</div>
                        	</div>
                        </div>
                        <div class="tab-pane pro-div" id="exe4" role="tabpanel">
                        	<div class="row m-0">
                        		<div class="col-md-4 p-0">
	                        		<div class="card">
						    			<div class="card-body" id="medicine_category_container">
						    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>Category Name</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CVS</td>
						                            </tr>

							                    </tbody>
							                </table>
						    			</div>
		    						</div>
	                        	</div>
	                        	<div class="col-md-3 p-0">
	                        		<div class="card">
	                        			<div class="card-body" id="medicine_category_item_container">
	                        				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>Medicine</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CVS</td>
						                            </tr>
							                    </tbody>
							                </table>
	                        			</div>
	                        		</div>
	                        	</div>
	                        	<div class="col-md-5 p-0">
	                        		<div class="card">
	                        			<div class="card-body" id="medicine_dosage_container">
	                        				<table class="table table-bordered nowrap responsive right-table" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th>Dosage</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td>CVS</td>
						                            </tr>

							                    </tbody>
							                </table>
	                        			</div>
	                        		</div>
	                        	</div>
                        	</div>
                        </div>
                        <div class="tab-pane pro-div" id="exe5" role="tabpanel">
                        	<div class="row m-0">
                        		<div class="col-md-5 p-0">
	                        		<div class="card">
						    			<div class="card-body" id="advice_category_container">
						    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>Category Name</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CVS</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>Chest</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>Abdomen</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CNS</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>GPE</td>
						                            </tr>
							                    </tbody>
							                </table>
						    			</div>
		    						</div>
	                        	</div>
	                        	<div class="col-md-7 p-0">
	                        		<div class="card">
	                        			<div class="card-body" id="advice_category_item_container">
	                        				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>items</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CVSdddd</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>Chest</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>Abdomen</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CNS</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>GPE</td>
						                            </tr>
							                    </tbody>
							                </table>
	                        			</div>
	                        		</div>
	                        	</div>
                        	</div>
                        </div>
                        <div class="tab-pane pro-div" id="exe6" role="tabpanel">
                        	<div class="row m-0">
                        		<div class="col-md-5 p-0">
	                        		<div class="card">
						    			<div class="card-body" id="instruction_category_container">
						    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>Category Name</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CVS</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>Chest</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>Abdomen</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CNS</td>
						                            </tr>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>GPE</td>
						                            </tr>
							                    </tbody>
							                </table>
						    			</div>
		    						</div>
	                        	</div>
	                        	<div class="col-md-7 p-0">
	                        		<div class="card">
	                        			<div class="card-body" id="instruction_category_item_container">
	                        				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th style="width: 10%"></th>
						                            <th>items</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
						                                <td>CVS</td>
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
            </div>
    	</div>
    	<div class="col-md-7 col-lg-7 p-0">
    		<div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin-bottom: 0px !important;">
                        <div class="card-header">Patient Information</div>
                        <div class="card-body">
                            <div class="row" id="pat_ett_information">

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body" style="height:533px;">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 p-0">
                                	<div class="card">
						    			<div class="card-body">
						    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th>Medicine</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td>CVS</td>
						                            </tr>
						                            <tr>
						                                <td>Chest</td>
						                            </tr>
						                            <tr>
						                                <td>Abdomen</td>
						                            </tr>
						                            <tr>
						                                <td>CNS</td>
						                            </tr>
						                            <tr>
						                                <td>GPE</td>
						                            </tr>
							                    </tbody>
							                </table>
						    			</div>
		    						</div>
                                </div>
                                <div class="col-lg-4 col-md-4 p-0">
                                	<div class="card">
						    			<div class="card-body">
						    				<table class="table table-bordered nowrap responsive right-table" cellspacing="0" id="" width="100%" >
						                       <thead>
						                        <tr>
						                            <th>Dosage</th>
						                        </tr>
							                    </thead>
							                    <tbody>
						                            <tr>
						                                <td>CVS</td>
						                            </tr>
						                            <tr>
						                                <td>Chest</td>
						                            </tr>
						                            <tr>
						                                <td>Abdomen</td>
						                            </tr>
						                            <tr>
						                                <td>CNS</td>
						                            </tr>
						                            <tr>
						                                <td>GPE</td>
						                            </tr>
							                    </tbody>
							                </table>
						    			</div>
		    						</div>
                                </div>
                                <div class="col-lg-4 col-md-4 p-0">
                                	<div class="row">
                                		<div class="col-md-12 p-0">
                                			
                                		</div>
                                		<div class="col-md-12 p-0">
                                			
                                		</div>
                                		<div class="col-md-12 p-0">
                                			
                                		</div>
                                		<div class="col-md-12 p-0">
                                			
                                		</div>
                                		<div class="col-md-12 p-0">
                                			
                                		</div>
                                	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                    	<div class="card-body">
                    		<div class="row">
                            	<div class="col-md-7">
                            		<div class="form-group show-inline m-t-10">
                            			<label>Nest Visit Date:</label>
                            			<input type="text" name="" class="app_date form-control col-md-7" value="<?php echo date('d-M-Y') ?>" >
                            		</div>
                            	</div>
                            	<div class="col-md-5">
                            		<button class="btn btn-primary btn-md waves-effect waves-light" style="padding: 10px 15px;" type="button">Sp. Instructions</button>
                                    <button class="btn btn-info btn-md waves-effect waves-light" style="padding: 10px 10px;" type="button">Lab. Test</button>
                                    <button class="btn btn-primary btn-md waves-effect waves-light" style="padding: 10px 15px;" type="button">Save</button>
                            	</div>
                            </div>
                    	</div>
                    </div>
                </div>    
            </div>
    	</div>
    </div>
</div>