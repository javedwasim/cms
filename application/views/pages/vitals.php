<div class="dashboard-content" style="margin: 0 .5%;">
    <div class="row page-titles">
        <div class="col-md-5" style="display: inline-flex;">
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">vitals</li>
            </ol>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                Patient Name
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 m-t-10 m-b-10">
                        <form name="search-by-name" id="search-by-name" method="get" action="#">
                            <select class="patName-select form-control" name="search_by_cnic"
                                    style="width: 100%;" tabindex="4">
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">Vitals Chart</h3>
                    </div>
                    <div class="col-md-2 offset-5" style="margin-right:5px;">
                        <button type="button" class="btn btn-block btn-primary " id="btn-print-vital">Print Sheet</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12" >
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        Serial#
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        Date &amp; Time
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        B.P SYS
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        B.P DIA
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        Pulse Rate
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">
                                        Body Temperature
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">
                                        Resperatory Rate
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">
                                        Vitals Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr >
                                    <td contenteditable="true" >1</td>
                                    <td contenteditable="true" ></td>
                                    <td contenteditable="true" ></td>
                                    <td contenteditable="true" ></td>
                                    <td contenteditable="true" ></td>
                                    <td contenteditable="true" ></td>
                                    <td contenteditable="true" ></td>
                                    <td style="display: inline-flex;">
                                        <button class="btn btn-default delete-vital">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        <br />
                                        <button class="btn btn-default update-vital ">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr >
                                    <td contenteditable="true" >2</td>
                                    <td contenteditable="true" ></td>
                                    <td contenteditable="true" ></td>
                                    <td contenteditable="true" ></td>
                                    <td contenteditable="true" ></td>
                                    <td contenteditable="true" ></td>
                                    <td contenteditable="true" ></td>
                                    <td style="display: inline-flex;">
                                        <button class="btn btn-default delete-vital">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        <br />
                                        <button class="btn btn-default update-vital ">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

