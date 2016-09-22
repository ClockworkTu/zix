<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'max';

// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Fishing Spot</title>
  	<meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/prettyPhoto.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.4.1.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
	<script src="justgage-1.2.2/raphael-2.1.4.min.js"></script>
    <script src="justgage-1.2.2/justgage.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs5tGrJGrykSGRMG6vY31U1atkJ5KG2d0&signed_in=true"></script>
<script type='text/javascript'>
var locations = [
{location:"Docklands", fish:"Bream", lat: -37.8199236, lng: 144.93378}
];

var markers = [];
var map;
var pt;
var bounds;

function initialize() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 5,
    center: {lat: -37.8199236, lng: 144.93378}
  });
  

	//function drop() {
	clearMarkers();
	var infowindow = new google.maps.InfoWindow();
	var marker;
	bounds = new google.maps.LatLngBounds();
	bounds.extend(new google.maps.LatLng(-37.8036392,144.956915));
	for (var i = 0; i < locations.length; i++) {
	pt = new google.maps.LatLng(parseFloat(locations[i].lat), parseFloat(locations[i].lng));
	bounds.extend(pt);
	//alert(pt);
	marker = new google.maps.Marker({
      position: pt,
      map: map,
	  address: locations[i].location,
      title: locations[i].location,
      html: "Locaton: "+ locations[i].location + "<br>" + "Fish: "+ locations[i].fish
    })
	markers.push(marker);
	 google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent(marker.html);
                infowindow.open(map, marker);
            }
        })
        (marker, i));
    }
    map.fitBounds(bounds);

	//var closest = [];
    //for (var i = 0; i < markers.length; i++) {
        //markers[i].distance = google.maps.geometry.spherical.computeDistanceBetween(pt, markers[i].getPosition());
        //closest.push(markers[i]);
    //}
    //closest.sort(sortByDist);
	//var numResults = 1000;
    //closest = findClosestN(results[0].geometry.location, numResults);
    //for (var i = 0; i < 5; i++) {
    //document.getElementById('info').innerHTML = i + closest[i];
	
	}
	

	//function sortByDist(a, b) {
    //return (a.distance - b.distance)
	//}

	google.maps.event.addDomListener(window, 'load', initialize);

	
	
	//google.maps.event.addDomListener(window, 'load', initialize);
	function clearMarkers() {
	for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(null);
	}
	markers = [];
	}

    function adddMarker() {
	locations.push({location: locationn.toString(), fish: fishh.toString() , lat: parseFloat(latt), lng: parseFloat(lngg)});
    //alert(locations[]);
	}    
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<style>
    

    .box {
      float: left;
      width: 50%;
      height: 50%;
      box-sizing: border-box;
    }

    

    .gauge {
      width: 320px;
      height: 240px;
    }

    
    </style>
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
                    <li class="current"><a href="spot.php">Fishing Spots</a></li>
                    <li><a href="forecast.php">Forecasting</a></li>
                    <li><a href="about.php">About Us</a></li>

                </ul>
            </nav>
            <div class="clear"></div>
        </header>
        <!-- Slider -->
        
        <!-- Content -->
        <section id="content"><div class="ic">Website designed by Team Max</div>
            <div class="container_12">
            	<article class="a2">
                	<div class="wrapper">
                    	<div class="col-11">
                        	<h3>Fishing Spot On Map</h3>
                            <div class="map_container" id="map" style="width:400px; height:500px; visibility: true;"></div>
                            
                        </div>
                        <div class="col-12">
                        	<h3>Search</h3>
                                 <form action="spot.php" method="post">
        <h1>Where is your location?</h1>
        <p class="lead">select and click</p>
		<p>
		<select name="formFish" >
		<option value="">Select...</option>
		<option value="Cape Howe Marine National Park">Cape Howe Marine National Park</option>
		<option value="Croajingolong National Park">Croajingolong National Park</option>
		<option value="Coopracambara national Park">Coopracambara national Park</option>
		<option value="Geelong">Geelong</option>
		<option value="Great Ocean Drive">Great Ocean Drive</option>
		<option value="Gippsland Lakes Coastal park">Gippsland Lakes Coastal park</option>
		<option value="Lake Wellington">Lake Wellington</option>
		<option value="Melbourne">Melbourne</option>
		<option value="Mornington Peninsula">Mornington Peninsula</option>
		<option value="Philip Island">Philip Island</option>
		<option value="Port Fairy">Port Fairy</option>
		<option value="Portland">Portland</option>
		<option value="Wilsons Promontory National Park">Wilsons Promontory National Park</option>
		</select></p>
        
		<p><div class="btns"><input name= "bu" type="submit" value="Find spot" /></div></p>
      
	  </form>
	  <?php
	  $aaa = "";
	  if(isset($_POST['bu'])){
		  $aaa = $_POST['formFish'];
	  }
	  echo "Your select is ". $aaa;
	  ?></p>
	  <div>
        <div id="g3" class="gauge" style="width: 250px; height: 250px;"></div>
		</div>		
		<script>
		document.addEventListener("DOMContentLoaded", function(event) {
		var g3 = new JustGage({
        id: 'g3',
        value: parseFloat(indd),
        min: 0,
        max: 100,
        symbol: '%',
        donut: true,
        pointer: true,
        gaugeWidthScale: 0.4,
        pointerOptions: {
          toplength: 10,
          bottomlength: 10,
          bottomwidth: 8,
          color: '#000'
        },
        customSectors: [{
          color: "#ff0000",
          lo: 50,
          hi: 100
        }, {
          color: "#00ff00",
          lo: 0,
          hi: 50
        }],
        counter: true
      });
	  });
	  </script>
		<?php 
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
		<div id="info"></div>
					   
			</div>
                    </div>
                </article>
            </div>
        </section>
        <!-- Footer -->
        <footer>
            <div class="copyright">
                Website designed by Team Max
            </div>
            <ul class="social-list">
            	<li><a href="https://twitter.com/zzxsun9"><img src="images/soc-icon-1.png"   target = "_blank" alt=""></a></li>
                <li><a href="https://www.facebook.com/profile.php?id=100007775943196"><img src="images/soc-icon-2.png"   target = "_blank" alt=""></a></li>
                <li><a href="http://mahara.infotech.monash.edu.au/mahara/view/view.php?id=3967"><img src="images/soc-icon-3.png"   target = "_blank" alt=""></a></li>
            </ul>
        </footer>
    </div>
</div>
		<?php
		if (!empty($_REQUEST['formFish'])) {
		$formFish = mysql_real_escape_string($_REQUEST['formFish']);     
		$sql = "SELECT * FROM fishspot WHERE sector LIKE '%".$formFish."%'"; 
		$r_query = mysql_query($sql); 

		while ($row = mysql_fetch_array($r_query)){   
		//echo '<br /> latitude: '.$row['latitude'];  
		//echo '<br /> longitude: '.$row['longitude'];
        $lat = $row['latitude'];
        $lng = $row['longitude'];
		$fish = $row['fish'];
		$location = $row['location'];
		//echo $location;
		//$latt = floatval($lat);
		//$lngg = floatval($lng);

		echo "<script> var latt=\"$lat\";</script>";
		echo "<script> var lngg=\"$lng\";</script>";
		echo "<script> var fishh=\"$fish\";</script>";
		echo "<script> var locationn=\"$location\";</script>";
        echo "<script> adddMarker()</script>";
		}
		//echo "<script> drop()</script>";

		}
		?> 	

</body>
</html>