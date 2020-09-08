<?php
require 'dbh.inc.php';require '../header.php';


if (isset($_POST['addtocart-product'])) {
  $pid=$_POST['addtocart-product'];
  $vid=$_COOKIE['vid'];
  $conn= mysqli_connect("localhost","root","WaddAHq25vaT","monochromatic");
  $stmt= mysqli_stmt_init($conn);
  $sql="INSERT INTO cart (vid,pid) values(?,?)";
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("Location: ../errors.php?error=addcart-connfail");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt, 'ss',$vid,$pid);
    mysqli_stmt_execute($stmt);
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
  header("Location: ../product.php?pid=".$pid."&add=success");
  exit();
}


else if (isset($_POST['addtocart-single'])) {
  $pid = $_POST['addtocart-single'];
  header("Location: ../single.php?pid=".$pid."&add=success");
  exit();
}


else if (isset($_POST['details-submit'])) {
  session_destroy();
  session_start();
  $createacc=0;
  $yesnotes=0;
  if($_POST['password']!='none'){
    $createacc=1;
    $_SESSION['password']=$_POST['password'];
  }
  if(!empty ($_POST['notes'])){
    $yesnotes=1;
    $_SESSION['notes']=$_POST['notes'];
  }
  $_SESSION['createorno']=$createacc;
  $_SESSION['yesnotes']=$yesnotes;
  $_SESSION['fname']=$_POST['fname'];
  $_SESSION['lname']=$_POST['lname'];
  $_SESSION['address1']=$_POST['address1'];
  $_SESSION['address2']=$_POST['address2'];
  $_SESSION['country']=$_POST['country'];
  $_SESSION['state']=$_POST['state'];
  $_SESSION['zipcode']=$_POST['zipcode'];
  $_SESSION['email']=$_POST['email'];
  $_SESSION['phone']=$_POST['phone'];
  header("Location: ../checkout-payment.php");
  exit();
}
else if (isset($_POST['buyframe'])) {
  header("Location: ../frames.php");
  exit();
}

else if (isset($_POST['newsletter-button'])) {
  $email = $_POST['email'];
  $name = $_POST['name'];
  $conn= mysqli_connect("localhost","root","WaddAHq25vaT","monochromatic");
  $stmt= mysqli_stmt_init($conn);
  $sql="INSERT INTO newsletter (email,name) values(?,?)";
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("Location: ../index.php?subscribe=fail");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt, 'ss',$email,$name);
    mysqli_stmt_execute($stmt);
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
  header("Location: ../index.php?subscribe=success");
  exit();
}

else {
  header("Location: ../errors.php?error=re-illegalaccess");
  exit();
}
