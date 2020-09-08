<?php
  session_start();
  include 'includes/cookiemaker.php';
  if(isset($_COOKIE['vid'])) {
    //RENEW COOKIE
    //echo $_COOKIE['vid'];
    setcookie("vid",$_COOKIE['vid'],time()+(86400*30),"/");
  }
  else {
    //CREATE NEW COOKIE HERE
    $val=createcookie();
    setcookie("vid",$val,time()+(86400*30),"/");
  }
 ?>
 <!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ShetchShark-Shop</title>
  <link rel="shortcut icon" type="image/png" href="images/capture2.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="black artworks" />
	<meta name="keywords" content="art, shetchshark, dotwork, prints, design" />
	<meta name="author" content="shetchshark" />



  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
<div class="fh5co-loader"></div>

<div id="page">
<nav class="fh5co-nav" role="navigation">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-xs-2">
        <div id="fh5co-logo"><a href="index.php"><img src="images/capture2.png" height="40px" alt="Sketch-Store"></a></div>
      </div>
      <div class="col-md-6 col-xs-6 text-center menu-1">
        <ul>
          <li><a href="index.php">Home</a></li>
					<li>
            <a href="product.php">Artworks</a>
          </li>
          <!-- <li class="has-dropdown">
            <a href="product.php">Products</a>
            <ul class="dropdown">
              <li><a href="#">Prints</a></li>
              <li><a href="#">Originals</a></li>
              <li><a href="#">Frames</a></li>
            </ul>
          </li> -->
					<li><a href="frames.php">Frames</a></li>
          <li><a href="about.php">About</a></li>
          <!-- <li><a href="contact.php">Contact</a></li> -->
        </ul>
      </div>
      <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
        <ul>
          <!-- <li class="search">
            <div class="input-group">
                <input type="text" placeholder="Search..">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
                </span>
              </div>
          </li> -->
					<li class="shopping-cart"><a href="cart.php" class="cart"><span>
					<?php
					$conn= mysqli_connect("localhost","root","","monochromatic");
          $vid=$_COOKIE['vid'];
          $sql = "SELECT count(*)as cnt from cart where vid='$vid';";
          $result= mysqli_query($conn,$sql);
          $row =mysqli_fetch_assoc($result);
          $count=$row['cnt'];
					echo '<small>'.htmlspecialchars($count).'</small>';
          mysqli_close($conn);
					 ?>
					<i class="icon-shopping-cart"></i></span></a></li>
          <!-- <li class="shopping-cart"><a href="cart.php" class="cart"><span><small>1</small><i class="icon-shopping-cart"></i></span></a></li> -->
        </ul>
      </div>
    </div>

  </div>
</nav>
