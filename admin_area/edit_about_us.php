<?php


if (!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";
} else {


?>


  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

  <script>
    tinymce.init({
      selector: '#about_desc'
    });
  </script>

  <?php

  $get_about_us = "select * from about_us";

  $run_about_us = mysqli_query($con, $get_about_us);

  $row_about_us = mysqli_fetch_array($run_about_us);

  $about_heading = $row_about_us['about_heading'];

  $about_short_desc = $row_about_us['about_short_desc'];

  $about_desc = $row_about_us['about_desc'];

  ?>

  <div class="row">
    <div class="col-lg-12">

      <ol class="breadcrumb">

        <li class="active">

          <i class="fa fa-dashboard"></i> Dashboard / Edit About Us Page

        </li>

      </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

  </div><!-- 1 row Ends -->

  <div class="row">

    <div class="col-md-10 offset-1">
      <div class="panel " style="border:solid 1px green ;">

        <div class="panel-heading bg-success text-center">

          <h3 class="panel-title">

            <i class="fa fa-money fa-fw"></i> Edit About Us Page

          </h3>

        </div><!-- panel-heading Ends -->

        <div class="panel-body">

          <form method="post" class="form-horizontal">

            <div class="form-group d-flex w-100">
              <label class="w-25 ml-1"> About Us Heading : </label>

              <input type="text" name="about_heading" class="form-control w-75 mr-1" value="<?php echo $about_heading; ?>">


            </div><!-- form-group Ends -->


            <div class="form-group d-flex w-100">
              <label class="w-25 ml-1"> About Us Short Description : </label>


              <textarea name="about_short_desc" class="form-control w-75 mr-1" rows="5">

<?php echo $about_short_desc; ?>

</textarea>

            </div><!-- form-group Ends -->

            <div class="form-group d-flex w-100">

              <label class="w-25 ml-1"> About Us Description : </label>


              <textarea name="about_desc" id="about_desc" class="form-control w-75 mr-1" rows="10">

<?php echo $about_desc; ?>

</textarea>


            </div><!-- form-group Ends -->

            <div class="form-group">

              <input type="submit" name="submit" value="Update About Us Page" class="btn btn-success w-75 d-block mx-auto form-control">


            </div><!-- form-group Ends -->


          </form><!-- form-horizontal Ends -->

        </div><!-- panel-body Ends -->

      </div><!-- panel  -->

    </div><!-- col-lg-12 Ends -->

  </div><!-- 2 row Ends -->

  <?php

  if (isset($_POST['submit'])) {

    $about_heading = $_POST['about_heading'];

    $about_short_desc = $_POST['about_short_desc'];

    $about_desc = $_POST['about_desc'];

    $update_about_us = "update about_us set about_heading='$about_heading',about_short_desc='$about_short_desc',about_desc='$about_desc'";

    $run_about_us = mysqli_query($con, $update_about_us);

    if ($run_about_us) {

      echo "<script>alert('About Us Page Has Been Updated')</script>";

      echo "<script>window.open('index.php?dashboard','_self')</script>";
    }
  }

  ?>


<?php } ?>