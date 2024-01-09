<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['user_profile'])){

$edit_id = $_GET['user_profile'];

$get_admin = "select * from admins where admin_id='$edit_id'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin['admin_id'];

$admin_name = $row_admin['admin_name'];

$admin_email = $row_admin['admin_email'];

$admin_pass = $row_admin['admin_pass'];

$admin_image = $row_admin['admin_image'];

$admin_country = $row_admin['admin_country'];

$admin_job = $row_admin['admin_job'];

$admin_contact = $row_admin['admin_contact'];

$admin_about = $row_admin['admin_about'];

}



?>


<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12 text-danger" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Edit Profile

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-md-8  offset-2" ><!-- col-lg-12 Starts -->

<div class="panel pb-3" style="border:1px solid green;" ><!-- panel panel-default Starts -->

<div class="panel-heading bg-success" ><!-- panel-heading Starts -->

<h3 class="panel-title text-center" >

<i class="fa fa-money fa-fw" ></i> Edit Profile

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body mb-1 pb-3"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 ml-1">User Name: </label>
<input type="text" name="admin_name" class="form-control w-75 mr-1" required value="<?php echo $admin_name; ?>">
</div><!-- form-group Ends -->


<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 ml-1">User Email: </label>
<input type="text" name="admin_email" class="form-control w-75 mr-1" required value="<?php echo $admin_email; ?>">
</div><!-- form-group Ends -->


<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 ml-1">User Password: </label>
<input type="text" name="admin_pass" class="form-control w-75 mr-1" required value="<?php echo $admin_pass; ?>">
</div><!-- form-group Ends -->

<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 ml-1">User Country: </label>
<input type="text" name="admin_country" class="form-control w-75 mr-1" required value="<?php echo $admin_country; ?>">
</div><!-- form-group Ends -->


<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 ml-1">User Job: </label>
<input type="text" name="admin_job" class="form-control w-75 mr-1" required value="<?php echo $admin_job; ?>">
</div><!-- form-group Ends -->


<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 ml-1">User Contact: </label>
<input type="text" name="admin_contact" class="form-control w-75 mr-1" required value="<?php echo $admin_contact; ?>">
</div><!-- form-group Ends -->


<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 ml-1">User About: </label>
<textarea name="admin_about" class="form-control w-75 mr-1" rows="3"> <?php echo $admin_about; ?> </textarea>
</div><!-- form-group Ends -->

<div class="form-group d-flex w-100"><!-- form-group Starts -->

<label class="w-25 ml-1">User Image: </label>
<input type="file" name="admin_image" class="form-control w-75 mr-1" required>
<br>
</div><!-- form-group Ends -->

<img src="admin_images/<?Php echo $admin_image; ?>" width="70" height="70" >

<div class="form-group d-flex w-100"><!-- form-group Starts -->
<input type="submit" name="update" value="Update User" class="btn btn-success  d-block  mx-auto form-control w-75">
</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

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

$update_admin = "update admins set admin_name='$admin_name',admin_email='$admin_email',admin_pass='$admin_pass',admin_image='$admin_image',admin_contact='$admin_contact',admin_job='$admin_job',admin_about='$admin_about' where admin_id='$admin_id'";


$run_admin = mysqli_query($con,$update_admin);

if($run_admin){

echo "<script>alert('User Has Been Updated successfully and login again')</script>";

echo "<script>window.open('login.php','_self')</script>";

session_destroy();

}

}


?>



<?php }  ?>