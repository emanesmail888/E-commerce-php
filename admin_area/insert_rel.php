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

<i class="fa fa-dashboard"></i> Dashboard / Insert Relation

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-md-8 offset-2"><!-- col-lg-12 Starts -->

<div class="panel" style="border: 1px solid blue;"><!-- panel panel-default Starts -->

<div class="panel-heading bg-info"><!-- panel-heading Starts -->

<h3 class="panel-title text-center"><!-- panel-title Starts -->

<i  class="fa fa-money fa-fw"></i> Insert Relation

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post"><!-- form-horizontal Starts -->

<div class="form-group w-100 d-flex"><!-- form-group Starts -->

<label class="w-25 ml-1"> Relation Title  </label>
<input type="text" name="rel_title" class="form-control w-75 mr-1 ">

</div><!-- form-group Ends -->

<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 ml-1"> Select Product  </label>
<select name="product_id" class="form-control w-75 mr-1">

<option> Select Product </option>

<?php

$get_p = "select * from products where status='product'";

$run_p = mysqli_query($con,$get_p);

while($row_p = mysqli_fetch_array($run_p)){

$p_id = $row_p['product_id'];

$p_title = $row_p['product_title'];

echo "<option value='$p_id'> $p_title </option>";

}

?>

</select>

</div><!-- form-group Ends -->

<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 ml-1"> Select Bundle  </label>

<select name="bundle_id" class="form-control w-75 mr-1">

<option> Select Bundle </option>

<?php

$get_p = "select * from products where status='bundle'";

$run_p = mysqli_query($con,$get_p);

while($row_p = mysqli_fetch_array($run_p)){

$p_id = $row_p['product_id'];

$p_title = $row_p['product_title'];

echo "<option value='$p_id'> $p_title </option>";

}

?>

</select>

</div>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="w-25 ml-1"> </label>

<input type="submit" name="submit" class="btn btn-info form-control d-block w-75 mx-auto" value="Insert Relation">


</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php

if(isset($_POST['submit'])){

$rel_title = $_POST['rel_title'];

$product_id = $_POST['product_id'];

$bundle_id = $_POST['bundle_id'];

$insert_rel = "insert into bundle_product_relation (rel_title,product_id,bundle_id) values ('$rel_title','$product_id','$bundle_id')";

$run_rel = mysqli_query($con,$insert_rel);

if($run_rel){

echo "<script>alert('New Relation Has Been Inserted')</script>";

echo "<script>window.open('index.php?view_rel','_self')</script>";

}

}

?>


<?php } ?>