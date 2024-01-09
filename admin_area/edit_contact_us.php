<?php


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {


?>


    <?php

    $get_conatct_us = "select * from contact_us";

    $run_contact_us = mysqli_query($con, $get_conatct_us);

    $row_contact_us = mysqli_fetch_array($run_contact_us);

    $contact_email = $row_contact_us['contact_email'];

    $contact_heading = $row_contact_us['contact_heading'];

    $contact_desc = $row_contact_us['contact_desc'];



    ?>



    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / Edit Contact Us

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row">

        <div class="col-md-10 offset-1">

            <div class="panel " style="border: solid 1px red;">

                <div class="panel-heading bg-danger">

                    <h3 class="panel-title text-white text-center">

                        <i class="fa fa-money fa-fw"></i> Edit Contact Us

                    </h3>

                </div><!-- panel-heading Ends -->


                <div class="panel-body">

                    <form class="form-horizontal" action="" method="post">

                        <div class="form-group d-flex w-100">

                            <label class="col-md-3 w-25 ml-1 "> Contact Email: </label>

                            <input type="text" name="contact_email" class="form-control w-75 mr-1" value="<?php echo $contact_email; ?>">

                        </div><!-- form-group Ends -->

                        <div class="form-group d-flex w-100">

                            <label class="col-md-3 w-25 ml-1"> Contact Heading: </label>

                            <input type="text" name="contact_heading" class="form-control w-75 mr-1" value="<?php echo $contact_heading; ?>">

                        </div><!-- form-group Ends -->


                        <div class="form-group d-flex w-100">

                            <label class="col-md-3 w-25 ml-1"> Contact Description: </label>
                            <textarea name="contact_desc" class="form-control w-75 mr-1" rows="6" cols="19">
<?php echo $contact_desc; ?>
</textarea>

                        </div><!-- form-group Ends -->

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-danger d-block mx-auto form-control w-75" value=" Update Contact Us ">

                        </div><!-- form-group Ends -->

                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel Ends -->

        </div><!-- col-md-10 Ends -->

    </div><!-- 2 row Ends -->


    <?php

    if (isset($_POST['submit'])) {

        $contact_email = $_POST['contact_email'];

        $contact_heading = $_POST['contact_heading'];

        $contact_desc = $_POST['contact_desc'];


        $update_contact_us = "update contact_us set contact_email='$contact_email',contact_heading='$contact_heading',contact_desc='$contact_desc'";

        $run_contact_us = mysqli_query($con, $update_contact_us);

        if ($run_contact_us) {

            echo "<script>alert('Contact Us Page Has Been Updated')</script>";

            echo "<script>window.open('index.php?dashboard','_self')</script>";
        }
    }

    ?>


<?php } ?>