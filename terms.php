<?php
include("nav.php");
?>

<div id="content">

<div class="container">

<div class="col-md-12">

<ul class="breadcrumb">

<li> <a href="index.php">Home</a> </li>

<li>Terms And Conditions </li>

</ul><!-- breadcrumb Ends -->

</div><!-- col-md-12 Ends -->


<div class="container mb-5">
<div class="accordion " id="accordionExample">
    <?php
        $i = 1;
        $get_terms = "select * from terms ";

        $run_terms = mysqli_query($con,$get_terms);
        
        while($row_terms = mysqli_fetch_array($run_terms)){
        
        $term_title = $row_terms['term_title'];
        
        $term_desc = $row_terms['term_desc'];
    
    ?>
    <div class="card">
        <div class="card-header" style=" background-color:rgb(221, 64, 96);"  id="headingOne<?php echo $i ?>">
            <h4 class="mb-0">
                <button class="btn btn-link btn-block text-left text-white "  type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $i ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $i ?>">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?php echo  $term_title  ?> 
                        </div>
                    </div>
                </div>
                </button>
            </h4>
        
        </div>
        
        <div id="collapseOne<?php echo $i ?>" class="collapse" aria-labelledby="headingOne<?php echo $i ?>" data-parent="#accordionExample">
            <div class="card-body">
            <?php echo  $term_desc  ?> 


            </div>
        </div>
    </div>
    <?php $i++; } ?>
</div>

</div>







<?php

include("include/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>

































