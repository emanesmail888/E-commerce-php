<?php
include("nav.php");
?>

<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

<div class="col-md-12" ><!--- col-md-12 Starts -->

<ul class="breadcrumb" ><!-- breadcrumb Starts -->

<li>
<a href="index.php">Home</a>
</li>

<li>About Us</li>

</ul><!-- breadcrumb Ends -->



</div><!--- col-md-12 Ends -->




<div class="col-md-12" ><!-- col-md-12 Starts -->

<div class="box" ><!-- box Starts -->

<?php

$get_about_us = "select * from about_us";

$run_about_us = mysqli_query($con,$get_about_us);

$row_about_us = mysqli_fetch_array($run_about_us);

$about_heading = $row_about_us['about_heading'];

$about_short_desc = $row_about_us['about_short_desc'];

$about_desc = $row_about_us['about_desc'];

?>

<h1> <?php echo $about_heading; ?> </h1>

<p class="lead"> <?php echo $about_short_desc; ?> </p>

<p> <?php echo $about_desc; ?> </p>

</div><!-- box Ends -->

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