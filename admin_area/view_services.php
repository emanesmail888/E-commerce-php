<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>




<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / View Services

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row">

<div class="col-md-12 ">

<div class="panel " >

<div class="panel-heading bg-success text-center">

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> View Services 

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body row">

<?php

$get_services = "select * from services";

$run_services = mysqli_query($con,$get_services);

while($row_services = mysqli_fetch_array($run_services)){

$service_id = $row_services['service_id'];

$service_title = $row_services['service_title'];

$service_image = $row_services['service_image'];

$service_desc = substr($row_services['service_desc'],0,400);

$service_button = $row_services['service_button'];

$service_url = $row_services['service_url'];


?>

<div class="col-lg-4 col-md-4"><!-- col-lg-4 col-md-4 Starts -->



<h3 class=" text-center" >

<?php echo $service_title; ?>

</h3>

<img src="services_images/<?php echo $service_image; ?>" class="w-100 h-50 ">

<br>

<p><?php echo $service_desc; ?></p>


<div class="d-flex justify-content-around mb-0">

<a href="index.php?delete_service=<?php echo $service_id; ?>" class="text-white btn btn-success p-2">

<i class="fa fa-trash"></i> Delete

</a>

<a href="index.php?edit_service=<?php echo $service_id; ?>" class="btn btn-success text-white p-2">

<i class="fa fa-pencil"></i> Edit

</a>


</div>


</div><!-- col-lg-4 col-md-4 Ends -->

<?php } ?>

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->




<?php } ?>