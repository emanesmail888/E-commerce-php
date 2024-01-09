<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row">

<div class="col-md-10">

<ol class="breadcrumb" >

<li class="active" >

<i class="fa fa-dashboard"></i> Dashboard / View Terms

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->



<div class="row">

<div class="col-lg-12">
<div class="panel ">

<div class="panel-heading bg-info">

<h3 class="panel-title text-center text-white">

<i class="fa fa-money fa-fw"></i> View Terms

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body row">
<?php

$get_terms = "select * from terms";

$run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){

$term_id = $row_terms['term_id'];

$term_title = $row_terms['term_title'];

$term_desc = substr($row_terms['term_desc'],0,400);

?>

<div class=" col-md-4 " >

<h4 class=" text-center " style="color:#e42c5a ;" >
<?php echo $term_title; ?>

</h4>

<textarea  rows="7" class="w-100"><?php echo $term_desc; ?></textarea>



<div class=" d-flex justify-content-around">

<a href="index.php?delete_term=<?php echo $term_id; ?>" class="btn btn-info">

<i class="fa fa-trash-o"></i> Delete

</a>


<a href="index.php?edit_term=<?php echo $term_id; ?>" class="btn btn-info">

<i class="fa fa-pencil"></i> Edit

</a>


<div class="clearfix"> </div>

</div><!-- panel-footer Ends -->

</div><!--  col-md-4 Ends -->


<?php } ?>

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php } ?>