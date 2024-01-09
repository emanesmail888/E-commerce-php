<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['edit_enquiry'])){

$edit_id = $_GET['edit_enquiry'];

$get_enquiry_type = "select * from enquiry_types where enquiry_id='$edit_id'";

$run_enquiry_type = mysqli_query($con,$get_enquiry_type);

$row_enquiry_type = mysqli_fetch_array($run_enquiry_type);

$enquiry_id = $row_enquiry_type['enquiry_id'];

$enquiry_title = $row_enquiry_type['enquiry_title'];

}


?>

<div class="row" >

<div class="col-lg-12" >

<ol class="breadcrumb">

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Edit Enquiry Type

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->



<div class="row">

<div class="col-md-10 offset-1">

<div class="panel" style="border: 1px solid red;"><!-- panel panel-default Starts -->

<div class="panel-heading bg-danger"><!-- panel-heading Starts -->

<h3 class="panel-title text-white text-center">

<i class="fa fa-money fa-fw"></i> Edit Enquiry Type 

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body">

<form class="form-horizontal" action="" method="post" >


<div class="form-group d-flex w-100">

<label class="col-md-3 w-25 ml-1"> Enquiry Title </label>

<input type="text" name="enquiry_title" class="form-control w-75 mr-1" value="<?php echo $enquiry_title; ?>">

</div><!-- form-group Ends -->


<div class="form-group">

<input type="submit" name="update" class="btn btn-danger d-block mx-auto w-75 form-control" value="Update Enquiry Type">

</div><!-- form-group Ends -->



</form><!-- form-horizontal Ends-->

</div><!-- panel-body Ends -->

</div><!-- panel Ends -->

</div><!-- col-md-10 Ends -->

</div><!-- 2 row Ends -->


<?php

if(isset($_POST['update'])){

$enquiry_title = $_POST['enquiry_title'];

$update_enquiry = "update enquiry_types set enquiry_title='$enquiry_title' where enquiry_id='$enquiry_id'";

$run_enquiry = mysqli_query($con,$update_enquiry);

if($run_enquiry){

echo "<script>alert('One Enquiry Type Has Been Updated')</script>";

echo "<script>window.open('index.php?view_enquiry','_self')</script>";

}

}


?>


<?php } ?>