<div class="profile-table">
    <table class="table table-bordered profiletable" cellspacing="0" id="" width="100%" >
       <thead>
        <tr>
            <th style="width: 20px">Delete</th>
            <th style="width: 20px">Edit</th>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Father/Husband Name</th>
            <th>Contact</th>
            <th>Profession</th>
            <th>District</th>
            <th>Last Visit</th>
            <th>Registered Since</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($profiles as $key){ ?>
            <tr>
                <td style="width: 20px"><button class="btn btn-danger btn-xs" id="delete_profile"><i class="fa fa-trash"></i></button></td>
                <td style="width: 20px"><i class="fa fa-edit"></i></td>
                <td class="profile_id"><?php echo $key['id']; ?></td>
                <td><?php echo $key['pat_name']; ?></td>
                <td><?php echo $key['pat_relative']; ?></td>
                <td><?php echo $key['pat_contact']; ?></td>
                <td><?php echo $key['pat_profession']; ?></td>
                <td><?php echo $key['pat_district']; ?></td>
                <td><?php echo $key['creation_date']; ?></td>
                <td><?php echo $key['creation_date']; ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
    