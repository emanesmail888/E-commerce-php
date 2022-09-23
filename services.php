<?php
include("nav.php");
?>


<div id="content" >
<div class="container-fluid" >

<div class="col-md-12" >
<ul class="breadcrumb" >

<li>
<a href="index.php">Home</a>
</li>

<li>Services</li>

</ul><!-- breadcrumb Ends -->



</div><!--- col-md-12 Ends -->




<div class="col-md-12" >

<div class=" row">
<h6 class="text-info text-center pb-5">Luxuriously curated trendy gift boxes with a purpose: to make gifting easy for you and perfect for them! Our selections range from gifts for birthdays, weddings and job celebrations to unique gifts for Him, Her and all the important individuals in your life!</h6>

<?php

$get_services = "select * from services";

$run_services = mysqli_query($con,$get_services);

while($row_services = mysqli_fetch_array($run_services)){

$service_id = $row_services['service_id'];

$service_title = $row_services['service_title'];

$service_image = $row_services['service_image'];

$service_desc = $row_services['service_desc'];

$service_button = $row_services['service_button'];

$service_url = $row_services['service_url'];

?>

<div class="col-md-4 col-sm-6 ">
<img src="admin_area/services_images/<?php echo $service_image; ?>" class="w-100" style="height:250px;">

<h2 class="text-center"> <?php echo $service_title; ?> </h2>

<p style="height:250px; ">
<?php echo $service_desc; ?>
</p>


<a href="<?php echo $service_url; ?>" class="btn d-block mx-auto btn-secondary mb-2">

<?php echo $service_button; ?>

</a>


</div><!-- col-md-4 col-sm-6 box Ends -->

<?php } ?>

</div><!-- services row Ends -->

</div><!-- col-md-12 Ends -->



</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("include/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>