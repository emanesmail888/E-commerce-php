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

          <li>Update </li>

        </ul><!-- breadcrumb Ends -->



      </div>
      <!--- col-md-12 Ends -->


      <div class="col-md-12">

        <div class="box">

          <div class="box-header">


            <h3 class="text-center"> Enter Your Email Below , We Will Send You , Your Password </h3>


          </div><!-- box-header Ends -->

          <div class="text-center">

            <form action="" method="post">

              <input type="text" class="form-control" name="c_email" placeholder="Enter Your Email">

              <br>

              <input type="submit" name="forgot_pass" class="btn btn-secondary" value="Send My Password">

            </form><!-- form Ends -->

          </div><!-- center div Ends -->

        </div><!-- box Ends -->

      </div><!-- col-md-12 Ends -->


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

if (isset($_POST['forgot_pass'])) {

  $c_email = $_POST['c_email'];

  $sel_c = "select * from customers where customer_email='$c_email'";

  $run_c = mysqli_query($con, $sel_c);

  $count_c = mysqli_num_rows($run_c);

  $row_c = mysqli_fetch_array($run_c);

  $c_name = $row_c['customer_name'];

  $c_pass = $row_c['customer_pass'];

  if ($count_c == 0) {

    echo "<script> alert('Sorry, We do not have your email') </script>";

    exit();
  } else {

    $message = "

<h1 align='center'> Your Password Has Been Sent To You </h1>

<h2 align='center'> Dear $c_name </h2>

<h3 align='center'>

Your Password is : <span> <b>$c_pass</b> </span>

</h3>

<h3 align='center'>

<a href='localhost/ecom/checkout.php'>
 
Click Here To Login Your Account 
 
</a>

</h3>

";

    $from = "negma.oula@yahoo.com";

    $subject = "Your Password";

    $headers = "From: $from\r\n";

    $headers .= "Content-type: text/html\r\n";

    mail($c_email, $subject, $message, $headers);

    echo "<script> alert('Your Password has been sent to you, check your inbox ') </script>";

    echo "<script>window.open('checkout.php','_self')</script>";
  }
}

?>