<?php

session_start();

include("include/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

$admin_session = $_SESSION['admin_email'];

$get_admin = "select * from admins  where admin_email='$admin_session'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin['admin_id'];

$admin_name = $row_admin['admin_name'];

$admin_email = $row_admin['admin_email'];

$admin_image = $row_admin['admin_image'];

$admin_country = $row_admin['admin_country'];

$admin_job = $row_admin['admin_job'];

$admin_contact = $row_admin['admin_contact'];

$admin_about = $row_admin['admin_about'];


$get_products = "select * from products";
$run_products = mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);

$get_customers = "select * from customers";
$run_customers = mysqli_query($con,$get_customers);
$count_customers = mysqli_num_rows($run_customers);

$get_p_categories = "select * from product_categories";
$run_p_categories = mysqli_query($con,$get_p_categories);
$count_p_categories = mysqli_num_rows($run_p_categories);


$get_pending_orders = "select * from pending_orders";
$run_pending_orders = mysqli_query($con,$get_pending_orders);
$count_pending_orders = mysqli_num_rows($run_pending_orders);


?>

<!DOCTYPE html>
<html>

<head>
<title>E commerce Store </title>

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<!-- <link rel="stylesheet" href="styles/fontawesome.min.css"> -->
<link rel="stylesheet" href="styles/all.min.css">
<link rel="stylesheet" href="styles/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="styles/style.css"> -->
<link rel="stylesheet" href="styles/style.css">



</head>

<body>


<nav class="navbar navbar-expand-lg Nav   navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a href="index.php?dashboard">

        <i class="fa fa-fw fa-dashboard"></i> Dashboard

       </a>
        </li>
        <li class="nav-item">
        <a href="#" data-toggle="collapse" data-target="#products">

        <i class="fa fa-fw fa-table"></i> Products

         <i class="fa fa-fw fa-caret-down"></i>


         </a>
        </li>
    <li class="nav-item"><!-- li Starts -->

    <a href="index.php?view_customers" >

    <i class="fa fa-fw fa-gear" ></i> Customers

    <span class="badge" ></span>


    </a>

    </li>
       
       
      </ul>
     

      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown ml-auto mr-2 w-100">
        


       <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

       <i class="fa fa-user" ></i>

       eman som3a <b class="caret" ></b>


       </a><!-- dropdown-toggle Ends -->

     <ul class="dropdown-menu w-100 " ><!-- dropdown-menu Starts -->

            <li><!-- li Starts -->

            <a href="index.php?user_profile=<?php echo $admin_id; ?>" >

            <i class="fa fa-fw fa-user" ></i> Profile


                </a>

            </li><!-- li Ends -->

            <li><!-- li Starts -->

            <a href="index.php?view_products" >

            <i class="fa fa-fw fa-envelope" ></i> Products 

            <span class="badge" ><?php echo $count_products; ?></span>


            </a>

            </li><!-- li Ends -->

            <li><!-- li Starts -->

            <a href="index.php?view_customers" >

            <i class="fa fa-fw fa-gear" ></i> Customers

            <span class="badge" ><?php echo $count_customers; ?></span>


            </a>

            </li><!-- li Ends -->

            <li><!-- li Starts -->

            <a href="index.php?view_p_cats" >

            <i class="fa fa-fw fa-gear" ></i> Product Categories

            <span class="badge" ><?php echo $count_p_categories; ?></span>


            </a>

            </li><!-- li Ends -->

            <li class="divider"></li>

            <li><!-- li Starts -->

            <a href="logout.php">

            <i class="fa fa-fw fa-power-off"> </i> Log Out

            </a>

            </li><!-- li Ends -->

        </ul>




        </li>
    </ul>
    </div>
  </div>
</nav>

<div class="row">

<div class="col-md-3">

<?php include("include/sidebar.php");  ?>
</div><!-- col-md-3 -->



<div class="col-md-9">


<?php

if(isset($_GET['dashboard'])){

include("dashboard.php");

}

if(isset($_GET['insert_product'])){

include("insert_product.php");

}

if(isset($_GET['view_products'])){

include("view_products.php");

}

if(isset($_GET['delete_product'])){

include("delete_product.php");

}

if(isset($_GET['edit_product'])){

include("edit_product.php");

}

if(isset($_GET['insert_p_cat'])){

include("insert_p_cat.php");

}

if(isset($_GET['view_p_cats'])){

include("view_p_cats.php");

}

if(isset($_GET['delete_p_cat'])){

include("delete_p_cat.php");

}

if(isset($_GET['edit_p_cat'])){

include("edit_p_cat.php");

}

if(isset($_GET['insert_cat'])){

include("insert_cat.php");

}

