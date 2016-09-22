<!DOCTYPE html>
<html lang="en">
<head>
  	<title>About</title>
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
    <script src="js/jquery.cycle.all.min.js"></script>
    <script>
		$(function(){
			$('.content-slider').cycle({
				fx: 'fade',
				prev: '.cs-prev',
				next: '.cs-next'
			}); 
		})
	</script>
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
                    <li><a href="forecast.php">Forecasting</a></li>
                    <li class="current"><a href="about.php">About Us</a></li>

                </ul>
            </nav>
            <div class="clear"></div>
        </header>
        <!-- Slider -->
        <div class="mp-slider">
            <ul class="items">
                <li><img src="images/slide-6.jpg" alt="" /><div class="banner"><span class="row-1"><b>Spend</b> a relaxing day</span><span class="row-2">by the  <b>water</b></span></div></li>
                <li><img src="images/slide-4.jpg" alt="" /><div class="banner"><span class="row-1"><b>All</b> the Beauty</span><span class="row-2">of the <b>Sea</b></span></div></li>
                <li><img src="images/slide-5.jpg" alt="" /><div class="banner"><span class="row-1"><b>Find</b> the treasures</span><span class="row-2">of the water <b>World</b></span></div></li>
            </ul>
            <a href="#" class="mp-prev"></a>
            <a href="#" class="mp-next"></a>
        </div>
        <!-- Content -->
        <section id="content"><div class="ic"></div>
            <div class="container_12">
            	<article class="a1">
                	<div class="wrapper">
                        <figure class="img-box img-indent-1">
                        	<img src="images/page2-img4.jpg" alt="">
                        </figure>
                        <div class="extra-wrap">
                            <h3>
                               About our Website
                            </h3>
                            <p class="p2"><b>GoFish website will contain information regarding the nearest fishing spots, weather conditions close to it. It will also give you route suggestions and the time you should reach there for the best chance to catch a fish. It also will give you tips on the different baits, gear required and also licensing. Several datasets and API's are made use of forecast the chances of catching the fish you want. With predictive analysis you would have an idea of what to expect. The plreach will also have a functionality to send out notifications regarding dangerous locations. It will also send out notifications if a fishing spot near your location is in season.
                            </b>
                            </p>
                            <p class="p1">
                            </p>
                        </div>
                    </div>

            </div>
        </section>
        <!-- Footer -->
        <footer>
            <div class="copyright"> Website designed by Team Max        
            
			</div>
            <ul class="social-list">
            	<li><a href="https://twitter.com/zzxsun9"><img src="images/soc-icon-1.png"  target = "_blank"  alt=""></a></li>
                <li><a href="https://www.facebook.com/profile.php?id=100007775943196"><img src="images/soc-icon-2.png"  target = "_blank" alt=""></a></li>
                <li><a href="http://mahara.infotech.monash.edu.au/mahara/view/view.php?id=3967"><img src="images/soc-icon-3.png"  target = "_blank" alt=""></a></li>
            </ul>
        </footer>
    </div>
</div>
</body>
</html>