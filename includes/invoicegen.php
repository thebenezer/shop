<?php
function generate_invoicenum()
{

  $conn= mysqli_connect("localhost","root","","monochromatic");
  $invoiceid=0;
  $sql = "SELECT max(sno)as snum from invoicenumber;";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    //Unable to find invoice numbers
    header("Location: ../errors.php?error=ingen-connfail");
    exit();
  }
  else {
    mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
    if($result->num_rows === 0){
      echo "Could not generate invoice number... Please try again later...";
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
      header("Location: ../errors.php?error=ingenfail");
      exit();
    }
    else{
      $row = $result->fetch_assoc();
      $num=(int)$row['snum']+1;
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
      $invoiceid=date("Ymd").$num;
      echo '<p>'.$num.'</p><br><p>'.$invoiceid.' </p>';
      $conn2= mysqli_connect("localhost","root","","monochromatic");
      $sql2="INSERT INTO invoicenumber (sno,invoicenum) values(?,?)";
      $stmt2= mysqli_stmt_init($conn2);
      if(!mysqli_stmt_prepare($stmt2,$sql2)){
        echo "Sorry, There seems to be some error. Please try again later.. :p";
        header("Location: ../errors.php?error=ingen-connfail");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt2, 'is',$num,$invoiceid);
        mysqli_stmt_execute($stmt2);
      }
      mysqli_stmt_close($stmt2);
      mysqli_close($conn2);
    }
  }
  return $invoiceid;
}
?>
