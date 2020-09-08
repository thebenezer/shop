<?php
$conn= mysqli_connect("localhost","root","WaddAHq25vaT","monochromatic");

function uploadPic($picfile,$picture)
{
  //IMAGES NOW

}
if (isset($_POST['prod-button'])){
  $pid=$_POST['pid'];
  $name=$_POST['name'];
  $price=$_POST['price'];
  $quantity=$_POST['quantity'];
  $description=$_POST['description'];
  $category=$_POST['category'];
  $pic =$_POST['pic'];
  $subpic1 =$_POST[ 'subpic1'];
  $subpic2 = $_POST[ 'subpic2'];

  $sql="INSERT INTO products (pid,name,quantity,price,description,pic,subpic1,subpic2,category)
        values(?,?,?,?,?,?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql))
  {
    echo "ebeadmin.php?error=sqlerror";
  }
  else
  {
    mysqli_stmt_bind_param($stmt, "ssidssssi",$pid,$name,$quantity,$price,$description,$pic,$subpic1,$subpic2,$category);
    mysqli_stmt_execute($stmt);
    echo "ebeadmin.php?error=success";
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
header("Location: ebeadmin.php?error=success");
exit();
 ?>
