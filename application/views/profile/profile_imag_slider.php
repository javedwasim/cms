<?php if(isset($files)){?>
    <?php $i=0; foreach($files as $file){
        $imagename = $file['file_name'];
        $exp = explode(".", $imagename);
        $ext = end($exp);
        if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {
    ?>  
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><?php echo date('Y-m-d',strtotime($file['created_at']))?></td>
                    <td>
                        <a  href="javascript:void(0)" onclick="showimg('<?php echo $file['patient_id']; ?>')">
                            <img class="d-block" height="25px" width="25px;" src="<?php echo base_url(); ?>/assets/uploads/itemfiles/<?php echo $imagename; ?>" alt="First slide">
                        </a>
                    </td>
                    <td><a href="javascript:void(0);" onclick="deleteimage('<?php echo $file['id']; ?>','<?php echo $file['patient_id']; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
                </tr>
            </tbody>
        </table>
    <?php $i++; }else{ echo  "";} }?>
 <?php } ?>
<?php
    if(isset($files)){
    foreach($files as $file){
    $filename = $file['file_name'];
    $exp = explode(".", $filename);
    $ext = end($exp);
    if ($ext == 'pdf' || $ext == 'PDF') {
?>
    <table class="table table-bordered" id="pdf_tbl">
        <thead>
            <tr>
                <td>
                    <?php echo date('Y-m-d',strtotime($file['created_at']))?>
                </td>
                <td style="font-size: 18px;">
                    <a href="javascript:void(0);" onclick="showpdf('<?php echo $file['patient_id']; ?>')"><i class="fas fa-file-pdf" style="color: #910000;"></i></a>
                </td>
                <td>
                    <a href="javascript:void(0);" onclick="deletepdf('<?php echo $file['id']; ?>','<?php echo $file['patient_id']; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        </thead>
    </table>
<?php }
    }
}
?>
<?php $i=0; 
if(isset($files)){ 
    foreach($files as $file){
        $filename = $file['file_name'];
        $exp = explode(".", $filename);
        $ext = end($exp);
        if ($ext == 'txt' || $ext == 'TXT') {
?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>
                    <?php echo date('Y-m-d',strtotime($file['created_at']))?>
                </td>
                <td style="font-size: 18px;">
                    <a href="javascript:void(0);" onclick="showtxt('<?php echo $file['patient_id']; ?>')" id="txt_page"><i class="fa fa-file-text" style="color: #315395;"></i></a>
                </td>
                <td>
                    <a href="javascript:void(0);" onclick="deletetxt('<?php echo $file['id']; ?>','<?php echo $file['patient_id']; ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        </thead>
    </table>
    <!-- <div style="position: relative;">
        <object width="50px" height="50px"  type="text/plain" data="<?php echo base_url();?>assets/uploads/itemfiles/<?php echo $filename; ?>" border="1" ></object>
        <div class="context-menu-one" style="position:absolute;top:62px;left:12px;bottom:6px;right:30px;color: transparent;"><?php echo $file['id']; ?></div>   
    </div> -->
<?php }else{ echo  "";} } }?>