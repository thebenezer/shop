<?php
include"header.php";
require 'includes/dbh.inc.php';
require 'includes/invoicegen.php';
if (!isset($_SESSION['fname'])) {
  header("Location: cart.php?illegal-access");
  exit();
}else {
  $fname=$_SESSION['fname'];
  $lname=$_SESSION['lname'];
  $add1=$_SESSION['address1'];
  $add2=$_SESSION['address2'];
  $cnt=$_SESSION['country'];
  $st=$_SESSION['state'];
  $zip=$_SESSION['zipcode'];
  $email=$_SESSION['email'];
  $phno=$_SESSION['phone'];
  $invoiceID="";
  $desc="Products";
  $tot=0.01;
}
if($_SESSION['yesnotes']==1) {
  $notes=$_SESSION['notes'];
}
if (!isset($_SESSION['doneonce'])) {
  $_SESSION['doneonce']='yes';
  $createacc=$_SESSION['createorno'];
  $yesnotes=$_SESSION['yesnotes'];
  $invoiceid=generate_invoicenum();
  $_SESSION['invoicegen']=$invoiceid;
  require 'includes/dbh.inc.php';
  if ($createacc==1 && $yesnotes==1) {
    $password=$_SESSION['password'];
    $notes=$_SESSION['notes'];
    $sql="INSERT INTO customer_details (invoicenum,fname,lname,phno,email,address1,address2,state,country,zipcode,notes,pwd) values(?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt= mysqli_stmt_init($conn);
    mysqli_query($conn,$sql);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssss",$invoiceid,$fname,$lname,$phno,$email,$add1,$add2,$st,$cnt,$zip,$notes,$password);
    mysqli_stmt_execute($stmt);
  }
  elseif ($createacc==1) {
    $password=$_SESSION['password'];
    $sql="INSERT INTO customer_details (invoicenum,fname,lname,phno,email,address1,address2,state,country,zipcode,pwd) values(?,?,?,?,?,?,?,?,?,?,?);";
    $stmt= mysqli_stmt_init($conn);
    mysqli_query($conn,$sql);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt, "sssssssssss",$invoiceid,$fname,$lname,$phno,$email,$add1,$add2,$st,$cnt,$zip,$password);
    mysqli_stmt_execute($stmt);
  }
  elseif($yesnotes==1) {
    $notes=$_SESSION['notes'];
    $sql="INSERT INTO customer_details (invoicenum,fname,lname,phno,email,address1,address2,state,country,zipcode,notes) values(?,?,?,?,?,?,?,?,?,?,?);";
    $stmt= mysqli_stmt_init($conn);
    mysqli_query($conn,$sql);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt, "sssssssssss",$invoiceid,$fname,$lname,$phno,$email,$add1,$add2,$st,$cnt,$zip,$notes);
    mysqli_stmt_execute($stmt);
  }
  else {
    $sql="INSERT INTO customer_details (invoicenum,fname,lname,phno,email,address1,address2,state,country,zipcode) values(?,?,?,?,?,?,?,?,?,?);";
    $stmt= mysqli_stmt_init($conn);
    mysqli_query($conn,$sql);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt, "ssssssssss",$invoiceid,$fname,$lname,$phno,$email,$add1,$add2,$st,$cnt,$zip);
    mysqli_stmt_execute($stmt);
  }
  mysqli_close($conn);

  $invoiceID=$_SESSION['invoicegen'];
}

?>
<!-- create table customer_details(custnum int AUTO_INCREMENT primary key,invoicenum varchar(15),fname varchar(50),lname varchar(50),phno varchar(15),email varchar(100),address1 varchar(200),address2 varchar(200),state varchar(50),country varchar(50),zipcode varchar(20),notes varchar(200) default 'none',pwd varchar(500) default 'none',foreign key(invoicenumber) references invoicenumber(invoicenum)); -->
<body>
  <div style="text-align:center;">
    <!-- <h2 class="text-black">Monochromatic Shop</h2> -->
    <!-- <a href="about.php"><img src="images/Capture2.png" height="40px" alt="Sketch-Store"></a> -->
  <a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" style="padding-left:10px;">
    <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-150px.png" border="0" alt="PayPal Logo"></a>
  </div>
  <div class="site-section">
      <div class="container">
