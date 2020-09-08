<?php include"header.php";
require 'includes/dbh.inc.php';

?>

<body>

<div id="fh5co-product">
  <div class="container">
    <div class="row animate-box">
      <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
        <h2>Artworks</h2>
      </div>
    </div>
    <div class="row">
      <?php
      $sql = "SELECT * from products;";
      $stmt= mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../errors.php?error=selprod-connfail");
        exit();
      }
      else {
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        if($result->num_rows === 0){
          echo '<div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
              <p>Sorry. There seem to be no products under this category yet.</p>
              <p>We\'re working on getting some exciting stuff soon !</p>
            </div>
          </div>';
        }
        while($row = $result->fetch_assoc()) {
          $pid = $row['pid'];
          $name = $row['name'];
          $price =$row['price'];
          $pic=$row['pic'];
          echo '<div class="col-md-4 text-center animate-box">
            <div class="product">
              <div class="product-grid" style="background-image:url(images/'.htmlspecialchars($pic).');">
                <div class="inner">
                  <p>
                    <a href="product.php?action=add&pid='.htmlspecialchars($pid).'" class="icon"><i class="icon-shopping-cart"></i></a>
                    <a href="single.php?pid='.htmlspecialchars($pid).'" class="icon"><i class="icon-eye"></i></a>
                  </p>
                </div>
              </div>
              <div class="desc">
                <h3><a href="single.php?pid='.htmlspecialchars($pid).'">'.htmlspecialchars($name).'</a></h3>
                <span class="price">$'.htmlspecialchars($price).'</span>
              </div>
            </div>
          </div>';
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
      }

       ?>

    </div>
  </div>
</div>

<?php include"footer.html" ?>



</body>
</html>
