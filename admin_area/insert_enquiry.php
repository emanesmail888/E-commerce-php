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

<i class="fa fa-dashboard" ></i> Dashboard / Insert Enquiry Type

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->


<div class="row">

<div class="col-md-10 offset-1">

<div class="panel " style="border: 1px solid red;">

<div class="panel-heading bg-danger">

<h3 class="panel-title text-center">

<i class="fa fa-money fa-fw"></i> Insert Enquiry Type 

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body">

<form class="form-horizontal" action="" method="post" >

<div class="form-group w-100 d-flex">

<label class="col-md-3 ml-1 w-25"> Enquiry Title </label>

<input type="text" name="enquiry_title" class="form-control w-75 mr-1">

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<input type="submit" name="submit" class="btn btn-danger d-block mx-auto w-75 form-control" value="Insert Enquiry Type">


</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends-->

</div><!-- panel-body Ends -->

</div><!-- panel  Ends -->

</div><!-- col-md-10 Ends -->

</div><!-- 2 row Ends -->


<?php

if(isset($_POST['submit'])){

$enquiry_title = $_POST['enquiry_title'];

$insert_enquiry =  "insert into enquiry_types (enquiry_title) values ('$enquiry_title')";

$run_enquiry = mysqli_query($con,$insert_enquiry);

if($run_enquiry){

echo "<script> alert('New Enquiry Type Has Been Inserted') </script>";
echo "<script>window.open('index.php?view_enquiry','_self')</script>";

}



}


?>


<?php } ?>