<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

     require_once ("config/db.php");
	require_once ("config/conexion.php");
	$active_facturas="";
	$active_productos="";
	$active_clientes="";
	if ($_SESSION['user_id']==16){
                        $active_usuarios='';
                        $click='';
                      } else {
                       $active_usuarios='disabled';
                       $click='noclick';
                      } 
	$title="Página Principal | Tapices S. de R.L.";
	
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/clock.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel=icon href='img/logo1.png' sizes="32x32" type="image/png">
     <title><?php echo $title;?></title>

     

<style>
* {box-sizing: border-box}
body { margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>

<body >
	<?php
	include("barra_navegacion.php");
	?>  
	
	<div >
  		<canvas height="40"></canvas>
  <div/>

<div class="container" style="text-align: -webkit-center;">
  <h1 style="color: #cb5c5b" align="center"><span>Bienvenido Usuario</span></h1>
  <h2 style="color: #cb5c5b" align="center"><span>Cosas que puedes hacer</span></h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 45rem;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="img/carousel1.png" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
        
        </div>
      </div>

      <div class="item">
        <img src="img/carousel2.png" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
         
        </div>
      </div>
    
      <div class="item">
        <img src="img/carousel3.png" alt="New York" style="width:100%;">
        <div class="carousel-caption">
         
        </div>
      </div>

      <div class="item">
        <img src="img/carousel4.png" alt="New York" style="width:100%;">
        <div class="carousel-caption">
         
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
      <p class="navbar-text pull-left">&copy <?php echo date('Y');?> - Ingenieria de Software.
           <a href="" target="_blank" style="color: #ffffff">UNAH</a>
      </p>
      <p id="my-clock" style=" float: right; color: white;color: white;margin-top: 10px;margin-right: 10px;font-size: 15px;"></p>
        <p id="my-date" style="float: right;color: white;margin-right: 10px;margin-top: 10px;"></p>
   </div>
</div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/clock.js"></script>
</body>
</html>