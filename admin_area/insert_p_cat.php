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

<i class="fa fa-dashboard"></i> Dashboard / Insert Products Category

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-md-10 offset-1"><!-- col-lg-12 Starts -->

<div class="panel " style="border: 1px solid blue;"><!-- panel panel-default Starts -->

<div class="panel-heading bg-info" ><!-- panel-heading Starts -->

<h3 class="panel-title text-center" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Insert Product Category

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->


<div class="panel-body" ><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group w-100 d-flex" ><!-- form-group Starts -->

<label class="ml-1 w-25" >Product Category Title</label>


<input type="text" name="p_cat_title" class="form-control w-75 mr-1" >


</div><!-- form-group Ends -->

<div class="form-group w-100 d-flex" ><!-- form-group Starts -->

<label class="ml-1 w-25" >Product Category Description</label>

<textarea type="text" name="p_cat_desc" class="form-control w-75 mr-1" >

</textarea>

</div><!-- form-group Ends -->

<div class="form-group w-100 d-flex" >

<label class="col-md-3 ml-1 w-25 " > Select Product Category Image</label>


<input type="file" name="p_cat_image" class="form-control w-75 mr-1" >


</div><!-- form-group Ends -->


<div class="form-group" >

<input type="submit" name="submit" value="Submit Now" class="btn btn-info d-block mx-auto form-control" >


</div><!-- form-group Ends -->



</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$p_cat_title = $_POST['p_cat_title'];

$p_cat_desc = $_POST['p_cat_desc'];
$p_cat_image = $_FILES['p_cat_image']['name'];

$temp_name = $_FILES['p_cat_image']['tmp_name'];

move_uploaded_file($temp_name,"categories_images/$p_cat_image");


$insert_p_cat = "insert into product_categories (p_cat_title,p_cat_desc,p_cat_image) values ('$p_cat_title','$p_cat_desc','$p_cat_image')";

$run_p_cat = mysqli_query($con,$insert_p_cat);

if($run_p_cat){

echo "<script>alert('New Product Category Has been Inserted')</script>";

echo "<script>window.open('index.php?view_p_cats','_self')</script>";

}



}



?>


<?php } ?>