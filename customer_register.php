<?php
include("nav.php");
?>
  


  <div id="content">
    <!-- content Starts -->
    <div class="container">

      <div class="col-md-12">

        <ul class="breadcrumb">

          <li>
            <a href="index.php">Home</a>
          </li>

          <li>Register</li>

        </ul><!-- breadcrumb Ends -->



      </div> <!--- col-md-12 Ends -->


      <div class="row">

        
        <div class="col-md-10 offset-1">

          <div class="box">

            <div class="box-header">

                <h2 class="text-center"> Register A New Account </h2>

            </div><!-- box-header Ends -->

            <form action="customer_register.php" method="post" enctype="multipart/form-data">

              <div class="form-group d-flex w-100">

                <label class="w-25 ml-1">Customer Name</label>

                <input type="text" class="form-control" name="c_name" required>

              </div><!-- form-group Ends -->

              <div class="form-group d-flex w-100">

                <label class="w-25 ml-1"> Customer Email</label>

                <input type="text" class="form-control" name="c_email" required>

              </div><!-- form-group Ends -->

              <div class="form-group d-flex w-100">

                <label class="w-25 ml-1"> Customer Password </label>

                <input type="password" class="form-control" name="c_pass" required>

              </div><!-- form-group Ends -->


              <div class="form-group d-flex w-100">

                <label class="w-25 ml-1"> Customer Country </label>

                <input type="text" class="form-control" name="c_country" required>

              </div><!-- form-group Ends -->

              <div class="form-group d-flex w-100">

                <label class="w-25 ml-1"> Customer City </label>

                <input type="text" class="form-control" name="c_city" required>

              </div><!-- form-group Ends -->

              <div class="form-group d-flex w-100">

                <label class="w-25 ml-1"> Customer Contact </label>

                <input type="text" class="form-control" name="c_contact" required>

              </div><!-- form-group Ends -->

              <div class="form-group d-flex w-100">

                <label class="w-25 ml-1" > Customer Address </label>

                <input type="text" class="form-control" name="c_address" required>

              </div><!-- form-group Ends -->

              <div class="form-group d-flex w-100">

                <label class="w-25 ml-1"> Customer Image </label>

                <input type="file" class="form-control" name="c_image" required>

              </div><!-- form-group Ends -->


                <button type="submit" name="register" class="btn d-block px-5 mx-auto btn-info">

                  <i class="fa fa-user-md"></i> Register

                </button>


            </form><!-- form Ends -->

          </div><!-- box Ends -->

        </div><!-- col-md-10 Ends -->
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

<?php

if (isset($_POST['register'])) {

  $c_name = $_POST['c_name'];

  $c_email = $_POST['c_email'];

  $c_pass = $_POST['c_pass'];

  $c_country = $_POST['c_country'];

  $c_city = $_POST['c_city'];

  $c_contact = $_POST['c_contact'];

  $c_address = $_POST['c_address'];

  $c_image = $_FILES['c_image']['name'];

  $c_image_tmp = $_FILES['c_image']['tmp_name'];

  $c_ip = getRealUserIp();

  move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

  $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";


  $run_customer = mysqli_query($con, $insert_customer);

  $sel_cart = "select * from cart where ip_add='$c_ip'";

  $run_cart = mysqli_query($con, $sel_cart);

  $check_cart = mysqli_num_rows($run_cart);

  if ($check_cart > 0) {

    $_SESSION['customer_email'] = $c_email;

    echo "<script>alert('You have been Registered Successfully')</script>";

    echo "<script>window.open('checkout.php','_self')</script>";
  } else {

    $_SESSION['customer_email'] = $c_email;

    echo "<script>alert('You have been Registered Successfully')</script>";

    echo "<script>window.open('index.php','_self')</script>";
  }
}

?>