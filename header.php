
<?php
  session_start();
  include 'includes/cookiemaker.php';
  require 'includes/dbh.inc.php';
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

  //SESSION variable for cart
  if(!empty($_GET["action"])) {
    if(!empty($_GET['pid']))
    {$pid=$_GET['pid'];}
    $vid=$_COOKIE['vid'];
    switch($_GET["action"]) {
      case "add":
        $vid=$_COOKIE['vid'];
        $sql="INSERT INTO cart (vid,pid) values(?,?)";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          echo "Sorry, There seems to be some error. Please try again later.. :p";
          header("Location: errors.php?error=addfail");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, 'ss',$vid,$pid);
          mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        break;
      case "remove":
        $sql = "DELETE FROM cart WHERE vid=? AND pid=?;";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          echo "Sorry, There seems to be some error. Please try again later.. :p";
          header("Location: errors.php?error=remfail");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, 'ss',$vid,$pid);
          mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        break;
      // case "update":
      //     echo '<script>alert("Cart Updated!");</script>';
      //   break;
      case "updatefail":
          echo '<script>alert("Could not update Cart!");</script>';
        break;
      case "clear":
        $sql = "DELETE FROM cart WHERE vid=?";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          echo "Sorry, There seems to be some error. Please try again later.. :p";
          header("Location: errors.php?error=clearfail");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, 's',$vid);
          mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        break;
    }
  }

 ?>
 <!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ShetchShark-Shop</title>
  <link rel="shortcut icon" type="image/png" href="images/Capture2.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="black artworks" />
	<meta name="keywords" content="art, shetchshark, dotwork, prints, design, tote" />
	<meta name="author" content="shetchshark" />


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
        <div id="fh5co-logo"><a href="index.php"><img src="images/Capture2.png" height="40px" alt="Sketch-Store"></a></div>
      </div>
      <div class="col-md-6 col-xs-6 text-center menu-1">
        <ul>
          <li><a href="index.php">Home</a></li>
					<li>
            <a href="product.php">Shop</a>
          </li>
					<li><a href="frames.php">Frames</a></li>
          <li><a href="about.php">About</a></li>
          <!-- <li><a href="contact.php">Contact</a></li> -->
        </ul>
      </div>
      <ul style="padding-left:70%;">
        <li class="shopping-cart"><a href="cart.php" class="cart"><span>
        <?php
        $conn= mysqli_connect("localhost","root","WaddAHq25vaT","monochromatic");
        $vid=$_COOKIE['vid'];
        $sql = "SELECT count(*)as cnt from cart where vid=?;";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../errors.php?error=cartretfail");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, 's',$vid);
          mysqli_stmt_execute($stmt);
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();
          $count=$row['cnt'];
          echo '<small>'.htmlspecialchars($count).'</small>';
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
         ?>
        <i class="icon-shopping-cart" style="font-size:20px;"></i></span></a></li>
      </ul>
      <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
        <!-- <ul>
					<li class="shopping-cart"><a href="cart.php" class="cart"><span> -->
					<?php
					// $conn= mysqli_connect("localhost","root","WaddAHq25vaT","monochromatic");
          // $vid=$_COOKIE['vid'];
          // $sql = "SELECT count(*)as cnt from cart where vid=?;";
          // $stmt= mysqli_stmt_init($conn);
          // if(!mysqli_stmt_prepare($stmt,$sql)){
          //   header("Location: ../errors.php?error=cartretfail");
          //   exit();
          // }
          // else {
          //   mysqli_stmt_bind_param($stmt, 's',$vid);
          //   mysqli_stmt_execute($stmt);
          //   $result = $stmt->get_result();
          //   $row = $result->fetch_assoc();
          //   $count=$row['cnt'];
  				// 	echo '<small>'.htmlspecialchars($count).'</small>';
          // }
          // mysqli_stmt_close($stmt);
          // mysqli_close($conn);
					 ?>
					<!-- <i class="icon-shopping-cart"></i></span></a></li>
        </ul> -->
      </div>
    </div>

  </div>
</nav>
