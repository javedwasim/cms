<div class="sp_data_table">
    <table class="table table-bordered nowrap responsive" cellspacing="0" id="" width="100%">
        <thead>
        <th style="width: 20px"></th>
        <th>Dates</th>
        </thead>
        <tbody>
            <?php foreach($sp_info as $sp){?>
                <tr>
                    <td data-sp-info-id="<?php echo $sp['id'];?>"><i class="fa fa-print"></i></td>
                    <td><?php echo date('Y-m-d', strtotime($sp['created_at'])) ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
    