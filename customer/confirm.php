<?php

session_start();

if (!isset($_SESSION['customer_email'])) {

  echo "<script>window.open('../checkout.php','_self')</script>";
} else {

  include("include/db.php");

  include("functions/functions.php");

  if (isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];
  }

?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="stylesheet" href="styles/fontawesome.min.css"> -->
    <link rel="stylesheet" href="styles/all.min.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="styles/style.css"> -->
    <link rel="stylesheet" href="styles/style.css">


  </head>

  <body>
    <section class="top  text-white ">

      <div class="container offer ">
        <div class="row">
          <div class="col-md-6 ">
            <a href="#" class="btn btn-success btn-sm text-white">
              <?php

              if (!isset($_SESSION['customer_email'])) {

                echo "Welcome :Guest";
              } else {

                echo "Welcome : " . $_SESSION['customer_email'] . "";
              }


              ?>
            </a>
            <a href="#" class="text-white">
              Shopping Cart Total Price: <?php total_price(); ?>, Total Items <?php items(); ?>
            </a>

          </div><!-- offer -->

          <div class="col-md-6 ml-auto ">

            <ul class="menu">
              <li> <a href="customer_register.php" class="text-white">Register</a></li>
              <li> <a href="cart.php" class="text-white">Go to Cart</a></li>

              <li>
                <?php

                if (!isset($_SESSION['customer_email'])) {

                  echo "<a href='checkout.php' >My Account</a>";
                } else {

                  echo "<a href='./customer/my_account.php?my_orders'>My Account</a>";
                }


                ?>
              </li>

              <li>
                <?php

                if (!isset($_SESSION['customer_email'])) {

                  echo "<a href='checkout.php'> Login </a>";
                } else {

                  echo "<a href='logout.php'> Logout </a>";
                }

                ?>
              </li>



            </ul>
          </div><!-- col-md-6 -->
        </div><!-- row -->



      </div><!-- container -->

    </section>









    <nav class="navbar navbar-expand-lg Nav   navbar-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand text-white" href="#">E-commerce </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="customer_register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.php">shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./customer/my_account.php">My-account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Shopping Cart</a>
          </li>

        </ul>
        <div class="navbar-collapse collapse ">

          <button class="btn navbar-btn btn-secondary ml-auto mr-1" type="button" data-toggle="collapse" data-target="#search">

            <span class="sr-only">Toggle Search</span>

            <i class="fa fa-search"></i>

          </button>
        </div><!-- navbar-collapse collapse  Ends -->

        <a class="btn btn-secondary  " href="cart.php">

          <i class="fa fa-shopping-cart"></i>

          <span> <?php items(); ?> items in cart </span>

        </a><!-- btn btn-primary navbar-btn right Ends -->

      </div>
    </nav>

    <div class="col-md-4 ml-auto d-flex">

      <div class="collapse  " id="search">
        <form class="form-inline my-2 my-lg-0   " method="get" action="results.php">
          <input class="form-control my-2 mr-1" type="search" placeholder="Search" name="user-query" aria-label="Search" required>

          <button class="btn  my-2 my-sm-0  btn-secondary " type="submit">
            <i class="fa fa-search"></i> Search</button>

        </form>


      </div><!-- collapse Ends -->
    </div><!-- col-md-4 -->
    </div>
    </nav>



    <div id="content">
      <!-- content Starts -->
      <div class="container">
        <!-- container Starts -->

        <div class="col-md-12">
          <!--- col-md-12 Starts -->

          <ul class="breadcrumb">
            <!-- breadcrumb Starts -->

            <li>
              <a href="index.php">Home</a>
            </li>

            <li>My Account</li>

          </ul><!-- breadcrumb Ends -->



        </div>
        <!--- col-md-12 Ends -->
        <div class="row">

          <div class="col-md-3">
            <!-- col-md-3 Starts -->

            <?php include("include/sidebar.php"); ?>

          </div><!-- col-md-3 Ends -->

          <div class="col-md-9">
            <!-- col-md-9 Starts -->

            <div class="box">
              <!-- box Starts -->

              <h1 align="center"> Please Confirm Your Payment </h1>


              <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">

                  <label>Invoice No:</label>

                  <input type="text" class="form-control" name="invoice_no" required>

                </div><!-- form-group Ends -->


                <div class="form-group">

                  <label>Amount Sent:</label>

                  <input type="text" class="form-control" name="amount_sent" required>

                </div><!-- form-group Ends -->

                <div class="form-group">

                  <label>Select Payment Mode:</label>

                  <select name="payment_mode" class="form-control">

                    <option>Select Payment Mode</option>
                    <option>Bank Code</option>
                    <option>NBE bank</option>
                    <option>vodafone code</option>
                    <option>Fawry Code</option>

                  </select><!-- select Ends -->

                </div><!-- form-group Ends -->

                <div class="form-group">
                  <!-- form-group Starts -->

                  <label>Transaction/Reference Id:</label>

                  <input type="text" class="form-control" name="ref_no" required>

                </div><!-- form-group Ends -->


                <div class="form-group">
                  <!-- form-group Starts -->

                  <label>Easy Paisa/Omni Code:</label>

                  <input type="text" class="form-control" name="code" required>

                </div><!-- form-group Ends -->


                <div class="form-group">
                  <!-- form-group Starts -->

                  <label>Payment Date:</label>

                  <input type="text" class="form-control" name="date" required>

                </div><!-- form-group Ends -->

                <div class="text-center">
                  <!-- text-center Starts -->

                  <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">

                    <i class="fa fa-user-md"></i> Confirm Payment

                  </button>

                </div><!-- text-center Ends -->

              </form>
              <!--- form Ends -->

              <?php

              if (isset($_POST['confirm_payment'])) {

                $update_id = $_GET['update_id'];

                $invoice_no = $_POST['invoice_no'];

                $amount = $_POST['amount_sent'];

                $payment_mode = $_POST['payment_mode'];

                $ref_no = $_POST['ref_no'];

                $code = $_POST['code'];

                $payment_date = $_POST['date'];

                $complete = "Complete";

                $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";

                $run_payment = mysqli_query($con, $insert_payment);

                $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

                $run_customer_order = mysqli_query($con, $update_customer_order);

                $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

                $run_pending_order = mysqli_query($con, $update_pending_order);

                if ($run_pending_order) {

                  echo "<script>alert('your Payment has been received,order will be completed within 24 hours')</script>";

                  echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                }
              }



              ?>


            </div><!-- box Ends -->

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

<?php } ?>