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

<i class="fa fa-dashboard"></i> Dashboard / View Manufacturers

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel " style="border:1px solid red ;"><!-- panel panel-default Starts -->

<div class="panel-heading bg-danger"><!-- panel-heading Starts -->

<h3 class="panel-title text-center text-white">

<i class="fa fa-money fa-fw"></i> View Manufacturers

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<table class="table table-danger table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Manufacturer Id:</th>
<th>Manufacturer Title:</th>
<th>Delete Manufacturer:</th>
<th>Edit Manufacturer:</th>

</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$i = 0;

$get_manufacturers = "select * from manufacturers";

$run_manufacturers = mysqli_query($con,$get_manufacturers);

while($row_manufacturers = mysqli_fetch_array($run_manufacturers)){

$manufacturer_id = $row_manufacturers['manufacturer_id'];

$manufacturer_title = $row_manufacturers['manufacturer_title'];

$i++;

?>

<tr>

<td><?php echo $i; ?></td>

<td><?php echo $manufacturer_title; ?></td>

<td>

<a href="index.php?delete_manufacturer=<?php echo $manufacturer_id; ?>" class="text-danger">

<i class="fa fa-trash-o text-danger"></i> Delete

</a>

</td>

<td>

<a href="index.php?edit_manufacturer=<?php echo $manufacturer_id; ?>" class="text-danger">

<i class="fa fa-pencil text-danger"></i> Edit

</a>

</td>

</tr>

<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->


</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php } ?>