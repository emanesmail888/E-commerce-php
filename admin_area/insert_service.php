<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Insert Service

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row">
<div class="col-md-10 offset-1">
<div class="panel " style="border:1px solid green ;">

<div class="panel-heading text-center text-success">

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Insert Service

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body">

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

<div class="form-group w-100 d-flex">
<label class="w-25 ml-1"> Service Title : </label>


<input type="text" name="service_title" class="form-control w-75 mr-1">



</div><!-- form-group Ends -->



<div class="form-group w-100 d-flex">

<label class="w-25 ml-1"> Service Image : </label>


<input type="file" name="service_image" class="form-control w-75 mr-1">

</div>

</div><!-- form-group Ends -->


<div class="form-group w-100 d-flex"><!-- form-group Starts -->

<label class="w-25 ml-1"> Service Description : </label>


<textarea name="service_desc" class="form-control w-75 mr-1" rows="10" cols="19">



</textarea>

</div><!-- form-group Ends -->


<div class="form-group w-100 d-flex">

<label class="w-25 ml-1"> Service Button : </label>


<input type="text" name="service_button" class="form-control w-75 mr-1">


</div><!-- form-group Ends -->

<div class="form-group w-100 d-flex">
<label class="w-25 ml-1"> Service Url : </label>


<input type="url" name="service_url" class="form-control w-75 mr-1">


</div><!-- form-group Ends -->

<div class="form-group w-100 d-flex">


<input type="submit" name="submit" value="Insert Service" class="btn btn-success d-block w-75 mx-auto form-control">


</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$service_title = $_POST['service_title'];

$service_desc = $_POST['service_desc'];

$service_button = $_POST['service_button'];

$service_url = $_POST['service_url'];

$service_image = $_FILES['service_image']['name'];

$tmp_image = $_FILES['service_image']['tmp_name'];

$sel_services = "select * from services";

$run_services = mysqli_query($con,$sel_services);

$count = mysqli_num_rows($run_services);

if($count == 3){

echo "<script>alert('You Have already Inserted 3 Services columns')</script>";

}
else{

move_uploaded_file($tmp_image,"services_images/$service_image");

$insert_service = "insert into services (service_title,service_image,service_desc,service_button,service_url) values ('$service_title','$service_image','$service_desc','$service_button','$service_url')";

$run_service = mysqli_query($con,$insert_service);

if($run_service){

echo "<script>alert('New Service Column Has Been Inserted')</script>";

echo "<script>window.open('index.php?view_services','_self')</script>";

}

}

}

?>

<?php } ?>