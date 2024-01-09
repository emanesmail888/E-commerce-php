<?php
include("nav.php");


    
?>









  <section id="slider" class="mt-2 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="myCarousel" class="carousel slide bg-white " data-ride="carousel">
            <ol class="carousel-indicators ">

              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner ">

              <div class="carousel-item  active  ">
                <div class="row">
                  <div class="col-sm-6 text-center  mt-5   pt-5">
                    <h1><span>E</span>-SHOPPER</h1>
                    <h2>Free Ecommerce Template</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    <button type="button" class="btn  mx-auto ">Get it now</button>
                  </div>

                  <div class="col-sm-6 text-center ">
                    <img src="images/slide1.png" class="img-fluid   " alt="...">
                  </div>
                </div>

              </div>

              <div class="carousel-item  ">
                <div class="row">
                  <div class="col-sm-6 text-center  mt-5   pt-5">
                    <h1><span>E</span>-SHOPPER</h1>
                    <h2>Free Ecommerce Template</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    <button type="button" class="btn btn-default get mx-auto">Get it now</button>
                  </div>
                  <div class="col-sm-6 text-center ">
                    <img src="images/slide2.png" class=" img-fluid " alt="...">
                  </div>
                </div>
              </div>

              <div class="carousel-item  ">
                <div class="row">
                  <div class="col-sm-6  mt-5 text-center  pt-5">
                    <h1 class=""><span>E</span>-SHOPPER</h1>
                    <h2 class="">Free Ecommerce Template</h2>
                    <p class="ml-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    <button type="button" class="btn btn-default mx-auto get">Get it now</button>
                  </div>
                  <div class="col-sm-6 text-center">
                    <img src="images/slide3.png" class=" img-fluid  " alt="...">
                  </div>
                </div>

              </div>

            </div>


            <a class="carousel-control-prev " href="#myCarousel" role="button" data-slide="prev">

              <span class="carousel-control-prev-icon" aria-hidden="true"> </span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">

              <span class="carousel-control-next-icon " aria-hidden="true"></span>
            </a>
          </div>
        </div><!-- col-sm-12 -->
      </div>
    </div>
  </section>
  <!--/slider-->




  <section id="advantages" class="mt-5">
    <div class="container">
      <div class="same-height row">
        <div class="col-sm-4">

          <div class="box same-height">
            <div class="icon">
              <i class="fa fa-heart "></i>


            </div><!-- icon -->
            <h3 class=""><a href="#">WE Love Our Customers</a></h3>
            <p>we are known to provide best possible service ever</p>

          </div><!-- box -->
        </div><!-- col-sm-4 -->




        <div class="col-sm-4">

          <div class="box same-height">
            <div class="icon">
              <i class="fa fa-heart"></i>


            </div><!-- icon -->
            <h3><a href="">WE Love Our Customers</a></h3>
            <p>we are known to provide best possible service ever</p>

          </div><!-- box -->
        </div><!-- col-sm-4 -->




        <div class="col-sm-4">

          <div class="box same-height">
            <div class="icon">
              <i class="fa fa-heart "></i>


            </div><!-- icon -->
            <h3><a href="">WE Love Our Customers</a></h3>
            <p>we are known to provide best possible service ever</p>

          </div><!-- box -->
        </div><!-- col-sm-4 -->

      </div><!-- same-height -->

    </div><!-- container -->

  </section>




  <!-- <section class="products"> -->
  <h2 class="text-center">Latest This Week</h2>

  <div id="content" class="container">
    <!-- container Starts -->

    <div class="row">
      <!-- row Starts -->

      <?php

      getPro();

      ?>

    </div><!-- row Ends -->

  </div><!-- container Ends -->


  <!-- </section> -->



  <?php include("include/footer.php") ?>










  <script src="js/jquery.min.js"></script>
  <!-- <script src="js/jquery.slim.min.js"></script> -->
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="js/bootstrap.bundle.min.js"></script> -->
  <script>
    var obj = {
                "flammable": "inflammable",
                "duh": "no duh"
              };
              $.each( obj, function( key, value ) {
                alert( key + ": " + value );
              });
  </script>
  
</body>

</html>