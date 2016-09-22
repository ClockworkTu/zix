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
var neighborhoods = [
  {lat: -37.8036392, lng: 144.956915},
];

var markers = [];
var map;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 6,
    center: {lat: -37.8036392, lng: 144.956915}
  });
  
}

function drop() {
  clearMarkers();
  for (var i = 0; i < neighborhoods.length; i++) {
    addMarkerWithTimeout(neighborhoods[i], i * 200);
  }
}

function addMarkerWithTimeout(position, timeout) {
  window.setTimeout(function() {
    markers.push(new google.maps.Marker({
      position: position,
      map: map,
      animation: google.maps.Animation.DROP
    }));
  }, timeout);
}
//google.maps.event.addDomListener(window, 'load', initialize);
function clearMarkers() {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(null);
  }
  markers = [];
}

    function addMarker() {
	neighborhoods.push({lat: parseFloat(latt), lng: parseFloat(lngg)});
    }    
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs5tGrJGrykSGRMG6vY31U1atkJ5KG2d0&signed_in=true&callback=initMap"></script>
</head>
<body>
<div class="main-indents">
    <div class="main">
        <!-- Header -->
		
        
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
							
                            <form action="knowledge.php" method="post">
        <h1>What is your target fish?</h1>
        <p class="lead">select and click</p>
		<p>
		<select name="formFish1" >
		<option value="">Select...</option>
		<option value="Australian salmon">Australian salmon</option>
		<option value="bream">Bream</option>
		<option value="estuary perch">Estuary perch</option>
		<option value="flounder">Flounder</option>
		<option value="flathead">Flathead</option>
		<option value="garfish">Garfish</option>
		<option value="gummy shark">Gummy shark</option>
		<option value="gurnard">Gurnard</option>
		<option value="luderick">Luderick</option>
		<option value="mullet">Mullet</option>
		<option value="mulloway">Mulloway</option>
		<option value="pike">Pike</option>
		<option value="school shark">School shark</option>
		<option value="snapper">Snapper</option>
		<option value="snook">Snook</option>
		<option value="southern bluefin striped tuna">Southern bluefin striped tuna</option>
        <option value="trevally">Trevally</option>
		<option value="whiting">Whiting</option>
		<option value="yellowtail kingfish">Yellowtail kingfish</option>
		</select></p>
        
		<p><div class="btns"><input name= "bu" type="submit" value="Find spot" onclick = "mFunction()"/></div></p>
		<p id="display"></p>
	  </form>
	  <script>
	  function mFunction(){
		  var x = document.getElementById("formFish1").value;
		  document.getElementById("display").innerHTML = "Your select is :" + x;
	  }</script>
                        </div>
                    </div>
                </article>
            </div>
        </section>
        <!-- Footer -->
        
    </div>
</div>
<?php
		if (!empty($_REQUEST['formFish1'])) {
		$formFish = mysql_real_escape_string($_REQUEST['formFish1']);     
		$sql = "SELECT * FROM fishspot WHERE fish LIKE '%".$formFish."%'"; 
		$r_query = mysql_query($sql); 

		while ($row = mysql_fetch_array($r_query)){   
		//echo '<br /> latitude: '.$row['latitude'];  
		//echo '<br /> longitude: '.$row['longitude'];
        $lat = $row['latitude'];
        $lng = $row['longitude'];
		
		echo "<script> var latt=\"$lat\";</script>";
		echo "<script> var lngg=\"$lng\";</script>";
        echo "<script> addMarker()</script>";
		}
		echo "<script> drop()</script>";

		}
		?> 	

</body>
</html>