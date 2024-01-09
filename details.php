<?php
include("nav.php");
?>

<?php


$product_id = @$_GET['pro_id'];

$get_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$check_product = mysqli_num_rows($run_product);

if($check_product == 0){

echo "<script> window.open('index.php','_self') </script>";

}
else{



$row_product = mysqli_fetch_array($run_product);

$p_cat_id = $row_product['p_cat_id'];

$pro_id = $row_product['product_id'];

$pro_title = $row_product['product_title'];

$pro_price = $row_product['product_price'];

$pro_desc = $row_product['product_desc'];

$pro_img1 = $row_product['product_img1'];

$pro_img2 = $row_product['product_img2'];

$pro_img3 = $row_product['product_img3']; 

$pro_label = $row_product['product_label'];

$pro_psp_price = $row_product['product_psp_price'];

$pro_features = $row_product['product_features'];

$pro_video = $row_product['product_video'];

$status = $row_product['status'];

$pro_url = $row_product['product_url'];

if($pro_label == ""){


}
else{

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";

}

$get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

$run_p_cat = mysqli_query($con,$get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);

$p_cat_title = $row_p_cat['p_cat_title'];


}

?>
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

          <li><a href="shop.php">Shop</a></li>

          <li>

            <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?> </a>

          </li>

          <li> <?php echo $pro_title; ?> </li>

        </ul><!-- breadcrumb Ends -->


      </div>
      <!--- col-md-12 Ends -->

      <div class="row">
        <div class="col-sm-6">
          <!-- col-sm-6 Starts -->

          <div class="mainImage">


            <div id="myCarousel" class="carousel slide bg-white " data-ride="carousel">
              <ol class="carousel-indicators  ">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner ">

                <div class="carousel-item  active  ">
                  <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive w-100 " style="height: 600px;">


                </div>

                <div class="carousel-item  ">
                  <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive w-100  " style="height: 600px;">

                </div>

                <div class="carousel-item  ">

                  <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive w-100 " style="height: 600px;">


                </div>

              </div>


              <a class="carousel-control-prev " href="#myCarousel" role="button" data-slide="prev">

                <span class="carousel-control-prev-icon" aria-hidden="true"> </span>
              </a>
              <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">

                <span class="carousel-control-next-icon " aria-hidden="true"></span>
              </a>
            </div>


          </div>



        </div><!-- col-sm-6 Ends -->


        <div class="col-sm-6">

          <div class="box">

            <h1 class="text-center"> <?php echo $pro_title; ?> </h1>
            <?php
            global $db;

            if (isset($_GET['pro_id'])) {

              $pro_id = $_GET['pro_id'];

              $get_pro = "select * from products where product_id='$pro_id'";

              $run_pro = mysqli_query($db, $get_pro);

              $row_pro = mysqli_fetch_array($run_pro);


              $pro_title = $row_pro['product_title'];

              $pro_price = $row_pro['product_price'];

              $pro_img1 = $row_pro['product_img1'];

              $pro_label = $row_pro['product_label'];

              $manufacturer_id = $row_pro['manufacturer_id'];

              $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

              $run_manufacturer = mysqli_query($db, $get_manufacturer);

              $row_manufacturer = mysqli_fetch_array($run_manufacturer);

              $manufacturer_name = $row_manufacturer['manufacturer_title'];

              $pro_psp_price = $row_pro['product_psp_price'];

              $pro_url = $row_pro['product_url'];
              $status = $row_pro['status'];
            }

            if (isset($_POST['add_cart'])) {

              $ip_add = getRealUserIp();

              $p_id = $pro_id;

              $product_qty = $_POST['product_qty'];

              $product_size = $_POST['product_size'];


              $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

              $run_check = mysqli_query($con, $check_product);

              if (mysqli_num_rows($run_check) > 0) {

                echo "<script>alert('This Product is already added in cart')</script>";

                echo "<script>window.open('_self')</script>";
              } else {

                $get_price = "select * from products where product_id='$p_id'";

                $run_price = mysqli_query($con, $get_price);

                $row_price = mysqli_fetch_array($run_price);

                $pro_price = $row_price['product_price'];

                $pro_psp_price = $row_price['product_psp_price'];

                $pro_label = $row_price['product_label'];

                if ($pro_label == "Sale" or $pro_label == "Gift") {

                  $product_price = $pro_psp_price;
                } else {

                  $product_price = $pro_price;
                }

                $query = "insert into cart (p_id,ip_add,qty,p_price,size) values ('$p_id','$ip_add','$product_qty','$product_price','$product_size')";

                $run_query = mysqli_query($db, $query);

                echo "<script>window.open('_self')</script>";
              }
            }


            ?>




            <form action="" method="post" class="form-horizontal">
              <!-- form-horizontal Starts -->

              <?php

              if ($status == "product") {

              ?>

                <div class="form-group ">

                  <label class="col-md-5 ">Product Quantity </label>

                  <div class="col-md-7">

                    <select name="product_qty" class="form-control">

                      <option>Select quantity</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>


                    </select>

                  </div><!-- col-md-7 Ends -->

                </div><!-- form-group Ends -->




                <div class="form-group">
                  <!-- form-group Starts -->

                  <label class="col-md-5 control-label">Product Size</label>

                  <div class="col-md-7">
                    <!-- col-md-7 Starts -->

                    <select name="product_size" class="form-control">

                      <option>Select a Size</option>
                      <option>Small</option>
                      <option>Medium</option>
                      <option>Large</option>


                    </select>

                  </div><!-- col-md-7 Ends -->


                </div><!-- form-group Ends -->

              <?php } else { ?>


                <div class="form-group">
                  <!-- form-group Starts -->

                  <label class="col-md-5 control-label">Bundle Quantity </label>

                  <div class="col-md-7">
                    <!-- col-md-7 Starts -->

                    <select name="product_qty" class="form-control">

                      <option>Select quantity</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>


                    </select>

                  </div><!-- col-md-7 Ends -->

                </div><!-- form-group Ends -->

                <div class="form-group">
                  <!-- form-group Starts -->

                  <label class="col-md-5 control-label">Bundle Size</label>

                  <div class="col-md-7">
                    <!-- col-md-7 Starts -->

                    <select name="product_size" class="form-control">

                      <option>Select a Size</option>
                      <option>Small</option>
                      <option>Medium</option>
                      <option>Large</option>


                    </select>

                  </div><!-- col-md-7 Ends -->


                </div><!-- form-group Ends -->


              <?php } ?>



              <?php

              if ($status == "product") {

                if ($pro_label == "Sale" or $pro_label == "Gift") {

                  echo "

<p class='price'>

Product Price : <del> $$pro_price </del><br>

Product sale Price : $$pro_psp_price

</p>

";
                } else {

                  echo "

<p class='price'>

Product Price : $$pro_price

</p>

";
                }
              } else {


                if ($pro_label == "Sale" or $pro_label == "Gift") {

                  echo "

<p class='price'>

Bundle Price : <del> $$pro_price </del><br>

Bundle sale Price : $$pro_psp_price

</p>

";
                } else {

                  echo "

<p class='price'>

Bundle Price : $$pro_price

</p>

";
                }
              }

              ?>

              <p class="text-center buttons">
                <!-- text-center buttons Starts -->

                <button class="btn btn-info" type="submit" name="add_cart">

                  <i class="fa fa-shopping-cart"></i> Add to Cart

                </button>

                <button class="btn btn-info" type="submit" name="add_wishlist">

                  <i class="fa fa-heart"></i> Add to Wishlist

                </button>


                <?php

                if (isset($_POST['add_wishlist'])) {

                  if (!isset($_SESSION['customer_email'])) {

                    echo "<script>alert('You Must Login To Add Product In Wishlist')</script>";

                    echo "<script>window.open('checkout.php','_self')</script>";
                  } else {

                    $customer_session = $_SESSION['customer_email'];

                    $get_customer = "select * from customers where customer_email='$customer_session'";

                    $run_customer = mysqli_query($con, $get_customer);

                    $row_customer = mysqli_fetch_array($run_customer);

                    $customer_id = $row_customer['customer_id'];

                    $select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";

                    $run_wishlist = mysqli_query($con, $select_wishlist);

                    $check_wishlist = mysqli_num_rows($run_wishlist);

                    if ($check_wishlist == 1) {

                      echo "<script>alert('This Product Has Been already Added In Wishlist')</script>";

                      echo "<script>window.open('_self')</script>";
                    } else {

                      $insert_wishlist = "insert into wishlist (customer_id,product_id) values ('$customer_id','$pro_id')";

                      $run_wishlist = mysqli_query($con, $insert_wishlist);

                      if ($run_wishlist) {

                        echo "<script> alert('Product Has Inserted Into Wishlist') </script>";

                        echo "<script>window.open('_self')</script>";
                      }
                    }
                  }
                }

                ?>

              </p><!-- text-center buttons Ends -->

            </form><!-- form-horizontal Ends -->

          </div><!-- box Ends -->







          <div class="row d-inline-flex">
            <!-- row Starts -->


            <div class="col-md-4">
              <!-- col-xs-4 Starts -->

              <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class=" img-responsive w-100">

            </div><!-- col-xs-4 Ends -->



            <div class="col-md-4">
              <!-- col-xs-4 Starts -->


              <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive  w-100">



            </div><!-- col-xs-4 Ends -->

            <div class="col-md-4">
              <!-- col-xs-4 Starts -->


              <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive  w-100">


            </div><!-- col-xs-4 Ends -->


          </div><!-- row Ends -->


        </div><!-- col-sm-6 Ends -->


      </div><!-- row Ends -->







      <div class="box mt-5 d-block" id="details">
        <!-- box Starts -->

        <p>
          <!-- p Starts -->

        <h4>Product details</h4>

        <p>
          <?php echo $pro_desc; ?>
        </p>

        <h4> Size </h4>

        <ul>

          <li>Small</li>
          <li>Medium</li>
          <li>Large</li>

        </ul>

        </p><!-- p Ends -->

        <hr>

      </div><!-- box Ends -->
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="box" style="height:400px;">
            <h3 class="text-center"> You also like these Products </h3>

          </div><!-- box -->

        </div><!-- col-md-3 col-sm-6 -->
        <?php

        $get_products = "select * from products order by rand() LIMIT 0,3";

        $run_products = mysqli_query($con, $get_products);

        while ($row_products = mysqli_fetch_array($run_products)) {

          $pro_id = $row_products['product_id'];

          $pro_title = $row_products['product_title'];

          $pro_price = $row_products['product_price'];

          $pro_img1 = $row_products['product_img1'];

          echo "

<div class=' col-md-3 col-sm-6' >

<div class='product ' style='height:400px;'>

<a href='details.php?pro_id=$pro_id' >

<img src='admin_area/product_images/$pro_img1' class='img-fluid w-100 h-75' >  

</a>

<div class='text' >
<h3 class='text-center'><a href='details.php?pro_id=$pro_id' style='color:#e42c5a;' >$pro_title</a></h3>
    
<p class='price text-center' style='color:#e42c5a;' >$$pro_price</p>




</div>


</div>

</div>


";
        }


        ?>


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