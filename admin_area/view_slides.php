<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12 text-danger"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Slides

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts  -->

<div class="col-md-12"><!-- col-lg-12 Starts -->

<div class="panel " style="border:1px solid #5555 ;"><!-- panel panel-default Starts -->

<div class="panel-heading bg-secondary"><!-- panel-heading Starts -->

<h3 class="panel-title text-center"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View Slides

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<?php

$get_slides = "select * from slider";

$run_slides = mysqli_query($con,$get_slides);

while($row_slides=mysqli_fetch_array($run_slides)){

$slide_id = $row_slides['slide_id'];

$slide_name = $row_slides['slide_name'];

$slide_image = $row_slides['slide_image'];



?>

<div class="col-md-8 offset-2" ><!-- col-lg-3 col-md-3 Starts -->

<div class="panel " ><!-- panel panel-primary Starts --->

<div class="panel-heading bg-secondary" ><!-- panel-heading Starts -->

<h3 class="panel-title text-center" >

<?php echo $slide_name; ?>


</h3>

</div><!-- panel-heading Ends -->


<div class="panel-body " ><!-- panel-body Starts -->

<img src="slides_images/<?php echo $slide_image; ?>" class="img-responsive w-75" >

</div><!-- panel-body Ends -->

<div class="panel-footer" ><!-- panel-footer Starts -->


<a href="index.php?delete_slide=<?php echo $slide_id; ?>" class="pull-left" >

<i class="fa fa-trash-o" ></i> Delete

</a>

<a href="index.php?edit_slide=<?php echo $slide_id; ?>" class="pull-right" >

<i class="fa fa-pencil" ></i> Edit

</a>

<div class="clearfix" >

</div>


</div><!-- panel-footer Ends -->


</div><!-- panel panel-primary Ends --->


</div><!-- col-lg-3 col-md-3 Ends -->


<?php } ?>


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends  -->

<?php } ?>