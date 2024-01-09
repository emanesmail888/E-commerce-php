<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_product'])){

$edit_id = $_GET['edit_product'];

$get_p = "select * from products where product_id='$edit_id'";

$run_edit = mysqli_query($con,$get_p);

$row_edit = mysqli_fetch_array($run_edit);

$p_id = $row_edit['product_id'];

$p_title = $row_edit['product_title'];

$p_cat = $row_edit['p_cat_id'];

$cat = $row_edit['cat_id'];

$m_id = $row_edit['manufacturer_id'];

$p_image1 = $row_edit['product_img1'];

$p_image2 = $row_edit['product_img2'];

$p_image3 = $row_edit['product_img3'];

$new_p_image1 = $row_edit['product_img1'];

$new_p_image2 = $row_edit['product_img2'];

$new_p_image3 = $row_edit['product_img3'];

$p_price = $row_edit['product_price'];

$p_desc = $row_edit['product_desc'];

$p_keywords = $row_edit['product_keywords'];

$psp_price = $row_edit['product_psp_price'];

$p_label = $row_edit['product_label'];

$p_url = $row_edit['product_url'];

$p_features = $row_edit['product_features'];

$p_video = $row_edit['product_video'];

}

$get_manufacturer = "select * from manufacturers where manufacturer_id='$m_id'";

$run_manufacturer = mysqli_query($con,$get_manufacturer);

$row_manfacturer = mysqli_fetch_array($run_manufacturer);

$manufacturer_id = $row_manfacturer['manufacturer_id'];

$manufacturer_title = $row_manfacturer['manufacturer_title'];


$get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";

$run_p_cat = mysqli_query($con,$get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);

$p_cat_title = $row_p_cat['p_cat_title'];

$get_cat = "select * from categories where cat_id='$cat'";

$run_cat = mysqli_query($con,$get_cat);

$row_cat = mysqli_fetch_array($run_cat);

$cat_title = $row_cat['cat_title'];

?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Products </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#product_desc,#product_features' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit Products

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-md-10 offset-1"><!-- col-lg-12 Starts -->

<div class="panel" style="border: 1px solid green;"><!-- panel panel-default Starts -->

<div class="panel-heading bg-success"><!-- panel-heading Starts -->

<h3 class="panel-title text-center">

<i class="fa fa-money fa-fw"></i> Edit Products

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="w-25 ml-1" > Product Title </label>


<input type="text" name="product_title" class="form-control w-75 mr-1" required value="<?php echo $p_title; ?>">


</div><!-- form-group Ends -->


<div class="form-group  d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Product Url </label>


<input type="text" name="product_url" class="form-control w-75 mr-1" required value="<?php echo $p_url; ?>" >


</div><!-- form-group Ends -->

<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Select A Manufacturer </label>

<select name="manufacturer" class="form-control w-75 mr-1">

<option value="<?php echo $manufacturer_id; ?>">
<?php echo $manufacturer_title; ?>
</option>

<?php

$get_manufacturer = "select * from manufacturers";

$run_manufacturer = mysqli_query($con,$get_manufacturer);

while($row_manfacturer = mysqli_fetch_array($run_manufacturer)){

$manufacturer_id = $row_manfacturer['manufacturer_id'];

$manufacturer_title = $row_manfacturer['manufacturer_title'];

echo "
<option value='$manufacturer_id'>
$manufacturer_title
</option>
";

}

?>

</select>

</div><!-- form-group Ends -->

<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Product Category </label>

<select name="product_cat" class="form-control w-75 mr-1" >

<option value="<?php echo $p_cat; ?>" > <?php echo $p_cat_title; ?> </option>


<?php

$get_p_cats = "select * from product_categories";

$run_p_cats = mysqli_query($con,$get_p_cats);

while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {

$p_cat_id = $row_p_cats['p_cat_id'];

$p_cat_title = $row_p_cats['p_cat_title'];

echo "<option value='$p_cat_id' >$p_cat_title</option>";

}


?>


</select>

</div><!-- form-group Ends -->

<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Category </label>



<select name="cat" class="form-control w-75 mr-1" >

<option value="<?php echo $cat; ?>" > <?php echo $cat_title; ?> </option>

<?php

$get_cat = "select * from categories ";

$run_cat = mysqli_query($con,$get_cat);

while ($row_cat=mysqli_fetch_array($run_cat)) {

$cat_id = $row_cat['cat_id'];

$cat_title = $row_cat['cat_title'];

echo "<option value='$cat_id'>$cat_title</option>";

}

?>


</select>


</div><!-- form-group Ends -->

<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Product Image 1 </label>


<input type="file" name="product_img1" class="form-control mr-1 w-75" >

</div><!-- form-group Ends -->
<img src="product_images/<?php echo $p_image2; ?>" width="70" height="70" >


