<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th style="width: 20px"></th>
        <th style="width: 20px"></th>
        <th style="width: 20px"></th>
        <th style="width: 50px;">ETT Date</th>
    </tr>
    </thead>
        <tbody>
            <?php foreach ($details as $detail): ?>
                <tr>
                    <td style="width: 20px"><i class="fa fa-trash"></i></td>
                    <td style="padding: 0px;">
                        <button class="btn btn-info btn-xs" onClick="showEditEttDetail(this,'<?php echo $detail['id']; ?>','<?php echo $detail['patient_id']; ?>');" style="margin: 0px;"><i class="fa fa-edit" id="echo_detail_btn"></i></button>
                    </td>
                    <td style="width: 20px"><a class="btn btn-success btn-xs" onClick="printEtt(this,'<?php echo $detail['id']; ?>','<?php echo $detail['patient_id']; ?>');" style="margin: 0px;" href="javascript:void(0)"><i class="fa fa-print"></i></a></td>
                    <td style="width: 100px;"><?php echo date('Y-m-d',strtotime($detail['created_at'])) ?></td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>