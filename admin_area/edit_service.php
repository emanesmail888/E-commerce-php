<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
  
<?php

if(isset($_GET['edit_service'])){

$edit_id = $_GET['edit_service'];

$get_services = "select * from services where service_id='$edit_id'";

$run_services = mysqli_query($con,$get_services);

$row_services = mysqli_fetch_array($run_services);

$service_id = $row_services['service_id'];

$service_title = $row_services['service_title'];

$service_image = $row_services['service_image'];

$service_desc = $row_services['service_desc'];

$service_button = $row_services['service_button'];

$service_url = $row_services['service_url'];

$new_s_image = $row_services['service_image'];


}

?>  

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Edit Service

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row">

<div class="col-md-10 offset-1">
<div class="panel" style="border: 1px solid green;">

<div class="panel-heading text-center">
<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Service

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body">

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group w-100 d-flex">

<label class="w-25 ml-1"> Service Title : </label>

<input type="text" name="service_title" class="form-control w-75 mr-1" value="<?php echo $service_title; ?>">

</div><!-- form-group Ends -->



<div class="form-group w-100 d-flex">
<label class="w-25 ml-1"> Service Image : </label>


<input type="file" name="service_image" class="form-control w-75 mr-1">

<br>

<img src="services_images/<?php echo $service_image; ?>" width="70" height="70" >

</div><!-- form-group Ends -->


<div class="form-group w-100 d-flex">

<label class="w-25 ml-1"> Service Description : </label>


<textarea name="service_desc" class="form-control w-75 mr-1" rows="10" cols="19">

<?php echo $service_desc; ?>

</textarea>

</div><!-- form-group Ends -->


<div class="form-group w-100 d-flex">

<label class="w-25 ml-1"> Service Button : </label>

<input type="text" name="service_button" class="form-control w-75 mr-1" value="<?php echo $service_button; ?>">

</div><!-- form-group Ends -->

<div class="form-group w-100 d-flex">

<label class="w-25 ml-1"> Service Url : </label>

<input type="url" name="service_url" class="form-control w-75 mr-1" value="<?php echo $service_url; ?>">

</div><!-- form-group Ends -->

<div class="form-group w-100 d-flex ">

<input type="submit" name="update" value="Update Service" class="btn btn-success w-75 d-block mx-auto form-control">


</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

$service_title = $_POST['service_title'];

$service_desc = $_POST['service_desc'];

$service_button = $_POST['service_button'];

$service_url = $_POST['service_url'];

$service_image = $_FILES['service_image']['name'];

$tmp_image = $_FILES['service_image']['tmp_name'];

if(empty($service_image)){

$service_image = $new_s_image;

}

move_uploaded_file($tmp_image,"services_images/$service_image");

$update_services = "update services set service_title='$service_title',service_image='$service_image',service_desc='$service_desc',service_button='$service_button',service_url='$service_url' where service_id='$service_id'";

$run_services = mysqli_query($con,$update_services);

if($run_services){

echo "<script>alert('One Service Column Has Been Updated')</script>";

echo "<script>window.open('index.php?view_services','_self')</script>";

}

}

?>

<?php } ?>