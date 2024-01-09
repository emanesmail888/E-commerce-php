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

        <li>Search Results</li>

      </ul><!-- breadcrumb Ends -->

    </div>
    <!--- col-md-12 Ends -->

    <div class="col-md-12">
      <!-- col-md-12 Starts --->

      <div class="row">
        <!-- row Starts -->

        <?php

        if (isset($_GET['search'])) {

          $user_keyword = $_GET['user-query'];

          $get_products = "select * from products where product_title LIKE '%$user_keyword%' ";

          $run_products = mysqli_query($con, $get_products);

          $count = mysqli_num_rows($run_products);

          if ($count == 0) {

            echo "

<div class='box'>

<h2>No Search Results Found</h2>

</div>

";
          } else {

            while ($row_products = mysqli_fetch_array($run_products)) {

              $pro_id = $row_products['product_id'];

              $pro_title = $row_products['product_title'];

              $pro_price = $row_products['product_price'];

              $pro_img1 = $row_products['product_img1'];

              $pro_label = $row_products['product_label'];

              $manufacturer_id = $row_products['manufacturer_id'];

              $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

              $run_manufacturer = mysqli_query($db, $get_manufacturer);

              $row_manufacturer = mysqli_fetch_array($run_manufacturer);

              $manufacturer_name = $row_manufacturer['manufacturer_title'];

              $pro_psp_price = $row_products['product_psp_price'];

              $pro_url = $row_products['product_url'];


              if ($pro_label == "Sale" or $pro_label == "Gift") {

                $product_price = "<del> $$pro_price </del>";

                $product_psp_price = "| $$pro_psp_price";
              } else {

                $product_psp_price = "";

                $product_price = "$$pro_price";
              }


              if ($pro_label == "") {
              } else {

                $product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";
              }


              echo "
    
    <div class='col-md-3 col-sm-6 ' >
    
    <div class='product' style='height:610px;' >
    
    <a href='#' >
    
    <img src='admin_area/product_images/$pro_img1' class='img-fluid w-100  ' style='height:300px;' >
    
    </a>
    
    <div class='text' >
    
    
    <p class='btn btn-info w-100'> $manufacturer_name </p>
    
    
    <hr>
    
    <h3><a href='#' >$pro_title</a></h3>
    
    <p class='price' > $product_price $product_psp_price </p>
    
    <p class='buttons d-block' >

<a href='details.php?pro_id=$pro_id' class='btn w-100' style='  background-color:#e42c5a; color: white;' >View details</a>

<a href='details.php?pro_id=$pro_id' class='btn w-100 mb-2' style='  background-color:#e42c5a; color: white;'>

<i class='fa fa-shopping-cart' ></i> Add To Cart

</a>

</p>
    
    </div>
    
    $product_label
    
    
    </div>
    
    </div>
    
    ";
            }
          }
        }
        ?>

      </div><!-- row Ends -->

    </div><!-- col-md-9 Ends --->

  </div><!-- container Ends -->

</div><!-- content Ends -->


<?php

include("include/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>


</body>

</html>