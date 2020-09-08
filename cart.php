<?php include"header.php";
require 'includes/dbh.inc.php';$cart_total=0; ?>
<body>
  <div class="row animate-box">
    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
      <h2>Cart</h2>
    </div>
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row mb-5">


                <?php
                //DISPLAYING CART CONTENT
                $vid =$_COOKIE['vid'];
                $empty=0;
                //SELECTING PRODUCT NAME,PIC AND PRICE
                $sql = "SELECT pid,quantity FROM cart WHERE vid=?;";
                $stmt= mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                  header("Location: errors.php?error=cart-connfail1");
                  exit();
                }
                else {
                  mysqli_stmt_bind_param($stmt, 's',$vid);
                  mysqli_stmt_execute($stmt);
                  $result = $stmt->get_result();
                  if ($result->num_rows >0) {
                    echo '<form class="col-md-12" method="post" action="includes/updatecart.php">
                        <div class="site-blocks-table">
                        <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th >Product</th>
                            <th >Price</th>
                            <th >Quantity</th>
                            <th >Total</th>
                          </tr>
                        </thead>
                        <tbody>';
                      while ($row = $result->fetch_assoc()) {
                        $pid = $row['pid'];
                        $quantity = $row['quantity'];
                        $sql2="SELECT name,price,pic from products where pid=?";
                        if(!mysqli_stmt_prepare($stmt,$sql2)){
                          header("Location: errors.php?error=cart-connfail2");
                          exit();
                        }
                        else {
                          mysqli_stmt_bind_param($stmt, 's',$pid);
                          mysqli_stmt_execute($stmt);
                          $result = $stmt->get_result();
                          $row2 = $result->fetch_assoc();
                          $price =$row2['price'];
                          $pic=$row2['pic'];
                          $name=$row2['name'];
                          $total=$quantity*$price;
                          $cart_total+=$total;
                          echo '
                          <tr>
                      <td><br>
                        <a href="single.php?pid='.$pid.'">
                          <img src="images/'.htmlspecialchars($pic).'" alt="Image" class="img-fluid">
                          <h2 class="h5 text-black">'.htmlspecialchars($name).'</h2>
                        </a>
                      </td>
                      <td><div>'.htmlspecialchars($price).'</div></td>
                      <td>
                        <label>
                          <input type="number" name="quantity-'.$pid.'" class="form-control text-center" value='.htmlspecialchars($quantity).' min="1">
                        </label>
                      </td>
                      <td>
                        <div>'.htmlspecialchars($total).'</div>
                        <br>
                          <button type="submit" name="rem-but" class="butt" value="'.htmlspecialchars($pid).'">
                            <img src="images/delete.png" class="uprem" style="border:none;" alt="Remove"> </button>
                      </td>
                    </tr>';
                      }
                    }
                  }
                  else {
                    $empty=1;
                  }
                  mysqli_stmt_close($stmt);
                  mysqli_close($conn);
                }
                ?>
              </tbody>
            </table>
          </div>
      </div>
          <?php
          if ($empty==0) {
            echo '
            <button type="submit" class="btn btn-primary btn-sm btn-block" name="update-cart">Update Cart</button>
            </form>

                  <!-- CONTINUE SHOPPING -->
                    <button class="btn btn-outline-primary btn-sm btn-block" onclick="window.location=\'product.php\'">Continue Shopping</button>
                  <!-- FOR COUPON CODE -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-12">
                        <h3 class="text-black h4 text-uppercase" style="padding-left:0px;">Coupon</h3><br>
                          <p>Enter your coupon code if you have one.</p>
                        </div>
                        <form action="include/cart.inc.php" method="post">
                          <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                          </div>
                          <div class="col-md-4" style="padding-top:2px;">
                            <button type="submit" class="btn btn-primary btn-sm btn-block">Apply Coupon</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- CALCULATING TOTAL -->
                    <div class="col-md-6 pl-5">
                      <div class="row justify-content-end">
                        <div class="col-md-7">
                          <div class="row">
                              <h3 class="text-black h4 text-uppercase" style="padding-left:15px;">Cart Total</h3>
                          </div>
                            <span class="text-black">Subtotal </span>
                              <strong class="text-black" style="padding-left:130px;">$'.$cart_total.'</strong><br>
                            <span class="text-black">Discount</span>
                              <strong class="text-black" style="padding-left:123px;">-</strong><br>
                            <span class="text-black">Total </span>
                              <strong class="text-black" style="padding-left:150px;">$'.$cart_total.'</strong>


                          <div class="row">
                            <div class="col-md-12" style="padding-bottom:10px;">
                                <button class="btn btn-primary btn-lg btn-block" style="background:Black;" onclick="window.location=\'details.php\'">Proceed To Checkout</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            ';
          }
          else {?>
            <div class="row animate-box">
              <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <p>There seem to be no products in your cart yet.</p>
                <button value="cont-shop" class="btn btn-outline-primary btn-sm btn-block" onclick="window.location='product.php'">Continue Shopping</button>
              </div>
            </div>
            <?php
          }
           ?>

    </div>
  </div>
	<?php include"footer.html" ?>
</body>
</html>
