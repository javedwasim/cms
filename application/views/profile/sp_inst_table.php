<div class="sp_data_table">
    <table class="table table-bordered nowrap responsive tbl_header_fix_history" cellspacing="0" id="sp-ins-table" width="100%">
        <thead>
            <th class="hide"></th>
            <th style="width: 55px">Action</th>
            <th>Dates</th>
        </thead>
        <tbody style="height:54vh;">

            <?php foreach($sp_info as $sp){?>
                <tr>
                    <td class="hide pat_sp_id"><?php echo $sp['id'];?></td>
                    <td style="width:50px;"><a class="btn btn-success btn-xs" onClick="printsp(this,'<?php echo $sp['id']; ?>','<?php echo $sp['patient_id']; ?>');" ><i class="fa fa-print"></i></td>
                    <td><?php echo date('Y-m-d', strtotime($sp['created_at'])) ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
    