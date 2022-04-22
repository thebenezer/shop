<?php
function checkcookiename($conn,$randstr)
{
  $tf=false;
  $sql="SELECT vid from visitors;";
  $stmt= mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
    echo "Sorry, There seems to be some error. Please try again later.. :p";
    header("Location: ../errors.php?error=cookie-conn2fail");
    exit();
  }
  else {
    mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
      if ($row['vid']==$randstr) {
        $tf=true;break;//true means,its not unique
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
  return $tf;
}
function createcookie()
{
  $conn= mysqli_connect("localhost","root","","monochromatic");
  $val="VISITOR-";
  $str="abcdefghijklmnopqrstuvwxyz";
  $randstr=substr(str_shuffle($str),0,5);
  $val=$val.$randstr;
  $check=checkcookiename($conn,$val);
  while($check)//runs as long as its true
  {
    $randstr=substr(str_shuffle($str),0,5);
    $val=$val.$randstr;
    $check=checkcookiename($conn,$val);
  }
  $conn2= mysqli_connect("localhost","root","","monochromatic");
  $sql2="INSERT INTO visitors (vid) values(?)";
  $stmt2= mysqli_stmt_init($conn2);
  if(!mysqli_stmt_prepare($stmt2,$sql2)){
    echo "Sorry, There seems to be some error. Please try again later.. :p";
    header("Location: ../errors.php?error=cookie-connfail");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt2, 's',$val);
    mysqli_stmt_execute($stmt2);
  }
  mysqli_stmt_close($stmt2);
  mysqli_close($conn2);
  return $val;
}
?>