<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Product Image 2 </label>


<input type="file" name="product_img2" class="form-control w-75 mr-1" >

</div><!-- form-group Ends -->
<img src="product_images/<?php echo $p_image2; ?>" width="70" height="70" >


<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Product Image 3 </label>


<input type="file" name="product_img3" class="form-control mr-1 w-75" >


</div><!-- form-group Ends -->
<img src="product_images/<?php echo $p_image3; ?>" width="70" height="70" >


<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Product Price </label>


<input type="text" name="product_price" class="form-control mr-1 w-75" required value="<?php echo $p_price; ?>" >


</div><!-- form-group Ends -->

<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Product Sale Price </label>


<input type="text" name="psp_price" class="form-control mr-1 w-75" required value="<?php echo $psp_price; ?>">


</div><!-- form-group Ends -->

<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Product Keywords </label>


<input type="text" name="product_keywords" class="form-control mr-1 w-75" required value="<?php echo $p_keywords; ?>" >


</div><!-- form-group Ends -->

<div class="form-group " ><!-- form-group Starts -->
<div class="d-flex w-100">

<label class="ml-1 w-25" > Product Tabs </label>


<ul class="nav nav-tabs d-flex  w-75"><!-- nav nav-tabs Starts -->

<a data-toggle="tab" href="#description" class="p-2 bg-success mx-1 text-white"> Product Description </a>

<a data-toggle="tab" href="#features" class="p-2 bg-success mx-1 text-white"> Product Features </a>

<a data-toggle="tab" href="#video" class="p-2 bg-success mx-1 text-white"> Sounds And Videos </a>

</ul><!-- nav nav-tabs Ends -->
</div>

<div class="tab-content"><!-- tab-content Starts -->

<div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->

<br>

<textarea name="product_desc" class="form-control" rows="15" id="product_desc">

<?php echo $p_desc; ?>

</textarea>

</div><!-- description tab-pane fade in active Ends -->


<div id="features" class="tab-pane fade in"><!-- features tab-pane fade in Starts -->

<br>

<textarea name="product_features" class="form-control" rows="15" id="product_features">

<?php echo $p_features; ?>

</textarea>

</div><!-- features tab-pane fade in Ends -->


<div id="video" class="tab-pane fade in"><!-- video tab-pane fade in Starts -->

<br>

<textarea name="product_video" class="form-control" rows="15">

<?php echo $p_video; ?>

</textarea>

</div><!-- video tab-pane fade in Ends -->


</div><!-- tab-content Ends -->

</div>

</div><!-- form-group Ends -->

<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="w-25 ml-1" > Product Label </label>


<input type="text" name="product_label" class="form-control w-75 mr-1" required value="<?php echo $p_label; ?>">

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<input type="submit" name="update" value="Update Product" class="btn btn-success d-block w-75 mx-auto form-control" >


</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['update'])){

$product_title = $_POST['product_title'];
$product_cat = $_POST['product_cat'];
$cat = $_POST['cat'];
$manufacturer_id = $_POST['manufacturer'];
$product_price = $_POST['product_price'];
$product_desc = $_POST['product_desc'];
$product_keywords = $_POST['product_keywords'];

$psp_price = $_POST['psp_price'];

$product_label = $_POST['product_label'];

$product_url = $_POST['product_url'];

$product_features = $_POST['product_features'];

$product_video = $_POST['product_video'];

$status = "product";

$product_img1 = $_FILES['product_img1']['name'];
$product_img2 = $_FILES['product_img2']['name'];
$product_img3 = $_FILES['product_img3']['name'];

$temp_name1 = $_FILES['product_img1']['tmp_name'];
$temp_name2 = $_FILES['product_img2']['tmp_name'];
$temp_name3 = $_FILES['product_img3']['tmp_name'];

if(empty($product_img1)){

$product_img1 = $new_p_image1;

}


if(empty($product_img2)){

$product_img2 = $new_p_image2;

}

if(empty($product_img3)){

$product_img3 = $new_p_image3;

}


move_uploaded_file($temp_name1,"product_images/$product_img1");
move_uploaded_file($temp_name2,"product_images/$product_img2");
move_uploaded_file($temp_name3,"product_images/$product_img3");

$update_product = "update products set p_cat_id='$product_cat',cat_id='$cat',manufacturer_id='$manufacturer_id',date=NOW(),product_title='$product_title',product_url='$product_url',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_psp_price='$psp_price',product_desc='$product_desc',product_features='$product_features',product_video='$product_video',product_keywords='$product_keywords',product_label='$product_label',status='$status' where product_id='$p_id'";

$run_product = mysqli_query($con,$update_product);

if($run_product){

echo "<script> alert('Product has been updated successfully') </script>";

echo "<script>window.open('index.php?view_products','_self')</script>";

}

}

?>

<?php } ?>