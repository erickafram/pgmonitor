<!DOCTYPE html>
<html>
<head>
    <title>PG Monitor - Scanner IA para Slots</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato:400,700);
        @font-face {
            font-family: Lato;
            src: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/176026/ProximaNova-Regular.otf);
            font-weight: 300;
        }
        body, html {
            font-family: Lato;
        }

        h1 {
            font-size: 28px;
            line-height: 40px;
            margin-top: 20px;
        }
        h1 a {
            text-decoration: none;
            color: #48c15e;
        }
        h1 p {
            font-size: 22px;
        }

        #grid {
            -moz-transform: translate(1px, 0px);
            -ms-transform: translate(1px, 0px);
            -webkit-transform: translate(1px, 0px);
            transform: translate(1px, 0px);
        }

        /* GRAPH - 1 */
        #graph-1 {
            stroke: url(#gradient-1);
            stroke-width: 1.5;
            fill: transparent;
            stroke-linecap: round;
            stroke-linejoin: round;
            -moz-animation: lineani 1.3s linear forwards;
            -webkit-animation: lineani 1.3s linear forwards;
            animation: lineani 1.3s linear forwards;
        }

        #graph-2 {
            stroke: url(#gradient-2);
            stroke-width: 1.5;
            fill: transparent;
            stroke-linecap: round;
            stroke-linejoin: round;
            -moz-animation: lineani 1.3s linear forwards;
            -webkit-animation: lineani 1.3s linear forwards;
            animation: lineani 1.3s linear forwards;
        }

        #poly-1 {
            fill: url(#gradient-3);
        }

        #poly-2 {
            fill: url(#gradient-4);
        }

        @-moz-keyframes lineani {
            to {
                stroke-dashoffset: 0;
            }
        }
        @-webkit-keyframes lineani {
            to {
                stroke-dashoffset: 0;
            }
        }
        @keyframes lineani {
            to {
                stroke-dashoffset: 0;
            }
        }
        .underlay {
            stroke-width: 5;
            fill: transparent;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke: #24303a;
        }

        #circle-graph-1 {
            stroke: url(#gradient-1);
            stroke-width: 5;
            fill: transparent;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .chart-circle {
            -moz-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        #circle-graph-2 {
            stroke: url(#gradient-2);
            stroke-width: 5;
            fill: transparent;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        #pagina-grafico {
            background-color: #24303a;
            color: white;
            text-align: center;
            margin-bottom:20px;
        }

        .charts-container {
            padding: 20px;
            width: 100%;
            max-width: 1024px;
            display: inline-block;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .chart {
            color: #4a667a;
            text-align: left;
            position: relative;
            height: auto;
            background-color: #1e2730;
            display: inline-block;
            float: left;
            position: relative;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            margin: 10px;
            padding: 15px 20px 65px 20px;
        }
        .chart.circle {
            padding: 15px 20px 40px 20px;
            display: none;
        }
        @media screen and (max-width: 700px) {
            .chart {
                width: calc(100% - 20px);
            }
        }
        @media screen and (min-width: 700px) {
            .chart {
                width: calc(50% - 20px);
            }
        }

        .title {
            font-size: 22px;
            margin-bottom: 12px;
        }

        .chart-circle {
            display: inline-block;
            position: relative;
        }

        .chart-svg {
            position: relative;
        }

        .circle-percentage {
            position: absolute;
            color: white;
            font-size: 48px;
            left: 50%;
            top: 50%;
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        @media screen and (max-width: 480px) {
            .circle-percentage {
                font-size: 32px;
            }
        }

        .align-center {
            text-align: center;
        }

        .chart-line {
            width: 80%;
        }

        .valueX {
            font-size: 14px;
        }

        .chart-values {
            text-align: right;
            font-size: 18px;
            position: absolute;
            right: 0;
            bottom: 0;
            padding: 15px;
        }

        .h-value {
            -moz-transition: ease-in-out 700ms;
            -o-transition: ease-in-out 700ms;
            -webkit-transition: ease-in-out 700ms;
            transition: ease-in-out 700ms;
            opacity: 0;
        }
        .h-value.visible {
            opacity: 1;
        }

        .percentage-value {
            -moz-transition: ease-in-out 700ms;
            -o-transition: ease-in-out 700ms;
            -webkit-transition: ease-in-out 700ms;
            transition: ease-in-out 700ms;
            color: #48c15e;
            margin-top: 2px;
            opacity: 0;
        }
        .percentage-value.negative {
            color: #ef6670;
        }
        .percentage-value.visible {
            opacity: 1;
        }

        .total-gain {
            color: white;
            font-size: 48px;
        }

        .triangle {
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 28px 0 0 28px;
            position: absolute;
            left: 0;
            bottom: 0;
        }
        .triangle.red {
            border-color: transparent transparent transparent #ef6670;
        }
        .triangle.green {
            border-color: transparent transparent transparent #48c15e;
        }

        .horizontal,
        .vertical {
            stroke-width: 0.1;
            stroke: #4a667a;
        }

        /* CLEARFIX HELPER */
        .cf:before,
        .cf:after {
            content: " ";
            /* 1 */
            display: table;
            /* 2 */
        }

        .cf:after {
            clear: both;
        }

        /**
         * For IE 6/7 only
         * Include this rule to trigger hasLayout and contain floats.
         */
        .cf {
            *zoom: 1;
        }

        /*IRRELEVANT CSS*/
        .followlinks {
            position: fixed;
            right: 35px;
            bottom: 15px;
            display: table;
        }
        .followlinks a {
            display: table-cell;
            vertical-align: middle;
            padding-left: 10px;
            color: white;
        }
        .followlinks a svg path {
            fill: white;
        }

        .heartIt {
            margin-top: 50px;
            margin-bottom: 80px;
        }
        .heartIt p {
            font-size: 24px;
            line-height: 40px;
        }
        .heartIt img {
            width: 64px;
            height: auto;
            opacity: 0.7;
            -webkit-filter: invert(100%);
            filter: invert(100%);
        }

        .original {
            color: #ef6670;
            font-size: 14px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
<?php
// PHP aqui
$mensagem = "Olá, mundo!";
?>
<div class="content">

    <div class="charts-container cf">
        <div class="chart" id="graph-1-container">
            <h2 class="title">Melhor Horário para Jogar</h2>
            <div class="chart-svg">
                <svg class="chart-line" id="chart-1" viewBox="0 0 80 40">
                    <defs>
                        <clipPath id="clip" x="0" y="0" width="80" height="40" >
                            <rect id="clip-rect" x="-80" y="0" width="77" height="38.7"/>
                        </clipPath>

                        <linearGradient id="gradient-1">
                            <stop offset="0" stop-color="#00d5bd" />
                            <stop offset="100" stop-color="#24c1ed" />
                        </linearGradient>

                        <linearGradient id="gradient-2">
                            <stop offset="0" stop-color="#954ce9" />
                            <stop offset="0.3" stop-color="#954ce9" />
                            <stop offset="0.6" stop-color="#24c1ed" />
                            <stop offset="1" stop-color="#24c1ed" />
                        </linearGradient>


                        <linearGradient id="gradient-3" x1="0%" y1="0%" x2="0%" y2="100%">>
                            <stop offset="0" stop-color="rgba(0, 213, 189, 1)" stop-opacity="0.07"/>
                            <stop offset="0.5" stop-color="rgba(0, 213, 189, 1)" stop-opacity="0.13"/>
                            <stop offset="1" stop-color="rgba(0, 213, 189, 1)" stop-opacity="0"/>
                        </linearGradient>


                        <linearGradient id="gradient-4" x1="0%" y1="0%" x2="0%" y2="100%">>
                            <stop offset="0" stop-color="rgba(149, 76, 233, 1)" stop-opacity="0.07"/>
                            <stop offset="0.5" stop-color="rgba(149, 76, 233, 1)" stop-opacity="0.13"/>
                            <stop offset="1" stop-color="rgba(149, 76, 233, 1)" stop-opacity="0"/>
                        </linearGradient>

                    </defs>
                </svg>
                <h3 class="valueX">time</h3>
            </div>
            <div class="chart-values">
                <p class="h-value">18h até 23h</p>
                <p class="percentage-value"></p>
                <p class="total-gain"></p>
            </div>
            <div class="triangle green"></div>
        </div>
        <div class="chart" id="graph-2-container">
            <h2 class="title">Pior Horário para Jogar</h2>
            <div class="chart-svg">
                <svg class="chart-line" id="chart-2" viewBox="0 0 80 40">
                </svg>
                <h3 class="valueX">time</h3>
            </div>
            <div class="chart-values">
                <p class="h-value">12h até 17h</p>
                <p class="percentage-value"></p>
                <p class="total-gain"></p>
            </div>
            <div class="triangle red"></div>
        </div>

        <div class="chart circle" id="circle-1">
            <h2 class="title">IBApps Website</h2>
            <div class="chart-svg align-center">
                <h2 class="circle-percentage"></h2>
                <svg class="chart-circle" id="chart-3" width="50%" viewBox="0 0 100 100">
                    <path class="underlay" d="M5,50 A45,45,0 1 1 95,50 A45,45,0 1 1 5,50"/>
                </svg>
            </div>
            <div class="triangle green"></div>
        </div>
        <div class="chart circle" id="circle-2">
            <h2 class="title">IBApps Website</h2>
            <div class="chart-svg align-center">
                <h2 class="circle-percentage"></h2>
                <svg class="chart-circle" id="chart-4" width="50%" viewBox="0 0 100 100">
                    <path class="underlay" d="M5,50 A45,45,0 1 1 95,50 A45,45,0 1 1 5,50"/>
                </svg>
            </div>
            <div class="triangle red"></div>
        </div>
    </div>
</div>

<script>

    var chart_h = 40;
    var chart_w = 80;
    var stepX = 77 / 14;

    var chart_1_y = [
        20, 22, 25, 28, 30, 40, 55, 58, 60, 65, 70, 75, 75, 80
    ];
    var chart_2_y = [
        80, 75, 70, 65, 60, 55, 55, 40, 30, 25, 20, 18, 18, 20
    ];

    function point(x, y) {
        x: 0;
        y: 0;
    }
    /* DRAW GRID */
    function drawGrid(graph) {
        var graph = Snap(graph);
        var g = graph.g();
        g.attr('id', 'grid');
        for (i = 0; i <= stepX + 2; i++) {
            var horizontalLine = graph.path(
                "M" + 0 + "," + stepX * i + " " +
                "L" + 77 + "," + stepX * i);
            horizontalLine.attr('class', 'horizontal');
            g.add(horizontalLine);
        };
        for (i = 0; i <= 14; i++) {
            var horizontalLine = graph.path(
                "M" + stepX * i + "," + 38.7 + " " +
                "L" + stepX * i + "," + 0)
            horizontalLine.attr('class', 'vertical');
            g.add(horizontalLine);
        };
    }
    drawGrid('#chart-2');
    drawGrid('#chart-1');

    function drawLineGraph(graph, points, container, id) {


        var graph = Snap(graph);


        /*END DRAW GRID*/

        /* PARSE POINTS */
        var myPoints = [];
        var shadowPoints = [];

        function parseData(points) {
            for (i = 0; i < points.length; i++) {
                var p = new point();
                var pv = points[i] / 100 * 40;
                p.x = 83.7 / points.length * i + 1;
                p.y = 40 - pv;
                if (p.x > 78) {
                    p.x = 78;
                }
                myPoints.push(p);
            }
        }

        var segments = [];

        function createSegments(p_array) {
            for (i = 0; i < p_array.length; i++) {
                var seg = "L" + p_array[i].x + "," + p_array[i].y;
                if (i === 0) {
                    seg = "M" + p_array[i].x + "," + p_array[i].y;
                }
                segments.push(seg);
            }
        }

        function joinLine(segments_array, id) {
            var line = segments_array.join(" ");
            var line = graph.path(line);
            line.attr('id', 'graph-' + id);
            var lineLength = line.getTotalLength();

            line.attr({
                'stroke-dasharray': lineLength,
                'stroke-dashoffset': lineLength
            });
        }

        function calculatePercentage(points, graph) {
            var initValue = points[0];
            var endValue = points[points.length - 1];
            var sum = endValue - initValue;
            var prefix;
            var percentageGain;
            var stepCount = 1300 / sum;

            function findPrefix() {
                if (sum > 0) {
                    prefix = "+";
                } else {
                    prefix = "";
                }
            }

            var percentagePrefix = "";

            function percentageChange() {
                percentageGain = initValue / endValue * 100;

                if(percentageGain > 100){
                    console.log('over100');
                    percentageGain = Math.round(percentageGain * 100*10) / 100;
                }else if(percentageGain < 100){
                    console.log('under100');
                    percentageGain = Math.round(percentageGain * 10) / 10;
                }
                if (initValue > endValue) {

                    percentageGain = endValue/initValue*100-100;
                    percentageGain = percentageGain.toFixed(2);

                    percentagePrefix = "";
                    $(graph).find('.percentage-value').addClass('negative');
                } else {
                    percentagePrefix = "+";
                }
                if(endValue > initValue){
                    percentageGain = endValue/initValue*100;
                    percentageGain = Math.round(percentageGain);
                }
            };
            percentageChange();
            findPrefix();

            var percentage = $(graph).find('.percentage-value');
            var totalGain = $(graph).find('.total-gain');
            var hVal = $(graph).find('.h-value');

            function count(graph, sum) {
                var totalGain = $(graph).find('.total-gain');
                var i = 0;
                var time = 1300;
                var intervalTime = Math.abs(time / sum);
                var timerID = 0;
                if (sum > 0) {
                    var timerID = setInterval(function () {
                        i++;
                        totalGain.text(percentagePrefix + i);
                        if (i === sum) clearInterval(timerID);
                    }, intervalTime);
                } else if (sum < 0) {
                    var timerID = setInterval(function () {
                        i--;
                        totalGain.text(percentagePrefix + i);
                        if (i === sum) clearInterval(timerID);
                    }, intervalTime);
                }
            }
            count(graph, sum);

            percentage.text(percentagePrefix + percentageGain + "%");
            totalGain.text("0%");
            setTimeout(function () {
                percentage.addClass('visible');
                hVal.addClass('visible');
            }, 1300);

        }


        function showValues() {
            var val1 = $(graph).find('.h-value');
            var val2 = $(graph).find('.percentage-value');
            val1.addClass('visible');
            val2.addClass('visible');
        }

        function drawPolygon(segments, id) {
            var lastel = segments[segments.length - 1];
            var polySeg = segments.slice();
            polySeg.push([78, 38.4], [1, 38.4]);
            var polyLine = polySeg.join(' ').toString();
            var replacedString = polyLine.replace(/L/g, '').replace(/M/g, "");

            var poly = graph.polygon(replacedString);
            var clip = graph.rect(-80, 0, 80, 40);
            poly.attr({
                'id': 'poly-' + id,
                /*'clipPath':'url(#clip)'*/
                'clipPath': clip
            });
            clip.animate({
                transform: 't80,0'
            }, 1300, mina.linear);
        }

        parseData(points);

        createSegments(myPoints);
        calculatePercentage(points, container);
        joinLine(segments,id);

        drawPolygon(segments, id);


        /*$('#poly-'+id).attr('class','show');*/

        /* function drawPolygon(segments,id){
          var polySeg = segments;
          polySeg.push([80,40],[0,40]);
          var polyLine = segments.join(' ').toString();
          var replacedString = polyLine.replace(/L/g,'').replace(/M/g,"");
          var poly = graph.polygon(replacedString);
          poly.attr('id','poly-'+id)
        }
        drawPolygon(segments,id);*/
    }
    function drawCircle(container,id,progress,parent){
        var paper = Snap(container);
        var prog = paper.path("M5,50 A45,45,0 1 1 95,50 A45,45,0 1 1 5,50");
        var lineL = prog.getTotalLength();
        var oneUnit = lineL/100;
        var toOffset = lineL - oneUnit * progress;
        var myID = 'circle-graph-'+id;
        prog.attr({
            'stroke-dashoffset':lineL,
            'stroke-dasharray':lineL,
            'id':myID
        });

        var animTime = 1300/*progress / 100*/

        prog.animate({
            'stroke-dashoffset':toOffset
        },animTime,mina.easein);

        function countCircle(animtime,parent,progress){
            var textContainer = $(parent).find('.circle-percentage');
            var i = 0;
            var time = 1300;
            var intervalTime = Math.abs(time / progress);
            var timerID = setInterval(function () {
                i++;
                textContainer.text(i+"%");
                if (i === progress) clearInterval(timerID);
            }, intervalTime);
        }
        countCircle(animTime,parent,progress);
    }

    $(window).on('load',function(){
        drawCircle('#chart-3',1,77,'#circle-1');
        drawCircle('#chart-4',2,53,'#circle-2');
        drawLineGraph('#chart-1', chart_1_y, '#graph-1-container', 1);
        drawLineGraph('#chart-2', chart_2_y, '#graph-2-container', 2);
    });

</script>
</body>
</html>
