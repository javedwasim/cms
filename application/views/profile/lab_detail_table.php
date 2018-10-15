<table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%" >
    <thead>
    <tr>
        <th style="width: 20px"></th>
        <th style="width: 20px"></th>
        <th style="width: 20px"></th>
        <th style="width: 50px;">Test Date</th>
    </tr>
    </thead>
        <tbody>
            <?php foreach ($details as $detail): ?>
                <tr>
                    <td style="width: 20px"><a href="javascript:void(0)" class="btn btn-danger btn-xs"  onClick="deletelabtestDetail(this,'<?php echo $detail['info_key']; ?>','<?php echo $detail['patient_id']; ?>');"><i class="fa fa-trash"></i></a></td>
                    <td>
                        <a href="javascript:void(0)" contenteditable="true"
                        onClick="showEditLabDetail(this,'<?php echo $detail['info_key']; ?>','<?php echo $detail['patient_id']; ?>');"><i class="fa fa-edit" ></i></a>
                    </td>
                    <td style="width: 20px"><a class="btn btn-success btn-xs" onClick="printlabtest(this,'<?php echo $detail['info_key']; ?>','<?php echo $detail['patient_id']; ?>');" style="margin: 0px;" href="javascript:void(0)"><i class="fa fa-print"></i></a></td>
                    <td style="width: 100px;"><?php echo date('Y-m-d',strtotime($detail['created_at'])) ?></td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>