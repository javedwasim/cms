<table class="table table-bordered nowrap responsive tbl_header_fix_history" cellspacing="0" id="lab_test_tbl" width="100%">
  <thead>
  <tr>
      <th style="width:100px">Action</th>
      <th>Item Name</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($tests as $test): ?>
      <tr id="<?php echo $test['id']; ?>">
          <td style="width:95px; word-break: break-all;" data-toggle="modal" data-target="#history-modal">
              <a class="delete-lab-test btn btn-danger btn-xs"
                 href="javascript:void(0)" title="delete"
                 data-href="<?php echo site_url('setting/delete_lab_test/').$test['id'].'/'.$test['lab_category_id'] ?>">
                  <i class="fa fa-trash" title="Delete"></i>
              </a>
              <a class="edit-lab-test-btn btn btn-info btn-xs"
                 href="javascript:void(0)"
                 data-lab-test-id="<?php echo $test['id']; ?>"><i
                 class="far fa-question-circle"></i>
              </a>
          </td>
          <td style="word-break: break-all;"class="exam_cate">
              <input type="text" class="form-control border-0 bg-transparent shadow-none" readonly="true" ondblclick="this.readOnly='';" onfocusout="this.readOnly='readonly';" name="lab-cat" value="<?php echo $test['name']; ?>" onchange="saveTestDescription(this,'test_name','<?php echo $test['id']; ?>')">        
          </td>
      </tr>
  <?php endforeach; ?>
  </tbody>
</table>