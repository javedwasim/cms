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
                    <strong>1728</strong>
                </div>
                <div class="col-md-2">
                    <label>50 Years</label>
                    <label>Male</label>
                </div>
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-2">
                    <label>Thursday 27</label>
                </div>
            </div>
            <br>
            <div class="row" style="width: 100%;">
                <div class="col-md-6">
                    <div>
                        <h3><u>Indication of Exercise:</u></h3>
                        <strong>sdfsfsdfsdfsdf</strong>
                    </div>
                    <div class="">
                        <h3><u>Medication</u></h3>
                        <strong>lsdjflksjfsdkljfselkfj</strong>
                    </div>
                    <div class="">
                        <h3><u>Reason for Ending Test</u></h3>
                        <strong>l;kksjjf'lskjfdf</strong>
                    </div>
                    <div >
                        <h3><u>Protocol:</u></h3>
                        <strong>testssfdd</strong>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 border border-dark p-0">
                            <div class="mb-1 border-bottom border-dark">Resting HR:</div>
                            <div class="mb-1 border-bottom border-dark">Resting BP:</div>
                            <div class="mb-1 border-bottom border-dark">Max Predicted Target HR:</div>
                            <div class="mb-1 border-bottom border-dark">Max HR:</div>
                            <div class="mb-1 border-bottom border-dark">Max Predicted HR Achived:</div>
                            <div class="mb-1 border-bottom border-dark">Max BP:</div>
                            <div class="mb-1 border-bottom border-dark">HR x BP:</div>
                            <div class="mb-1 border-bottom border-dark">Total Exercise Time:</div>
                            <div>Mets:</div>
                        </div>
                        <div class="col-md-6 border border-dark p-0">
                            <div class="mb-1 border-bottom border-dark">3(bpm)</div>
                            <div class="mb-1 border-bottom border-dark">4(mmHg)</div>
                            <div class="mb-1 border-bottom border-dark">5(bpm)</div>
                            <div class="mb-1 border-bottom border-dark">34(bpm)</div>
                            <div class="mb-1 border-bottom border-dark">34(%)</div>
                            <div class="mb-1 border-bottom border-dark">34(mmHg)</div>
                            <div class="mb-1 border-bottom border-dark">34(bpm x mmHg)</div>
                            <div class="mb-1 border-bottom border-dark">43(minuts)</div>
                            <div>54(ml O2/kg/min)</div>
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
                            <tr>
                                <td>Rest</td>
                                <td>34</td>
                                <td>23</td>
                                <td>32</td>
                                <td>34</td>
                                <td>43</td>
                                <td>23</td>
                                <td>45</td>
                                <td>53</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row" style="width: 100%;">
                <div class="col-md-12">
                    <h3>Description:</h3>
                    <p>
                        kjshdfljsdfjlsjdfljlfdjlksjdfljjdsfjsdlfkjlskdjfklsdjfljsdfjdsklfjdklfjlsdkjflksdjf
                        jflsdfjlfjsdjfljsdflkjsdlfjskldfjlksdjflksdjfkljsdflkkjsdfkljsdlfjlksdjflksdjfsdflkjsdflkjjdf
                        lsdjfljsdfljsdlfkjsdlkfjsldkfjlksdjflksdjfljsdflkjsdflkjsdlfsdlkjjdfjjsdfjlkjdflkjlsdjfsdhlk
                    </p>
                </div>
                <div class="col-md-12">
                    <h3>Conclution:</h3>
                    <p>
                        kjshdfljsdfjlsjdfljlfdjlksjdfljjdsfjsdlfkjlskdjfklsdjfljsdfjdsklfjdklfjlsdkjflksdjf
                        jflsdfjlfjsdjfljsdflkjsdlfjskldfjlksdjflksdjfkljsdflkkjsdfkljsdlfjlksdjflksdjfsdflkjsdflkjjdf
                        lsdjfljsdfljsdlfkjsdlkfjsldkfjlksdjflksdjfljsdflkjsdflkjsdlfsdlkjjdfjjsdfjlkjdflkjlsdjfsdhlk
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
