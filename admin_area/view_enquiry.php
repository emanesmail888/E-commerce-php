<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>


<div class="row" >

<div class="col-lg-12" >

<ol class="breadcrumb">

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / View Enquiry Types

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->



<div class="row">

<div class="col-md-10 offset-1">

<div class="panel" style="border:1px solid red;">

<div class="panel-heading bg-danger">

<h3 class="panel-title text-center text-white">

<i class="fa fa-money fa-fw"></i> View Enquiry Types 

</h3>

</div><!-- panel-heading Ends -->


<div class="panel-body">


<table class="table  table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead class="text-danger">

<tr>

<th>Enquiry Type Id</th>

<th>Enquiry Type Title</th>

<th>Delete Enquiry Type</th>

<th>Edit Enquiry Type</th>

</tr>

</thead>

<tbody><!-- tbody Starts -->

<?php

$i = 0;

$get_enquiry_types = "select * from enquiry_types";

$run_enquiry_types = mysqli_query($con,$get_enquiry_types);

while($row_enquiry_types = mysqli_fetch_array($run_enquiry_types)){

$enquiry_id = $row_enquiry_types['enquiry_id'];

$enquiry_title = $row_enquiry_types['enquiry_title'];

$i++;

?>

<tr>

<td> <?php echo $i; ?> </td>

<td> <?php echo $enquiry_title; ?> </td>

<td>

<a href="index.php?delete_enquiry=<?php echo $enquiry_id; ?>" class="text-secondary">

<i class="fa fa-trash"> </i> Delete

</a>

</td>


<td>

<a href="index.php?edit_enquiry=<?php echo $enquiry_id; ?>" class="text-secondary">

<i class="fa fa-pencil"> </i> Edit

</a>

</td>


</tr>

<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->


</div><!-- panel-body Ends -->

</div><!-- panel  Ends -->

</div><!-- col-md-10 Ends -->

</div><!-- 2 row Ends -->



<?php } ?>