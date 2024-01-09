<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php


if(isset($_GET['edit_term'])){

$edit_id = $_GET['edit_term'];

$get_term = "select * from terms where term_id='$edit_id'";

$run_term = mysqli_query($con,$get_term);

$row_term = mysqli_fetch_array($run_term);

$term_id = $row_term['term_id'];

$term_title = $row_term['term_title'];


$term_desc = $row_term['term_desc'];

}

?>

 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Edit Terms

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->



<div class="row"><!-- 2 row Starts -->


<div class="col-lg-12"><!-- col-lg-12 Starts -->


<div class="panel "><!-- panel panel-default Starts -->

<div class="panel-heading bg-info"><!-- panel-heading Starts -->

<h3 class="panel-title text-center"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Edit Terms

</h3>

</div>

<div class="panel-body">

<form class="form-horizontal" action="" method="post">

<div class="form-group d-flex w-100">
<label class="w-25 ml-1"> Term Title </label>
<input type="text" name="term_title" class="form-control mr-1" value="<?php echo $term_title; ?>">

</div><!-- form-group Ends -->


<div class="form-group d-flex w-100">

<label class="w-25 ml-1"> Term Description </label>

<textarea name="term_desc" class="form-control mr-1" rows="6" cols="19" >
<?php echo $term_desc; ?>
</textarea>


</div><!-- form-group Ends -->

<input type="submit" name="update" value="Update Term" class="btn btn-info d-block mx-auto w-75 form-control" >




</form><!-- form-horizontal Ends -->


</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php

if(isset($_POST['update'])){

$term_title = $_POST['term_title'];

$term_desc = $_POST['term_desc'];


$update_term = "update terms set term_title='$term_title',term_desc='$term_desc' where term_id='$term_id'";

$run_term = mysqli_query($con,$update_term);

if($run_term){

echo "<script>alert('One Term Box Has Been Updated ')</script>";

echo "<script>window.open('index.php?view_terms','_self')</script>";

}

}


?>


<?php } ?>