if(isset($_GET['view_cats'])){

include("view_cats.php");

}

if(isset($_GET['delete_cat'])){

include("delete_cat.php");

}

if(isset($_GET['edit_cat'])){

include("edit_cat.php");

}

if(isset($_GET['insert_slide'])){

include("insert_slide.php");

}


if(isset($_GET['view_slides'])){

include("view_slides.php");

}

if(isset($_GET['delete_slide'])){

include("delete_slide.php");

}


if(isset($_GET['edit_slide'])){

include("edit_slide.php");

}


if(isset($_GET['view_customers'])){

include("view_customers.php");

}

if(isset($_GET['customer_delete'])){

include("customer_delete.php");

}


if(isset($_GET['insert_term'])){

  include("insert_term.php");
  
  }
  
  if(isset($_GET['view_terms'])){
  
  include("view_terms.php");
  
  }
  
  if(isset($_GET['delete_term'])){
  
  include("delete_term.php");
  
  }
  
  if(isset($_GET['edit_term'])){
  
  include("edit_term.php");
  
  }
if(isset($_GET['view_orders'])){

include("view_orders.php");

}

if(isset($_GET['order_delete'])){

include("order_delete.php");

}


if(isset($_GET['view_payments'])){

include("view_payments.php");

}

if(isset($_GET['payment_delete'])){

include("payment_delete.php");

}

if(isset($_GET['insert_user'])){

include("insert_user.php");

}

if(isset($_GET['view_users'])){

include("view_users.php");

}


if(isset($_GET['user_delete'])){

include("user_delete.php");

}



if(isset($_GET['user_profile'])){

include("user_profile.php");

}

if(isset($_GET['insert_manufacturer'])){
  
  include("insert_manufacturer.php");
  
  }
  
  if(isset($_GET['view_manufacturers'])){
  
  include("view_manufacturers.php");
  
  }
  
  if(isset($_GET['delete_manufacturer'])){
  
  include("delete_manufacturer.php");
  
  }
  
  if(isset($_GET['edit_manufacturer'])){
  
  include("edit_manufacturer.php");
  
  }
  
  
  if(isset($_GET['insert_coupon'])){
  
  include("insert_coupon.php");
  
  }
  
  if(isset($_GET['view_coupons'])){
  
  include("view_coupons.php");
  
  }
  
  if(isset($_GET['delete_coupon'])){
  
  include("delete_coupon.php");
  
  }
  
  
  if(isset($_GET['edit_coupon'])){
  
  include("edit_coupon.php");
  
  }
  

  
  if(isset($_GET['insert_bundle'])){
  
  include("insert_bundle.php");
  
  }
  
  if(isset($_GET['view_bundles'])){
  
  include("view_bundles.php");
  
  }
  
  if(isset($_GET['delete_bundle'])){
  
  include("delete_bundle.php");
  
  }
  
  
  if(isset($_GET['edit_bundle'])){
  
  include("edit_bundle.php");
  
  }
  
  
  if(isset($_GET['insert_rel'])){
  
  include("insert_rel.php");
  
  }
  
  if(isset($_GET['view_rel'])){
  
  include("view_rel.php");
  
  }
  
  if(isset($_GET['delete_rel'])){
  
  include("delete_rel.php");
  
  }
  
  
  if(isset($_GET['edit_rel'])){
  
  include("edit_rel.php");
  
  }
  
  
  if(isset($_GET['edit_contact_us'])){
  
  include("edit_contact_us.php");
  
  }
  
  if(isset($_GET['insert_enquiry'])){
  
  include("insert_enquiry.php");
  
  }
  
  
  if(isset($_GET['view_enquiry'])){
  
  include("view_enquiry.php");
  
  }
  
  if(isset($_GET['delete_enquiry'])){
  
  include("delete_enquiry.php");
  
  }
  
  if(isset($_GET['edit_enquiry'])){
  
  include("edit_enquiry.php");
  
  }
  
  if(isset($_GET['edit_about_us'])){

    include("edit_about_us.php");
    
    }
    
    
    if(isset($_GET['insert_service'])){
    
    include("insert_service.php");
    
    }
    
    if(isset($_GET['view_services'])){
    
    include("view_services.php");
    
    }
    
    if(isset($_GET['delete_service'])){
    
    include("delete_service.php");
    
    }
    
    if(isset($_GET['edit_service'])){
    
    include("edit_service.php");
    
    }
    
 



?>

</div><!-- col-md-9 -->

</div><!-- row -->


<script src="js/jquery.min.js"></script>
<!-- <script src="js/jquery.slim.min.js"></script> -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>


</html>

<?php } ?>