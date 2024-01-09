<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Insert Manufacturer

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel" style="border:1px solid red;"><!-- panel panel-default Starts -->

<div class="panel-heading bg-danger"><!-- panel-heading Starts -->

<h3 class="panel-title text-center text-white"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"> </i> Insert Manufacturer

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group w-100 d-flex"><!-- form-group Starts -->

<label class="w-25 ml-1"> Manufacturer Name </label>
<input type="text" name="manufacturer_name" class="form-control w-75 mr-1" >
</div><!-- form-group Ends -->


<div class="form-group w-100 d-flex"><!-- form-group Starts -->

<label class="ml-1 w-25 "> Show as Top Manufacturers </label>
<input type="radio" name="manufacturer_top" value="yes"  >

<label class="mr-3 ml-1"> Yes </label>

<input type="radio" name="manufacturer_top" value="no" >

<label  class="mr-3 ml-1"> No </label>

</div>

</div><!-- form-group Ends -->


<div class="form-group w-100 d-flex"><!-- form-group Starts -->

<label class="w-25 ml-1"> Select Manufacturer Image </label>
<input type="file" name="manufacturer_image" class="form-control w-75 mr-1" >
</div><!-- form-group Ends -->


<div class="form-group w-100 d-flex"><!-- form-group Starts -->

<input type="submit" name="submit" class="form-control btn btn-danger w-75 d-block mx-auto" value=" Insert Manufacturer " >

</div><!-- form-group Ends -->



</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$manufacturer_name = $_POST['manufacturer_name'];

$manufacturer_top = $_POST['manufacturer_top'];

$manufacturer_image = $_FILES['manufacturer_image']['name'];

$tmp_name = $_FILES['manufacturer_image']['tmp_name'];

move_uploaded_file($tmp_name,"other_images/$manufacturer_image");

$insert_manufacturer = "insert into manufacturers (manufacturer_title,manufacturer_top,manufacturer_image) values ('$manufacturer_name','$manufacturer_top','$manufacturer_image')";

$run_manufacturer = mysqli_query($con,$insert_manufacturer);

if($run_manufacturer){

echo "<script>alert('New Manufacturer Has Been Inserted')</script>";

echo "<script>window.open('index.php?view_manufacturers','_self')</script>";

}

}

?>

<?php } ?>