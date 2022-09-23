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

          <li>Cart</li>

        </ul><!-- breadcrumb Ends -->



      </div>
      <!--- col-md-12 Ends -->
      <div class="row">


        <div class="col-md-9" id="cart">

          <div class="box">

            <form action="cart.php" method="post" enctype="multipart-form-data">

              <h1> Shopping Cart </h1>

              <?php

              $ip_add = getRealUserIp();

              $select_cart = "select * from cart where ip_add='$ip_add'";

              $run_cart = mysqli_query($con, $select_cart);

              $count = mysqli_num_rows($run_cart);

              ?>

              <p class="text-muted"> You currently have <?php echo $count; ?> item(s) in your cart. </p>


              <table class="table">

                <thead>

                  <tr>

                    <th colspan="2">Product</th>

                    <th>Quantity</th>

                    <th>Unit Price</th>

                    <th>Size</th>

                    <th colspan="1">Delete</th>

                    <th colspan="2"> Sub Total </th>


                  </tr>

                </thead><!-- thead Ends -->

                <tbody>

                  <?php

                  $total = 0;

                  while ($row_cart = mysqli_fetch_array($run_cart)) {

                    $pro_id = $row_cart['p_id'];

                    $pro_size = $row_cart['size'];

                    $pro_qty = $row_cart['qty'];

                    $only_price = $row_cart['p_price'];

                    $get_products = "select * from products where product_id='$pro_id'";

                    $run_products = mysqli_query($con, $get_products);

                    while ($row_products = mysqli_fetch_array($run_products)) {

                      $product_title = $row_products['product_title'];

                      $product_img1 = $row_products['product_img1'];

                      $sub_total = $only_price * $pro_qty;

                      $_SESSION['pro_qty'] = $pro_qty;

                      $total += $sub_total;

                  ?>

                      <tr>

                        <td>

                          <img src="admin_area/product_images/<?php echo $product_img1; ?>" class="h-25 w-25">

                        </td>

                        <td>

                          <a href="#"> <?php echo $product_title; ?> </a>

                        </td>

                        <td>
                          <input type="text" name="quantity" value="<?php echo $_SESSION['pro_qty']; ?>" data-product_id="<?php echo $pro_id; ?>" class="quantity form-control">
                        </td>

                        <td>

                          $<?php echo $only_price; ?>.00

                        </td>

                        <td>

                          <?php echo $pro_size; ?>

                        </td>

                        <td>
                          <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                        </td>

                        <td>

                          $<?php echo $sub_total; ?>.00

                        </td>

                      </tr><!-- tr Ends -->

                  <?php }
                  } ?>

                </tbody><!-- tbody Ends -->

                <tfoot>

                  <tr>

                    <th colspan="5"> Total </th>

                    <th colspan="2"> $<?php echo $total; ?>.00 </th>

                  </tr>

                </tfoot><!-- tfoot Ends -->

              </table><!-- table Ends -->

              <div class="form-inline m-4 ">

                <div class="form-group d-flex ml-auto">

                  <label>Coupon Code : </label>

                  <input type="text" name="code" class="form-control mr-1 ml-1">

                </div><!-- form-group Ends -->

                <input class="btn btn-secondary" type="submit" name="apply_coupon" value="Apply Coupon Code">

              </div><!-- form-inline pull-right Ends -->



              <div class="box-footer d-flex">


                <a href="index.php" class="btn btn-default d-block mr-auto">

                  <i class="fa fa-chevron-left"></i> Continue Shopping

                </a>


                <button class="btn btn-default" type="submit" name="update" value="Update Cart">

                  <i class="fa fa-refresh"></i> Update Cart

                </button>

                <a href="checkout.php" class="btn btn-secondary">

                  Proceed to checkout <i class="fa fa-chevron-right"></i>

                </a>

              </div><!-- box-footer Ends -->

            </form><!-- form Ends -->


          </div><!-- box Ends -->

          <?php

          if (isset($_POST['apply_coupon'])) {

            $code = $_POST['code'];

            if ($code == "") {
            } else {

              $get_coupons = "select * from coupons where coupon_code='$code'";

              $run_coupons = mysqli_query($con, $get_coupons);

              $check_coupons = mysqli_num_rows($run_coupons);

              if ($check_coupons == 1) {

                $row_coupons = mysqli_fetch_array($run_coupons);

                $coupon_pro = $row_coupons['product_id'];

                $coupon_price = $row_coupons['coupon_price'];

                $coupon_limit = $row_coupons['coupon_limit'];

                $coupon_used = $row_coupons['coupon_used'];


                if ($coupon_limit == $coupon_used) {

                  echo "<script>alert('Your Coupon Code Has Been Expired')</script>";
                } else {

                  $get_cart = "select * from cart where p_id='$coupon_pro' AND ip_add='$ip_add'";

                  $run_cart = mysqli_query($con, $get_cart);

                  $check_cart = mysqli_num_rows($run_cart);


                  if ($check_cart == 1) {

                    $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";

                    $run_used = mysqli_query($con, $add_used);

                    $update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro' AND ip_add='$ip_add'";

                    $run_update = mysqli_query($con, $update_cart);

                    echo "<script>alert('Your Coupon Code Has Been Applied')</script>";

                    echo "<script>window.open('cart.php','_self')</script>";
                  } else {

                    echo "<script>alert('Product Does Not Exist In Cart')</script>";
                  }
                }
              } else {

                echo "<script> alert('Your Coupon Code Is Not Valid') </script>";
              }
            }
          }


          ?>

          <?php

          function update_cart()
          {

            global $con;

            if (isset($_POST['update'])) {

              foreach ($_POST['remove'] as $remove_id) {


                $delete_product = "delete from cart where p_id='$remove_id'";

                $run_delete = mysqli_query($con, $delete_product);

                if ($run_delete) {
                  echo "<script>window.open('cart.php','_self')</script>";
                }
              }
            }
          }

          echo @$up_cart = update_cart();



          ?>



          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="box" style="height:610px;">
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

