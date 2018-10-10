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
</style>
</head>
<body class="A4 " >
    <div class="row sheet">
        <div class="col-md-10 offset-1">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align: center;">Exercise Tolerance Test</h1>
                </div>
            </div>
            <br>
            <div class="row border border-dark" style="width: 100%;">
                <div class="col-md-6">
                    <label>Ref.ID</label>
                    <strong><?php echo $patient_info->id ?></strong>
                </div>
                <div class="col-md-2">
                    <label><?php echo $patient_info->pat_age ?></label>
                    <label><?php echo $patient_info->pat_sex ?></label>
                </div>
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-2">
                    <label><?php echo date('d-M-Y');?></label>
                </div>
            </div>
            <br>
            <div class="row" style="width: 100%;">
                <div class="col-md-6">
                    <div>
                        <h3><u>Indication of Exercise:</u></h3>
                        <?php if(isset($testreason)){?>
                            <strong><?php echo $testreason; ?></strong>
                        <?php }?>
                    </div>
                    <div class="">
                        <h3><u>Medication</u></h3>
                        <?php foreach($test_details as $key){?>
                            <strong><?php echo $key['medication']; ?></strong>
                        <?php }?>
                    </div>
                    <div class="">
                        <h3><u>Reason for Ending Test</u></h3>
                        <?php if(isset($endingtestreason)){?>
                            <strong><?php echo $endingtestreason; ?></strong>
                        <?php }?>
                    </div>
                    <div >
                        <h3><u>Protocol:</u></h3>
                        <?php if(isset($protocol)){?>
                            <strong><?php echo $protocol; ?></strong>
                        <?php }?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 border border-dark p-0">
                            <div class="mb-1 border-bottom border-dark padding">Resting HR:</div>
                            <div class="mb-1 border-bottom border-dark padding">Resting BP:</div>
                            <div class="mb-1 border-bottom border-dark padding">Max Predicted Target HR:</div>
                            <div class="mb-1 border-bottom border-dark padding">Max HR:</div>
                            <div class="mb-1 border-bottom border-dark padding">Max Predicted HR Achived:</div>
                            <div class="mb-1 border-bottom border-dark padding">Max BP:</div>
                            <div class="mb-1 border-bottom border-dark padding">HR x BP:</div>
                            <div class="mb-1 border-bottom border-dark padding">Total Exercise Time:</div>
                            <div class="padding">Mets:</div>
                        </div>
                        <div class="col-md-6 border border-dark p-0">
                            <div class="mb-1 border-bottom border-dark padding">
                                <?php foreach($test_details as $key){?>
                                        <strong><?php echo $key['resting_hr']; ?></strong>
                                <?php }?>(bpm)
                            </div>
                            <div class="mb-1 border-bottom border-dark padding">
                                <?php foreach($test_details as $key){?>
                                        <strong><?php echo $key['resting_bp']; ?></strong>
                                <?php }?>(ml O2/kg/min)
                            </div>
                            <div class="mb-1 border-bottom border-dark padding">
                                <?php foreach($test_details as $key){?>
                                        <strong><?php echo $key['max_pre_tar']; ?></strong>
                                <?php }?>(mmHg)
                            </div>
                            <div class="mb-1 border-bottom border-dark padding">
                                <?php foreach($test_details as $key){?>
                                        <strong><?php echo $key['max_hr']; ?></strong>
                                <?php }?>(bpm)
                            </div>
                            <div class="mb-1 border-bottom border-dark padding">
                                <?php foreach($test_details as $key){?>
                                        <strong><?php echo $key['max_pre_hr']; ?></strong>
                                <?php }?>(bpm)
                            </div>
                            <div class="mb-1 border-bottom border-dark padding">
                                <?php foreach($test_details as $key){?>
                                        <strong><?php echo $key['max_bp']; ?></strong>
                                <?php }?>(%)
                            </div>
                            <div class="mb-1 border-bottom border-dark padding">
                                <?php foreach($test_details as $key){?>
                                        <strong><?php echo $key['hr_bp']; ?></strong>
                                <?php }?>(mmHg)
                            </div>
                            <div class="mb-1 border-bottom border-dark padding">
                                <?php foreach($test_details as $key){?>
                                        <strong><?php echo $key['exercise_time']; ?></strong>
                                <?php }?>(bpm x mmHg)
                            </div>
                            <div class="padding">
                                <?php foreach($test_details as $key){?>
                                        <strong><?php echo $key['mets']; ?></strong>
                                <?php }?>(minuts)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row" style="width: 100%;">
                <div class="col-md-12 p-0">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Stage Name</th>
                                <th>Speed(mph)</th>
                                <th>Grade</th>
                                <th>Stage Time</th>
                                <th>Mets</th>
                                <th>HR</th>
                                <th>SBP/DBP</th>
                                <th>HR x BP</th>
                                <th>Condition</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($protocol_details as $key){?>
                            <tr>
                                <td><?php echo $key['stage_name']; ?></td>
                                <td><?php echo $key['speed']; ?></td>
                                <td><?php echo $key['grade']; ?></td>
                                <td><?php echo date('h:i', strtotime($key['stage_time'])); ?></td>
                                <td><?php echo $key['mets']; ?></td>
                                <td><?php echo $key['hr']; ?></td>
                                <td><?php $sbp = $key['sbp']; $dbp = $key['dbp']; echo $result = $sbp/$dbp ?></td>
                                <td><?php $sbp = $key['sbp']; $dbp = $key['dbp']; echo $result = $sbp*$dbp ?></td>
                                <td><?php echo $key['protocol_condition']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row" style="width: 100%;">
                <div class="col-md-12">
                    <h3>Description:</h3>
                    <p>
                        <?php foreach($test_details as $key){
                             echo $key['description'];
                         }?>
                    </p>
                </div>
                <div class="col-md-12">
                    <h3>Conclution:</h3>
                    <p>
                       <?php foreach($test_details as $key){
                             echo $key['conclusion'];
                        }?> 
                    </p>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-12 ">
                    <div style="float: right;">
                        <h3><i>Dr.Shahadat Hussain Ch.</i></h3>
                        <label>MBBS, FCPS(Cardiology)</label><br>
                        <label><i>Asst. Professor Cardiology/CCU</i></label><br>
                        <label>QAMC/BVH Bahawalpur</label>
                    </div>
                </div>
            </div>
            <hr size="10">
            <div class="row">
                <div class="col-md-12">
                    <p style="text-align: center;">Shahadat Clinic: 14-B Medical Colony Bahawalpur. Phone: 0322-6526467</p>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--     <script type="text/javascript">
      window.onload = function() { window.print(); }
    </script> -->
</body>
</html>
