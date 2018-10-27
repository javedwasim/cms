
<div class="wallet-modal-box">
    <div class="modal-body">
        <div class="row" style="border-bottom: 1px solid #f4f4f4; margin: 10px 0px;">
            <div class="col-md-12">
                <strong><b>Grand Total: Rs.</b></strong>
                <label><?php $total = $wallet_consultant+$wallet_ett+$wallet_echo;
                echo $total-$wallet_refund;
                ?></label>
            </div>
        </div>
        <div class="row" style="border-bottom: 1px solid #f4f4f4; margin: 10px 0px;">
            <div class="col-md-12">
                <label>[<?php echo $fee_paid_count; ?>]</label>
                <strong>Total Consultant Fee: Rs.</strong>
                <label><?php echo $wallet_consultant; ?></label>
            </div>
        </div>
        <div class="row" style="border-bottom: 1px solid #f4f4f4; margin: 10px 0px;">
            <div class="col-md-12">
                <label>[<?php echo $wallet_ett_count; ?>]</label>
                <strong>Total ETT: Rs.</strong>
                <label><?php echo $wallet_ett; ?></label>
            </div>
        </div>
        <div class="row" style="border-bottom: 1px solid #f4f4f4; margin: 10px 0px;">
            <div class="col-md-12">
                <label>[<?php echo $wallet_echo_count; ?>]</label>
                <strong>Total Echo Fee: Rs.</strong>
                <label><?php echo $wallet_echo; ?></label>
            </div>
        </div>
        <div class="row" style="border-bottom: 1px solid #f4f4f4; margin: 10px 0px;">
            <div class="col-md-12">
                <label>[<?php echo $refund_count; ?>]</label>
                <strong>Refunded: Rs.</strong>
                <label><?php echo $wallet_refund; ?></label>
            </div>
        </div>
        <div class="row" style="border-bottom: 1px solid #f4f4f4; margin: 10px 0px;">
            <div class="col-md-12">
                <strong>Total Attended.</strong>
                <label><?php echo $total_attended; ?></label>
            </div>
        </div>
        <div class="row" style="border-bottom: 1px solid #f4f4f4; margin: 10px 0px;">
            <div class="col-md-12">
                <strong>Not Attended.</strong>
                <label><?php echo $total_not_attended; ?></label>
            </div>
        </div>
    </div>    
</div>
