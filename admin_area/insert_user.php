<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12 text-danger" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Insert User

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-md-8 offset-2" ><!-- col-lg-12 Starts -->

<div class="panel pb-3  " style="border:1px solid green;"><!-- panel panel-default Starts -->

<div class="panel-heading h-75 bg-success " ><!-- panel-heading Starts -->

<h3 class="panel-title text-center" >

<i class="fa fa-money fa-fw" ></i> Insert User

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body mb-1 "><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 ml-1 ">User Name: </label>

<input type="text" name="admin_name" class="form-control w-75 mr-1" required>

</div><!-- form-group Ends -->


<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 control-label">User Email: </label>
<input type="text" name="admin_email" class="form-control w-75 mr-1" required>
</div><!-- form-group Ends -->


<div class="form-group w-100 d-flex"><!-- form-group Starts -->

<label class="w-25">User Password: </label>
<input type="password" name="admin_pass" class="form-control w-75 mr-1" required>

</div><!-- form-group Ends -->

<div class="form-group w-100 d-flex"><!-- form-group Starts -->

<label class="w-25 ml-1">User Country: </label>

<input type="text" name="admin_country" class="form-control w-75 mr-1 " required>
</div><!-- form-group Ends -->


<div class="form-group w-100 d-flex"><!-- form-group Starts -->

<label class="w-25 ml-1">User Job: </label>
<input type="text" name="admin_job" class="form-control w-75 mr-1" required>
</div><!-- form-group Ends -->


<div class="form-group w-100 d-flex"><!-- form-group Starts -->

<label class="w-25 ml-1">User Contact: </label>
<input type="text" name="admin_contact" class="form-control w-75 mr-1" required>
</div><!-- form-group Ends -->


<div class="form-group w-100 d-flex"><!-- form-group Starts -->

<label class="w-25 ml-1 control-label">User About: </label>
<textarea name="admin_about" class="form-control w-75 mr-1" rows="4"> </textarea>

</div><!-- form-group Ends -->

<div class="form-group w-100 d-flex"><!-- form-group Starts -->

<label class="w-25 ml-1">User Image: </label>
<input type="file" name="admin_image" class="form-control w-75 mr-1" required>
</div><!-- form-group Ends -->


<div class="form-group w-100 d-flex"><!-- form-group Starts -->
<input type="submit" name="submit" value="Insert User" class="btn btn-success w-75 d-block mx-auto form-control">
</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$admin_name = $_POST['admin_name'];

$admin_email = $_POST['admin_email'];

$admin_pass = $_POST['admin_pass'];

$admin_country = $_POST['admin_country'];

$admin_job = $_POST['admin_job'];

$admin_contact = $_POST['admin_contact'];

$admin_about = $_POST['admin_about'];


$admin_image = $_FILES['admin_image']['name'];

$temp_admin_image = $_FILES['admin_image']['tmp_name'];

move_uploaded_file($temp_admin_image,"admin_images/$admin_image");

$insert_admin = "insert into admins (admin_name,admin_email,admin_pass,admin_image,admin_contact,admin_country,admin_job,admin_about) values ('$admin_name','$admin_email','$admin_pass','$admin_image','$admin_contact','$admin_country','$admin_job','$admin_about')";

$run_admin = mysqli_query($con,$insert_admin);


if($run_admin){

echo "<script>alert('One User Has Been Inserted successfully')</script>";

echo "<script>window.open('index.php?view_users','_self')</script>";

}


}


?>



<?php }  ?>