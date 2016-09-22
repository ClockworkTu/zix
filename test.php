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

<script type='text/javascript'>
var locations = [
{location:"Docklands", fish:"Bream", lat: -37.8036392, lng: 144.956915}
];

var geocoder = null;
var map = null;
var customerMarker = null;
var markers = [];
var closest = [];



function initialize() {
    // alert("init");
    geocoder = new google.maps.Geocoder();
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 9,
        center: new google.maps.LatLng(-37.8036392, 144.956915),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    var bounds = new google.maps.LatLngBounds();
    //document.getElementById('info').innerHTML = "found " + locations.length + " locations<br>";
    for (i = 0; i < locations.length; i++) {
        //var coordStr = locations[i][4];
        //var coords = coordStr.split(",");
        var pt = new google.maps.LatLng(parseFloat(location[i].lat), parseFloat(location[i].lng));
        bounds.extend(pt);
        marker = new google.maps.Marker({
            position: pt,
            map: map,
            address: locations[i].fish,
            title: locations[i].location,
            html: locations[i].location + "<br>" + locations[i].fish
        });
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
	}
	
	function codeAddress() {
    
            var numResults = 1000;
            closest = findClosestN(results[0].geometry.location, numResults);
            for (var i = 0; i < 5; i++) {
                closest[i].setMap(map);
            }
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}
	
	
	function findClosestN(pt, 1000) {
    var closest = [];
    for (var i = 0; i < markers.length; i++) {
        markers[i].distance = google.maps.geometry.spherical.computeDistanceBetween(pt, markers[i].getPosition());
        markers[i].setMap(null);
        closest.push(markers[i]);
    }
    closest.sort(sortByDist);
    return closest.splice(0,1000);
	}

	function sortByDist(a, b) {
    return (a.distance - b.distance)
	}

google.maps.event.addDomListener(window, 'load', initialize);


    function adddMarker() {
	locations.push({location: locationn, fish: fishh, lat: parseFloat(latt), lng: parseFloat(lngg)});
    //alert(locations[1].fish);
	} 
	
    
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs5tGrJGrykSGRMG6vY31U1atkJ5KG2d0&signed_in=true"></script>
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
                            <div class="map_container" id="map" style="width:400px; height:400px; visibility: true;"></div>
                            
                        </div>
                        <div class="col-12">
                        	<h3>Search</h3>
                            <form action="test.php" method="post">
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
	  <div class="btns"><input type="button" value="Nearest spot" onclick="codeAddress();"></input></div></p>
	  <?php
	  $aaa = "";
	  if(isset($_POST['bu'])){
		  $aaa = $_POST['formFish'];
	  }
	  echo "Your select is ". $aaa;
	  ?>
	  
	  
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
            	<li><a href="https://twitter.com/zzxsun9"><img src="images/soc-icon-1.png" target = "_blank" alt=""></a></li>
                <li><a href="https://www.facebook.com/profile.php?id=100007775943196"><img src="images/soc-icon-2.png" target = "_blank" alt=""></a></li>
                <li><a href="http://mahara.infotech.monash.edu.au/mahara/view/view.php?id=3967"><img src="images/soc-icon-3.png" target = "_blank" alt=""></a></li>
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
		echo $location;
		//$latt = floatval($lat);
		//$lngg = floatval($lng);

		echo "<script> var latt=\"$lat\";</script>";
		echo "<script> var lngg=\"$lng\";</script>";
		echo "<script> var fishh=\"$fish\";</script>";
		echo "<script> var locationn=\"$locaton\";</script>";		
        echo "<script> adddMarker()</script>";
		}
		echo "<script> initialize()</script>";
		}
		?> 	

</body>
</html>