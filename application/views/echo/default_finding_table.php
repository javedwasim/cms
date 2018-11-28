<table class="table table-bordered nowrap responsive default_finding_table tbl_header_fix_350" cellspacing="0" id="default_finding_tbl" width="100%" >
    <thead>
    <tr>
        <th style="width:70px;">Action</th>
        <th >Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($findings as $finding):  ?>
        <tr class="table-row">
            <td style="width: 70px">
                <label class="btn btn-xs btn-primary active" style="padding: 10px 5px 5px 10px;">
                    <input type="radio" name="finding_radio" class="finding_radio"
                           data-finding-id="<?php echo $finding['id']; ?>"
                           data-structure-id="<?php echo $finding['structure_id']; ?>"
                           value="<?php echo $finding['id']; ?>"
                           autocomplete="off" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';"
                           <?php echo $finding['disease_id']>0?'checked':''; ?>>
                </label>
            </td>
            <td>
              <?php echo $finding['name']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
  $("#default_finding_tbl tbody tr td:nth-child(2)").click(function (e) {
      $('#default_finding_tbl tbody tr td:nth-child(2).row_selected').removeClass('row_selected');
      $(this).addClass('row_selected');
  });
</script>