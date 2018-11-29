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
    <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;width:100%;}
    .tg td {
        font-family: Arial, sans-serif;
        font-size: 12px;
        padding: 10px 10px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }
    .tg th {
        font-size: 12px;
        font-weight: bold;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }
    .tg .tg-baqh{text-align:center;vertical-align:top}
    .tg .tg-yw4l{vertical-align:top; text-align: center; width: 2%;}
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
            width: 210mm;
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

            .dark{
                background: #000;
                color: #fff;
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
            .tg th{font-size:12px;font-weight:bold;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
            .dark{
                background: #000;
                color: #fff;
            }
        }

        .center {
            text-align: center;
        }

        h1, h2, h3, h4, h5 {
            margin-top: 0.10em;
            margin-bottom: 0.10em;
        }

        .row {
            display: inline-flex;
        }

        .basic-info {
            margin: 0em 3em 0em 3em;
            line-height: 0.25in;
        }

        .history-tbl {
            width: 33.3333%;
        }

        .inv-tbl {
            width: 33.3333%;
        }

        .plan-tbl {
            width: 33.3333%;
        }
        .dark{
            background: #000;
            color: #fff;
        }

        
</style>
</head>
<body class="A4 ">
    <section class="sheet padding-10mm">
        <div class="header center">
        <!-- <img src="" style="position: absolute; top: 0.2in; left: 0.79in; height: 100px"> -->
        <h1>Dr. Shahadat Clinic</h1>
        <h3 style="margin-top: 0 !important;">Vitals List</h3>
        <br>
        <div style="width: 100%; border-bottom:3px solid #000; height: 23px;
    margin-bottom: 10px;">
            <div style="width: 45%; float:left; text-align: left;">
                <strong>Ref.ID</strong>
                <i><?php echo $patient_info->id ?></i>
                <strong style="margin-left: 10px"><?php echo $patient_info->pat_name ?></strong>
            </div>
            <div style="width: 35%; float:left; text-align: left;">
                <strong>
                    <?php $age = preg_split('#(?<=\d)(?=[a-z])#i', $patient_info->pat_age); echo $age[0]; 
                        echo " ";
                    ?>
                </strong>
                <label><?php echo $age[1]; ?></label>
                <label style="margin-right: 20px; text-transform: capitalize;"><?php echo $patient_info->pat_sex ?></label>
            </div>
            <div style="width: 20%; float:left;">
                <label><?php echo date('d-M-Y');?></label>
            </div>
        </div>
    </div>
        <table class="tg" style="display: -webkit-box;margin: 0 auto;">
            <thead>
                 <tr>
                   <th class="tg-yw4l">Order</th>
                   <th class="tg-yw4l" >Date & Time</th>
                   <th class="tg-yw4l">B.P</th>
                   <th class="tg-yw4l">Pulse</th>
                   <th class="tg-yw4l">Temperature</th>
                   <th class="tg-yw4l">PT (Patient/Control)</th>
                   <th class="tg-yw4l">INR</th>
                   <th class="tg-yw4l">Resperatory Rate</th>
                   <th class="tg-yw4l">Volume</th>
                   <th class="tg-yw4l">Height</th>
                   <th class="tg-yw4l">Weight</th>
                   <th class="tg-yw4l">BMI</th>
                   <th class="tg-yw4l">BSA</th>
                 </tr>
             </thead>
             <tbody>
                <?php $counter=1; ?>
                <?php if(isset($patient_vitals)){
                        foreach ($patient_vitals as $key) {
                ?>
                <tr>
                   <td class="tg-yw4l"><?php echo $counter; ?></td>
                   <td class="tg-yw4l"><?php echo date('d-F-Y h:i a',strtotime($key['vaital_datetime'])); ?></td>
                   <td class="tg-yw4l"><?php echo $key['vital_bp']; ?></td>
                   <td class="tg-yw4l"><?php echo $key['vital_pulse']; ?></td>
                   <td class="tg-yw4l"><?php echo $key['vital_temp']; ?></td>
                   <td class="tg-yw4l"><?php echo $key['vital_pt']; ?></td>
                   <td class="tg-yw4l"><?php echo $key['vital_inr']; ?></td>
                   <td class="tg-yw4l"><?php echo $key['vital_rr']; ?></td>
                   <td class="tg-yw4l"><?php echo $key['vital_volume']; ?></td>
                   <td class="tg-yw4l"><?php echo $key['vital_height']; ?></td>
                   <td class="tg-yw4l"><?php echo $key['vital_weight']; ?></td>
                   <td class="tg-yw4l"><?php echo $key['vital_bmi']; ?></td>
                   <td class="tg-yw4l"><?php echo $key['vital_bsa']; ?></td>
                </tr>
                <?php
                    $counter++;
                 } 
                } ?>
             </tbody>
        </table>
    </section>
    <script type="text/javascript">
      window.onload = function() { window.print(); }
    </script>
</body>
</html>
