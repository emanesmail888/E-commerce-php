<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['edit_cat'])){

$edit_id = $_GET['edit_cat'];

$edit_cat = "select * from categories where cat_id='$edit_id'";

$run_edit = mysqli_query($con,$edit_cat);

$row_edit = mysqli_fetch_array($run_edit);

$c_id = $row_edit['cat_id'];

$c_title = $row_edit['cat_title'];

$c_desc = $row_edit['cat_desc'];
$c_image = $row_edit['cat_image'];

$new_c_image = $row_edit['cat_image'];




}

?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li>

<i class="fa fa-dashboard"></i> Dashboard / Edit Category

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel" style="border: 1px solid yellow;"><!-- panel panel-default Starts -->

<div class="panel-heading bg-warning"><!-- panel-heading Starts -->

<h3 class="panel-title text-center"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Edit Category

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body">

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group d-flex w-100">

<label class="col-md-3 w-25 ml-1">Category Title</label>


<input type="text" name="cat_title" class="form-control w-75 mr-1" value="<?php echo $c_title; ?>">


</div><!-- form-group Ends -->



<div class="form-group d-flex w-100" >

<label class="col-md-3 w-25 ml-1" >Category Description</label>


<input type="text" name="cat_desc" class="form-control mr-1 w-75" value="<?php echo $c_desc; ?>" >


</div><!-- form-group Ends -->

<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="col-md-3 w-25 ml-1">Select Category Image</label>


<input type="file" name="cat_image" class="form-control w-75 mr-1">

<br>

<img src="categories_images/<?php echo $c_image; ?>" width="70" height="70" >


</div><!-- form-group Ends -->

<div class="form-group">
<input type="submit" name="update" value="Update Category" class="btn btn-warning d-block mx-auto w-75 form-control">

</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel  -->

</div><!-- col-md-10 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

$cat_title = $_POST['cat_title'];

$cat_desc = $_POST['cat_desc'];
$cat_image = $_FILES['cat_image']['name'];

$temp_name = $_FILES['cat_image']['tmp_name'];

move_uploaded_file($temp_name,"categories_images/$cat_image");

if(empty($cat_image)){

$cat_image= $new_c_image;

}

$update_cat = "update categories set cat_title='$cat_title',cat_desc='$cat_desc',cat_image='$cat_image' where cat_id='$c_id'";

$run_cat = mysqli_query($con,$update_cat);

if($run_cat){

echo "<script>alert('One Category Has Been Updated')</script>";

echo "<script>window.open('index.php?view_cats','_self')</script>";

}

}



?>

<?php } ?>