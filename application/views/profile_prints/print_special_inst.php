<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            font-family: Calibri;

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

            body.A5 {
                width: 210mm;
                height: 297mm;
            }

        }
        .padding {
            padding-left: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .mb-10{
        margin-bottom: 10px;
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
        margin-left: 8.333333%;
    }
    .col-md-2 {
        max-width: 16.666667%;
        float: left;
    }
    .col-md-5 {
        float: left;    
        max-width: 41.666667%;
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
        bottom: 0px;

    }
    .mb-10{
        margin-bottom: 10px;
    }
</style>
</head>
<body class="A4" >
    <div class="row">
        <div class="col-md-10 offset-1">
            <br> <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>
            <div class="row border-dark" style="width: 100%; border-bottom:3px solid #000;">
                <div class="col-md-6">
                    <strong>Ref.ID</strong>
                    <i><?php echo $patient_info->id ?></i>
                    <strong style="margin-left: 10px"><?php echo $patient_info->pat_name ?></strong>
                </div>
                <div class="col-md-4">
                    <strong>
                        <?php $age = preg_split('#(?<=\d)(?=[a-z])#i', $patient_info->pat_age); echo $age[0]; 
                            echo " ";
                        ?>
                    </strong>
                    <label><?php echo $age[1]; ?></label>
                    <label style="margin-right: 20px; text-transform: capitalize;"><?php echo $patient_info->pat_sex ?></label>
                </div>
                <div class="col-md-2">
                    <label><?php echo date('d-M-Y');?></label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12" style="text-align: center;width: 100%; word-break: break-all;">
                    <p><?php if(isset($test_details)){
                        echo $test_details->description;
                    }?></p>
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
