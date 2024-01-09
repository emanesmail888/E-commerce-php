<?php

session_start();

if(!isset($_SESSION['customer_email'])){

echo "<script>window.open('../checkout.php','_self')</script>";


}else {
    
    include("include/db.php");
    
    include("functions/functions.php");
    
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
    
         if(!isset($_SESSION['customer_email'])){
    
          echo "Welcome :Guest";
    
    
        }
        else{
    
          echo "Welcome : " . $_SESSION['customer_email'] . "";
    
        }
    
    
    ?>
         </a>
          <a href="#" class="text-white">
           Shopping Cart Total Price: <?php total_price(); ?>, Total Items <?php items(); ?>
          </a>
    
        </div><!-- offer -->
    
        <div class="col-md-6 ml-auto ">
    
        <ul class="menu"><li>
<a href="../customer_register.php">
Register
</a>
</li>

<li>
<?php

if(!isset($_SESSION['customer_email'])){

echo "<a href='../checkout.php' >My Account</a>";

}
else{

echo "<a href='my_account.php?my_orders'>My Account</a>";

}


?>
</li>

<li>
<a href="../cart.php">
Go to Cart
</a>
</li>

<li>
<?php

if(!isset($_SESSION['customer_email'])){

echo "<a href='../checkout.php'> Login </a>";

}else {

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
        <a class="navbar-brand text-white" href="#" >E-commerce </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../shop.php">shop</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="../contact.php">Contact Us</a>
        </li>
       


<li class="active nav-item">
<?php

if(!isset($_SESSION['customer_email'])){

echo "<a href='../checkout.php' >My Account</a> class='nav-link'";

}
else{

echo "<a href='my_account.php?my_orders' class='nav-link'>My Account</a>";

}


?>
</li>

<li class="nav-item">
          <a class="nav-link" href="../cart.php">Shopping Cart</a>
        </li>
<li class="nav-item">
          <a class="nav-link" href="../about.php"> About Us</a>
        </li>
<li class="nav-item">
          <a class="nav-link" href="../services.php"> Services</a>
        </li>


      
          
        </ul>
        <div class="navbar-collapse collapse ">

<button class="btn navbar-btn btn-secondary ml-auto mr-1" type="button" data-toggle="collapse" data-target="#search">

  <span class="sr-only">Toggle Search</span>

  <i class="fa fa-search"></i>

</button>
</div><!-- navbar-collapse collapse  Ends -->

<a class="btn btn-secondary  " href="../cart.php">

<i class="fa fa-shopping-cart"></i>

<span> <?php items(); ?> items in cart </span>

</a><!-- btn btn-primary navbar-btn right Ends -->

      </div>
    </nav> 

    <div class="col-md-4 ml-auto d-flex">

<div class="collapse  " id="search">
<form class="form-inline my-2 my-lg-0   " method="get" action="../results.php">
<input class="form-control my-2 mr-1" type="search" placeholder="Search" name="user-query" aria-label="Search" required>

<button class="btn  my-2 my-sm-0  btn-secondary " type="submit">
  <i class="fa fa-search"></i> Search</button>

</form>


</div><!-- collapse Ends -->
</div><!-- col-md-4 -->
<?php } ?>