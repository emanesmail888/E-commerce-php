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

<i class="fa fa-dashboard"></i> Dashboard / View Products Categories

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel " style="border:1px solid blue ;"><!-- panel panel-default Starts -->

<div class="panel-heading bg-info"><!-- panel-heading Starts -->

<h3 class="panel-title text-center"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"> </i> View Products Categories

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->


<table class="table table-info table-hover table-striped"><!-- table table-info  table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Product Category Id</th>
<th>Product Category Title</th>
<th>Product Category Description</th>
<th>Delete Product Category</th>
<th>Edit Product Category</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$i=0;

$get_p_cats = "select * from product_categories";

$run_p_cats = mysqli_query($con,$get_p_cats);

while($row_p_cats = mysqli_fetch_array($run_p_cats)){

$p_cat_id = $row_p_cats['p_cat_id'];

$p_cat_title = $row_p_cats['p_cat_title'];

$p_cat_desc = $row_p_cats['p_cat_desc'];

$i++;

?>

<tr>

<td> <?php echo $i; ?> </td>

<td> <?php echo $p_cat_title; ?> </td>

<td width="300"> <?php echo $p_cat_desc; ?> </td>

<td> 

<a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">

<i class="fa fa-trash-o"></i> Delete

</a>

</td>

<td> 

<a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">

<i class="fa fa-pencil"></i> Edit

</a>

</td>


</tr>

<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-info table-hover table-striped Ends -->


</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->



<?php } ?>