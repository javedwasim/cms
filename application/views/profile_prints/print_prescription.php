<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print Appointments list</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media='screen,print'>
    <style type="text/css">
      @page {
            margin: 0;
            size: A4
        }
        body {
            margin: 0;
            font-family: Mehr,Arial, San sarif;
            font-size: 20px;
            color:#000 !important;
        }
        .sheet {
            margin: 0;
            /*overflow: hidden;*/
            position: relative;
            /*box-sizing: border-box;*/
            /*page-break-after: always;*/
        }

        /** Paper sizes **/
        body.A3 .sheet {
            width: 297mm;
            height: 419mm
        }

        body.A3.landscape .sheet {
            width: 420mm;
            height: 296mm
        }

        body.A4 .sheet {
            width: 350mm;
            height: 100%;
        }

        body.A4.landscape .sheet {
            width: 297mm;
            height: 209mm
        }

        body.A5 .sheet {
            width: 148mm;
            height: 209mm
        }

        body.A5.landscape .sheet {
            width: 210mm;
            height: 147mm
        }

        body.letter .sheet {
            width: 216mm;
            height: 279mm
        }

        body.letter.landscape .sheet {
            width: 280mm;
            height: 215mm
        }

        body.legal .sheet {
            width: 216mm;
            height: 356mm
        }

        body.legal.landscape .sheet {
            width: 357mm;
            height: 215mm
        }

        /** Padding area **/
        .sheet.padding-10mm {
            padding: 10mm
        }

        .sheet.padding-15mm {
            padding: 15mm
        }

        .sheet.padding-20mm {
            padding: 20mm
        }

        .sheet.padding-25mm {
            padding: 25mm
        }

        /** For screen preview **/
        @media screen {
            body {
                background: #e0e0e0
            }

            .sheet {
                background: white;
                box-shadow: 0 .5mm 2mm rgba(0, 0, 0, .3);
                margin: 5mm auto;
            }
        }

        /** Fix for Chrome issue #273306 **/
        @media print {
            body.A3.landscape {
                width: 420mm
            }

            body.A3, body.A4.landscape {
                width: 297mm
            }

            body.A4, body.A5.landscape {
                width: 210mm;
                margin-top: 0.30in;
                margin-bottom: 0.30in;
            }

            body.A5 {
                width: 148mm
            }

            body.letter, body.legal {
                width: 216mm
            }

            body.letter.landscape {
                width: 280mm
            }

            body.legal.landscape {
                width: 357mm
            }

        }
        .padding {
            padding-left: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .mb-10{
            margin-bottom: 20px;
        }
        .footer-top{
            position: fixed;
            bottom: 170px;
        }
</style>
<style type="text/css" media="print">
    .row {
        width: 100%;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    .col-md-12{
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;

    }
    .col-md-6{
        width: 50%;
        float: left;
    }
    .offset-1 {
        margin-left: 7%;
    }
    .col-md-2 {
        max-width: 16.666667%;
        float: left;
    }
    .col-md-5 {
        float: left;    
        max-width: 41.666667%;
    }
    .col-md-7 {
        float: left;
        max-width: 58.333333%;
    }

    .col-md-10 {
        -ms-flex: 0 0 83.333333%;
        flex: 0 0 83.333333%;
        max-width: 83.333333%;
      }
      .col-md-3 {
          -ms-flex: 0 0 25%;
          flex: 0 0 25%;
          max-width: 25%;
        }
    .col-md-4 {
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
    }
    .col-md-7 {
        -ms-flex: 0 0 58.333333%;
        flex: 0 0 58.333333%;
        max-width: 58.333333%;
      }
    .col-md-8 {
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%;
    }
    .padding {
        padding-left: 10px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .footer-bottom{
        position: fixed;
        bottom: 120px;
        right: 35px;
    }
    .footer-top{
        position: fixed;
        bottom: 150px;
    }
    .mb-10{
        margin-bottom: 20px;
    }
</style>
</head>
<body class="A4 " >
    <div class="row sheet">
        <div class="col-md-10 offset-1">
            <div class="row border-dark" style="width: 96%; border-bottom:3px solid #000; margin-top:350px; ">
                <div class="col-md-6" style="font-size: 22px;">
                    <strong>Ref.ID:</strong>
                    <i><?php echo $patient_info->id ?></i>
                    <strong style="margin-left: 15px;font-weight: bold;"><?php echo $patient_info->pat_name ?></strong>
                </div>
                <div class="col-md-3">
                    <strong style="font-weight: bold; margin-right: 7px;">
                        <?php $age = preg_split('#(?<=\d)(?=[a-z])#i', $patient_info->pat_age); echo $age[0]; 
                            echo " ";
                        ?>
                    </strong>
                    <label><?php echo $age[1]; ?></label>
                    <label style="margin-left: 20px; text-transform: capitalize;"><?php echo $patient_info->pat_sex ?></label>
                </div>
                <div class="col-md-3">
                    <label><?php echo date('l, F Y');?></label>
                </div>
            </div>
            <br>
            <div class="row" style="width: 95%;">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-5" style="padding-left: 0px; font-weight: 500; font-size: 25px; font-family: Arial;">
                            <?php foreach($medicine_details as $med){?>
                                <div class="mb-10"><?php echo $med['medicine_value']?></div>
                            <?php }?>
                        </div>
                        <div class="col-md-6" style="padding-right: 0px; font-weight: 500; direction:rtl; font-size: 25px; text-align: right;">
                            <?php foreach($dosage_details as $dos){?>
                                <div class="mb-10"><?php echo $dos['dosage_value']?></div>
                            <?php }?>
                        </div>  
                    </div>
                </div>
                <div class="col-md-5" style="font-size: 20px;font-family: Arial;">
                    <?php foreach($history_details as $history){?>
                        <div class="mb-10" style="width: 100%; word-break: break-all;"><?php echo $history['history_value']; ?></div>
                    <?php }?>
                    <?php foreach($measurement_details as $measurment){?>
                        <div style="width: 100%; word-break: break-all;">Pulse:<?php echo $measurment['pulse']; ?>&nbsp;<?php echo $measurment['volume']; ?></div>
                        <div style="width: 100%; word-break: break-all;">BP.<?php echo $measurment['bp_a']; ?>/<?php echo $measurment['bp_b']; ?></div>
                        <div style="width: 100%; word-break: break-all;">Resp. Rate:<?php echo $measurment['rr']; ?>&nbsp;&nbsp;&nbsp;Temprature:<?php echo $measurment['temprature']; ?></div>
                    <?php }?>
                    <?php foreach($examination_details as $examination){?>
                        <div class="mb-10" style="width: 100%; word-break: break-all;"><?php echo $examination['examination_value']; ?></div>
                    <?php }?>
                    <?php foreach($investigation_details as $investigation){?>
                        <div class="mb-10" style="width: 100%; word-break: break-all;"><?php echo $investigation['investigation_value']; ?></div>
                    <?php }?>
                    <?php foreach($advice_details as $advice){?>
                        <div class="mb-10" style="width: 100%; word-break: break-all;"><?php echo $advice['advice_value']; ?></div>
                    <?php }?>
                </div>
            </div>
            <br>
            <?php foreach($instruction_details as $instruction){
                    $instructions = explode(",",$instruction['instruction_value']); 
        
                }
            ?>
            <div class="mb-10 footer-top" style="word-break: break-all; font-weight: 500; font-size: 22px; text-align: right; width: 86%;">
                <?php foreach ($instructions as $value) {
                    echo '<div style="text-align:left; display:inline-block; ">'.$value.'</div> <br>';
                }?>
            </div>
            <div class="row footer-bottom" style="width: 92%;">
                <div class="col-md-12">
                    <br> 
                    <p style="text-align: right; font-size: 26px; font-weight: 500; direction: rtl; word-spacing: 3px;width: 95%;">
                        پھر مورخہ       <?php foreach($visit_date as $visit){echo " ";echo date('Y, F d',strtotime($visit['next_visit_date']));echo " ";}?>            کو چیک کرایں۔ چیک نہ ہونے کی صورت میں ادویات جاری رکھیں۔ آنے سے قبل فون پر ٹائم لیں۔
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      window.onload = function() { window.print(); }
    </script>
</body>
</html>
