<?php

session_start();

include("include/db.php");

include("functions/function.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

 

      
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="styles/nouislider.css"/>
  <link rel="stylesheet" href="styles/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick.css" /> 
 <link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick-theme.css" />

  <link rel="stylesheet" href="styles/jquery-ui.css">
 




   <link rel="stylesheet" href="styles/fontawesome.min.css">
  <link rel="stylesheet" href="styles/all.min.css">
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
        <li class="nav-item">
          <a class="nav-link" href="services.php"> Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php"> About Us</a>
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

        <button class="btn  my-2 my-sm-0  btn-secondary " type="submit" name="search">
          <i class="fa fa-search"></i> Search</button>

      </form>


    </div><!-- collapse Ends -->
  </div><!-- col-md-4 -->


  <div id="content">
    <div class="container">

      <div class="col-md-12">

        <ul class="breadcrumb">

          <li>
            <a href="index.php">Home</a>
          </li>

          <li>Shop</li>

        </ul><!-- breadcrumb Ends -->



      </div>
      <!--- col-md-12 Ends -->
      <div class="row">


        <div class="col-md-3">

          <?php include("include/sidebar.php"); ?>

        </div><!-- col-md-3 Ends -->


      
       



        

        <div class="col-md-9">
        <div id="Products" class="row">
          
      
         <?php
          getProducts(); 
          ?>

                </div> <!-- products --> 
                <ul class="pagination "> 
          <?php
         getPaginator(); 
         ?>
        </ul>

          
        </div><!-- col-md-9 Ends --->


        <div id="wait" style="position:absolute;top:40%;left:45%;padding:100px;padding-top:200px;">

            </div>
            <!--- wait Ends -->
           
           


      </div><!-- row -->
    </div><!-- container Ends -->
  </div><!-- content Ends -->







  <?php include("include/footer.php") ?>









  <!-- <script src="js/jquery.slim.min.js"></script> -->

  <!-- <script src="js/jquery.min.js"></script> -->
  <!-- <script src="js/bootstrap.js"></script> -->


<!-- <script src="js/bootstrap.min.js"></script> -->



<!-- <script src="js/slick.min.js"></script> -->

  <script src="js/jquery-ui.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <!-- <script src="js/jquery.validate.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.min.js.map"></script>
<script src="js/popper.min.js"></script> -->

<script src="https://kenwheeler.github.io/slick/slick/slick.js"></script>
<script>
 $('.posts-curousel').slick({
  rows: 2,
  dots: true,
  arrows: false,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3
});
</script>

   

   
   








  <script>
        $(document).ready(function() {

            // getProducts Function Code Starts 

            function getProducts() {

                // Manufacturers Code Starts 

                var sPath = '';

                var aInputs = $('li').find('.get_manufacturer');

                var aKeys = Array();

                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput) {

                    if (oInput.checked) {

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if (aKeys.length > 0) {

                    var sPath = '';

                    for (var i = 0; i < aKeys.length; i++) {

                        sPath = sPath + 'man[]=' + aKeys[i] + '&';

                    }

                }

                // Manufacturers Code ENDS 

                // Products Categories Code Starts 

                var aInputs = Array();

                var aInputs = $('li').find('.get_p_cat');

                var aKeys = Array();

                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput) {

                    if (oInput.checked) {

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if (aKeys.length > 0) {

                    for (var i = 0; i < aKeys.length; i++) {

                        sPath = sPath + 'p_cat[]=' + aKeys[i] + '&';

                    }

                }

                // Products Categories Code ENDS 

                // Categories Code Starts 

                var aInputs = Array();

                var aInputs = $('li').find('.get_cat');

                var aKeys = Array();

                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput) {

                    if (oInput.checked) {

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if (aKeys.length > 0) {

                    for (var i = 0; i < aKeys.length; i++) {

                        sPath = sPath + 'cat[]=' + aKeys[i] + '&';

                    }

                }

                // Categories Code ENDS 

                // Loader Code Starts 

                $('#wait').html('<img src="images/load.gif">');

                // Loader Code ENDS

                // ajax Code Starts 

                $.ajax({

                    url: "load.php",

                    method: "POST",

                    data: sPath + 'sAction=getProducts',

                    success: function(data) {

                        $('#Products').html('');

                        $('#Products').html(data);

                        $("#wait").empty();

                    }

                });

                $.ajax({
                    url: "load.php",
                    method: "POST",
                    data: sPath + 'sAction=getPaginator',
                    success: function(data) {
                        $('.pagination').html('');
                        $('.pagination').html(data);
                    }

                });

                // ajax Code Ends 

            }

            // getProducts Function Code Ends    

            $('.get_manufacturer').click(function() {

                getProducts();

            });


            $('.get_p_cat').click(function() {

                getProducts();

            });

            $('.get_cat').click(function() {

                getProducts();

            });
          

        });
    </script>




















           













</body>
</html>