<?php include"header.php";
require 'includes/dbh.inc.php';?>

<body>

<div id="fh5co-product">
  <div class="container">
    <div class="row animate-box">
      <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
        <h2>Frames</h2>
      </div>
    </div>
    <div class="row">
      <?php
      $sql = "SELECT * from products where category=2;";
      $stmt= mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: errors.php?error=frame-connfail");
        exit();
      }
      else {
        // mysqli_stmt_bind_param($stmt, 's',$vid);
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        if ($result->num_rows >0) {
        while ($row = mysqli_fetch_assoc($result)) {
          //$libid = $row['libid'];
          $pid = $row['pid'];
          $name = $row['name'];
          $price =$row['price'];
          $pic=$row['pic'];
          echo '<div class="col-md-4 text-center animate-box">
            <div class="product">
              <div class="product-grid" style="background-image:url(images/prodImage/'.htmlspecialchars($pic).');">
                <div class="inner">
                  <p>
                   <form style="padding-top:300px;" action="includes/redirect.inc.php" method="post">
                     <button type="submit" class="prodbutt" name="addtocart-product" value="'.htmlspecialchars($pid).'"><a href="single.php" class="icon">
                       <i class="icon-shopping-cart"></i>
                     </a></button>
                     <button type="submit" class="prodbutt" name="viewbutton" value="'.htmlspecialchars($pid).'"><a href="single.php" class="icon">
                       <i class="icon-eye"></i>
                     </a></button>
                   </form>
                  </p>
                </div>
              </div>
              <div class="desc">
                <h3><form action="single.php" method="post">
                  <a href="#"><button style="outline: none;" type="submit" name="hrefbuttononproductpage" value="'.htmlspecialchars($pid).'" class="butt">'.htmlspecialchars($name).'</button></a>
                </form></h3>
                <span class="price">$'.htmlspecialchars($price).'</span>
              </div>
            </div>
          </div>';
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
      }
      else {
        echo '<div class="row animate-box">
          <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
            <p>OOPS! There seem to be no products under this category yet.</p>
            <p>We\'re working on getting some exciting stuff soon !</p>
          </div>
        </div>';
      }
    }

       ?>

    </div>
  </div>
</div>

<?php include"footer.html" ?>



</body>
</html>
