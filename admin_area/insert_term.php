<?php

if (!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";
} else {


?>



  <div class="row">
    <!-- 1 row Starts -->

    <div class="col-lg-12">

      <ol class="breadcrumb">

        <li class="active">

          <i class="fa fa-dashboard"></i> Dashboard / Insert Terms

        </li>

      </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

  </div><!-- 1 row Ends -->



  <div class="row">


    <div class="col-md-10 offset-1">


      <div class="panel " style="border: 1px solid blue;">

        <div class="panel-heading bg-info">

          <h3 class="panel-title text-center text-white">

            <i class="fa fa-money fa-fw"></i> Insert Terms

          </h3><!-- panel-title Ends -->

        </div><!-- panel-heading Ends -->

        <div class="panel-body">

          <form  action="" method="post">

            <div class="form-group w-100 d-flex">

              <label class="w-25 ml-1"> Term Title </label>
              <input type="text" name="term-title" class="form-control w-75 mr-1">


            </div><!-- form-group Ends -->


            <div class="form-group w-100 d-flex">

              <label class="w-25 ml-1"> Term Description </label>
              <textarea name="term-desc" class="form-control w-75 mr-1" id="" cols="15" rows="10"></textarea>

            </div><!-- form-group Ends -->

            <div class="form-group">
              <input type="submit" value="Insert Term" name="submit" class="btn btn-info d-block form-control w-75 mx-auto">



            </div><!-- form-group Ends -->


          </form>

        </div><!-- panel-body Ends -->

      </div><!-- panel  Ends -->


    </div><!-- col-md-10 Ends -->

  </div><!-- 2 row Ends -->


  <?php
 

  if (isset($_POST['submit'])) {

    $term_title = $_POST['term-title'];
    $term_desc = $_POST['term-desc'];

    $insert_term = "insert into terms(term_title,term_desc) values('$term_title','$term_desc')"; 

    $run_term = mysqli_query($con, $insert_term);

    if ($run_term) {

      echo "<script>alert('New Term Has Been Inserted')</script>";

      echo "<script>window.open('index.php?view_terms','_self')</script>";
    }
  }


  ?>


<?php } ?>