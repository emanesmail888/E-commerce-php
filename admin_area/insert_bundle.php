<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>
<!DOCTYPE html>

<html>

<head>

<title> Insert Bundle </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#product_desc,#product_features' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Insert Bundle

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 



<div class="col-md-8 offset-2 "><!-- col-lg-12 Starts -->

<div class="panel "  style="border:1px solid #5555;"><!-- panel panel-default Starts -->

<div class="panel-heading bg-secondary"><!-- panel-heading Starts -->

<h3 class="panel-title text-center">

<i class="fa fa-money fa-fw"></i> Insert Bundle

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body "><!-- panel-body Starts -->

<form class=" " method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group w-100 d-flex" ><!-- form-group Starts -->

<label class="w-25 ml-1"> Bundle Title </label>


<input type="text" name="product_title" class="form-control w-75 mr-1" required >



</div><!-- form-group Ends -->

<div class="form-group d-flex  w-100" ><!-- form-group Starts -->

<label class=" w-25 ml-1" > Bundle Category </label>

<select name="product_cat" class="form-control w-75 mr-1" >

<option> Select  a Bundle Category </option>


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

<div class="form-group w-100 d-flex" ><!-- form-group Starts -->

<label class="w-25 ml-1" > Category </label>



<select name="cat" class="form-control w-75 mr-1" >

<option> Select a Category </option>

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

<label class="w-25 ml-1" > Bundle Url </label>


<input type="text" name="product_url" class="form-control w-75 mr-1" required >

</div><!-- form-group Ends -->


<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Select A Manufacturer </label>

<select class="form-control w-75" name="manufacturer"><!-- select manufacturer Starts -->

<option> Select A Manufacturer </option>
<?php

$get_manufacturer = "select * from manufacturers";
$run_manufacturer = mysqli_query($con,$get_manufacturer);
while($row_manufacturer= mysqli_fetch_array($run_manufacturer)){
$manufacturer_id = $row_manufacturer['manufacturer_id'];
$manufacturer_title = $row_manufacturer['manufacturer_title'];

echo "<option value='$manufacturer_id'>
$manufacturer_title
</option>";

}

?>

</select><!-- select manufacturer Ends -->


</div><!-- form-group Ends -->
















<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Bundle Image 1 </label>


<input type="file" name="product_img1" class="form-control w-75 mr-1" required >



</div><!-- form-group Ends -->

<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Bundle Image 2 </label>

<input type="file" name="product_img2" class="form-control w-75 mr-1" required >



</div><!-- form-group Ends -->

<div class="form-group d-flex" ><!-- form-group Starts -->

<label class=" w-25 ml-1" > Bundle Image 3 </label>


<input type="file" name="product_img3" class="form-control w-75 mr-1" required >



</div><!-- form-group Ends -->

<div class="form-group d-flex" ><!-- form-group Starts -->

<label class=" ml-1 w-25" > Bundle Price </label>


<input type="text" name="product_price" class="form-control w-75 mr-1" required >


</div><!-- form-group Ends -->

<div class="form-group d-flex" ><!-- form-group Starts -->

<label class="ml-1 w-25" > Bundle Keywords </label>


<input type="text" name="product_keywords" class="form-control w-75 mr-1" required >



</div><!-- form-group Ends -->





<div class="form-group " style="border: 1px solid #5555;" ><!-- form-group Starts -->
<div class=" w-100 d-flex">

<label class="ml-1  w-25" > Bundle Tabs </label>


<ul class="nav nav-tabs w-75 mr-1 justify-content-between   text-white"><!-- nav nav-tabs Starts -->
<a data-toggle="tab" href="#description" class=" bg-info text-white p-2 "> Bundle Description </a>

<a data-toggle="tab" href="#features" class="bg-info text-white p-2 "> Bundle Features </a>

<a data-toggle="tab" href="#video"  class="bg-info text-white p-2 "> Sounds And Videos </a>

</ul><!-- nav nav-tabs Ends -->
</div>
<div class="tab-content w-75 ml-auto"><!-- tab-content Starts -->

<div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->

<br>

<textarea name="product_desc" class="form-control" rows="7" id="product_desc">


</textarea>

</div><!-- description tab-pane fade in active Ends -->


<div id="features" class="tab-pane fade in"><!-- features tab-pane fade in Starts -->

<textarea name="product_features" class="form-control" rows="7" id="product_features">
</textarea>

</div><!-- features tab-pane fade in Ends -->


<div id="video" class="tab-pane fade in"><!-- video tab-pane fade in Starts -->
<textarea name="product_video" class="form-control" rows="7">
</textarea>


</div><!-- video tab-pane fade in Ends -->


</div><!-- tab-content Ends -->


</div><!--form-group  -->




<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="w-25 ml-1" > Bundle Label </label>


<input type="text" name="product_label" class="form-control w-75 mr-1" required >


</div><!-- form-group Ends -->


<div class="form-group d-flex" ><!-- form-group Starts -->

<input type="submit" name="submit" value="Insert Product" class="btn btn-secondary mx-auto w-75 d-block form-control" >

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['submit'])){

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

$status = "bundle";

$product_img1 = $_FILES['product_img1']['name'];
$product_img2 = $_FILES['product_img2']['name'];
$product_img3 = $_FILES['product_img3']['name'];

$temp_name1 = $_FILES['product_img1']['tmp_name'];
$temp_name2 = $_FILES['product_img2']['tmp_name'];
$temp_name3 = $_FILES['product_img3']['tmp_name'];

move_uploaded_file($temp_name1,"product_images/$product_img1");
move_uploaded_file($temp_name2,"product_images/$product_img2");
move_uploaded_file($temp_name3,"product_images/$product_img3");

$insert_product = "insert into products (p_cat_id,cat_id,manufacturer_id,date,product_title,product_url,product_img1,product_img2,product_img3,product_price,product_psp_price,product_desc,product_features,product_video,product_keywords,product_label,status) values ('$product_cat','$cat','$manufacturer_id',NOW(),'$product_title','$product_url','$product_img1','$product_img2','$product_img3','$product_price','$psp_price','$product_desc','$product_features','$product_video','$product_keywords','$product_label','$status')";

$run_product = mysqli_query($con,$insert_product);

if($run_product){

echo "<script>alert('Bundle has been inserted successfully')</script>";

echo "<script>window.open('index.php?view_bundles','_self')</script>";

}

}

?>

<?php } ?>
