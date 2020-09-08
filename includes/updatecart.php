<?php
require '../header.php';
//COMING HERE FROM CART PAGE
if (isset($_POST['rem-but'])) {
  $pid = $_POST['rem-but'];
  header("Location: ../cart.php?action=remove&pid=".$pid);
  exit();
}
else if (isset($_POST['update-cart'])){
  $vid=$_COOKIE['vid'];
  require 'dbh.inc.php';
  $sql = "SELECT * from cart where vid=?;";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    header("Location: ../errors.php?error=updatefail1");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt, 's',$vid);
    mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
    $pid_tochange = array();
    $change_yesno="";
    if($result->num_rows === 0){header("Location: ../errors.php?error=nonexistent_rec");exit();}
    while($row = $result->fetch_assoc()) {
      $pid = $row['pid'];
      $quan = $row['quantity'];
      if($quan!=$_POST['quantity-'.$pid]){$pid_tochange[$pid]=$_POST['quantity-'.$pid];$change_yesno.="success";}
    }
    if (empty($change_yesno)) {
      $change_yesno="none";
    }
    else {
      $change_yesno.="&";
      foreach ($pid_tochange as $key => $value) {
        $change_yesno.=$key."=".$value;
        $sql="UPDATE cart SET quantity=? where vid=? AND pid=?";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          echo "Sorry, There seems to be some error. Please try again later.. :p";
          header("Location: ../errors.php?error=updatefail2");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, 'iss',$pid_tochange[$key],$vid,$key);
          mysqli_stmt_execute($stmt);
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: ../cart.php?action=update&status=".$change_yesno);
    exit();
  }

}
else if (isset($_GET['clear-cart'])) {
  header("Location: ../cart.php?action=clear");
  exit();
}
else if (isset($_GET['cont-shop'])) {
  header("Location: ../product.php");
  exit();
}
else {
  header("Location: ../errors.php?error=up-illegalaccess");
  exit();
}
