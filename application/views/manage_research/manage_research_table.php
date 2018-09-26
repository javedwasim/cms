<div class="manage_research_table">
    <table class="table table-bordered nowrap responsive" id="research-table" cellspacing="0" width="100%" >
       <thead>
            <tr>
                <th style="width:30px"></th>
                <th>ProfileID</th>
                <th>Patient Name</th>
                <th>Father/Husband Name</th>
                <th>Height</th>
                <th>Weight</th>
                <th>BSA</th>
                <th>BMI</th>
                <th>Contact</th>
                <th>Profession</th>
                <th>District</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($profiles as $key) { ?>
                <tr>
                    <td style="width: 30px;">
                        <a class="delete-signature btn btn-danger btn-xs" href="javascript:void(0)" title="delete" data-href="<?php echo site_url('manage_research/delete_research_profile/') . $key['id'] ?>">
                           <i class="fa fa-trash" title="Delete"></i>
                        </a>
                    </td>
                    <td class="prof_id"><?php echo $key['id']; ?></td>
                    <td><?php echo $key['pat_name']; ?></td>
                    <td><?php echo $key['pat_relative']; ?></td>
                    <td><?php echo $key['pat_height']; ?></td>
                    <td><?php echo $key['pat_weight']; ?></td>
                    <td><?php echo $key['pat_bsa']; ?></td>
                    <td><?php echo $key['pat_bmi']; ?></td>
                    <td><?php echo $key['pat_contact']; ?></td>
                    <td><?php echo $key['pat_profession']; ?></td>
                    <td><?php echo $key['pat_district']; ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>