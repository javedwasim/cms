<div class="row m-0">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <h4 style="text-align: center;">Shahadat Clinic</h4>
                <hr>
                <h6 style="text-align: center;">Lab Test Repot</h6>
            </div>
        </div>
        <br>
        <div class="row border border-dark">
            <div class="col-md-4">
                <label class="report-font">Ref.ID</label>
                <strong class="report-font"><?php echo $patient_info->id ?></strong>
            </div>
            <div class="col-md-4">
                <label class="report-font"><?php echo $patient_info->pat_age ?></label>
                <label class="report-font"><?php echo $patient_info->pat_sex ?></label>
            </div>
            <div class="col-md-4">
                <label class="report-font"><?php echo date('d-M-Y');?></label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6" style="padding-left: 0px;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Test Parameters</th>
                            <th>Results</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td class="report-font"><?php echo $item['name']; ?></td>
                                <td><strong class="report-font" style="text-decoration-line: underline; text-decoration-style: dotted;"><?php echo $item['item_value']; ?></strong>&nbsp;&nbsp;<?php echo $item['item_units']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6" style="padding-right: 0px;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Test Parameters</th>
                            <th>Results</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="report-font"></td>
                            <td class="report-font"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row footer-bottom" style="border-top:1px solid #ddd;">
            <div class="col-md-12">
                <br>
                <p style="text-align: center;" class="report-font">Shahadat Clinic: 14-B Medical Colony Bahawalpur. Phone: 0322-6526467</p>
            </div>
        </div>
    </div>
</div>
