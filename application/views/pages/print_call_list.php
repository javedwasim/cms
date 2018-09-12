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
    .tg  {border-collapse:collapse;border-spacing:0;width:90%;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 15px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-size:14px;font-weight:bold;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
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
<body class="A4 " >
    <section class="sheet padding-10mm">
        <div class="header center">
        <!-- <img src="" style="position: absolute; top: 0.2in; left: 0.79in; height: 100px"> -->
        <h1>Dr.Shahadat Clinic</h1>
        <h3 style="margin-top: 0 !important;">Appointments List</h3>
        <br>
        <h4 style="margin-top: 0 !important;">Date:<?php echo date('d-M-Y'); ?></h4>
        <br>
    </div>
        <table class="tg" style="display: -webkit-box;margin: 0 auto;">
            <thead>
                 <tr>
                   <th class="tg-yw4l dark">Order</th>
                   <th class="tg-yw4l dark">Patient Name</th>
                   <th class="tg-yw4l dark">Contact #</th>
                   <th class="tg-yw4l dark">Appointment Taken</th>
                 </tr>
             </thead>
             <tbody>
                <?php foreach ($booking_list as $list) {?>
                <tr>
                   <td class="tg-yw4l"><?php echo $list['order_number']; ?></td>
                   <td class="tg-yw4l" style="text-transform: capitalize;"><?php echo $list['full_name']; ?></td>
                   <td class="tg-yw4l"><?php echo $list['contact_number']; ?></td>
                   <td class="tg-yw4l"><?php echo date('d-M-Y h:i a',strtotime($list['appointment_date'])); ?></td>
                </tr>
            <?php } ?>
             </tbody>
        </table>
    </section>
    <script type="text/javascript">
      window.onload = function() { window.print(); }
    </script>
</body>
</html>
