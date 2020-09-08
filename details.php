<?php include"header.php" ?>
<body>
  <div style="text-align:center;">
    <h2 class="text-black">Monochromatic Shop</h2>
    <a href="index.php"><img src="images/Capture2.png" height="40px" alt="Sketch-Store"></a>
  <a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" style="padding-left:10px;"><img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/IN/logo-center/logo-center-other-options-white-secured-pp.png" border="0" alt="Secured by PayPal"></a>
  </div>
  <div id="id01" class="modal">

    <form class="modal-content animate" action="/action_page.php" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>

      <div class="contain">
        <div style="overflow:hidden">

        <label for="uname"><b>Username</b></label>
        <input type="text"  class="loginput" placeholder="Enter Username" name="uname" required>
        <br>
        <label for="psw"><b>Password</b></label>
        <input type="password" class="loginput" placeholder="Enter Password" name="psw" required>
        <br><br>
        <div class="compliance">
          <p>By clicking login, you agree to our <a href="privacy.php">Privacy Policy</a> and <a href="terms.php">Terms</a>.</p>
        </div>
        <button class="btn btn-primary btn-sm btn-block" type="submit" value="loginsubmit">Login</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-outline-primary btn-sm btn-block">Cancel</button>

      </div>
      </div>
    </form>
  </div>

  <script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  </script>
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <!-- <div class="col-md-12 mb-0"><a href="cart.php">Cart</a> <span class="mx-2 mb-0">/</span><strong class="text-black">Details</strong><span class="mx-2 mb-0">/</span> <strong class="text-black">Payment</strong></div> -->
      </div>
      <!-- <div class="row">
        <a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" style="padding-left:10px;"><img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/IN/logo-center/logo-center-other-options-white-secured-pp.png" border="0" alt="Secured by PayPal"></a>
      </div> -->
    </div>
  </div>
  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="returncustomer" role="alert"><br>
            Returning customer? <a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Click here</a> to login
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">

          <form class="" action="includes/redirect.inc.php" method="post">
            <h2 class="h3 mb-3 text-black">Shipping Details</h2>
            <div class="p-3 p-lg-5 border">
              <!-- <div class="form-group">
                <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
                <select id="c_country" class="form-control" required name="country">
                  <option value="" disabled selected hidden>Select a country</option>
                  <option value="2">bangladesh</option>
                  <option value="3">Algeria</option>
                  <option value="4">Afghanistan</option>
                  <option value="5">Ghana</option>
                  <option value="6">Albania</option>
                  <option value="7">Bahrain</option>
                  <option value="8">Colombia</option>
                  <option value="9">Dominican Republic</option>
                </select>
              </div> -->
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="fname" required>
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="lname" required>
                </div>
              </div>
<!--
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_companyname" class="text-black">Company Name </label>
                  <input type="text" class="form-control" id="c_companyname" name="c_companyname">
                </div>
              </div> -->

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="address1" placeholder="Address Line 1" required>
                </div>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="address2" placeholder="Address Line 2" required>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">Country <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="country" required>
                </div>
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">State <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="state" required>
                </div>
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Postal / Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="zipcode" required>
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="c_email_address" name="email" required>
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="phone" required placeholder="Phone Number">
                </div>
              </div>

              <div class="form-group">
                <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account">
                  <input type="checkbox" name="pswd" value="1" id="c_create_account"> Create an account?</label>
                <div class="collapse" id="create_an_account">
                  <div class="py-2">
                    <p class="mb-3">Create an account by entering the information below. If you are a returning customer please click login at the top of the page.</p>
                    <div class="form-group">
                      <label for="c_account_password" class="text-black">Account Password</label>
                      <input type="password" class="form-control" id="c_account_password" name="password" value="none" placeholder="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="c_order_notes" class="text-black">Order Notes</label>
                <textarea name="notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
              </div>
              <div class="compliance">
                <p>By clicking the below button, you agree to our <a href="privacy.php">Privacy Policy</a> and <a href="terms.php">Terms</a>.</p>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block" type="submit" style="background:Black;" name="details-submit">View Order Summary</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div style="text-align:center;">
            <div >
              <h2 class="h3 mb-3 text-black">Monochromatic Shop</h2>
              <a href="about.php"><img src="images/Capture2.png" height="40px" alt="Sketch-Store"></a>
              <br><br>
              <div class="p-3 p-lg-5 border">
                <a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/IN/logo-center/logo-center-other-options-blue-secured-pp.png" border="0" alt="Secured by PayPal"></a>

              </div>
              <!-- <a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/IN/logo-center/logo-center-solution-graphics.png" border="0" alt="PayPal Acceptance Mark"></a> -->
            </div>
          </div>

        </div>
        </div>
      </div>
    </div>

<?php include"footer.html" ?>



</body>
</html>
