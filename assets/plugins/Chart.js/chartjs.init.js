$(function() {
    
    /*<!-- ============================================================== -->*/
    /*<!-- Line Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart1"),
        {
            "type":"line",
            "data":{"labels":["January","February","March","April","May","June","July","August","September","Octuber","November","December"],
            "datasets":[{
                            "label":"My First Dataset",
                            "data":[165,459,780,181,356,755,340,233,453,234,343,232,563],
                            "fill":false,
                            "borderColor":"rgb(38, 198, 218)",
                            "lineTension":0.1
                        }]
        },"options":{}});

    /*<!-- ============================================================== -->*/
    /*<!-- Line Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart2"),
        {
            "type":"line",
            "data":{"labels":["January","February","March","April","May","June","July","August","September","Octuber","November","December"],
            "datasets":[{
                            "label":"My First Dataset",
                            "data":[670,159,280,381,556,855,340,280,381,556,855,342],
                            "fill":false,
                            "borderColor":"rgb(38, 198, 218)",
                            "lineTension":0.1
                        }]
        },"options":{}});
    /*<!-- ============================================================== -->*/
    /*<!-- Line Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart3"),
        {
            "type":"line",
            "data":{"labels":["January","February","March","April","May","June","July","August","September","Octuber","November","December"],
            "datasets":[{
                            "label":"My First Dataset",
                            "data":[265,459,780,981,956,355,140,556,855,340,280,381],
                            "fill":false,
                            "borderColor":"rgb(38, 198, 218)",
                            "lineTension":0.1
                        }]
        },"options":{}});
    /*<!-- ============================================================== -->*/
    /*<!-- Line Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart4"),
        {
            "type":"line",
            "data":{"labels":["January","February","March","April","May","June","July","August","September","Octuber","November","December"],
            "datasets":[{
                            "label":"My First Dataset",
                            "data":[165,459,680,841,256,455,740,956,355,140,556,855],
                            "fill":false,
                            "borderColor":"rgb(38, 198, 218)",
                            "lineTension":0.1
                        }]
        },"options":{}});

    /*<!-- ============================================================== -->*/
    /*<!-- Line Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart5"),
        {
            "type":"line",
            "data":{"labels":["January","February","March","April","May","June","July","August","September","Octuber","November","December"],
            "datasets":[{
                            "label":"My First Dataset",
                            "data":[765,459,180,481,256,515,440,256,455,740,956,355],
                            "fill":false,
                            "borderColor":"rgb(38, 198, 218)",
                            "lineTension":0.1
                        }]
        },"options":{}});

    /*<!-- ============================================================== -->*/
    /*<!-- Line Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart6"),
        {
            "type":"line",
            "data":{"labels":["January","February","March","April","May","June","July","August","September","Octuber","November","December"],
            "datasets":[{
                            "label":"My First Dataset",
                            "data":[265,459,280,481,256,355,340,481,256,515,440,256],
                            "fill":false,
                            "borderColor":"rgb(38, 198, 218)",
                            "lineTension":0.1
                        }]
        },"options":{}});
    
    /*<!-- ============================================================== -->*/
    /*<!-- Bar Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart0"),
        {
            "type":"bar",
            "data":{"labels":["January","February","March","April","May","June","July"],
            "datasets":[{
                            "label":"My First Dataset",
                            "data":[65,59,80,81,56,55,40],
                            "fill":false,
                            "backgroundColor":["rgba(255, 99, 132, 0.2)","rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)","rgba(153, 102, 255, 0.2)","rgba(201, 203, 207, 0.2)"],
                            "borderColor":["rgb(252, 75, 108)","rgb(255, 159, 64)","rgb(255, 178, 43)","rgb(38, 198, 218)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)"],
                            "borderWidth":1}
                        ]},
            "options":{
                "scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}
            }
        });
    
    /*<!-- ============================================================== -->*/
    /*<!-- Pie Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart0"),
        {
            "type":"pie",
            "data":{"labels":["Red","Blue","Yellow"],
            "datasets":[{
                "label":"My First Dataset",
                "data":[300,50,100],
                "backgroundColor":["rgb(252, 75, 108)","rgb(30, 136, 229)","rgb(255, 178, 43)"]}
            ]}
        });

    /*<!-- ============================================================== -->*/
    /*<!-- Doughnut Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart0"),
        {
            "type":"doughnut",
            "data":{"labels":["Red","Blue","Yellow"],
            "datasets":[{
                "label":"My First Dataset",
                "data":[300,50,100],
                "backgroundColor":["rgb(252, 75, 108)","rgb(30, 136, 229)","rgb(255, 178, 43)"]}
            ]}
        });

    /*<!-- ============================================================== -->*/
    /*<!-- PolarArea Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart0"),
        {
            "type":"polarArea",
            "data":{"labels":["Red","Green","Yellow","Grey","Blue"],
            "datasets":[{
                "label":"My First Dataset",
                "data":[11,16,7,3,14],
                "backgroundColor":["rgb(252, 75, 108)","rgb(75, 192, 192)","rgb(255, 178, 43)","rgb(201, 203, 207)","rgb(30, 136, 229)"
                ]}
            ]}
        });

    /*<!-- ============================================================== -->*/
    /*<!-- Radar Chart -->*/
    /*<!-- ============================================================== -->*/
    new Chart(document.getElementById("chart0"),
        {
            "type":"radar",
            "data":{"labels":["Eating","Drinking","Sleeping","Designing","Coding","Cycling","Running"],
            "datasets":[{
                "label":"My First Dataset",
                "data":[65,59,90,81,56,55,40],
                "fill":true,
                "backgroundColor":"rgba(255, 99, 132, 0.2)","borderColor":"rgb(252, 75, 108)","pointBackgroundColor":"rgb(255, 99, 132)","pointBorderColor":"#fff","pointHoverBackgroundColor":"#fff","pointHoverBorderColor":"rgb(255, 99, 132)"
            },{
                "label":"My Second Dataset",
                "data":[28,48,40,19,96,27,100],
                "fill":true,
                "backgroundColor":"rgba(54, 162, 235, 0.2)","borderColor":"rgb(30, 136, 229)","pointBackgroundColor":"rgb(54, 162, 235)","pointBorderColor":"#fff","pointHoverBackgroundColor":"#fff","pointHoverBorderColor":"rgb(54, 162, 235)"
            }
            ]},
            "options":{
                "elements":{
                    "line":{
                        "tension":0,
                        "borderWidth":3
                    }
                }
            }
        });
    
});