<div class="wallet-modal-box">
        <div id="wallet-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Today's stats</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
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
                                <strong>Grand Total: Rs.</strong>
                                <label><?php $total = $wallet_consultant+$wallet_ett+$wallet_echo;
                                echo $total-$wallet_refund;
                                ?></label>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>