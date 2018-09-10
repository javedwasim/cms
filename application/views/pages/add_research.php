<div class="dashboard-content">
    <div class="row p-t-10 m-0">
        <div class="col-md-12">
            <div class="card">
            	<div class="card-header">
            		<div class="row">
    					<div class="col-md-6">
	    					<label>Research Name</label>
	    					<input type="text" class="form-control col-md-6" name="" >
	    					<button class="btn btn-primary">Add New</button>
    					</div>
    				</div>
            	</div>
                <div class="card-body">
                    <table class="table table-bordered nowrap responsive" cellspacing="0" width="100%" >
                       <thead>
                            <tr>
                                <th style="width: 10%"></th>
                                <th>Research Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
                                <td>Cholestrol and Egg</td>
                            </tr>
                            <tr>
                                <td style="width: 10%" data-toggle="modal" data-target="#history-modal"><i class="far fa-question-circle"></i></td>
                                <td>Egg</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
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