<style media="screen">
@media screen and (max-width: 600px) {
  .address {
    font-family: "Playfair Display", serif;
    font-weight: 400;
    font-size: 15px;
    line-height: 1.3;
    color: #828282;
    background: #fff;
  }
}
</style>
        <div class="row" id="complete">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 text-black" style="color:black;">Ship To :</h2>
            <div class="p-3 p-lg-5 border address">
              <?php
              echo '
                <p>'.$fname.' '.$lname.'<br>'.$add1.','.$add2.'<br>'.$cnt.','.$st.'-'.$zip.'</p>';
                if($_SESSION['yesnotes']==1){
                  echo '<p><strong>Order Notes:</strong></p>
                  <p>'.$notes.'</p>
                  ';
                }
              ?>
            </div>
          </div>


          <div class="col-md-6">
            <h2 class="h3 text-black" style="color:black;">Order Items :</h2>
            <table class="table table-bordered site-block-order-table mb-5">
              <thead>
                <th>Product</th>
                <th style="text-align:center;">Total</th>
              </thead>
              <tbody>
                <?php

                $vid =$_COOKIE['vid'];
                $empty=0;
                $conn= mysqli_connect("localhost","root","","monochromatic");
                $sql = "SELECT pid,quantity FROM cart WHERE vid=?;";
                $stmt= mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                  header("Location: errors.php?error=checkcart-connfail");
                  exit();
                }
                else {
                  mysqli_stmt_bind_param($stmt, 's',$vid);
                  mysqli_stmt_execute($stmt);
                  $result = $stmt->get_result();
                  if ($result->num_rows >0) {
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
                        $name=$row2['name'].' ';
                        $prodtotal=$quantity *$price;
                        $tot=$tot+$prodtotal;
                        echo '
                        <tr>
                          <td>'.htmlspecialchars($name).'<strong class="mx-2">x </strong>'.htmlspecialchars($quantity).'</td>
                          <td style="text-align:center;">'.htmlspecialchars($prodtotal).'</td>
                        </tr>';
                      }
                    }
                  echo '
                  <tr>
                    <td class="text-black font-weight-bold"><strong>Shipping</strong></td>
                    <td class="text-black" style="text-align:center;">-</td>
                  </tr>
                  <tr>
                    <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                    <td class="text-black font-weight-bold" style="text-align:center;">'.htmlspecialchars($tot).'</strong></td>
                  </tr>';
                  mysqli_stmt_close($stmt);
                  mysqli_close($conn);
                }
                else {
                  mysqli_stmt_close($stmt);
                  mysqli_close($conn);
                  echo '<script>window.location.replace("cart.php");</script>';
                }
              }
                 ?>
              </tbody>
            </table>
          </div>
        </div>



      </div>
    </div>
    <div class="container">
    <div style="text-align:center;">
      <script
        src="https://www.paypal.com/sdk/js?client-id=AdUfs155hbsqLcVXWFpohb2fRt2-noovFWlkv0ch5xLs4c-pKDz_3SZYppQrJn4oQeBAtZrelsuKn654"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
      </script>
      <p id="demo"></p>
      <div id="paypal-button-container"></div>
      <script>
        paypal.Buttons({
          style: {
                    color:  'blue',
                    shape:  'rect',
                    label:  'pay',
                    height: 40
                },

          createOrder: function(data, actions) {
          // This function sets up the details of the transaction, including the amount and line item details.
          return actions.order.create({
            intent:"CAPTURE",
            application_context:{
              brand_name:"Monochromatic Shop",
              shipping_preference: 'NO_SHIPPING',
              user_action:"PAY_NOW",
              return_url: "http://34.65.134.148/paypalcheckout/dummy.php",
              cancel_url:"http://34.65.134.148/paypalcheckout/dummy.php"
            },
            payer:{
              name:{
                given_name:"<?php echo $fname ?>",
                surname:"<?php echo $lname ?>"
              },
              email_address:"<?php echo $email  ?>",
            },
            purchase_units: [{
              amount: {
                currency_code: "USD",
                value: "<?php echo $tot ?>"
              },
              description: "<?php echo $desc  ?>",
              invoice_id: "<?php echo $invoiceID  ?>"
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name);
            //document.getElementById("demo").innerHTML = data.orderID;
            window.scrollTo(0, 0);
            document.getElementById("complete").innerHTML = '';
            document.getElementById("paypal-button-container").innerHTML = '<h3>Payment Successful! Your order will be shipped soon.</h3><br><p>To download the receipt please click <a href="dummy.php">here</a>.</p>';
            // Call your server to save the transaction
            return fetch('/paypalcheckout/paypalcomplete.php', {
              method: 'post',
              headers: {
                'content-type': 'application/json'
              },
              body: JSON.stringify({
                orderID: data.orderID
              })
            });
          }).then(function () {setTimeout( 3000);window.location.replace("order-complete.php");});
        },
        onCancel: function (data, actions) {
        // Show a cancel page or return to cart
        }
        }).render('#paypal-button-container');
      </script>
    </div>
  </div>

<?php include"footer.html" ?>



</body>
</html>
