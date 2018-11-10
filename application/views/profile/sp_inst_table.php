<div class="sp_data_table" style="height: 60vh; overflow-y: scroll;">
    <table class="table table-bordered nowrap responsive" cellspacing="0" id="sp-ins-table" width="100%">
        <thead>
            <th class="hide"></th>
            <th style="width: 20px">Action</th>
            <th>Dates</th>
        </thead>
        <tbody>

            <?php foreach($sp_info as $sp){?>
                <tr>
                    <td class="hide pat_sp_id"><?php echo $sp['id'];?></td>
                    <td><a class="btn btn-success btn-xs" onClick="printsp(this,'<?php echo $sp['id']; ?>','<?php echo $sp['patient_id']; ?>');" ><i class="fa fa-print"></i></td>
                    <td><?php echo date('Y-m-d', strtotime($sp['created_at'])) ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
    