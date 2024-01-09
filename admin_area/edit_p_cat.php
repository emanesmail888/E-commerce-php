<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['edit_p_cat'])){

$edit_p_cat_id = $_GET['edit_p_cat'];

$edit_p_cat_query = "select * from product_categories where p_cat_id='$edit_p_cat_id'";

$run_edit = mysqli_query($con,$edit_p_cat_query);

$row_edit = mysqli_fetch_array($run_edit);

$p_cat_id = $row_edit['p_cat_id'];

$p_cat_title = $row_edit['p_cat_title'];
$p_cat_desc = $row_edit['p_cat_desc'];

$p_cat_image = $row_edit['p_cat_image'];

$new_p_cat_image = $row_edit['p_cat_image'];

}


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li>

<i class="fa fa-dashboard"></i> Dashboard / Edit Product Category

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-md-10 offset-1">

<div class="panel" style="border: 1px solid yellow;">

<div class="panel-heading bg-warning" >

<h3 class="panel-title text-center" >

<i class="fa fa-money fa-fw" ></i> Edit Product Category

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body" >

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="col-md-3 w-25 ml-1" >Product Category Title</label>


<input type="text" name="p_cat_title" class="form-control mr-1 w-75" value="<?php echo $p_cat_title; ?>" >


</div><!-- form-group Ends -->

<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="col-md-3 w-25 ml-1" >Product Category Desc</label>


<input type="text" name="p_cat_desc" class="form-control mr-1 w-75" value="<?php echo $p_cat_desc; ?>" >


</div><!-- form-group Ends -->





<div class="form-group w-100 d-flex" ><!-- form-group Starts -->

<label class="col-md-3 ml-1 w-25 " > Select Product Category Image</label>


<input type="file" name="p_cat_image" class="form-control mr-1 w-75" >

<br>

<img src="categories_images/<?php echo $p_cat_image; ?>" width="70" height="70" >


</div><!-- form-group Ends -->


<div class="form-group" >



<input type="submit" name="update" value="Update Now" class="btn btn-warning d-block mx-auto  form-control" >


</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

$p_cat_title = $_POST['p_cat_title'];


$p_cat_image = $_FILES['p_cat_image']['name'];

$temp_name = $_FILES['p_cat_image']['tmp_name'];


move_uploaded_file($temp_name,"categories_images/$p_cat_image");

if(empty($p_cat_image)){

$p_cat_image = $new_p_cat_image;

}

$update_p_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_image='$p_cat_image' where p_cat_id='$p_cat_id'";

$run_p_cat = mysqli_query($con,$update_p_cat);

if($run_p_cat){

echo "<script>alert('Product Category has been Updated')</script>";

echo "<script>window.open('index.php?view_p_cats','_self')</script>";

}



}



?>


<?php } ?>


































