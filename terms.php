<?php
include("nav.php");
?>

<div id="content">

<div class="container">

<div class="col-md-12">

<ul class="breadcrumb">

<li> <a href="index.php">Home</a> </li>

<li>Terms And Conditions | Refund Policy</li>

</ul><!-- breadcrumb Ends -->

</div><!-- col-md-12 Ends -->

<div class="col-md-3">

<div class="box">

<ul class="nav nav-pills nav-stacked">
<?php

$get_terms = "select * from terms LIMIT 0,1";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){ 

$term_title = $row_terms['term_title'];

$term_link = $row_terms['term_link'];

?>

<li class="active">

<a data-toggle="pill" href="#<?php echo $term_link; ?>">

<?php echo $term_title; ?>

</a>

</li>

<?php } ?>

<?php

$count_terms = "select * from terms";

$run_count = mysqli_query($con,$count_terms);

$count = mysqli_num_rows($run_count);

$get_terms = "select * from terms LIMIT 1,$count";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){

$term_title = $row_terms['term_title'];

$term_link = $row_terms['term_link'];

?>

<li>

<a data-toggle="pill" href="#<?php echo $term_link; ?>">

<?php echo $term_title; ?>

</a>

</li>

<?php } ?>

</ul><!-- nav nav-pills nav-stacked Ends -->

</div><!-- box Ends -->

</div><!-- col-md-3 Ends -->

<div class="col-md-9"><!-- col-md-9 Starts -->

<div class="box"><!-- box Starts -->

<div class="tab-content" ><!-- tab-content Starts -->

<?php

$get_terms = "select * from terms LIMIT 0,1";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){

$term_title = $row_terms['term_title'];

$term_desc = $row_terms['term_desc'];

$term_link = $row_terms['term_link'];

?>

<div id="<?php echo $term_link; ?>" class="tab-pane fade in active" ><!-- tab-pane fade in active Starts -->

<h1> <?php echo $term_title; ?>  </h1>

<p> <?php echo $term_desc; ?> </p>

</div><!-- tab-pane fade in active Ends -->

<?php } ?>


<?php

$count_terms = "select * from terms";

$run_count = mysqli_query($con,$count_terms);

$count = mysqli_num_rows($run_count);

$get_terms = "select * from terms LIMIT 1,$count";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){

$term_title = $row_terms['term_title'];

$term_desc = $row_terms['term_desc'];

$term_link = $row_terms['term_link'];

?>

<div id="<?php echo $term_link; ?>" class="tab-pane fade in"><!-- tab-pane fade in Starts -->


<h1><?php echo $term_title; ?></h1>

<p><?php echo $term_desc; ?></p>


</div><!-- tab-pane fade in Ends -->

<?php } ?>

</div><!-- tab-content Ends -->

</div><!-- box Ends -->


</div><!-- col-md-9 Ends -->

</div><!-- container Ends -->

</div><!-- content Ends -->

<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>

































<section>
<?php
            global $db;


  
            if(isset($_GET['submit_range'])){
            $query = "SELECT * FROM products WHERE product_price BETWEEN '$min' AND '$max' ORDER BY product_price ASC";



              $run_products = mysqli_query($db, $query);

              $count = mysqli_num_rows($run_products);

              if ($count == 0) {

                echo "
    
    <div class='box'>
    
    <h1> No Product Found In This Product manufacturer </h1>
    
    </div>
    
    ";
              } 
              
            ?>
              <div class="slick1  ">
<?php
              
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

<a class='label sale ' href='#' style='color:black;'>

<div class='thelabel '>$pro_label</div>

</a>

";
                }

                echo "

              <div class='card1' style=' height:510px;' > 


<a href='$pro_url' >

<img src='admin_area/product_images/$pro_img1' class='img-fluid w-100 'style='height:200px;'   />

</a>

<div class='text' >
<p class='btn btn-info '> $manufacturer_name </p>


<h3><a href='$pro_url' >$pro_title</a></h3>

<p class='price' > $product_price $product_psp_price </p>

<p class='buttons d-block' >

<a href='details.php?pro_id=$pro_id' class='btn ' style='  background-color:#e42c5a; color: white;' >View details</a>

<a href='details.php?pro_id=$pro_id' class='btn  mb-2' style='  background-color:#e42c5a; color: white;'>

<i class='fa fa-shopping-cart' ></i> Add To Cart

</a>

</p>

</div>



$product_label
</div>
";
              }
            }
          
            
              ?>
              </div>





