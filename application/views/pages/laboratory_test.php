<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
            	<div class="card-header">
            		Patient's Examination Settings
            	</div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#category" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Category</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tests" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Tests</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tests-items" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Test Items</span></a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane active" id="category" role="tabpanel">
                            <div class="card">
				    			<div class="card-header" style="display: inline-flex;">
				    				<div class="row">
				    					<div class="col-md-12">
					    					<label>New Category</label>
					    					<input type="text" class="form-control col-md-6" name="" >
					    					<button class="btn btn-primary">Add</button>
				    					</div>
				    				</div>
				    			</div>
				    			<div class="card-body">
				    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
				                       <thead>
				                        <tr>
				                            <th style="width: 10%">Delete</th>
				                            <th style="width: 10%">Discription</th>
				                            <th>Category Name</th>
				                        </tr>
					                    </thead>
					                    <tbody>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>CVS</td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>Chest</td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>Abdomen</td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>CNS</td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>GPE</td>
				                            </tr>
					                    </tbody>
					                </table>
				    			</div>
    						</div>
                        </div>
                        <div class="tab-pane" id="tests" role="tabpanel">
                        	<div class="card">
				    			<div class="card-header">
				    				<div class="row">
				    					<div class="col-lg-2 col-md-3" >
				    						<div class="form-group">
					    						<label>Test Name:</label>
						    					<input type="text" class="form-control" name="" >
					    					</div>
					    				</div>
					    				<div class=" col-lg-3 col-md-4" >
				    						<div class="form-group">
					    						<label>Category:</label>
						    					<select class="form-control">
						    						<option>Select</option>
						    						<option>GIT Problem</option>
						    						<option>Co-Resp</option>
					    						</select>
					    					</div>
					    				</div>
					    				<div class="col-lg-2 col-md-4 p-0">
						    				<div class="form-group m-t-25">
						    					<button class="btn btn-sm btn-primary">Add</button>
											</div>
				    					</div>
				    					<div class="col-lg-3 col-md-4">
				    						<div class="form-group ">
				    							<label>Select Category:</label>
						    					<select class="form-control">
						    						<option>Select</option>
						    						<option>GIT Problem</option>
						    						<option>Co-Resp</option>
					    						</select>
					    					</div>
				    					</div>
			    					</div>
				    			</div>
				    			<div class="card-body">
				    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
				                       <thead>
				                        <tr>
				                            <th style="width: 10%">Delete</th>
				                            <th style="width: 10%">Discription</th>
				                            <th>Item Name</th>
				                        </tr>
					                    </thead>
					                    <tbody>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>Rist Factor</td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>GIT Problem</td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>Co-Resp</td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>Co-GIT</td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>Co-CNS</td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>Co-CVS</td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>Respitatory Problems</td>
				                            </tr>
					                    </tbody>
					                </table>
				    			</div>
    						</div>
                        </div>
                        <div class="tab-pane" id="tests-items" role="tabpanel">
                        	<div class="card">
				    			<div class="card-header">
				    				<div class="row">
				    					<div class="col-lg-2 col-md-3" >
				    						<div class="form-group">
					    						<label>Item Name:</label>
						    					<input type="text" class="form-control" name="" >
					    					</div>
					    				</div>
					    				<div class="col-lg-2 col-md-3" >
				    						<div class="form-group">
					    						<label>Units:</label>
						    					<input type="text" class="form-control" name="" >
					    					</div>
					    				</div>
					    				<div class=" col-lg-3 col-md-4" >
				    						<div class="form-group">
					    						<label>Test:</label>
						    					<select class="form-control">
						    						<option>Select</option>
						    						<option>GIT Problem</option>
						    						<option>Co-Resp</option>
					    						</select>
					    					</div>
					    				</div>
					    				<div class="col-lg-2 col-md-4 p-0">
						    				<div class="form-group m-t-25">
						    					<button class="btn btn-sm btn-primary">Add</button>
											</div>
				    					</div>
				    					<div class="col-lg-3 col-md-4">
				    						<div class="form-group ">
				    							<label>Select Category:</label>
						    					<select class="form-control">
						    						<option>Select</option>
						    						<option>GIT Problem</option>
						    						<option>Co-Resp</option>
					    						</select>
					    					</div>
				    					</div>
			    					</div>
				    			</div>
				    			<div class="card-body">
				    				<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
				                       <thead>
				                        <tr>
				                            <th style="width: 10%">Delete</th>
				                            <th style="width: 10%">Discription</th>
				                            <th>Item Name</th>
				                            <th>Units</th>
				                        </tr>
					                    </thead>
					                    <tbody>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>PT/Control</td>
				                                <td>Sec</td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>INR</td>
				                                <td></td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>Bleeding time</td>
				                                <td>3-5 min</td>
				                            </tr>
				                            <tr>
				                                <td style="width: 10%"><i class="fa fa-trash"></i></td>
				                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
				                                <td>Co-GIT</td>
				                                <td></td>
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
                <!-- row -->

                <!-- modal content -->
    <div id="history-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Discription</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                        	<label>Risk Factor and Cardiac Problems</label>
                            <textarea class="form-control" rows="3">
                            	
                            </textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>