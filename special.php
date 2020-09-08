<?php include"header.php"; ?>
<body>
  <div class="row animate-box">
    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
      <h2>Custom Orders</h2>
    </div>
  </div>
<div  class="site-section">
  <div class="container">
    <div class="row">

      <div class="col-md-6 animate-box">
        <h3 id="contact-form">Get In Touch</h3>
        <form action="contact.inc.php" method="post" >
          <div class="row form-group">
            <input type="hidden" name="contact-type" value="special">
            <div class="col-md-6">
              <!-- <label for="fname">First Name</label> -->
              <input type="text" id="fname" name="fname"class="form-control" placeholder="Your Firstname" required>
            </div>
            <div class="col-md-6">
              <!-- <label for="lname">Last Name</label> -->
              <input type="text" id="lname" name="lname" class="form-control" placeholder="Your Lastname" required>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <!-- <label for="email">Email</label> -->
              <input type="text" id="email" name="email" class="form-control" placeholder="Your email address" required>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <!-- <label for="subject">Subject</label> -->
              <input type="text" id="subject" name="subject" class="form-control" value="Custom-made artwork request." placeholder="Custom-made artwork request.">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <!-- <label for="message">Message</label> -->
              <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Describe your request and we'll contact you through mail." required></textarea>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm btn-block" name="contac-submit">Send Message</button>
          </div>

        </form>
      </div>
      <div class="col-md-5 col-md-push-1 animate-box">

        <div class="fh5co-contact-info">
          <h3>Contact Information</h3>
          <ul>
            <li class="email"><a href="#contact-form">info@monochromaticshop.com</a></li>
            <a href="https://www.instagram.com/sketch_shark/" target="_blank"><i class="icon-instagram" style="font-size:20px;padding-right:20px;"></i>Instagram(@sketch_shark)</a>
            <br><br>
            <li class="url"><a href="http://monochromaticshop.com">monochromaticshop.com</a></li>
          </ul>
        </div>

      </div>
    </div>

  </div>
</div>

<div id="map" class="animate-box" data-animate-effect="fadeIn"></div>

<?php include"footer.html" ?>

</body>
</html>
