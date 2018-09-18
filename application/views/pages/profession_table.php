<div class="profession_table">
    <table class="table table-bordered nowrap responsive" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th style="width: 10%"></th>
                <th>Profession</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($professions as $key) {
            ?>
            <tr>
                <td><i class="fa fa-trash"></i></td>
                <td style="text-transform: capitalize;"><?php echo $key['profession_name']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
    