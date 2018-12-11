<div class="row" style="margin-top: 50px;">
    <div class="col-md-12">
        <h2 style="text-align: center;">Lab Test Report</h2>
    </div>
</div>
<br>
<div class="row" style="width: 99%; background: #90addd; border-top: 2px solid #000; border-bottom: 2px solid #000; border-left: 2px dotted #000; border-right: 2px dotted #000; padding-top: 10px; padding-left: 10px; padding-bottom: 10px;">
    <div class="col-md-6">
        <strong>Ref.ID</strong>
        <i><?php echo $patient_info->id ?></i>
        <strong style="margin-left: 10px"><?php echo $patient_info->pat_name ?></strong>
    </div>
    <div class="col-md-4">
        <strong>
            <?php $age = preg_split('#(?<=\d)(?=[a-z])#i', $patient_info->pat_age); echo $age[0]; 
                echo " ";
            ?>
        </strong>
        <label><?php echo $age[1]; ?></label>
        <label style="margin-right: 20px; text-transform: capitalize;"><?php echo $patient_info->pat_sex ?></label>
    </div>
    <div class="col-md-2">
        <label><?php echo date('d-M-Y');?></label>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6" style="padding-left: 0px;">
        <table class="table table-bordered">
            <thead style="background: #90addd;">
                <tr>
                    <th>Test Parameters</th>
                    <th>Results</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><strong ><?php echo $item['item_value']; ?></strong>&nbsp;&nbsp;<?php echo $item['item_units']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-6" style="padding-right: 0px;">
        <table class="table table-bordered" style="height: 500px;">
            <thead style="background: #90addd;">
                <tr>
                    <th>Test Parameters</th>
                    <th>Results</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>