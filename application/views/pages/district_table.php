<div class="district_content">
    <table class="table table-bordered nowrap responsive" cellspacing="0" width="100%" >
        <thead>
            <tr>
                <th>Districts</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($districts as $key) {
            ?>
            <tr>
                <td><?php echo $key['district_name']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>