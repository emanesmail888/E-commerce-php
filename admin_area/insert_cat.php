<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12 text-danger"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li>

<i class="fa fa-dashboard"></i> Dashboard / Insert Category

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->




<div class="row"><!-- 2 row Starts -->

<div class="col-md-8 offset-2 h-100 "><!-- col-lg-12 Starts -->

<div class="panel pb-3 "  style="border:1px solid orange;" ><!-- panel panel-default Starts -->

<div class="panel-heading bg-warning w-100"><!-- panel-heading Starts -->

<h3 class="panel-title text-center"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Insert Category

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post"enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 control-label ml-1">Category Title</label>


<input type="text" name="cat_title" class="form-control w-75 mr-1">


</div><!-- form-group Ends -->

<div class="form-group d-flex w-100">

<label class="w-25 control-label ml-1">Category Description</label>


<textarea type="text" name="cat_desc" class="form-control w-75 mr-1" rows="4">


</textarea>


</div><!-- form-group Ends -->

<div class="form-group d-flex w-100">

<label class="col-md-3 w-25 ml-1">Select Category Image</label>


<input type="file" name="cat_image" class="form-control w-75 mr-1">

 
</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<input type="submit" name="submit" value="Insert Category" class="btn btn1 btn-warning form-control w-75 d-block mx-auto">


</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$cat_title = $_POST['cat_title'];

$cat_desc = $_POST['cat_desc'];
$cat_image = $_FILES['cat_image']['name'];

$temp_name = $_FILES['cat_image']['tmp_name'];

move_uploaded_file($temp_name,"other_images/$cat_image");


$insert_cat = "insert into categories (cat_title,cat_desc,cat_image) values ('$cat_title','$cat_desc','$cat_image')";

$run_cat = mysqli_query($con,$insert_cat);

if($run_cat){

echo "<script> alert('New Category Has Been Inserted')</script>";

echo "<script> window.open('index.php?view_cats','_self') </script>";

}

}



?>

<?php } ?>