<div class='col-md-3 col-sm-6  ' >

<div class='product ' style=' height:600px;' >

<a href='$pro_url' >

<img src='admin_area/product_images/$pro_img1' class='img-fluid w-100'  style='height:280px;'>

</a>

<div class='text' >

<center>

<p class='btn btn-info w-100'> $manufacturer_name </p>

</center>

<hr>

<h3><a href='$pro_url' >$pro_title</a></h3>

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




            ?>


          </div><!-- row  Ends -->


        </div><!-- col-md-9 Ends -->

        <div class="col-md-3">

          <div class="box" id="order-summary">

            <div class="box-header">

              <h3>Order Summary</h3>

            </div><!-- box-header Ends -->

            <p class="text-muted">
              Shipping and additional costs are calculated based on the values you have entered.
            </p>

            <div class="table-responsive">

              <table class="table">

                <tbody>

                  <tr>

                    <td> Order Subtotal </td>

                    <th> $<?php echo $total; ?>.00 </th>

                  </tr>

                  <tr>

                    <td> Shipping and handling </td>

                    <th>$0.00</th>

                  </tr>

                  <tr>

                    <td>Tax</td>

                    <th>$0.00</th>

                  </tr>

                  <tr class="total">

                    <td>Total</td>

                    <th>$<?php echo $total; ?>.00</th>

                  </tr>

                </tbody><!-- tbody Ends -->

              </table><!-- table Ends -->

            </div><!-- table-responsive Ends -->

          </div><!-- box Ends -->

        </div><!-- col-md-3 Ends -->

      </div><!-- container Ends -->
    </div><!-- content Ends -->
  </div><!-- row -->



  <?php

  include("include/footer.php");

  ?>

  <script src="js/jquery.min.js"> </script>

  <script src="js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function(data) {

      $(document).on('keyup', '.quantity', function() {

        var id = $(this).data("product_id");

        var quantity = $(this).val();

        if (quantity != '') {

          $.ajax({

            url: "change.php",

            method: "POST",

            data: {
              id: id,
              quantity: quantity
            },

            success: function(data) {

              $("body").load('cart_body.php');

            }




          });


        }




      });




    });
  </script>

</body>

</html>