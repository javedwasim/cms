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
                    <td contenteditable="true"
                        onClick="showEditEchoDetail(this,'<?php echo $detail['id']; ?>','<?php echo $detail['patient_id']; ?>');">
                        <i class="fa fa-edit" id="echo_detail_btn"></i>
                    </td>
                    <td style="width: 20px"><i class="fa fa-print"></i></td>
                    <td style="width: 50px;"><?php echo date('Y-m-d',strtotime($detail['created_at'])) ?></td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>