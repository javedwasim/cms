<!DOCTYPE html>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print Prescription</title>
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
            font-family: Mehr,Arial, San sarif,Arial;
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
        .sheet.padding-5mm {
            padding: 5mm
        }
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
	            width: 148mm;
	            height: 210mm
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
        .footer-bottom{
	        position: fixed;
	        bottom: 20px;
	        right: 35px;
	    }
	    .footer-top{
	        position: fixed;
	        bottom: 150px;
	    }
	    .footer-top-line{
	    	position: fixed;
	    	bottom: 100px;
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
        bottom: 20px;
        right: 35px;
    }
    .footer-top-line{
    	position: fixed;
    	bottom: 100px;
    }
    .footer-top{
        position: fixed;
        bottom: 150px;
    }
    .mb-10{
        margin-bottom: 20px;
    }
    .list-group {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        padding-left: 0;
        margin-bottom: 0;
    }
    .list-group-item {
        padding: 5px;
        font-size: 12px;
    }
    .list-group-item {
        position: relative;
        display: block;
        padding: .75rem 1.25rem;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,.125);
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }
    .table-bordered thead td, .table-bordered thead th {
        border-bottom-width: 2px;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }
    .table-bordered td, .table-bordered th {
        border: 1px solid #dee2e6;
    }
    .table td, .table th {
        padding: .40rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .border-dark {
        border-color: #343a40!important;
    }
    .border {
        border: 1px solid #dee2e6!important;
    }
    .p-0 {
        padding: 0!important;
    }
    .border-bottom {
      border-bottom: 1px solid #dee2e6 !important;
    }
</style>
</head>
<body class="A4 ">
	<div class="row sheet">
		<div class="col-md-10 offset-1">
			<div class="row" style="font-family: Arial;width: 96%;">
				<div class="col-md-5">
					<h3 style="text-transform: capitalize;"><?php echo $report_header->doc_name ?></h3>
					<strong><i><?php echo $report_header->degree  ?></i></strong>
				</div>
				<div class="col-md-3">
					<img src="<?php echo base_url(); ?>/assets/uploads/itemfiles/<?php echo $report_header->logo_path ?>"
					height="100px" width="100px" />
				</div>
				<div class="col-md-4" style="text-align: right; ">
					<h3 style="text-transform: capitalize;"><?php echo $report_header->report_heading ?></h3>
					<p><?php echo $report_header->address  ?></p>
					<strong>Mobile: </strong><span><?php echo $report_header->phone  ?></span>
				</div>
			</div>