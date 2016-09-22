<!DOCTYPE html>
<html lang="en">
<style>
    .container {
        margin: 0 auto;
        text-align: center;
    }

    .gauge_container {
        text-align: left;
        height: 750px;
        display: inline-block;
        border: 1px solid #ccc;
        margin: 40px 5px 0 5px;
    }

    .gauge {
        width: 750px;
        height: 500px;
        display: inline-block;
        -webkit-transform: translate3d(0, 0, 0);
    }

    .controls {
        text-align: left;
    }

    li {
        padding: 10px 0 0 0;
    }

    li.refresh {
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    label {
        font-family: Arial;
        display: inline-block;
        width: 65px;
        margin: 0 0 5px 0;
        text-align: right;
        padding: 5px;
        color: #919191;
    }

    input {
        font-weight: bold;
        font-size: 13px;
        padding: 10px;
        border: 1px solid #ccc;
        margin: 5px;
    }

    input[disabled=disabled] {
        font-weight: normal;
        font-size: 11px;
        padding: 0 0 0 10px;
        margin: 0px;
        color: #777777;
        border-color: transparent;
        background: #fff;
    }

    a:link.button,
    a:active.button,
    a:visited.button,
    a:hover.button {
        margin: 0px 5px 0 2px;
        padding: 7px 13px;
    }
    </style>
<head>
  	<title>Forecasting</title>
  	<meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.4.1.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/jquery-ui-1.8.17.custom.min.js"></script>
    <script src="js/calendar-events.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
    </a>
  </div>
<![endif]-->
<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css"> 
<![endif]-->
</head>
<body>
<div class="main-indents">
    <div class="main">
        <!-- Header -->
        <header>
            <h1><a href="index.php">GO fishing</a></h1>
            <nav>
                <ul class="sf-menu">
                    <li><a href="index.php">home</a></li>
                    <li><a href="knowledge.php">Fish Knowledge</a></li>
                    <li><a href="spot.php">Fishing Spots</a></li>
                    <li class="current"><a href="forecast.php">Forecasting</a></li>
                    <li><a href="about.php">About Us</a></li>

                </ul>
            </nav>
            <div class="clear"></div>
        </header>
        <body>
		<center>
		<table width = 90%>
		<tr>
		<td width= "80% ">  <div id="gg1" style="width: 750px; height: 450px;"></div></td>
		
		</tr>
		
		<?php
		$city="Melbourne";
		$country="AUS"; 
		$url="http://api.openweathermap.org/data/2.5/forecast/daily?q=".$city.",".$country."&units=metric&cnt=7&lang=en&appid=dce8e34145a424f77f16024ad06e424e";
		$json=file_get_contents($url);
		$data=json_decode($json,true);
		$data['city']['name'];
		
		
		//print_r($data);
		$indexArr = array();
		$indexArrP = array();
		$indexArrW = array();
		//$indexs = array();
		foreach($data['list'] as $day => $value) {
		$temc = 30*(1-abs($value['temp']['max']-25)/25);
		$atomc = ($value['pressure']-980)*0.5;
		$winrai = 21/(1 + $value['speed']);
		$indexc = $temc + $atomc + $winrai;
		//$indexcr = round($indexc,0);
		//echo "The fish active of this day:  " .date("Y-m-d",$value['dt']) ." will be " .round($indexc,0). "<br />" ;
		$indexArr[] = array("date" => date("Y-m-d",$value['dt']), "index" => round($indexc,0));
		$indexArrP[] = array("date" => date("Y-m-d",$value['dt']), "atomsphere" => $value['pressure']);
		$indexArrW[] = array("date" => date("Y-m-d",$value['dt']), "windspeed" => $value['speed']);
		//$indexs[] = array("index" => $indexcr);
		}
		
		//$todayInd = json_encode($indexs);
		//$todayInd = serialize($indexs['0']);
		//echo $todayInd;
		//print_r($indexs);
		//echo "<script> var indd=\"$todayInd\";</script>";
	    $jass = json_encode($indexArr);
		$jassP = json_encode($indexArrP);
		$jassW = json_encode($indexArrW);
		//echo $jass;
		//print_r ($indexArr);
		
		$city="Melbourne";
		$country="AUS"; 
		$url1="http://api.openweathermap.org/data/2.5/forecast/daily?q=".$city.",".$country."&units=metric&cnt=1&lang=en&appid=dce8e34145a424f77f16024ad06e424e";
		$json1=file_get_contents($url1);
		$data1=json_decode($json1,true);
		$data1['city']['name'];
		
		foreach($data1['list'] as $day => $value) {
		$temc1 = 30*(1-abs($value['temp']['max']-25)/25);
		$atomc1 = ($value['pressure']-980)*0.5;
		$winrai1 = 21/(1 + $value['speed']);
		$indexc1 = $temc1 + $atomc1 + $winrai1;
		$indexcr1 = round($indexc1,0);
		echo "       Today:  " .date("Y-m-d",$value['dt']) ."  Tempurature: ".$value['temp']['max'] ."   Atomsphere: ".$value['pressure'].  "  Wind Speed: ".$value['speed'].  "  Location: ". $city. "<br />" ;
		}
	    echo "<script> var indd=\"$indexcr1\";</script>";
		?> 	
		<tr>
		<td><h2>Fish Activity forecast for next 7 days</h2></td>
		</tr>
		<tr>
		<td width= "85% "> <div id = "line-example"></div>　 </td> 
		</tr>
		<tr>
		<td><h2>The pressure forecast for next 7 days</h2></td>
		</tr>
		<tr>
		<td width= "85% "> <div id = "line-exampleP"></div>　</td> 
		</tr>
		<tr>
		<td><h2>The speed of wind for next 7 days</h2></td>
		</tr>
		<tr>
		<td width= "85% "> <div id = "line-exampleW"></div>  </td> 
		</tr>
		</table>
		</center>
    
    <script src="justgage-1.2.2/raphael-2.1.4.min.js"></script>
    <script src="justgage-1.2.2/justgage.js"></script>
    <script>
	
    document.addEventListener("DOMContentLoaded", function(event) {
         var gg1 = new JustGage({
            id: "gg1",
            //value: parseFloat(indd),
			value: parseFloat(indd),
            min: 0,
            max: 100,
            title: "Active of fish",
            label: parseFloat(indd),
            textRenderer: customValue
        });

        

        function customValue(val) {
            if (val < 60) {
                return 'low active';
            } else if (val > 60 && val < 80) {
                return 'high active';
            } else if (val > 80) {
                return 'ideal';
            }
        }
    });
    </script>
	
		 
		 
		
	   

		<script> 
		Morris.Line({
		element: 'line-example',
		data:<?php echo $jass ?> ,
		xkey: 'date',
		ykeys: ['index',],
		labels: ['Index'],
		goals:[60,],
		goalLineColors: ['red'],
		smooth: 'true',
		resize: 'true'
		
		}); 
	  
		</script>  
		
        <script> 
		Morris.Line({
		element: 'line-exampleP',
		data:<?php echo $jassP ?> ,
		xkey: 'date',
		ykeys: ['atomsphere',],
		labels: ['atomsphere'],
		goals:[1000,],
		goalLineColors: ['green'],
		smooth: true,
		resize: true
		}); 
	  
		</script>
		
		<script> 
		Morris.Line({
		element: 'line-exampleW',
		data:<?php echo $jassW ?> ,
		xkey: 'date',
		ykeys: ['windspeed',],
		labels: ['windspeed'],
		goals:[10,],
		goalLineColors: ['blue'],
		smooth: true,
		resize: true
		}); 
	  
		</script>  


        <!-- Footer -->
        <footer>
            <div class="copyright">
                Website Template designed by team MAX
            </div>
            <ul class="social-list">
            	<li><a href="https://twitter.com/zzxsun9"><img src="images/soc-icon-1.png"  target = "_blank"  alt=""></a></li>
                <li><a href="https://www.facebook.com/profile.php?id=100007775943196"><img src="images/soc-icon-2.png"  target = "_blank"  alt=""></a></li>
                <li><a href="http://mahara.infotech.monash.edu.au/mahara/view/view.php?id=3967"><img src="images/soc-icon-3.png"  target = "_blank"  alt=""></a></li>
            </ul>
        </footer>
    </div>
</div>
</body>
</html>

