<?php
include("nav.php");
?>


  <div id="content">
    <div class="container">

      <div class="col-md-12">

        <ul class="breadcrumb">

          <li>
            <a href="index.php">Home</a>
          </li>

          <li>checkout</li>

        </ul><!-- breadcrumb Ends -->



      </div>
      <!--- col-md-12 Ends -->
      <div class="row">



        <div class="col-md-10 offset-1">

          <?php

          if (!isset($_SESSION['customer_email'])) {

            include("customer/customer_login.php");
          } else {

            include("payment_options.php");
          }



          ?>


        </div><!-- col-md-9 Ends -->
      </div><!-- row -->


    </div><!-- container Ends -->
  </div><!-- content Ends -->



  <?php

  include("include/footer.php");

  ?>

  <script src="js/jquery.min.js"> </script>

  <script src="js/bootstrap.min.js"></script>

</body>

</html>