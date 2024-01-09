<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12 text-danger" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Insert Slide

</li>

</ol><!-- breadcrumb Ends -->



</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-md-8 offset-2" ><!-- col-lg-12 Starts -->

<div class="panel" style="border:1px solid #5555 ;" ><!-- panel panel-default Starts -->

<div class="panel-heading bg-secondary" ><!-- panel-heading Starts -->

<h3 class="panel-title text-center" >

<i class="fa fa-money fa-fw"></i> Insert Slide

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group w-100 d-flex" ><!-- form-group Starts -->

<label class="ml-1 w-25">Slide Name:</label>
<input type="text" name="slide_name" class="form-control  w-75 mr-1" >
</div><!-- form-group Ends -->

<div class="form-group d-flex w-100" ><!-- form-group Starts -->

<label class="w-25 ml-1">Slide Image:</label>
<input type="file" name="slide_image" class="form-control w-75 mr-1" >
</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<input type="submit" name="submit" value="Submit Now" class=" btn btn-secondary d-block w-75 mx-auto form-control" >
</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$slide_name = $_POST['slide_name'];

$slide_image = $_FILES['slide_image']['name'];

$temp_name = $_FILES['slide_image']['tmp_name'];

$view_slides = "select * from slider";

$view_run_slides = mysqli_query($con,$view_slides);

$count = mysqli_num_rows($view_run_slides);

if($count<4){

move_uploaded_file($temp_name,"slides_images/$slide_image");

$insert_slide = "insert into slider (slide_name,slide_image) values ('$slide_name','$slide_image')";

$run_slide = mysqli_query($con,$insert_slide);

echo "<script>alert('New Slide Has Been Inserted')</script>";

echo "<script>window.open('index.php?view_slides','_self')</script>";

}
else {

echo "<script>alert('You have already inserted 4 slides')</script>";

}

}


?>



<?php } ?>